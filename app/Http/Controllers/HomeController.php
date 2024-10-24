<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user()->id;
        $groups = DB::table('group_members')
            ->join('groups', 'group_members.id_group', '=', 'groups.id_group')
            ->where('id_user','=',$user)
            // ->groupBy('group_members.id_group')
            ->get();

        return view('home', compact('groups'));
    }
}
