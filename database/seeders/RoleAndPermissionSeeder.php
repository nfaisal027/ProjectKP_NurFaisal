<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //abaikan saja merahnya
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'brand']);
        Permission::create(['name' => 'category']);
        Permission::create(['name' => 'product']);
        Permission::create(['name' => 'user']);
        Permission::create(['name' => 'laporan']);
        Permission::create(['name' => 'manajemen toko']);
        Permission::create(['name' => 'dashboard']);

        Role::create(['name' =>'admin'])->givePermissionTo(['brand','category','product','user']);
        Role::create(['name' =>'super admin'])->givePermissionTo(Permission::all());

        $role = Role::where('name', 'super admin')->first();
        $user = User::where('email','admin@gmail.com')->first();
        $user->assignRole($role);
    }
}
