<?php

namespace App\Listeners;

use App\Events\EpisodeDownloaded;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class logEpisodeDownloaded
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(EpisodeDownloaded $event)
    {

        // CreateEpisodeDownloads::dispatch
        DB::table('episode_downloads')->insert([
            'day' => $event->date,
            'episodeId' => $event->episodeId,
            'podcastId' => $event->podcastId,
            'eventId' => $event->eventId
        ]);
    }
}
