<?php

use App\Models\EpisodeDownloads;
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
// /podcast/{id}/episode/{epId}
Route::get('/EpisodeDownloads/{date}/{podcastId}/{episodeId}', function(string $date, $podcastId, $episodeId){
    // for ($i=0; $i < 7; $i++) { 
    //     # code...
    // }
    $stats = EpisodeDownloads::getDayCount($date, $episodeId, $podcastId);
    return $stats;
});

Route::post('/EpisodeDownloads', function(){
    return EpisodeDownloads::create([
        'day' => request('day'),
        'eventId' => request('eventId'),
        'episodeId' => request('episodeId'),
        'podcastId' => request('podcastId'),
    ]);
});