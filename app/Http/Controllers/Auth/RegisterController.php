<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Hash;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function __construct() {
        $this->middleware(['guest']);
    }

    public function index() {
        return view('auth.register');
    }

    public function store(Request $request) {

        // Validate
        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            // It will look for any other password with _confirm and match
            'password' => 'required|confirmed',
        ]);

        // Store the user
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirect and sign the user in
        auth()->attempt($request->only('email', 'password'));
        
        return redirect()->route('dashboard');
    }
}
