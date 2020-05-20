<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    //------------  here 0-: reader , 1-: editor, 2-: super admin--------======

    public function run()
    {
        DB::table('users')->insert([
            'name' => 'reader',
            'email' => 'reader@gmail.com',
            'password' => bcrypt('123'),
            'is_admin' => '0'
        ]);
        DB::table('users')->insert([
            'name' => 'editor',
            'email' => 'editor@gmail.com',
            'password' => bcrypt('123'),
            'is_admin' => '1'
        ]);
        DB::table('users')->insert([
            'name' => 'super admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('123'),
            'is_admin' => '2'
        ]);
         DB::table('users')->insert([
            'name' => 'rohan',
            'email' => 'rohan@gmail.com',
            'password' => bcrypt('123'),
            'is_admin' => '1'
        ]);
        DB::table('users')->insert([
            'name' => 'sumit',
            'email' => 'sumit@gmail.com',
            'password' => bcrypt('123'),
            'is_admin' => '0'
        ]);
        
    }
}
