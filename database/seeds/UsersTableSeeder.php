<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $user = new \App\User();
//        $user->email = 'tranhaicoder@gmail.com';
//        $user->password = Hash::make('123');
//        $user->save();

        $user = new \App\User();
        $user->email = 'quocdan@gmail.com';
        $user->password = Hash::make('123');
        $user->save();
    }
}
