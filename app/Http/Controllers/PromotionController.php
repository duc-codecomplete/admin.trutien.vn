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

class PromotionController extends Controller
{
    public function index()
    {
        $promotions = Promotion::latest()->get();
        return view("promotions.index", ["promotions" => $promotions]);
    }

    public function create()
    {
        return view("promotions.add");
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'start_time' => 'bail|required|date',
            'end_time' => 'bail|required|date|after:start_time',
            "amount" => 'bail|required',
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
