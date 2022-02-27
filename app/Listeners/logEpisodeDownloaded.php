<?php

namespace App\Listeners;

use App\Events\EpisodeDownloaded;
use App\Models\EpisodeDownloads;
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

        $count = EpisodeDownloads::getDayCount($event->date, $event->episodeId, $event->podcastId);
        $count = $count + 1;
        DB::table('episode_downloads')
            ->updateOrInsert(
            [
            'day' => $event->date,
            'episode_Id' => $event->episodeId,
            'podcast_Id' => $event->podcastId
            ],
            ['count' => $count]
        );
        return $count;
    }
}
