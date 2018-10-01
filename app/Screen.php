<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Screen extends Model
{
    protected $with = ['default_content', 'activeContents'];

    protected $fillable = ['name', 'description', 'systemref', 'ip', 'footer_message', 'location'];

    public static function scopeIp($query, $value)
    {
        return $query->where('ip', $value);
    }

    /**
     * A relationship for finding the user that created the content
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A relationship for finding the default content as a fallback
     */
    public function default_content()
    {
        return $this->belongsTo(Content::class);
    }

    /**
     * A relationship for finding all the contents currently assigned to this Screen
     */
    public function contents()
    {
        return $this->belongsToMany(Content::class)
                    ->withPivot('id', 'active', 'expires_on')
                    ->withTimestamps();
    }

    /**
     * A relationship for finding the indate content assigned to this Screen - Currently Globally
     */
    public function currentContents()
    {
        return $this->contents()
                    ->inDateContent();
    }

    /**
     * A relationship for finding the indate and Active Content assigned to this Screen
     */
    public function activeContents()
    {
        return $this->currentContents()
                    ->wherePivot('active', 1);
    }

    public function activateContent($contentId)
    {
        $attributes = ['active' => 1];

        return $this->currentContents()->updateExistingPivot($contentId, $attributes);
    }

    public function deactivateContent($contentId)
    {
        $attributes = ['active' => 0];

        return $this->currentContents()->updateExistingPivot($contentId, $attributes);
    }
}
