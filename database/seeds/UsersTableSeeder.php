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
            'user_image'=>'storage\app\public\images\1625105476.gray_cat.jpg'
        ];

        DB::table('users')->insert($param);
    }
}
