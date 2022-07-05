<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'admin',
                'email' => 'adm@gmail.com',
                'password' => Hash::make('12345678'),
                'role_id' =>'1'
            ],
            [
                'name' => 'requester',
                'email' => 'req@gmail.com',
                'password' => Hash::make('12345678'),
                'role_id' =>'2'
            ],
            [
                'name' => 'agent',
                'email' => 'ag@gmail.com',
                'password' => Hash::make('12345678'),
                'role_id' =>'3'
            ],
        ];

        foreach($users as $user){
            User::create($user);
        }
    }
}
