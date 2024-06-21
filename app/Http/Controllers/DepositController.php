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

class DepositController extends Controller
{
    public function index()
    {
        $deposits = Deposit::latest()->get();
        return view("deposits.index", ["deposits" => $deposits]);
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
