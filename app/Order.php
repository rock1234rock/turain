<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    //
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'total', 'user_id', 'total_price', 'receipt', 'status', 'tag', 'delivery', 'add2','receiv','city','zip','send'
    ];

    /**
     * Get the post that owns the comment.
     */
    public function Type()
    {
        return $this->belongsTo(product_type::class, 'product_tpye');
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
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function amouts()
    {
        return $this->sum()->complie(DB::class, 'price');
    }
    public function order_details()
    {
        return $this->sum()->complie(DB::class, 'order_id');
    }
    public function supplier_order()
    {
        return $this->hasMany('App\supplier_order');
    }
}
