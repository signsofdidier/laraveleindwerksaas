<?php

namespace App\Http\Controllers\CentralAuth;

use App\Http\Controllers\Controller;
use App\Models\CentralUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('central.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:central_users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = CentralUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('central')->login($user);

        return redirect(route('dashboard'));
    }
}
