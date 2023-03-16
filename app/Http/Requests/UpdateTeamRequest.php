<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeamRequest extends FormRequest
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
            'amount' => [
                'min:1',
                'max:10000000000'
            ],
            'name' => [
                'required',
                'min:4'
            ],
            'nickname' => [
                'min:4',
                'max:15'
            ],
            'ranking' => [
                'min:1',
                'max:1000'
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
            'amount' => 'capital',
            'name' => 'nombre',
            'nickname' => 'apodo',
            'ranking' => 'ranking',
            'state' => 'estado',
        ];
    }
}
