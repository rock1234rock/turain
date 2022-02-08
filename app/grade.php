<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class grade extends Model
{
    //
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'grade';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'grade'
    ];
}
