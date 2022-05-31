<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function edit()
    {
        
        return view('users.user-editor',['user'=>auth()->user()]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validation=$request->validate([
            'name'=>'required|max:50',
            'last_name'=>'required|max:70',
            'email'=>'required|email:rfc,dns',
            'phone_number'=>'required|digits:9|nullable',
            'address'=>'max:50|string|nullable',
            'password'=>'required|max:50|string',
            
        ]);
        $user= Auth::user();
        $user->name=$validation['name'];
        $user->last_name=$validation['last_name'];
        $user->email=$validation['email'];
        $user->phone_number=$validation['phone_number'];
        $user->address=$validation['address'];
        $user->password=$validation['password'];
        $user->update();
        return redirect()->back()->with('status','User updated successfully');

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
