<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAnnRequest extends FormRequest
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
            'title' => 'required|string',
            'tags' => 'required',
            'text' => 'required|string',
            'tags.*' => [
                'integer',
            ],
            'tags'   => [
                'array',
            ],
        ];
    }

    public function attributes()
    {
        return [
            'title'  => 'tytuł',
            'text'  => 'treść ogłoszenia',
        ];
    }
}
