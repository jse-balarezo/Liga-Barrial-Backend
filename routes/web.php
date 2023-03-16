<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//---------------------------------------------------------------------
Route::get('/read', function () {
    // Read
    $team = Team::get(); // select * from team
    return $team;
});

Route::get('/create', function () {
    // Create
    $team = new Team();
    $team->amount = '2';
    $team->country = 'Ecuador';
    $team->name = 'pepes';
    $team->ranking = '123456';
    $team->state = 'true';
    $team->save(); // insert into users(name,email,password) values('Juan','juan@gmail.com','123456);
    return $team;
});

Route::get('/update', function () {
//     Update
    $team = Team::where('id', 5)->first();
    $team->amount = '2';
    $team->country = 'Ecuador';
    $team->name = 'pepes';
    $team->ranking = '123456';
    $team->state = 'true';
    $team->save(); // update from users set name = 'Juan', email='juan@gmail.com' where id = 3;
    return $team;
});

Route::get('/delete', function () {
// Delete
    $team = User::where('id', 4)->first();
    $team->delete(); // delete from users where id = 3;
    return $team;
});

