<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coach;
use App\Models\AssistantCoach;
use App\Http\Requests\StoreAssistantCoachRequest;
use App\Http\Requests\UpdateAssistantCoachRequest;

class AssistantCoachesController extends Controller
{
    //Store-----------------------------------------------------------------
    public function store(StoreAssistantCoachRequest $request)
    {
        //$coach = Coach::find($request->input('coach.id'));

        $coach = Coach::find($request->input('coach.id'));
        $assistantCoach = new AssistantCoach();
        $assistantCoach->coach()->associate($coach);

        $assistantCoach->age = $request->input('age');
        $assistantCoach->name= $request->input('name');
        $assistantCoach->nickname= $request->input('nickname');
        $assistantCoach->salary= $request->input('salary');
        $assistantCoach->state= $request->input('state');
        $assistantCoach->save();

        return response()->json(
            [
                'msg' => [
                    'summary' => 'Creación del asistente del entrenador',
                    'detail' => 'asistente del se creó correctamente',
                ],
                'data' => $assistantCoach
            ]
        );
    }

    //Index--------------------------------------------------------------------
    public function index()
    {
        $assistantCoaches = AssistantCoach::with('coach')->get();
        return response()->json(
            [
                'msg' => [
                    'summary' => 'Consulta del asistente del entrenador',
                    'detail' => 'asistente del se consultaron correctamente',
                ],
                'data' => $assistantCoaches
            ]
        );
    }

    //Update--------------------------------------------------------------
    public function update(UpdateAssistantCoachRequest $request, AssistantCoach $assistantCoach)
    {
        $coach = Coach::find($request->input('coach.id'));
        $assistantCoach->coach()->associate($coach);

        $assistantCoach->age = $request->input('age');
        $assistantCoach->name= $request->input('name');
        $assistantCoach->nickname= $request->input('nickname');
        $assistantCoach->salary= $request->input('salary');
        $assistantCoach->state= $request->input('state');
        $assistantCoach->save();

        return response()->json(
            [
                'msg' => [
                    'summary' => 'Actualización del asistente del entrenador',
                    'detail' => 'asistente del entrenador se actualizó correctamente',
                ],
                'data' => $assistantCoach
            ]
        );
    }

    //Destroy------------------------------------------------------------
    public function destroy(Coach $assistantCoach)
    {
        $assistantCoach->delete();

        return response()->json(
            [
                'msg' => [
                    'summary' => 'Eliminación de categoria',
                    'detail' => 'La categoria se eliminó correctamente',
                ],
                'data' => $assistantCoach
            ]
        );
    }

    //Show------------------------------------------------------------------
    public function show($id)
    {
        $assistantCoach = AssistantCoach::with('coach')->find($id);
        return response()->json(
            [
                'msg' => [
                    'summary' => 'Consulta del asistente del entrenador',
                    'detail' => 'asistente del entrenador se consultó correctamente',
                ],
                'data' => $assistantCoach
            ]
        );
    }
    //------------------------------------------------------------------
    public function inactivate(Request $request, AssistantCoach $assistantCoach)
    {
        $assistantCoach->state = $request->input('state');
        $assistantCoach->save();

        return response()->json(
            [
                'msg' => [
                    'summary' => 'asistente del entrenador Inactivo',
                    'detail' => 'asistente del entrenador se inactivó correctamente',
                ],
                'data' => $assistantCoach
            ]
        );
    }

//-------------------------------------------------------------------------------
    public function activate(Request $request, AssistantCoach $assistantCoach)
    {
        $assistantCoach->state = $request->input('state');
        $assistantCoach->save();

        return response()->json(
            [
                'msg' => [
                    'summary' => 'asistente del entrenador  Activado',
                    'detail' => 'asistente del entrenador se activó correctamente',
                ],
                'data' => $assistantCoach
            ]
        );
    }
    //------------------------------Destroys
    public function destroys(Request $request)
    {
        $assistantCoaches = AssistantCoach::get();
        for ($i = 0; $i < intval($request->input('amount')); $i++) {
            $assistantCoaches[$i]->delete();
            }
        return response()->json(
            [
                'msg' => [
                    'summary' => 'Asistente del entrenador  Eliminado',
                    'detail' => 'El Asistente del entrenador correctamente',
                ],
                'data' => $assistantCoaches
            ]
        );
    }
}
