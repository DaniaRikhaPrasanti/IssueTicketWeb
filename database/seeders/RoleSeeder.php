<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'admin',
                'redirect_to' => '/administrator',
            ],
            [
                'name' => 'requester',
                'redirect_to' => '/user-requester'
            ],
            [
                'name' => 'agent',
                'redirect_to' => '/user-agent'
            ],
        ];

        foreach($roles as $role){
            Role::create($role);
        }
    }
}
