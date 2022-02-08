<?php

namespace App\Http\Controllers;

use App\Order;
use App\Orderdetail;
use App\product;
use App\product_type;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Supplier;
class HomeController extends Controller
{
    //
    public function mySearch(Request $request)
    {
        $suppliers = Supplier::all();
        if ($request->has('search')) {
            ///$order_detail = User::where('name', 'search')
               /// ->where(function ($query) use ($request) 
                //{$query->where('name', 'LIKE', '%' . $request->search . '%')->orWhere('id', 'LIKE', '%' . $request->search . '%');
                //})
                //->paginate(10);
            $order_detail = Orderdetail::join('orders', 'orders.id', '=', 'order_detail.order_id')
                    ->join('product','product.id','=','order_detail.prod_id')
                    ->join('product_type','product_type.id','=','product.product_type')
                    ->join('users', 'users.id', '=', 'orders.user_id')
                    ->where('users.name','LIKE','%' . $request->search . '%')
                    ->orWhere('product_type.product_tpye','LIKE','%' . $request->search . '%')
                    ->get();

            // $order_detail = Orderdetail::join('users', 'users.id', '=', 'order_detail.user_id')
            //             ->join('product','product.id','=','order_detail.prod_id')
                       
            //             ->where('users.name','LIKE','%' . $request->search . '%')
            //             ->where('product.product_type','LIKE','%' . $request->search . '%')
                        
            //             ->orWhere('users.id',"=",$request->search)
            //             ->orWhere('product.id',"=",$request->search)
            //             ->get();


        } else {
            $order_detail = Orderdetail::get();
        }


        return view('Orderforadmin', compact('order_detail'),['Supplier'=> $suppliers]);
    }
}
