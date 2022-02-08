<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\product_type;
use App\grade;
use App\Orderdetail;
use App\User;
use App\product;
class CartController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        //
 
        $product = product::all();
        $order_details = Orderdetail::all();
        $product_types = product_type::all(); 
        $grades = grade::all();
        $users = user::all();
        $product1 =product::all();
        return view('order_detail',['product'=>$product,'order_detail'=>$order_details,
        'product_types' => $product_types,'grades'=>$grades,'user_list' => $users,'products'=>$product1]);

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
        //
       // $validatedData = $request->validate([
         //   'prod_id'=>'required',
           // 'product_type'=>'required',
            //'grade'=>'required',
            //'total'=>'required|max:5',
            //'price'=>'required|max:5'
        //]);
       // $validatedData['user_id'] = $request->user()->id;
        
       // $order = new Order($validatedData);
        
       // $order->save();
         //dd($order);
        //return redirect()->back()->withInput();
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
        //
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
