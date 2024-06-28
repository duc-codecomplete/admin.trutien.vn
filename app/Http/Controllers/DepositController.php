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
        $result = Deposit::select(
            DB::raw('sum(amount) as sums'),
            DB::raw("DATE_FORMAT(created_at,'%d/%m/%Y') as date")
        )
            ->groupBy('date')
            ->get();
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
        $revenue = Deposit::where("status", "success")->sum("amount");
        return view("deposits.revenue", ["deposits" => $deposits, "revenue" => $revenue]);
    }

    public function create()
    {
        return view("promotions.add");
    }

    public function store(Request $request, $id)
    {
        $gameApi = env('GAME_API_ENDPOINT', '');
        $item = Deposit::find($id);
        $user = User::find($item->user_id);

        $client = new \GuzzleHttp\Client();
        try {
            $client->request('POST', $gameApi . '/html/knb.php', ["form_params" => [
                "userid" => $user->userid,
                "cash" => intval($item->amount_promotion) / 10,
            ]]);
            $item->status = "done";
            $item->processing_time = date("Y-m-d H:i:s");
            $item->processing_user = Auth::user()->id;
            $item->save();
            return redirect("/deposits")->with("success", "Nạp Vgold thành công!");
        } catch (\Throwable $th) {
            $item->status = "fail";
            $item->processing_time = date("Y-m-d H:i:s");
            $item->processing_user = Auth::user()->id;
            $item->save();
            return redirect("/deposits")->with("error", "Nạp Vgold thất bại!");
        }
    }
}
