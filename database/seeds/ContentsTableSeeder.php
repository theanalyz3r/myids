<?php

use Illuminate\Database\Seeder;

class ContentsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('contents')->delete();

        \DB::table('contents')->insert([
            0 => [
                'id' => 1,
                'name' => 'IDS Holding Image',
                'description' => 'IDS 1920x1080 Holding Image',
                'content_url' => 'contents/ids-holding.png',
                'created_at' => '2017-07-19 18:10:37',
                'updated_at' => '2017-07-19 18:10:37',
                'expires_on' => '2021-07-19 18:10:37',
                'starts_on' => '2017-07-19 18:10:37',
                'deleted_at' => null,
                'user_id' => 1,
            ],
            1 => [
                'id' => 2,
                'name' => 'IDS Test image #1',
                'description' => 'IDS 1920x1080 Testing Image',
                'content_url' => 'contents/ids-test1.png',
                'created_at' => '2017-07-19 18:10:37',
                'updated_at' => '2017-07-19 18:10:37',
                'expires_on' => '2021-07-19 18:10:37',
                'starts_on' => '2017-07-19 18:10:37',
                'deleted_at' => null,
                'user_id' => 1,
            ],
            2 => [
                'id' => 3,
                'name' => 'IDS Test image #2',
                'description' => 'IDS 1920x1080 Testing Image',
                'content_url' => 'contents/ids-test2.png',
                'created_at' => '2017-07-19 18:10:37',
                'updated_at' => '2017-07-19 18:10:37',
                'expires_on' => '2021-07-19 18:10:37',
                'starts_on' => '2017-07-19 18:10:37',
                'deleted_at' => null,
                'user_id' => 1,
            ],
            3 => [
                'id' => 4,
                'name' => 'IDS Test image #3',
                'description' => 'IDS 1920x1080 Testing Image',
                'content_url' => 'contents/ids-test3.png',
                'created_at' => '2017-07-19 18:10:37',
                'updated_at' => '2017-07-19 18:10:37',
                'expires_on' => '2021-07-19 18:10:37',
                'starts_on' => '2017-07-19 18:10:37',
                'deleted_at' => null,
                'user_id' => 1,
            ],
        ]);
    }
}
