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
        $stats = EpisodeDownloads::select('day')
                        ->where('day', '=', date($date))
                        ->where('podcastId', '=', $podcastId)
                        ->where('episodeId', '=', $episodeId)
                        ->count();
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
