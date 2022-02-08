<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class supplier_order extends Model
{
    protected $table = 'supplier_order';

    protected $fillable = [
        'id', 'sup_order_date','sup_order_total','order_id','user_id','prod_id','sup_id','sup_price'
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
    public function Type()
    {
        return $this->belongsTo(product_type::class,'product_tpye');
    }

    /**
     * Get the post that owns the comment.
     */
    public function Grade()
    {
        return $this->belongsTo(grade::class, 'grade');
    }

    public function Product()
    {
        return $this->belongsTo(product::class, 'prod_id');
    }
    public function Supplier()
    {
        return $this->belongsTo(Supplier::class, 'sup_id');
    }
   
}
