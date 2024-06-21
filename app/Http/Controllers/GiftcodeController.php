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

class GiftcodeController extends Controller
{
    public function index()
    {
        $giftcodes = Giftcode::latest()->get();
        return view("giftcodes.index", ["giftcodes" => $giftcodes]);
    }

    public function create()
    {
        return view("giftcodes.add");
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'giftcode' => 'bail|required',
            'expired' => 'bail|required|date|after:today',
            "itemid" => 'bail|required',
        ]);
        if (Giftcode::where("giftcode", $request->giftcode)->first()) {
            return redirect()->back()->with('error', 'Mã giftcode đã tồn tại.');
        }
        $item = new Giftcode;
        $item->giftcode = $request->giftcode;
        $item->itemid = $request->itemid;
        $item->expired = $request->expired;
        $item->award = $request->award;
        $item->user_id = Auth::user()->id;
        $item->save();
        return redirect("/giftcodes");
    }
}
