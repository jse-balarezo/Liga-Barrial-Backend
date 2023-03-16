<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        $user = User::where('user', $request->input('userName'))->first();

        //Valida que exista el usuario
        if (!isset($user)){
            return response()->json(
                [
                    'msg' => [
                        'summary' => 'El usuario no existe',
                        'detail' => 'Por favor intente de nuevo'
                    ],
                    'data' => null
                ]
            );
        }


        
        return response()->json(
            [
                'msg' => [
                    'summary' => 'Acceso correcto',
                    'detail' => ''
                ],
                
            ]
        );
    }

    public function logout(Request $request){
        
        $request->user()->currentAccessToken()->delete();
        return response()->json(
            [
                'msg' => [
                    'summary' => 'Su sesion se cerro correctamente',
                    'detail' => ''
                ],
                'token' => null
            ]
        );
    }

    public function logoutAll(User $user){
    
        $user->tokens()->delete();
        return response()->json(
            [
                'msg' => [
                    'summary' => 'Todas las sesiones se cerraron correctamente',
                    'detail' => ''
                ],
                'token' => null
            ]
        );
    }
}