<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\supplier_order;
use App\Orderdetail;

class supplier_orderController extends Controller
{
    public function index()
    {
        //
        $supplier_orders = supplier_order::all();
      
        return view('supplier_order', ['supplier_order' => $supplier_orders]);
    }
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'prod_id' => 'required',
            'sup_order_total' => 'required|numeric',
            'sup_price' => 'required|numeric',
            'order_id' => 'required',
            'user_id' => 'required',
            'sup_id' => 'required',
            'sup_order_date' => 'required',

        ]);


        $supplier_orders = new supplier_order($validatedData);
       
        if ($supplier_orders->save()) {
            $validateData = $request->validate([
                'order_detail_id' => 'required',
            ]);
            $order_detail_id = $validateData['order_detail_id'];
            $order_detail= Orderdetail::find( $order_detail_id  );
            $order_detail->sup_order_id = $supplier_orders->id;
            $order_detail->save();

            // return response()->json(['id' =>$order_detail->order_id]);
        }

        $supplier_orders->save();
        //dd($order);

        return redirect()->back()->withInput();
    }
}
