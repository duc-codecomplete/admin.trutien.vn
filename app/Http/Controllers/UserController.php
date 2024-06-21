<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\Giftcode;
use App\Models\Post;
use App\Models\Mail;
use App\Models\Promotion;
use App\Models\User;
use App\Models\Shop;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where("role", "member")->latest()->get();
        return view("users.index", ["users" => $users]);
    }

    public function edit($id)
    {
        return view("users.edit", ["user" => User::find($id)]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'phone' => 'bail',
            'balance' => 'bail|required'
        ]);
        $user = User::find($id);
        $user->phone = $request->phone;
        $user->balance = $request->balance;
        $user->save();
        return back();
    }
}
