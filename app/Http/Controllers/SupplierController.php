<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Supplier;
use App\User;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $supplier = Supplier::all();
        $users = User::all();
        // dd($supplier);
        return view('supplier', ['supplier' => $supplier, 'user_list' => $users]);
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
            'sup_name' => 'required|max:255',
            'adress' => 'required',
            'phone' => 'required',
            'user_id' => 'required|integer'
        ]);
        $supplier = new Supplier();
        $supplier->sup_name = $validatedData['sup_name'];
        $supplier->address = $validatedData['adress'];
        $supplier->phone = $validatedData['phone'];
        $supplier->user_id = $validatedData['user_id'];

        $supplier->save();
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
        $supplier = Supplier::find($id);
        $users = User::all();

        return view('supplier', ['supplier' => $supplier, 'user_list' => $users]);
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
            'sup_name' => 'required|max:255',
            'adress' => 'required',
            'phone' => 'required|max:10',
            'user_id' => 'required|integer'

        ]);
        $supplier =  Supplier::find($id);
        $supplier->sup_name = $validatedData['sup_name'];
        $supplier->address = $validatedData['adress'];
        $supplier->phone = $validatedData['phone'];
        $supplier->user_id = $validatedData['user_id'];

        $supplier->save();
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
