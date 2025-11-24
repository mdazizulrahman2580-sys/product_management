<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'billing_address',
        'shipping_address',
        'payment_method',
        'payment_status',
        'transaction_id',
        'status',
        'subtotal',
        'shipping_cost',
        'tax',
        'discount',
        'grand_total',
        'notes',
        'coupon_code',
        'shipping_method',
        'tracking_number',
    ];

    protected $casts = [
        'billing_address' => 'array',
        'shipping_address' => 'array',
        'subtotal' => 'decimal:2',
        'shipping_cost' => 'decimal:2',
        'tax' => 'decimal:2',
        'discount' => 'decimal:2',
        'grand_total' => 'decimal:2',
    ];

    // common statuses
    public const STATUS_PENDING = 'pending';
    public const STATUS_PROCESSING = 'processing';
    public const STATUS_SHIPPED = 'shipped';
    public const STATUS_DELIVERED = 'delivered';
    public const STATUS_CANCELLED = 'cancelled';
    public const STATUS_REFUNDED = 'refunded';

    // payment statuses
    public const PAYMENT_PENDING = 'pending';
    public const PAYMENT_PAID = 'paid';
    public const PAYMENT_FAILED = 'failed';
    public const PAYMENT_REFUNDED = 'refunded';

    // Relations
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        // optional relation if you have users
        return $this->belongsTo(\App\Models\User::class);
    }

    // Helpers

    /**
     * Recalculate subtotal and grand_total from items.
     */
    public function recalculateTotals(): self
    {
        $subtotal = $this->items()->get()->sum(function ($item) {
            return (float) $item->total_price;
        });

        $this->subtotal = $subtotal;
        $this->grand_total = $this->calculateGrandTotal();
        $this->save();

        return $this;
    }

    /**
     * Calculate grand total without saving.
     */
    public function calculateGrandTotal(): float
    {
        $subtotal = $this->subtotal ?? 0;
        $shipping = $this->shipping_cost ?? 0;
        $tax = $this->tax ?? 0;
        $discount = $this->discount ?? 0;

        $total = $subtotal + $shipping + $tax - $discount;
        return round(max(0, $total), 2);
    }

    /**
     * Change status with optional note.
     */
    public function changeStatus(string $status, ?string $note = null): self
    {
        $this->status = $status;
        if ($note) {
            $this->notes = trim(($this->notes ?? '') . "\n\n" . '['.now().'] ' . $note);
        }
        $this->save();

        // you can dispatch events here e.g. OrderStatusChanged
        return $this;
    }

    /**
     * Mark order as paid.
     */
    public function markAsPaid(string $transactionId = null): self
    {
        $this->payment_status = self::PAYMENT_PAID;
        if ($transactionId) {
            $this->transaction_id = $transactionId;
        }
        $this->save();

        // dispatch payment success event / email etc.
        return $this;
    }

    // Scopes for admin filters
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function scopePaymentStatus($query, $paymentStatus)
    {
        return $query->where('payment_status', $paymentStatus);
    }

    public function scopeSearch($query, $term)
    {
        if (! $term) return $query;
        $term = "%{$term}%";
        return $query->where(function($q) use ($term) {
            $q->where('id', $term)
              ->orWhere('customer_name', 'like', $term)
              ->orWhere('customer_email', 'like', $term)
              ->orWhere('customer_phone', 'like', $term)
              ->orWhere('transaction_id', 'like', $term);
        });
    }
}
