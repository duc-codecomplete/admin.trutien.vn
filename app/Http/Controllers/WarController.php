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

class WarController extends Controller
{
    public function getWar() {
        return view("war");
    }
    
    public function postWar() {
        $user = \Auth::user();
        
        $win = request()->win;
        $lose = request()->lose;
        $mvpwin = request()->mvpwin;
        $mvplose = request()->mvplose;
        $total = request()->total;
        
        if ($total > 1000) {
            return back()->with("success", "Gửi quà lỗi!");
        }
        
        $addon = 0;
        $xu = 100000;
        if ($total > 200) {
            $addon = $total - 200;
        }
        
        $xuwin = (100000 + $addon*500)/10*6;
        
        $xulose = (100000 + $addon*500)/10*4;

        $xuwin1 = floor($xuwin/30000);
        $xuwin2 = $xuwin % 30000;

        $xulose1 = floor($xulose/30000);
        $xulose2 = $xulose % 30000;
        
        $client = new \GuzzleHttp\Client();
        
        $gameApi = "http://103.56.162.87/html/send2.php";
        $client = new \GuzzleHttp\Client();
        for ($x = 0; $x < $xuwin2; $x++) {
            $client->request('POST', $gameApi, ["form_params" => [
                "receiver" => $win,
                "itemid" => 109807,
                "count" => 30000,
                "msg" => "Phan Thuong G Thang ".request()->date
            ]]);
        }
        for ($x = 0; $x < $xulose2; $x++) {
            $client->request('POST', $gameApi, ["form_params" => [
                "receiver" => $lose,
                "itemid" => 109807,
                "count" => 30000,
                "msg" => "Phan Thuong G Thua ".request()->date
            ]]);
        }
            
        $client->request('POST', $gameApi, ["form_params" => [
            "receiver" => $mvpwin,
            "itemid" => 109807,
            "count" => 12000,
            "msg" => "Top Kill G Thang ".request()->date
        ]]);
        
        $client->request('POST', $gameApi, ["form_params" => [
            "receiver" => $win,
            "itemid" => 109807,
            "count" => 12000,
            "msg" => "Top Support G Thang ".request()->date
        ]]);
        
        $client->request('POST', $gameApi, ["form_params" => [
            "receiver" => $mvplose,
            "itemid" => 109807,
            "count" => 8000,
            "msg" => "Top Kill G Thang ".request()->date
        ]]);
        
        $client->request('POST', $gameApi, ["form_params" => [
            "receiver" => $lose,
            "itemid" => 109807,
            "itemid" => 8000,
            "count" => "Top Support G Thua ".request()->date
        ]]);
        
        
        return back()->with("success", "Gửi quà thành công!");
    }
}
