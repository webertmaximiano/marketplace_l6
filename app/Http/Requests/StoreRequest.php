<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return Auth::check();
        return true; //true libera o acesso as rotas e false bloqueia
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'         => 'required',
            'description'  => 'required | min:10',
            'phone'        => 'required',
            'mobile_phone' => 'required',
            'slug' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'min' => 'Campo deve ter no minimo :min Caracteres',
            'required' => 'Campo é obrigatório'
        ];
    }
}
