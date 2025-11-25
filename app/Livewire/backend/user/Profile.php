<?php


namespace App\Livewire\backend\user;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class Profile extends Component
{
    use WithFileUploads;

    public $name, $email, $phone, $address, $gender, $date_of_birth, $avatar, $newAvatar;

    public function mount()
    {
        $user = Auth::user();

        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->address = $user->address;
        $this->gender = $user->gender;
        $this->date_of_birth = $user->date_of_birth;
        $this->avatar = $user->avatar;
    }

    public function updateProfile()
    {
        $user = Auth::user();

        if ($this->newAvatar) {
            $fileName = $this->newAvatar->store('avatars', 'public');
            $this->avatar = $fileName;
        }

        $user->update([
            'name'  => $this->name,
            'phone' => $this->phone,
            'address' => $this->address,
            'gender' => $this->gender,
            'date_of_birth' => $this->date_of_birth,
            'avatar' => $this->avatar,
        ]);

        session()->flash('success', 'Profile Updated Successfully!');
    }

    public function render()
    {
        return view('livewire.backend.user.profile');
    }
}
