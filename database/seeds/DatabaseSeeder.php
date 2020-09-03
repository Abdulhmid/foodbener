<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $this->call(RolesSedeer::class);
        // $this->call(UsersSeeder::class);
        \DB::table('roles')->insert([
            'name' => 'Admin',
            'description' => '-'
        ]);

        // Defautl Users
    	$role_id = \DB::table('roles')->select('id')->first()->id;
        \DB::table('users')->insert([
            'name' => 'MasAdmin',
            'email' => 'mas.admin@spam4.me',
            'password' => bcrypt('123456'),
            'role_id' => $role_id 
        ]);
    }
}
