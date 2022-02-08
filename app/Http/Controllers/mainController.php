<?php

namespace App\Http\Controllers;


use App\product_type;
use App\product;
use Illuminate\Http\Request;


class mainController extends Controller
{
    public function __construct()
    {
       ///  $this->middleware('auth');
    }

    function index ()
    {
        $product = product::all();
        return view('index',['product'=>$product]);
    }

    function about()
    {
        return view('about');
    }

    function products()
    {
        $product = product::all();

        return view('products',['product'=>$product]);

    }
    
  
    function customer()
    {
        return view('customer');
    }
   
    function product_type()
    {
        $product_type = product_type::all();
        
        return view('product_type',['product_type'=>$product_type]);
    }
   
}

