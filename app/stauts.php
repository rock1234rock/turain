<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stauts extends Model
{
    //
      //
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'status';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'staus'
    ];
}
