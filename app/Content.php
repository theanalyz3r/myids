<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Content extends Model
{
    use SoftDeletes;

    protected $touches = ['screens'];

    protected $fillable = ['name', 'description', 'starts_on', 'expires_on'];

    protected $dates = ['starts_on', 'expires_on', 'deleted_at'];

    /**
     * A Local Scope for collecting currently indate content - Globally
     */
    public function scopeinDateContent($query)
    {
        $curDate = Carbon::now('Europe/London');
        return $query->where('contents.expires_on', '>', $curDate);
    }

    /**
     * A Local Scope for collecting currently expired content - Globally
     */
    public function scopeExpiredContent($query)
    {
        $curDate = Carbon::now('Europe/London');
        return $query->where('contents.expires_on', '<', $curDate);
    }

    /**
     * A relationship for finding the User that created the Screen
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
      * A relationship for finding the Screens that are related the the Content
      */
    public function screens()
    {
        return $this->belongsToMany(Screen::class)
                    ->withPivot('id')
                    ->withTimestamps();
    }
}
