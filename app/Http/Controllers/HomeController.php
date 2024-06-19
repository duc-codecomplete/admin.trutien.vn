<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;;
class HomeController extends Controller
{

    public function home()
    {
        $data = [
            "users" => User::count(),
            "revenue" => 98000000,
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

    public function users()
    {
        $users = User::latest()->get();
        return view("users.index", ["users" => $users]);
    }

    public function promotions()
    {
        $promotions = Promotion::latest()->get();
        return view("promotions.index", ["promotions" => $promotions]);
    }

    public function promotionsAddGet()
    {
        return view("promotions.add");
    }

    public function promotionsAddPost(Request $request)
    {
        $validated = $request->validate([
            'start_time' => 'bail|required|date',
            'end_time' => 'bail|required|date|after:start_time',
            "amount" => 'bail|required'
        ]);

        $item = new Promotion;
        $item->start_time = $request->start_time;
        $item->end_time = $request->end_time;
        $item->type = $request->type;
        $item->user_id = Auth::user()->id;
        $item->amount = $request->amount;
        $item->save();
        return redirect("/promotions");
    }
}
