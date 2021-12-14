<?php

namespace App;

use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends \Wave\User
{

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'password','location_id', 'verification_code', 'verified', 'trial_ends_at','gender','interested_in'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'trial_ends_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function message()
    {
        return $this->hasMany("App\Message");
    }

    public function isAdmin()
    {
        return $this->role_id == 1;
    }

    public function tours()
    {
        return $this->belongsToMany(Tour::class, 'user_tour');
    }

    public function setSettingsAttribute($value) { $this->attributes['settings'] = $value ? $value->toJson() : null; }
}
