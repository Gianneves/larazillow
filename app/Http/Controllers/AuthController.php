<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function create() {
        return Inertia::render('AuthPage/Login');
    }

    public function store(Request $request) {

        if (!Auth::attempt( $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]), true)) {
            throw ValidationException::withMessages([
                'email' =>  'Authentication failed'
            ]);
        }

        $request->session()->regenerate();
        
        return redirect()->intended();
    }

    public function destroy() {

    }
}
