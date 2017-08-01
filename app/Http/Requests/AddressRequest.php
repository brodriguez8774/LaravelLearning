<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\Address;

class AddressRequest extends FormRequest
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
     * Validate provided fields. Return to form if validation fails.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'street' => 'bail|required|max:255',
            'city' => 'bail|required|max:255',
            'region' => 'bail|required|max:255',
            'zip' => 'required',
            'country' => 'bail|required|max:255'
        ];
    }
}
