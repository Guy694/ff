<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
class CreateUsersSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user =[
            [
            'name' => 'admin',
            'username' => 'guy',
            'is_admin' => '1',
            'password' => bcrypt('1234'),
            ],
            [
                'name' => 'ฝ่ายประกัน',
                'username' => 'qa',
                'is_admin' => '0',
                'password' => bcrypt('1234'),
             ]



            ];

            foreach($user as $key => $value){
                User::create($value);
            }
    }
}
