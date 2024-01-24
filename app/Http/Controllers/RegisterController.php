<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }
    public function store(RegisterRequest $req)
    {
        $auth = User::create($req->all());
        $new = new profile();
        $new->user_id = $auth->id;
        $new->save();
        if($auth){
            Auth::login($auth);

            return Redirect::route('home')->with('success', 'Daftar berhasil');
        }
        return $auth;
    }
}
