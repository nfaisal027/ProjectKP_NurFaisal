<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $data = User::get();
        $role = Role::get();
        return view('admin.user.user',compact('data','role'));
    }

    public function store(UserRequest $request)
    {
        User::create($request->only(['name','email','password']))->assignRole($request->role);
        return redirect()->back()->with('success', 'data berhasil dimasukan');
    }
    public function destroy($id)
    {
        $u = User::find($id);
        $u->delete();
        return redirect()->back()->with('success','data berhasil dihapus');
    }
    public function show(User $user)
    {
        $role = Role::get();
        return view('admin.user.show',compact('user','role'));
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email'],
        ]);
        if ($request->password == '') {
            User::where('id',$id)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
            $user = User::find($id);
            $user->syncRoles($request->role);
        }else{
            User::where('id',$id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
            $user = User::find($id);
            $user->syncRoles($request->role);
        }
        return redirect()->back()->with('success','data berhasil diUpdate');
    }
}
