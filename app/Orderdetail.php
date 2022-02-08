<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;


class Orderdetail extends Model
{
 /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order_detail';

    /**order_detail
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','user_id','prod_id','order_id','prod_price','amount'
    ];
    
    /**
     * Get the post that owns the comment.
     */
   

    /**
     * Get the post that owns the comment.
     */
    public function Product()
    {
        return $this->belongsTo(product::class, 'prod_id');
    }
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function Type()
    {
        return $this->belongsTo(product_type::class,'product_tpye');
    }
    public function cost()
    {
        return $this->belongsTo(supplier_order::class,'sup_price');
    }
    public function SupplierOrder()
    {
        return $this->belongsTo(supplier_order::class, 'sup_order_id');
    }
}
