<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Profile;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    const ADMIN_TYPE = 2;
    const DEFAULT_TYPE = 1;
    public function Admin()
    {
        return $this->user_type === self::ADMIN_TYPE;
    }
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the usertype record associated with the user.
     */
    public function usertype()
    {
        return $this->hasOne('App\UserType', 'id', 'user_type');
    }

    /**
     * Get the usertype record associated with the user.
     */
    public function fullname()
    {
        $profile = Profile::find($this->id);
        if ($profile) {
            return $profile->preface . " " . $profile->fristname . " " . $profile->lastname;
        }
        return $this->name;
    }
    public function userid()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
