<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\User;
use Auth;
use DB;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function index()
    {
        $deposits = Deposit::latest()->get();

        if (request()->id) {
            $deposits = Deposit::where("user_id", request()->id)->where("display", "on")->latest()->get();
        }
        return view("deposits.index", ["deposits" => $deposits]);
    }

    public function revenue()
    {
        $deposits = Deposit::select(
            DB::raw('sum(amount) as sums'),
            DB::raw("DATE_FORMAT(created_at,'%d/%m/%Y') as date")
        )
            ->latest('date')
            ->groupBy('date')
            ->get();
        $revenue = Deposit::where("status", "success")->where("display", "on")->sum("amount");
        return view("deposits.revenue", ["deposits" => $deposits, "revenue" => $revenue]);
    }

    public function create()
    {
        return view("deposits.add");
    }

    public function store(Request $request)
    {
        try {
            $item = new Deposit;
            $item->user_id = $request->user_id;
            $item->amount = $request->amount;
            $item->amount_promotion = $request->amount_promotion;
            $item->status = "success";
            $item->processing_time = date("Y-m-d H:i:s");
            $item->processing_user = 2;
            $item->save();
            return back();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
