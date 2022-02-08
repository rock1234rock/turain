<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_type extends Model
{
   //
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_type';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'product_tpye'
    ];
}
