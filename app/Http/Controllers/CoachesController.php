<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coach;
use App\Models\Team;
use App\Http\Requests\StoreCoachRequest;
use App\Http\Requests\UpdateCoachRequest;

class CoachesController extends Controller
{
    //Store-----------------------------------------------------------------
    public function store(StoreCoachRequest $request)
    {
        $team = Team::find($request->input('team.id'));
        $coach = new Coach();
        $coach->team()->associate($team);

        $coach->age = $request->input('age');
        $coach->name= $request->input('name');
        $coach->nickname= $request->input('nickname');
        $coach->salary= $request->input('salary');
        $coach->state= $request->input('state');
        $coach->save();

        return response()->json(
            [
                'msg' => [
                    'summary' => 'Creación del entrenador',
                    'detail' => 'La categoria se creó correctamente',
                ],
                'data' => $coach
            ]
        );
    }

    //Index--------------------------------------------------------------------
    public function index()
    {
        $coaches = Coach::with('team')->get();
        return response()->json(
            [
                'msg' => [
                    'summary' => 'Consulta del entrenador',
                    'detail' => 'Las categorias se consultaron correctamente',
                ],
                'data' => $coaches
            ]
        );
    }

    //Update--------------------------------------------------------------
    public function update(UpdateCoachRequest $request, Coach $coach)
    {
        $team = Team::find($request->input('team.id')); 
        $coach->team()->associate($team);

        $coach->age = $request->input('age');
        $coach->name= $request->input('name');
        $coach->nickname= $request->input('nickname');
        $coach->salary= $request->input('salary');
        $coach->state= $request->input('state');
        $coach->save();

        return response()->json(
            [
                'msg' => [
                    'summary' => 'Actualización del entrenador',
                    'detail' => 'El entrenador se actualizó correctamente',
                ],
                'data' => $coach
            ]
        );
    }

    //Destroy------------------------------------------------------------
    public function destroy(Coach $coach)
    {
        $coach->delete();

        return response()->json(
            [
                'msg' => [
                    'summary' => 'Eliminación de categoria',
                    'detail' => 'La categoria se eliminó correctamente',
                ],
                'data' => $coach
            ]
        );
    }

    //Show------------------------------------------------------------------
    public function show(Coach $coach)
    {
        return response()->json(
            [
                'msg' => [
                    'summary' => 'Consulta de entrenador',
                    'detail' => 'La entrenador se consultó correctamente',
                ],
                'data' => $coach
            ]
        );
    }
    //------------------------------------------------------------------
    public function inactivate(Request $request, Coach $coach)
    {
        $coach->state = $request->input('state');
        $coach->save();

        return response()->json(
            [
                'msg' => [
                    'summary' => 'Entrenador Inactivo',
                    'detail' => 'El entrenador se inactivó correctamente',
                ],
                'data' => $coach
            ]
        );
    }

//-------------------------------------------------------------------------------
    public function activate(Request $request, Coach $coach)
    {
        $coach->state = $request->input('state');
        $coach->save();

        return response()->json(
            [
                'msg' => [
                    'summary' => 'Entrenador  Activado',
                    'detail' => 'El entrenador se activó correctamente',
                ],
                'data' => $coach
            ]
        );
    }
    //------------------------------Destroys
    public function destroys(Request $request)
    {
        $coaches = Coach::get();
        for ($i = 0; $i < intval($request->input('amount')); $i++) {
            $coaches[$i]->delete();
            }
        return response()->json(
            [
                'msg' => [
                    'summary' => 'entrenador  Eliminado',
                    'detail' => 'El entrenador correctamente',
                ],
                'data' => $coaches
            ]
        );
    }
}
