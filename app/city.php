<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    //
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'city';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'city'
    ];
}
