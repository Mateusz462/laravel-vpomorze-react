<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePermissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('permission_create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
     public function rules()
     {
         return [
             'name'  => 'required|string',
             'description' => 'required',
             'module'  => 'required|integer',
         ];
     }

     public function attributes()
     {
         return [
             'name'  => 'nazwa',
             'description'  => 'opis',
         ];
     }
}
