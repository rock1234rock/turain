<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Orderdetail;

class slipController extends Controller
{
    public function index($id)
    {
        //

        $order = Order::all();
        return view('slip', ['orders' => $order]);
    }
    public function show($id)
    {
        //
        $order = Order::find($id);
       
        $order_detail = Orderdetail::where('order_id',$id)->get();
        $price = Orderdetail::sum('prod_price');
        $amount = Orderdetail::sum('amount');
        $total = $price*$amount;
        
        

      ;

        
        
        return view('slip', ['orders' => $order, 'Orderdetail' => $order_detail ,'total'=>$total]);
    }
}
