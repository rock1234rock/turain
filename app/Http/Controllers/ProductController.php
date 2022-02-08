<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\grade;
use App\product_type;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = product::all();
        $grades = grade::all();
        $product_types =  product_type::all();
        
        return view('products', ['products' => $products, 'grades' => $grades, 'product_types' => $product_types]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'price' => 'required|integer',
            'product_type' => 'required|integer',
            'grade' => 'required|integer',
            'pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|',


        ]);

        $imageName = time() . '.' . $request->pic->extension();
        $validatedData['pic']->move(public_path('pics'), $imageName);
        $validatedData['pic'] = $imageName;
        
        $product = new product($validatedData);
        $product->save();

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
        $product = product::find($id);
        $grades = grade::all();
        $product_types =  product_type::all();
        return view('product_edit', ['product' => $product, 'grades' => $grades, 'product_types' => $product_types]);
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
            'price' => 'required|max:6',
            'product_type' => 'required|integer',
            'grade' => 'required|integer'

        ]);
        $product = product::find($id);
        $product->price = $validatedData['price'];
        $product->product_type = $validatedData['product_type'];
        $product->grade = $validatedData['grade'];

        $product->save();
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
    public function imageUpload()
    {
        return view('imageUpload');
    }
}
