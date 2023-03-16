<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFootballGameRequest extends FormRequest
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
            'date' => [
                //'date',
                'required'
            ],
            'loser' => [
                'required',
                'max:15'
            ],
            'numberMatches' => [
                'min:1',
                'required'
            ],
            'penalties' => [
                'required',
                'boolean'
            ],
            'winner' => [
                'min:4',
                'max:15'
            ],
            'tied' => [
                'required',
                'boolean'
            ]
        ];
    }

    public function attributes()
    {
        return [
            'date' => 'fecha',
            'loser' => 'perdedor',
            'numberMatches' => 'numero de partidos',
            'penalties' => 'penales',
            'winner' => 'ganador',
            'tied' => 'empate',
        ];
    }
}
