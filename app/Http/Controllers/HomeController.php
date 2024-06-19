<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function home()
    {
        $data = [
            "users" => User::count(),
            "revenue" => 98000000
        ];
        return view('home', ["data" => $data]);
    }


    public function signin()
    {
        return view('signin');
    }


    public function signinPost(Request $request)
    {
        $validated = $request->validate([
            'login' => 'bail|required',
            'password' => 'bail|required',
        ], [
            "login.required" => "Tên đăng nhập chỉ được chứa từ 3 - 10 kí tự",
        ]);
        $login = [
            'username' => $request->login,
            'password' => $request->password,
        ];
        if (\Auth::attempt($login)) {
            if (\Auth::user()->role != "admin") {
                return redirect()->back()->with('error', 'Bạn không có quyền truy cập trang này');
                \Auth::logout();
                return redirect('/dang-nhap');
            }
            return redirect('/');
        } else {
            return redirect()->back()->with('error', 'Tên đăng nhập hoặc mật khẩu không chính xác');
        }
    }
}
