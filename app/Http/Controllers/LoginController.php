<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Traits\HasRoles;

class LoginController extends Controller
{
    use HasRoles;
    public function index()
    {
        return view('auth.login');
    }
    public function store(Request $request)
    {
        $attr = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'], // validasi bisa pakai request jika ingin atau jika ada user yang bisa menmbabahkan user lain
        ]);
        if (Auth::attempt($attr,$request->remember)) {
            $user = auth()->user();
            $request->session()->regenerate();
            if($user->hasAnyRole(['admin','super admin'])){ //biarkan saja errornya
                return redirect()->intended('/admin/dashboard')->with('success', 'anda sudah login');
            }else{
                return redirect()->intended('/')->with('success', 'anda sudah login');
            }

        }
        throw ValidationException::withMessages([
            'email' => 'data yang anda masukan tidak tepat'
        ]);
    }
}
