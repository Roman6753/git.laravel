<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function register()
    {
        return view('register');
    }

    public function registerStore(Request $request)
    {
        $request->validate([
            'login' => ['required', 'string', 'max:255', 'unique:users'],
            'fio' => ['required', 'string', 'max:255'],
            'tel' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'login' => $request->login,
            'fio' => $request->fio,
            'tel' => $request->tel,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        Auth::login($user);

        return to_route('home');
    }


    public function login()
    {
        return view('login');
    }

    public function loginStore(Request $request)
    {
        $request->validate([
        'login' => ['required'],
        'password' => ['required', 'string'],
    ]);

    $user = User::where('login', $request->login)->first();

    if ($user && Hash::check($request->password, $user->password)) {
        Auth::login($user);
        return to_route('home');
    }

    return to_route('home')->withErrors(['login' => 'Неверный login или пароль'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('home')->with('success', 'Вы вышли из системы');
    }
}
