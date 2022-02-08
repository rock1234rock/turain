<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Orderdetail;
use App\supplier_order;
class DetailController extends Controller
{
    
    public function index($id)
    {
        //

        $order = Order::all();
        return view('detail', ['orders' => $order]);
    }
    public function show($id)
    {
        //
        $order = Order::find($id);
       
        $order_detail = Orderdetail::where('order_id',$id)->get();
        $price = Orderdetail::sum('prod_price');
        $amount = Orderdetail::sum('amount');
       
        $total = $price*$amount;
        
        
        $supplier_order = Orderdetail::where('sup_order_id');
       
        

      ;

        
        
        return view('detail', ['orders' => $order, 'Orderdetail' => $order_detail ,'total'=>$total,'supplier_order'=>$supplier_order]);
    }

    
    
}
