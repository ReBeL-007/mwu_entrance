<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admins = [
                    [
                        'id' => 1,
                        'name' => 'Admin',
                        'email' => 'admin@admin.com',
                        'password' => bcrypt('password'),
                        'remember_token' => null,
                    ],
                    [
                        'id' => 2,
                        'name' => 'User',
                        'email' => 'user@user.com',
                        'password' => bcrypt('password'),
                        'remember_token' => null,
                    ],
                    [
                        'id' => 3,
                        'name' => 'IT Admin',
                        'email' => 'itadmin@itadmin.com',
                        'password' => bcrypt('password'),
                        'remember_token' => null,
                    ]
                ];

            Admin::insert($admins);
    }
}
