<?php

namespace App\Http\Controllers;

use App\Http\Requests\InfoTipsRequest;
use App\Models\infotips;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class InfoTipsController extends Controller
{
    public function getData()
    {
        $data = infotips::orderBy('id','desc')->get();
        return view('admin.infotips.getdata',compact('data'));
    }
    public function index()
    {
        /* $title = 'Delete!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text); */
        $data = infotips::orderBy('id','desc')->get();
        return view('admin.infotips.info',compact('data'));
    }
    public function store(InfoTipsRequest $req)
    {
        $attr = $req->all();
        $attr['slug']  = SlugService::createSlug(infotips::class,'slug',$req->title);
        $attr['thumbnail'] = $req->file('thumbnail')->store('img');
        if($req->file('files1')){
            $attr['files1'] = $req->file('files1')->store('img');
        }
        if($req->file('files2')){
            $attr['files2'] = $req->file('files2')->store('img');
        }
        if($req->file('files3')){
            $attr['files3'] = $req->file('files3')->store('img');
        }
        if($req->file('files4')){
            $attr['files4'] = $req->file('files4')->store('img');
        }
        infotips::create($attr);
        Alert::success('Success', 'Data berhasil ditambahkan!');
        return redirect()->back();

    }
    public function destroy($id)
    {
        $del = infotips::find($id);
        if($del->thumbnail){
            Storage::delete($del->thumbnail);
        }if($del->files1){
            Storage::delete($del->files1);
        }
        if($del->files2){
            Storage::delete($del->files2);
        }
        if($del->files3){
            Storage::delete($del->files3);
        }
        if($del->files4){
            Storage::delete($del->files4);
        }
        $del->delete();
        Alert::success('Success', 'Data berhasil dihapus!');
        return redirect()->back();
    }
    public function show(infotips $infotips)
    {
        return view('admin.infotips.edit',compact('infotips'));
    }
    public function update($id, Request $req)
    {
        $info = infotips::find($id);
        $info->title = $req->title;
        $info->deskripsi = $req->deskripsi;
        if($req->file('thumbnail')){
            if ($req->oldThumbnail) {
                Storage::delete($req->oldThumbnail);
            }
            $info->thumbnail = $req->file('thumbnail')->store('img');
        }
        if($req->file('files1')){
            if ($req->oldFiles1) {
                Storage::delete($req->oldFiles1);
            }
            $info->files1 = $req->file('files1')->store('img');
        }
        if($req->file('files2')){
            if ($req->oldFiles2) {
                Storage::delete($req->oldFiles2);
            }
            $info->files2 = $req->file('files2')->store('img');
        }
        if($req->file('files3')){
            if ($req->oldFiles3) {
                Storage::delete($req->oldFiles3);
            }
            $info->files3 = $req->file('files3')->store('img');
        }
        if($req->file('files4')){
            if ($req->oldFiles4) {
                Storage::delete($req->oldFiles4);
            }
            $info->files4 = $req->file('files4')->store('img');
        }
        $info->save();
        Alert::success('Success', 'Data berhasil diupdate!');
        return redirect()->back();
    }
}
