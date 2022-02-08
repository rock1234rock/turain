<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Orderdetail;
use App\supplier_order;

class reportsupController extends Controller
{
    //
    public function index($id)
    {
        //

        $supplier_order = supplier_order::all();
        return view('report_sup', ['supplier_order' => $supplier_order]);
    }
    public function show($id)
    {
        //
        $supplier_order = supplier_order::find($id);
       
       
       
        
       
       
       
        

      ;

        
        
        return view('report_sup', ['supplier_order'=>$supplier_order]);
    }
    
}
