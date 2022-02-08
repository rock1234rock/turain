<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\product_type;
use App\grade;
use App\User;
use App\Product;
use App\Orderdetail;
use App\Supplier;

class OrderforadminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        try {
            $suppliers = Supplier::all();
            $order_detail = Orderdetail::whereNull('sup_order_id')->get();
        } catch (Exception $e) {
            $suppliers = [];
            $order_detail = [];
        } finally {
            return view('Orderforadmin', ['order_detail' => $order_detail, 'Supplier' => $suppliers,]);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  $order = Order
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'prod_id' => 'required',
            'product_type' => 'required',
            'grade' => 'required',
            'total' => 'required|max:3'

        ]);
        $order = new Order();
        $order->user_id = $validatedData['user_id'];
        $order->prod_id = $validatedData['prod_id'];
        $order->product_type = $validatedData['product_type'];
        $order->grade = $validatedData['grade'];
        $order->total = $validatedData['total'];

        $order->save();
        //dd($order);
        return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //  $order = Order
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'prod_id' => 'required',
            'product_type' => 'required',
            'grade' => 'required',
            'total' => 'required|max:3'

        ]);
        $order =  Order::find($id);
        $order->user_id = $validatedData['user_id'];
        $order->prod_id = $validatedData['prod_id'];
        $order->product_type = $validatedData['product_type'];
        $order->grade = $validatedData['grade'];
        $order->total = $validatedData['total'];

        $order->save();
        return redirect()->back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
