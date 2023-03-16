<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Team;
use App\Models\FootballGame;
use App\Http\Requests\StorePlayerRequest;
use App\Http\Requests\UpdatePlayerRequest;

class PlayersController extends Controller
{
    //Store-----------------------------------------------------------------
    public function store(StorePlayerRequest $request)
    {
        $team = Team::find($request->input('team.id'));
        $player = new Player();
        $player->team()->associate($team);

        $player->age = $request->input('age');
        $player->name = $request->input('name');
        $player->nickname = $request->input('nickname');
        $player->player_position = $request->input('playerPosition');
        $player->salary = $request->input('salary');
        $player->state = $request->input('state');
        $player->save();

        return response()->json(
            [
                'msg' => [
                    'summary' => 'Creación de jugador',
                    'detail' => 'El jugador se creó correctamente',
                ],
                'data' => $player
            ]
        );
    }

    //Index--------------------------------------------------------------------
    public function index()
    {
        $players = Player::with('team')->get();
        return response()->json(
            [
                'msg' => [
                    'summary' => 'Consulta de jugador',
                    'detail' => 'los jugadores se consultaron correctamente',
                ],
                'data' => $players
            ]
        );
    }

    //Update--------------------------------------------------------------
    public function update(UpdatePlayerRequest $request, Player $player)
    {
        $team = Team::find($request->input('team.id'));
        $player->team()->associate($team);

        $player->age = $request->input('age');
        $player->name = $request->input('name');
        $player->nickname = $request->input('nickname');
        $player->player_position = $request->input('playerPosition');
        $player->salary = $request->input('salary');
        $player->state = $request->input('state');
        $player->save();

        return response()->json(
            [
                'msg' => [
                    'summary' => 'Actualización del jugador',
                    'detail' => 'El jugador se actualizó correctamente',
                ],
                'data' => $player
            ]
        );
    }

    //Destroy------------------------------------------------------------
    public function destroy(Player $player)
    {
        $player->delete();

        return response()->json(
            [
                'msg' => [
                    'summary' => 'Eliminación del jugador',
                    'detail' => 'El jugador se eliminó correctamente',
                ],
                'data' => $player
            ]
        );
    }

    //Show------------------------------------------------------------------
    public function show($id)
    {
        $player = Player::with('team')->find($id);
        return response()->json(
            [
                'msg' => [
                    'summary' => 'Consulta de categoria',
                    'detail' => 'El jugador se consultó correctamente',
                ],
                'data' => $player
            ]   
        );
    }
//------------------------------------------------------------------------------
    
    public function inactivate(Request $request, Player $player)
    {
        $player->state = $request->input('state');
        $player->save();

        return response()->json(
            [
                'msg' => [
                    'summary' => 'Jugador Inactivo',
                    'detail' => 'El jugador se inactivó correctamente',
                ],
                'data' => $player
            ]
        );
    }

//-------------------------------------------------------------------------------
    public function activate(Request $request, Player $player)
    {
        $player->state = $request->input('state');
        $player->save();

        return response()->json(
            [
                'msg' => [
                    'summary' => 'Jugador  Activado',
                    'detail' => 'El jugador se activó correctamente',
                ],
                'data' => $player
            ]
        );
    }
//-------------------------------------------------------Destroys 
    public function destroys(Request $request)
    {
        $players = Player::get();
        for ($i = 0; $i < intval($request->input('amount')); $i++) {
            $players[$i]->delete();
            }
        return response()->json(
            [
                'msg' => [
                    'summary' => 'Jugador  Eliminado',
                    'detail' => 'El jugador se elimino correctamente',
                ],
                'data' => $players
            ]
        );
    }
    //----------------------------------------------------------------- Attach
    public function attachFootballGame(Player $player, FootballGame $footballGame)
    {
        $player->footballGames()->attach($footballGame->id);

        return response()->json(
            [
                'msg' => [
                    'summary' => 'Se asignó el partido',
                    'detail' => 'El partido se asignó correctamente',
                ],
                'data' => $player
            ]
        );
    }
    //----------------------------------------------------------------- dettach
    public function detachFootballGame(Player $player, FootballGame $footballGame)
	{
        $player->footballGames()->detach($footballGame->id);
	
	    return response()->json(
	        [
	            'msg' => [
	                'summary' => 'Se asignó el partido',
	                'detail' => 'El partido se asignó correctamente',
	            ],
	            'data' => $player
	        ]
	    );
	}
    //--------------------------------------------------------------
    public function detachFootballGames(Player $player)
    {
        $player->footballGames()->detach();

        return response()->json(
            [
                'msg' => [
                    'summary' => 'Se eliminaron los partidos asociados',
                    'detail' => 'Los partidos asociados se eliminaron correctamente',
                ],
                'data' => $player
            ]
        );
    }
//--------------------------------------------------------------
    public function syncFootballGame(Request $request, Player $player)
    {
        $player->footballGames()->sync($request->input('ids'));

        return response()->json(
            [
                'msg' => [
                    'summary' =>'Se actualizaron los partidos',
                    'detail' => 'Los partidos se actualizaron correctamente',
                ],
                'data' => $player
            ]
        );
    }

    public function syncWithoutFootballGame(Request $request, Player $player)
    {
        $player->footballGames()->syncWithoutDetaching($request->input('ids'));

        return response()->json(
            [
                'msg' => [
                    'summary' => 'Se actualizaron los partidos',
                    'detail' => 'Los Partidos se actualizaron correctamente',
                ],
                'data' => $player
            ]
        );
    }
}
    








