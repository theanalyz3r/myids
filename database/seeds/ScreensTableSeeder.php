<?php

use Illuminate\Database\Seeder;

class ScreensTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('screens')->delete();

        \DB::table('screens')->insert([
            0 => [
                'id' => 1,
                'name' => 'Test Screen #1',
                'systemref' => 'PDA001',
                'footer_message' => 'This is the Footer for Test Screen 1!',
                'description' => 'Testing Area Display',
                'location' => 'Testing Area',
                'created_at' => '2017-07-18 16:55:22',
                'updated_at' => '2017-07-18 16:55:22',
                'deleted_at' => null,
                'user_id' => 1,
                'default_content_id' => 1,
            ],
            1 => [
                'id' => 2,
                'name' => 'Test Screen #2',
                'systemref' => 'PDA002',
                'footer_message' => 'This is the Footer for Test Screen 2!',
                'description' => 'Testing Area Display',
                'location' => 'Testing Area',
                'created_at' => '2017-07-18 16:55:22',
                'updated_at' => '2017-07-18 16:55:22',
                'deleted_at' => null,
                'user_id' => 1,
                'default_content_id' => 1,
            ],
            2 => [
                'id' => 3,
                'name' => 'Test Screen #3',
                'systemref' => 'PDA003',
                'footer_message' => 'This is the Footer for Test Screen 3!',
                'description' => 'Testing Area Display',
                'location' => 'Testing Area',
                'created_at' => '2017-07-18 16:55:22',
                'updated_at' => '2017-07-18 16:55:22',
                'deleted_at' => null,
                'user_id' => 1,
                'default_content_id' => 1,
            ],
        ]);
    }
}
