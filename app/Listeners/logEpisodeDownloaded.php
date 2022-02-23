<?php

namespace App\Listeners;
namespace App\Events;

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
        DB::table('downloads')->insert([
            'date' => $event->date,
            'episodeId' => $event->episodeId,
            'podcastId' => $event->podcastId
        ]);
    }
}
