<?php

namespace App\Rules;

use App\Models\Website;
use Illuminate\Contracts\Validation\Rule;

class WebsiteExists implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $websiteParsed = parse_url($value);
        $websiteURL = $websiteParsed['host'] ?? "";

        return Website::where("domain", $websiteURL)->count() > 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This :attribute is invalid.';
    }
}
