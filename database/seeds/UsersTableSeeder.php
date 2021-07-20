<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param =[
            'name'=> 'のらねこ',
            'email'=> 'nekopost@email.com',
            'password'=> 'nekoneko',
        ];

        DB::table('users')->insert($param);
    }
}
