<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Order;
use App\product_type;
use App\grade;
use App\User;
use App\product;
use App\Orderdetail;
use App\stauts;

class OrderController extends Controller
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
        $order = Order::all();
        $product_types = product_type::all();
        $grades = grade::all();
        $users = user::all();
        $product1 = product::all();
        // $order_details = Orderdetail::all();

        return view('order', [
            'product' => $product, 'orders' => $order, 'product_types' => $product_types,
            'grades' => $grades, 'user_list' => $users, 'products' => $product1
        ]);
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
        $validateData = $request->validate([
            'order_amount' => 'required',
            'total_price' => 'required',
            'receipt' => 'required|image|mimes:jpeg,png,jpg,gif,svg|',
            'delivery' => 'required',
            'add2' => 'required',
            'city' => 'required',
            'zip' => 'required',
            'receiv' => 'required',
            'send'=> '',
        ]);

        $validateData['total'] = $validateData['order_amount'];
        $validateData['user_id'] = $request->user()->id;
        $validateData['status'] = 'รอการยืนยันการชำระเงิน';
        $validateData['tag'] = 'รอรับเลขติดตามพัสดุ';

        $imageName = time() . '.' . $request->receipt->extension();
        $validateData['receipt']->move(public_path('receipts'), $imageName);
        $validateData['receipt'] = $imageName;


        $order = new Order($validateData);

        if ($order->save()) {
            $validateData = $request->validate([
                'pay.*' => 'required',

            ]);

            for ($i = 0; $i < count($validateData['pay']); $i++) {
                $order_detail = Orderdetail::find($validateData['pay'][$i]);

                $order_detail->order_id = $order->id;
                $order_detail->save();
            }


            // return response()->json(['id' =>$order_detail->order_id]);
        }

        return redirect()->to('buy')->withInput();
    } // 



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
        $order = Order::find($id);
        return view('order_edit', ['orders' => $order]);
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
        $validatedData = $request->validate([

            'tag' => 'required',
            'status' => 'required',
            'send' => 'required'
        ]);

        $validatedData['user_id'] = $request->user()->id;

        $order = Order::find($id);
        $order->tag = $validatedData['tag'];
        $order->status = $validatedData['status'];
        $order->send = $validatedData['send'];

        $order->save();
        return redirect()->back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        
    }
    public function imageUpload()
    {
        return view('imageUpload');
    }
}
