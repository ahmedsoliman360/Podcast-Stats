<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $podcastId;
 */
class EpisodeDownloads extends Model
{
    use HasFactory;
    public $timestamps = false;
    public static function getDayCount(string $date,int $episodeId,int $podcastId)
    {
        $stats = EpisodeDownloads::where('day', '=', date($date))
                        ->where('podcast_Id', '=', $podcastId)
                        ->where('episode_Id', '=', $episodeId)
                        ->value('count');
        return $stats;
    }
    protected $fillable = [
        "day","eventId","episodeId","podcastId"
    ];

    // public static function create(Carbon $date): self
    // {
    //     $eD = new self();
    //     $eD->day = $date;

    //     return $eD;
    // }

    // public function incrementDailyDownload()
    // {
    //     $this->counter++;
    // }
}
