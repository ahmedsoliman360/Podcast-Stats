<?php

use App\Models\EpisodeDownloads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
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
    $date = Carbon::createFromFormat("Y-m-d", $date);
    $start = $date->copy()->subDays(6);

    $period = CarbonPeriod::create($start, $date);
    
    $stats = array();
    foreach ($period as $date) {
        $date = $date->format('Y-m-d');
        $stats[$date] = EpisodeDownloads::getDayCount($date, $episodeId, $podcastId);
        $stats[$date] = is_null($stats[$date])? 0 : $stats[$date];
    }   
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