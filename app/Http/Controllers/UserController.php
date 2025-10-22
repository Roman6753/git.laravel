<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Форма регистрации
    public function register()
    {
        return view('register');
    }

    // Обработка регистрации
    public function registerStore(Request $request)
    {
        $request->validate([
            'login' => 'required|string|max:255|unique:users',
            'fio' => 'required|string|max:255',
            'tel' => 'required|string|max:20',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'login' => $request->login,
            'fio' => $request->fio,
            'tel' => $request->tel,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => false,
        ]);
        Auth::login($user);

        return to_route('home')->with('success', 'Регистрация прошла успешно!');
    }

    // Форма авторизации
    public function login()
    {
        return view('login');
    }

    // Обработка авторизации
    public function loginStore(Request $request)
    {
        $request->validate([
        'login' => ['required'],
        'password' => ['required', 'string'], // ✅ Исправлено
    ]);

    $user = User::where('login', $request->login)->first();

    if ($user && Hash::check($request->password, $user->password)) {
        Auth::login($user);
        return to_route('home')->with('success', 'Вы вошли в систему!');
    }

    return back()->withErrors(['login' => 'Неверный login или пароль'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('home')->with('success', 'Вы вышли из системы');
    }
}
