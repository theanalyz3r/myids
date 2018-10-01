<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();

        \DB::table('users')->insert([
            0 => [
                'id' => 1,
                'name' => 'Test User',
                'email' => 'Test@example.com',
                'password' => bcrypt('password'),
                'remember_token' => null,
                'created_at' => '2017-07-04 08:04:27',
                'updated_at' => '2017-07-04 08:04:27',
            ],
        ]);
    }
}
