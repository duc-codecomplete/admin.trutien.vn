<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\Giftcode;
use App\Models\Post;
use App\Models\Promotion;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{

    public function home()
    {
        $revenue = Deposit::where("status", "done")->sum("amount");
        $data = [
            "users" => User::count(),
            "revenue" => $revenue,
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

    public function giftcodes()
    {
        $giftcodes = Giftcode::latest()->get();
        return view("giftcodes.index", ["giftcodes" => $giftcodes]);
    }

    public function giftcodesAddGet()
    {
        return view("giftcodes.add");
    }

    public function giftcodesAddPost(Request $request)
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
        $item->user_id = Auth::user()->id;
        $item->save();
        return redirect("/giftcodes");
    }

    public function posts()
    {
        $posts = Post::latest()->get();
        return view("posts.index", ["posts" => $posts]);
    }

    public function postsAddGet()
    {
        return view("posts.add");
    }

    public function postsAddPost(Request $request)
    {
        $validated = $request->validate([
            'title' => 'bail|required',
            'content' => 'bail|required',
        ]);
        $item = new Post;
        $item->title = $request->title;
        $item->slug = Str::slug($request->title, '-');

        $item->content = $request->content;
        $item->category = $request->category;
        $item->user_id = Auth::user()->id;
        $item->save();
        return redirect("/posts");
    }

    public function postsEditGet($id)
    {
        $post = Post::find($id);
        return view("posts.edit", ["post" => $post]);
    }

    public function postsEditPost(Request $request, $id)
    {
        $item = Post::find($id);
        $item->title = $request->title;

        $item->content = $request->content;
        $item->category = $request->category;
        $item->save();
        return redirect("/posts");
    }

    public function postsDeleteGet($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect("/posts");
    }


    public function deposits()
    {
        $deposits = Deposit::latest()->get();
        return view("deposits.index", ["deposits" => $deposits]);
    }

    public function depositsAddGet()
    {
        return view("promotions.add");
    }

    public function depositsApprove(Request $request, $id)
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
