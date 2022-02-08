<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();

        return view('users', ['users' =>$user]);
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
        $user = User::findOrFail($id);
        $profile = Profile::firstOrNew(['id'=>$id]);
        return view('user_edit', ['user' => $user, 'profile'=> $profile]);
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
            'preface' => 'required|max:255',
            'fristname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'address'=> 'required',
            'province'=> 'required|max:255',
            'zipcode'=> 'required|max:5|min:5',
            'phone'=> 'required|max:10|min:10',
        ]);

        
        $profile = Profile::firstOrNew(['id'=>$id]);
        $profile->preface = $validatedData['preface'];
        $profile->fristname = $validatedData['fristname'];
        $profile->lastname = $validatedData['lastname'];
        $profile->address = $validatedData['address'];
        $profile->province = $validatedData['province'];
        $profile->zipcode = $validatedData['zipcode'];
        $profile->phone =$validatedData['phone'];

        $profile->save();
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
