<?php

namespace App\Http\Controllers;

use App\Models\Char;
use App\Models\User;
use Illuminate\Http\Request;

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

    public function updateName(Request $request, $id)
    {
        $validated = $request->validate([
            'name2' => 'bail|required'
        ]);
        $char = Char::find($id);
        $char->name2 = $request->name2;
        $char->save();
        return back();
    }

    public function chars()
    {
        $chars = Char::all();
        if (request()->need_change) {
            $chars = collect($chars)->filter(function ($value) {
                return $value->name2 == "" && $this->specialChars($value->name);
            })->values();
        }
        return view("chars.index", ["chars" => $chars]);
    }


    private function specialChars($str) {
        return preg_match('/[^a-zA-Z0-9\.]/', $str) > 0;
    }
}
