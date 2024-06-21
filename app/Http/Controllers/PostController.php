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

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view("posts.index", ["posts" => $posts]);
    }

    public function create()
    {
        return view("posts.add");
    }

    public function store(Request $request)
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

    public function edit($id)
    {
        $post = Post::find($id);
        return view("posts.edit", ["post" => $post]);
    }

    public function update(Request $request, $id)
    {
        $item = Post::find($id);
        $item->title = $request->title;

        $item->content = $request->content;
        $item->category = $request->category;
        $item->save();
        return redirect("/posts");
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect("/posts");
    }
}
