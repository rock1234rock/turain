<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //
    //
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'price', 'product_type','pic','grade'
    ];
     /**
     * Get the post that owns the comment.
     */
    
    public function Product()
    {
        return $this->belongsTo(product_type::class, 'product_type');
    }

    /**
     * Get the post that owns the comment.
     */
    
    public function Type()
    {
        return $this->belongsTo(product_type::class, 'product_type');
    }

    /**
     * Get the post that owns the comment.
     */
    public function Grade()
    {
        return $this->belongsTo(grade::class, 'grade');
    }

}
