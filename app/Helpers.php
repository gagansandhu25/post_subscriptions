<?php

namespace App;

use App\Models\Website;

class Helpers {
    public static function getWebsite($website)
    {
        $websiteParsed = parse_url($website);
        $websiteURL = $websiteParsed['host'] ?? "";
        return Website::where("domain", $websiteURL)->first();
    }
}
