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

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::latest()->get();
        return view("shops.index", ["shops" => $shops]);
    }

    public function create()
    {
        return view("shops.add");
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'itemid' => 'bail|required',
            'name' => 'bail|required',
            "price" => 'bail|required',
            "stack" => 'bail|required',
        ]);
        if (Giftcode::where("itemid", $request->itemid)->first()) {
            return redirect()->back()->with('error', 'Vật phẩm đã tồn tại.');
        }
        $item = new Shop;
        $item->itemid = $request->itemid;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stack = $request->stack;
        $item->description = $request->description;
        $item->save();
        return redirect("/shops");
    }

    public function edit($id)
    {
        return view("shops.edit", ["shop" => Shop::find($id)]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'itemid' => 'bail|required',
            'name' => 'bail|required',
            "price" => 'bail|required',
            "status" => 'bail|required',
            "stack" => 'bail|required',
        ]);
        if (Giftcode::where("itemid", $request->itemid)->first()) {
            return redirect()->back()->with('error', 'Vật phẩm đã tồn tại.');
        }
        $item = Shop::find($id);
        $item->itemid = $request->itemid;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->description = $request->description;
        $item->stack = $request->stack;
        $item->status = $request->status;
        $item->save();
        return redirect("/shops");
    }
}
