<?php

namespace Database\Seeders;

use App\Models\Website;
use Illuminate\Database\Seeder;

class SubscriptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Website::insert([
            [
                "email" => "abc@gmail.com",
                "website_id" => 1
            ],
            [
                "email" => "def@gmail.com",
                "website_id" => 1
            ],
            [
                "email" => "ghi@gmail.com",
                "website_id" => 1
            ],
            [
                "email" => "jkl@gmail.com",
                "website_id" => 1
            ],
        ]);
    }
}
