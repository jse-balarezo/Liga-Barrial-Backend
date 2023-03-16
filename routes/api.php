<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\AssistantCoachesController;
use App\Http\Controllers\CoachesController;
use App\Http\Controllers\FootballGamesController;
use App\Http\Controllers\PlayersController;
use App\Http\Controllers\AuthController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Metodos de Teams

/*
 * Teams
 */

Route::controller(TeamsController::class)->group(function () {
    Route::prefix('teams/{team}')->group(function () {
        Route::patch('/inactivate', 'inactivate');
        Route::patch('/activate', 'activate');
    });

    Route::prefix('teams')->group(function () {
        Route::patch('/destroys', 'destroys');
    });
});
Route::apiResource('teams', TeamsController::class);

/*
 * Coach
 */

Route::controller(CoachesController::class)->group(function () {
    Route::prefix('coaches/{coach}')->group(function () {
        Route::patch('/inactivate', 'inactivate');
        Route::patch('/activate', 'activate');
    });

    Route::prefix('coaches')->group(function () {
        Route::patch('/destroys', 'destroys');
    });
});
Route::apiResource('coaches', CoachesController::class);

/*
 * Players
 */

Route::controller(PlayersController::class)->group(function () {
    Route::prefix('players/{player}')->group(function () {
        Route::patch('/inactivate', 'inactivate');
        Route::patch('/activate', 'activate');
        Route::post('/football-games/{football_game}', 'attachFootballGame');
        Route::delete('/football-games/{football_game}', 'detachFootballGame');
        Route::delete('/football-games', 'detachFootballGames');
        Route::patch('/football-games', 'syncFootballGame');
        Route::post('/football-games', 'syncWithoutFootballGame');
    });

    Route::prefix('players')->group(function () {
        Route::patch('/destroys', 'destroys');
    });
});
Route::apiResource('players', PlayersController::class);

/*
 * FootballGame
 */

Route::controller(FootballGamesController::class)->group(function () {
    Route::prefix('football-games/{football_game}')->group(function () {
        Route::patch('/inactivate', 'inactivate');
        Route::patch('/activate', 'activate');
        Route::post('/players/{player}', 'attachPlayer');
        Route::delete('/players/{player}', 'detachPlayer');
        Route::delete('/players', 'detachPlayers');
        Route::patch('/players', 'syncPlayer');
        Route::post('/players', 'syncWithoutPlayer');
    });

    Route::prefix('football-games')->group(function () {
        Route::patch('/destroys', 'destroys');
    });
});
Route::apiResource('football-games', FootballGamesController::class);

/*
 * AssistantCoaches
 */

Route::controller(AssistantCoachesController::class)->group(function () {
    Route::prefix('assistant-coaches/{assistant_coach}')->group(function () {
        Route::patch('/inactivate', 'inactivate');
        Route::patch('/activate', 'activate');
    });

    Route::prefix('assistant-coaches')->group(function () {
        Route::patch('/destroys', 'destroys');
    });
});
Route::apiResource('assistant-coaches', AssistantCoachesController::class);


//auth
Route::controller(AuthController::class)->group(function(){
    Route::post('/login', 'login');
    Route::delete('/logout', 'logout')->middleware('auth:sanctum');
    Route::delete('/logout-all/{user}', 'logoutAll')->middleware('auth:sanctum');
});







