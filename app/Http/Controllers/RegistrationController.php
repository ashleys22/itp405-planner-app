<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|max:50',
            'password' => 'required|max:50',
            'confirm-password' => 'required_with:password|same:password|max:50'
        ]);

        $user = new User();
        $user->username = $request->input('username');
        $user->password = Hash::make($request->input('password')); // bcrypt
        $user->save();

        Auth::login($user);

        return redirect()->route('tasks.index');
    }
}
