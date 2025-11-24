<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'product_name',
        'sku',
        'variant',
        'quantity',
        'unit_price',
        'total_price',
        'meta',
    ];

    protected $casts = [
        'variant' => 'array',
        'unit_price' => 'decimal:2',
        'total_price' => 'decimal:2',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Ensure total_price is unit_price * quantity before saving.
     */
    protected static function booted()
    {
        static::saving(function ($item) {
            $item->total_price = round($item->unit_price * $item->quantity, 2);
        });
    }
}
