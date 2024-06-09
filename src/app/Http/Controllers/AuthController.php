<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    // 登録画面の表示
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // ユーザー登録処理
    public function register(AuthRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)            
        ]);
        return redirect('login');
    }

    // ログイン画面の表示
    public function showloginForm()
    {
        return view('auth.login');
    }

    // ログイン処理
    public function login(AuthRequest $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('admin');
        }

        return back();
    }
}
