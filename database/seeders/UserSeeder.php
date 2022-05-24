<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nif'=>'12345678a',
            'name'=> 'administrador',
            'last_name'=>'admin',
            'email'=> 'admin@gmail.com',
            'password' => 'admin123',
            'phone_number'=>'777 777 777',
            'address'=>'Calle de ejemplo',
            'status'=>'1',
            'profile_picture'=>'',
            'role_id'=>'1',
        ]);

        DB::table('users')->insert([
            'nif'=>'87654321b',
            'name'=> 'profesor',
            'last_name'=>'profe',
            'email'=> 'profe@gmail.com',
            'password' => 'profe123',
            'phone_number'=>'888 888 888',
            'address'=>'Calle de ejemplo',
            'status'=>'1',
            'profile_picture'=>'',
            'role_id'=>'3',
        ]);

        \App\Models\User::factory(10)->create();
    }
}
