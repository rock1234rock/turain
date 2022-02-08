<?php

namespace App;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'profiles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'preface', 'fristname','lastname','address','province','zipcode','phone'
    ];

    public function fullname()
    {
        if ($this->firstname) {
            return $this->preface." ".$this->fristname." ".$this->lastname;
        }
        return '';
    }
}
