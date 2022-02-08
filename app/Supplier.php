<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'supplier';

    protected $fillable = [
        'id', 'sup_name', 'address','phone','user_id'
    ];

    
    /**
     * Get the post that owns the comment.
     */
    public function profile()
    {
        return $this->belongsTo(Profile::class, 'user_id');
    }

    /**
     * Get the post that owns the comment.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
