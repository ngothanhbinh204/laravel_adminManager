<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        if (Auth::id() > 0) {
            return redirect()->route('dashboard.index');
        };
        return view('auth.login');
    }
    public function login(AuthRequest $request)
    // Trước khi vào được phương thức login -> chạy qua AuthRequest sau đó mơi tới login ( check form )
    // Pass được request -> chạy login
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard.index')->with('success', 'Đăng Nhập Thành Công');
        }
        return redirect()->route('auth.admin')->with('error', 'Email hoặc mật khẩu không chính xác');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.admin');
    }
}
