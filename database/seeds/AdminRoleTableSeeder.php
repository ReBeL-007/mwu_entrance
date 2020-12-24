<?php

use App\Admin;
use Illuminate\Database\Seeder;

class AdminRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Admin::findOrFail(1)->roles()->sync(1);
        Admin::findOrFail(2)->roles()->sync(2);
        Admin::findOrFail(3)->roles()->sync(3);
    }
}
