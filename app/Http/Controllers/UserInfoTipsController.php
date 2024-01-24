<?php

namespace App\Http\Controllers;

use App\Models\infotips;

class UserInfoTipsController extends Controller
{
    public function index()
    {
        $data = infotips::orderBy('created_at', 'desc')->paginate(12);
        return view('user.infoTips',compact('data'));
    }
    public function detail($id)
    {
        $data = infotips::find($id);
        return view('user.infoTipsDetail',compact('data'));
    }
}
