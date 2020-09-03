<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$role_id = \DB::table('roles')->select('id')->first()->id;
        \DB::table('users')->insert([
            'name' => 'MasAdmin',
            'email' => 'mas.admin@spam4.me',
            'password' => bcrypt('123456'),
            'role_id' => $role_id 
        ]);
    }
}
