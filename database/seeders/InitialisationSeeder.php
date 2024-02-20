<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class InitialisationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $admin = new User();
        $user = new User();

        $admin->name = 'admin';
        $admin->email = 'admin@gmail.com';
        $admin->password = bcrypt('password');
        $admin->save();

        $user->name = 'user';
        $user->email = 'user@gmail.com';
        $user->password = bcrypt('password');
        $user->save();

        $role = Role::create(['name' => 'admin']);
        $role = Role::create(['name' => 'user']);

        $admin->assignRole('admin');
        $user->assignRole('user');

    }
}
