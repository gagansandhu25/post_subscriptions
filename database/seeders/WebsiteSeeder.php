<?php

namespace Database\Seeders;

use App\Models\Website;
use Illuminate\Database\Seeder;

class WebsiteSeeder extends Seeder
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
                "protocol" => "https",
                "domain" => "example.com"
            ],
            [
                "protocol" => "https",
                "domain" => "example1.com"
            ],
            [
                "protocol" => "https",
                "domain" => "example2.com"
            ],
            [
                "protocol" => "https",
                "domain" => "example3.com"
            ]
        ]);
    }
}
