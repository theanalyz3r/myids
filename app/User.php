<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the Screens the User owns.
     */
    public function screens()
    {
        return $this->hasMany(Screen::class);
    }
    public function content()
    {
        return $this->hasMany(Content::class);
    }

    public function addcontent(Content $content)
    {
        $this->content()->save($content);
        // Screen::create([
        //     'name' => request('name'),
        //     'description' => request('description'),
        //     'systemref' => request('systemref'),
        //     'location' => request('location')
        //     'user_id' => auth()->id()
        // ]);
    }

}
