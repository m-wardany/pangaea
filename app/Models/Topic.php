<?php

namespace App\Models;

use App\Observers\TopicObserver;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'body',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'title' => 'string',
        'body' => 'array',
    ];

    public function subscribers()
    {
        return $this->hasMany(Subscriber::class);
    }

    /**
     * Register any events for your application.
     *
     * @return void
     */
    // public static function boot()
    // {
    //     parent::boot();
    //     // Topic::observe(TopicObserver::class);
    // }
}
