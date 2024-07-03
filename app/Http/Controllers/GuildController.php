<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guild;
use App\Models\GuildUser;
use App\Models\User;
use DB;

class GuildController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // DB::table('guild_users')->truncate();
        // DB::table('guilds')->truncate();
        return view("guilds.index", ["guilds" => Guild::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("guilds.add", ["users" => User::where("role", "member")->orderBy("username")->get()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $guild = new Guild;
        $guild->name = $request->name;
        $guild->save();

        foreach ($request->manager as $user) {
           $item = new GuildUser;
           $item->guild_id = $guild->id;
           $item->user_id = $user;
           $item->role = "admin";
           $item->save();
        }

        return redirect("/guilds");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $guild = Guild::find($id);
        $guild->users->pluck("user_id");
        return view("guilds.edit", [
            "guild" => $guild,
            "users" => User::where("role", "member")->orderBy("username")->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $guild = Guild::find($id);
        $guild->name = $request->name;
        $guild->save();

        $guild->users()->where('role', "admin")->delete();

        foreach ($request->manager as $user) {
           $item = new GuildUser;
           $item->guild_id = $guild->id;
           $item->user_id = $user;
           $item->role = "admin";
           $item->save();
        }

        return redirect("/guilds");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
