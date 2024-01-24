<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\City;
use App\Models\profile;
use App\Models\Province;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $kota = City::get();
        $prov = Province::get();

        $cek = profile::where('user_id', Auth::user()->id)->get();
        if (count($cek) === 0) {
            $profile = new profile();
            $profile->user_id = Auth::user()->id;
            $profile->save();
        }

        return view('user.profile', compact(['user', 'kota', 'prov']));
    }

    public function updatePic(ProfileRequest $req)
    {
        if ($req->oldPic) {
            Storage::delete($req->oldPic);
        }
        profile::where('user_id', Auth::user()->id)->update(['img' => $req->file('img')->store('img')]);

        Alert::toast('Data berhasil diupdate', 'success');
        return redirect()->back();
    }
    public function update(ProfileRequest $req)
    {
        $attr = $req->only(['kota_id', 'province_id', 'alamat']);
        profile::where('user_id', Auth::user()->id)->update($attr);
        User::where('id',Auth::user()->id)->update(['name'=>$req->name]);

        Alert::toast('Data berhasil diupdate', 'success');
        return redirect()->back();
    }
}
