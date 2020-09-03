<?php

use Illuminate\Database\Seeder;

class RolesSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->insert([
            'name' => 'Admin',
            'description' => '-'
        ]);
    }
}
