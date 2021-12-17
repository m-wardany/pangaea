<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Subscriber extends Model
{
    use Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'url',
        'topic_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'url' => 'string',
        'topic_id' => 'integer',
    ];

    public function topic()
    {
        return $this->belongsTo('topics');
    }
}
