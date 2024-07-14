<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Auth;
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
        $item->slug = Str::slug($request->title, '-');

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

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $path = storage_path('app/public/tmp/uploads');
            $fileName = $request->file('upload')->move($path, $fileName)->getFilename();

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/app/public/tmp/uploads/' . $fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
        return false;
    }
}
