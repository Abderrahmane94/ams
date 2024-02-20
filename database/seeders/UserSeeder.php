<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $user = new User();

        $user->name = 'admin2';
        $user->email = 'admin2@gmail.com';
        $user->password = bcrypt('password');
        $user->save();

        $permission = Permission::create(['name' => 'usersAdmin']);
        $permission = Permission::create(['name' => 'dashUser']);
        $permission = Permission::create(['name' => 'dashAdmin']);

        $user->givePermissionTo('usersAdmin','dashAdmin');
    }
}
