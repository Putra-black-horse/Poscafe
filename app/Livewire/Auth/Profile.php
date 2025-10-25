<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Profile extends Component
{
    public $name;
    public $email;
    public $password;
    public ?User $user;

    public function simpan()
    {
        // ✅ Validasi Input
        $valid = $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->id(), // ✅ Perbaikan validasi email
            'password' => 'nullable|min:8', // ✅ Password bisa kosong atau minimal 8 karakter
        ]);

        // 🔹 Jika password kosong, jangan diupdate
        if (empty($this->password)) {
            unset($valid['password']);
        } else {
            $valid['password'] = Hash::make($this->password);
        }

        // ✅ Update Data User
        $this->user->update($valid);

        $this->reset();
        $this->user->mount();

        // 🔹 Notifikasi ke user
        session()->flash('success', 'Profile berhasil diperbarui!');
    }

    public function mount()
    {
        // ✅ Ambil data user yang sedang login
        $this->user = User::findOrFail(auth()->id());
        $this->name = $this->user->name;
        $this->email = $this->user->email;
    }

    public function render()
    {
        return view('livewire.auth.profile');
    }
}
