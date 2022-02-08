<?php

namespace App\Http\Controllers;

use App\Orderdetail;
use Illuminate\Http\Request;
use App\supplier_order;
use App\Orderforadmin;
use App\Order;
use Illuminate\Support\Facades\Date;

use Illuminate\Support\Facades\DB;

class profitController extends Controller
{
    //
    public function index(Request $request)
    {

        $search = $request->get('search');
        $to = $request->get('to');
        $orders = Order::where('status', '!=', 'รอชำระเงิน')->get();

        if ($request->has('search')) {
            $orders = Order::where([['status', '!=', 'รอชำระเงิน'], ['created_at', '>=', $search], ['created_at', '<=', $to]])

                ->orderBy("created_at", 'desc')
                ->paginate(10)
                ->withPath('?search=' . $search);
        }
        $orders = $orders;

        return view('profit', compact('orders'));
    }
    public function profit()
    {

        // return $request->date1;


    }
}
