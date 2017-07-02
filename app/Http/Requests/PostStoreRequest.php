<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            'don_id' => 'required|integer',
            'single_word' => 'required|max:255',
        ];
    }

    public function attributes()
    {
        return [
            'don_id' => 'どん',
            'single_word' => '一言',
        ];
    }
}
