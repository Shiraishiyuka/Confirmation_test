<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
    public function showLoginForm()
{
    return view('auth.login');
}

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // 認証に成功した場合
            return redirect()->route('admin');
        }

        // 認証に失敗した場合
        return back()->withErrors([
            'email' => '提供された資格情報は正しくありません。',
        ]);
    }
}
