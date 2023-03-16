<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FootballGame;
use App\Models\Player;
use App\Http\Requests\StoreFootballGameRequest;
use App\Http\Requests\UpdateFootballGameRequest;

class FootballGamesController extends Controller
{
    //Store-----------------------------------------------------------------
    public function store(StoreFootballGameRequest $request)
    {
        $footballGame = new FootballGame();
        $footballGame->date = $request->input('date');
        $footballGame->loser = $request->input('loser');
        $footballGame->number_matches = $request->input('numberMatches');
        $footballGame->penalties = $request->input('penalties');
        $footballGame->winner = $request->input('tied');
        $footballGame->tied = $request->input('tied');
        $footballGame->save();

        return response()->json(
            [
                'msg' => [
                    'summary' => 'Creación de partidos',
                    'detail' => 'Los partidos se creó correctamente',
                ],
                'data' => $footballGame
            ]
        );
    }

    //Index--------------------------------------------------------------------
    public function index()
    {
        $footballGames = FootballGame::get();
        return response()->json(
            [
                'msg' => [
                    'summary' => 'Consulta de partidos',
                    'detail' => 'Los partidos se consultaron correctamente',
                ],
                'data' => $footballGames
            ]
        );
    }

    //Update--------------------------------------------------------------
    public function update(UpdateFootballGameRequest $request, FootballGame $footballGame)
    {
        $footballGame->date = $request->input('date');
        $footballGame->loser = $request->input('loser');
        $footballGame->number_matches = $request->input('numberMatches');
        $footballGame->penalties = $request->input('penalties');
        $footballGame->winner = $request->input('tied');
        $footballGame->tied = $request->input('tied');
        $footballGame->save();

        return response()->json(
            [
                'msg' => [
                    'summary' => 'Actualización de los partidos',
                    'detail' => 'Los partidos se actualizó correctamente',
                ],
                'data' => $footballGame
            ]
        );
    }

    //Destroy------------------------------------------------------------
    public function destroy(FootballGame $footballGame)
    {
        $footballGame->delete();

        return response()->json(
            [
                'msg' => [
                    'summary' => 'Eliminación de los partidos',
                    'detail' => 'Los partidos se eliminó correctamente',
                ],
                'data' => $footballGame
            ]
        );
    }

    //Show------------------------------------------------------------------
    public function show(FootballGame $footballGame)
    {
        return response()->json(
            [
                'msg' => [
                    'summary' => 'Consulta de partidos',
                    'detail' => 'Los partidos se consultó correctamente',
                ],
                'data' => $footballGame
            ]
        );
    }
    //------------------------------------------------------------------------------
    
    public function inactivate(Request $request, FootballGame $footballGame)
    {
        $footballGame->tied = $request->input('tied');
        $footballGame->save();

        return response()->json(
            [
                'msg' => [
                    'summary' => 'empate Inactivo',
                    'detail' => 'El empate se inactivó correctamente',
                ],
                'data' => $footballGame
            ]
        );
    }

//-------------------------------------------------------------------------------
    public function activate(Request $request, FootballGame $footballGame)
    {
        $footballGame->tied = $request->input('tied');
        $footballGame->save();

        return response()->json(
            [
                'msg' => [
                    'summary' => 'empate Activado',
                    'detail' => 'El empate se activó correctamente',
                ],
                'data' => $footballGame
            ]
        );
    }
    //------------------------------Destroys
    public function destroys(FootballGame $footballGames)
    {
        $footballGames = FootballGame::get();
        for ($i = 0; $i < intval($request->input('amount')); $i++) {
            $footballGames[$i]->delete();
            }
        return response()->json(
            [
                'msg' => [
                    'summary' => 'Partido  Eliminado',
                    'detail' => 'El partidos se elimino correctamente',
                ],
                'data' => $footballGames
            ]
        );
    }
    //----------------------------------------------------------------- Attach
    public function attachPlayer(FootballGame $footballGame, Player $player)
    {
        $footballGame->players()->attach($player->id);

        return response()->json(
            [
                'msg' => [
                    'summary' => 'Se asignó el jugador',
                    'detail' => 'El jugador se asignó correctamente',
                ],
                'data' => $footballGame
            ]
        );
    }
    //----------------------------------------------------------------- dettach
    public function detachPlayer(FootballGame $footballGame, Player $player)
	{
        $footballGame->players()->detach($player->id);
	
	    return response()->json(
	        [
	            'msg' => [
	                'summary' => 'Se asignó el partido',
	                'detail' => 'El partido se asignó correctamente',
	            ],
	            'data' => $footballGame
	        ]
	    );
	}
    //----------------------------------------------------------------
    public function detachPlayers(FootballGame $footballGame)
    {
        $footballGame->players()->detach();

        return response()->json(
            [
                'msg' => [
                    'summary' => 'Se eliminaron los jugadores asociados',
                    'detail' => 'Los jugadores asociados se eliminaron correctamente',
                ],
                'data' => $footballGame
            ]
        );
    }
//--------------------------------------------------------------------------
    public function syncPlayer(Request $request, FootballGame $footballGame)
    {
        $footballGame->players()->sync($request->input('ids'));

        return response()->json(
            [
                'msg' => [
                    'summary' =>'Se actualizaron los Jugadores',
                    'detail' => 'Los Jugadores se actualizaron correctamente',
                ],
                'data' => $footballGame
            ]
        );
    }
//---------------------------------------------------------------------------------
    public function syncWithoutPlayer(Request $request, FootballGame $footballGame)
    {
        $footballGame->players()->syncWithoutDetaching($request->input('ids'));

        return response()->json(
            [
                'msg' => [
                    'summary' => 'Se actualizaron los jugadores',
                    'detail' => 'Los Jugadores se actualizaron correctamente',
                ],
                'data' => $footballGame
            ]
        );
    }
    
    
}
