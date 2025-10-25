<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
        public $email ;
        public $password ;

    public function login()
{
     // Validasi input
     $this->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // **Perbaikan!** Gunakan array untuk `Auth::attempt()`
    if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
        session()->regenerate();

        return redirect()->route('home'); // Ganti dengan route yang sesuai
    }

    // Jika gagal login
    session()->flash('error', 'Email atau password salah.');
}



    public function render()
    {
        return view('livewire.auth.login');
    }
}
