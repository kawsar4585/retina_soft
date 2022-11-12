<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin_role = Role::create(['name'=>'admin']);
        $user = new  User();
        $user->name = 'Admin';
        $user->source = 'regular';
        $user->status = 'active';
        $user->email = 'kawsar4585@gmail.com';
        $user->password = bcrypt(12345678);
        $user->email_verified_at = date("Y-m-d H:i:s");
        $user->save();
        $user->assignRole($admin_role);

        $user_role = Role::create(['name'=>'user']);

        $user = new User();
        $user->name = 'User';
        $user->source = 'regular';
        $user->status = 'active';
        $user->email = 'user@retinasoft.com';
        $user->password = bcrypt(12345678);
        $user->email_verified_at = date("Y-m-d H:i:s");
        $user->save();
        $user->assignRole($user_role);
    }
}
