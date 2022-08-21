<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;

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
            'name' => 'Super Admin',
            'email' => 'user@gmail.com',
            'password' => Hash::make('123123'),
            'avatar' => '',
            'level' => 1,
            'created_at' => new \Datetime,
            'updated_at' => new \Datetime,
        ]);

        DB::table('category')->insert([
            'name' => 'uncategorized',
            'user_id' => 1,
            'parent_id' => 0,
            'created_at' => new \Datetime,
            'updated_at' => new \Datetime,
        ]);
    }
}
