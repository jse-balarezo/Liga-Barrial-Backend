<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;

class TeamsController extends Controller
{
    //Store-----------------------------------------------------------------
    public function store(StoreTeamRequest $request)
    {
        $team = new Team();
        $team->amount = $request->input('amount');
        $team->name= $request->input('name');
        $team->nickname= $request->input('nickname');
        $team->ranking= $request->input('ranking');
        $team->state= $request->input('state');
        $team->save();

        return response()->json(
            [
                'msg' => [
                    'summary' => 'Creación del equipo',
                    'detail' => 'El equipo se creó correctamente',
                ],
                'data' => $team
            ]
        );
    }

    //Index--------------------------------------------------------------------
    public function index()
    {
        $teams = Team::get();
        return response()->json(
            [
                'msg' => [
                    'summary' => 'Consulta del equipo',
                    'detail' => 'Los equipos se consultaron correctamente',
                ],
                'data' => $teams
            ]
        );
    }

    //Update--------------------------------------------------------------
    public function update(UpdateTeamRequest $request, Team $team)
    {
        $team->amount = $request->input('amount');
        $team->name= $request->input('name');
        $team->nickname= $request->input('nickname');
        $team->ranking= $request->input('ranking');
        $team->state= $request->input('state');
        $team->save();

        return response()->json(
            [
                'msg' => [
                    'summary' => 'Actualización del equipo',
                    'detail' => 'El equipo se actualizó correctamente',
                ],
                'data' => $team
            ]
        );
    }

    //Destroy------------------------------------------------------------
    public function destroy(Team $team)
    {
        $team->delete();

        return response()->json(
            [
                'msg' => [
                    'summary' => 'Eliminación de equipo',
                    'detail' => 'El equipo se eliminó correctamente',
                ],
                'data' => $team
            ]
        );
    }
    //Show------------------------------------------------------------------
    public function show(Team $team)
    {
        return response()->json(
            [
                'msg' => [
                    'summary' => 'Consulta de equipo',
                    'detail' => 'El equipo se consultó correctamente',
                ],
                'data' => $team
            ]
        );
    }
    //------------------------------------------------------------------
    public function inactivate(Request $request, Team $team)
    {
        $team->state = $request->input('state');
        $team->save();

        return response()->json(
            [
                'msg' => [
                    'summary' => 'Equipo Inactivo',
                    'detail' => 'El equipo se inactivó correctamente',
                ],
                'data' => $team
            ]
        );
    }

//-------------------------------------------------------------------------------
    public function activate(Request $request, Team $team)
    {
        $team->state = $request->input('state');
        $team->save();

        return response()->json(
            [
                'msg' => [
                    'summary' => 'Equipo  Activado',
                    'detail' => 'El equipo se activó correctamente',
                ],
                'data' => $team
            ]
        );
    } 
    //------------------------------Destroys
    public function destroys(Request $request)
    {
        $teams = Team::get();
        for ($i = 0; $i < intval($request->input('amount')); $i++) {
            $teams[$i]->delete();
            }
        return response()->json(
            [
                'msg' => [
                    'summary' => 'Equipo  Eliminado',
                    'detail' => 'El equipo se ha eliminado correctamente',
                ],
                'data' => $teams
            ]
        );
    }   
}
