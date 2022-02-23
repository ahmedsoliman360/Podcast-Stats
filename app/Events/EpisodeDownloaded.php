<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EpisodeDownloaded
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $date;
    public $eventId;
    public $episodeId;
    public $podcastId;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($eventId, $date, $episodeId, $podcastId)
    {
        $this->date = $date;
        $this->eventId = $eventId;
        $this->episodeId = $episodeId;
        $this->podcastId = $podcastId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
