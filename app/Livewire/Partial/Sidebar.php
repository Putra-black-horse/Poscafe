<?php

namespace App\Livewire\Partial;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Sidebar extends Component
{
    public function logout()
    {
        Auth::logout(); // Logout user
        session()->invalidate(); // Invalidate session
        session()->regenerateToken(); // Regenerate token untuk keamanan

        return redirect()->route('login'); // Redirect ke halaman login
    }

    public function render()
    {
        return view('livewire.partial.sidebar');
    }
}
