<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonPostRequest extends FormRequest
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
    public function rules()
    {
        return [
            'don' => 'required|integer',
            'single' => 'required|max:255',
        ];
    }

    public function attributes()
    {
        return [
            'don' => 'どん',
            'single' => '一言',
        ];
    }
}
