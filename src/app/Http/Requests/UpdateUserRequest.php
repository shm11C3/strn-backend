<?php

namespace App\Http\Requests;

use App\Rules\CountryIdRule;

class UpdateUserRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'       => 'string|max:45',
            'username'   => 'string|max:16|alpha_dash',
            'country_id' => ['integer', new CountryIdRule],
        ];
    }
}
