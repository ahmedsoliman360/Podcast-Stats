<?php

use App\Models\EpisodePost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::get('/EpisodePost', function(){
//     return EpisodePost::all();
// });

// Route::post('/EpisodePost', function(){
//     return EpisodePost::create([
//         'date' => request('date'),
//         'episodeId' => request('episodeId'),
//         'episodeId' => request('podcastId'),
//     ]);
// });