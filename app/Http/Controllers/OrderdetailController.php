<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Order;
use App\product_type;
use App\grade;
use App\Orderdetail;
use App\User;
use App\product;
use App\Supplier;
use App\city;

use Illuminate\Support\Facades\Auth;

class OrderdetailController extends Controller

{
    public function index()
    {
        //

        $id = Auth::user()->id;
        $order_detail = Orderdetail::where('user_id', $id)->whereNull('order_id')->get();
        $suppliers = Supplier::all();
        $citylist = city::all();

        return view('Orderdetail', ['Orderdetail' => $order_detail, 'Supplier' => $suppliers, 'citylist' => $citylist]);
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
        $validatedData = $request->validate([
            'prod_id' => 'required',
            'amount' => 'required|numeric|min:1'
        ]);
        $user_id = Auth::user()->id;
        $prod_id = $validatedData['prod_id'];

        $validatedData['user_id'] = $user_id;
        $validatedData['prod_price'] = product::find( $prod_id )->price;

        $order_list = Orderdetail::where([['user_id', $user_id],['prod_id', $prod_id]])->whereNull('order_id')->get();
        
        // not have : insert
        if ($order_list->isEmpty()) {
            $order_detail = new Orderdetail($validatedData);
            $order_detail->save();
        } else {
            // have item befor: update 
            foreach( $order_list as $order_detail) {
                $order_detail->amount = $order_detail->amount + $validatedData['amount'];
                $order_detail->save();
            }
        }
       
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
        $order_detail = Orderdetail::all();
        return view('Orderdetail', ['Orderdetail' => $order_detail]);
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
        // $validatedData = $request->validate([
        $validatedData['order_id'] = $request->order_id()->order_id;
        return redirect()->back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orderdetail $Orderdetail)
    {
        //

        $Orderdetail->delete();

        return redirect()->back()->withInput();
    }
}
