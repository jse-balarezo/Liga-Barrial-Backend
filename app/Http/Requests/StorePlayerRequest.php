<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePlayerRequest extends FormRequest
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
            'team.id' => [
                'required'
            ],
            'age' =>[
                'required',
                'min:1'
            ],
            'name' => [
                'required',
                'min:4'
            ],
            'nickname' => [
                'min:4',
                'max:15'
            ],
            'playerPosition' => [
                'min:4',
                'max:15'
            ],
            'salary' => [
                'min:1',
                'max:10000000000'
            ],
            'state' => [
                'required',
                'boolean'
            ]
        ];
    }

    public function attributes()
    {
        return [
            'age' => 'age',
            'name' => 'nombre',
            'nickname' => 'apodo',
            'playerPosition' => 'posicion del jugador',
            'salary' => 'salario',
            'state' => 'estado',
        ];
    }
}
