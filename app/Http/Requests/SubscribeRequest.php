<?php

namespace App\Http\Requests;

use App\Rules\WebsiteExists;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class SubscribeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            "email" => "required|email",
            "website" => [
                "required",
                "url",
                new WebsiteExists
            ]
        ];
    }
}
