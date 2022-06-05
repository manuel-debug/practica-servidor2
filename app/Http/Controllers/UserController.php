<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.user-list',['users'=>User::with('role')->paginate(5)]);
        
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
        $request->validate([
            'name'=>'required|max:50',
            'last_name'=>'required|max:70',
            'email'=>'required|email:rfc,dns',
            'phone_number'=>'digits:9|nullable',
            'address'=>'max:50|string|nullable',
            'password'=>'confirmed|required', //Rules\Password::defaults() añadir esta regla despues de desarrollo
            'profile_picture'=>'nullable|image|mimes:jpg,png,jpeg'
        ]);

        $user= Auth::user();
        $user->name=$request->name;
        $user->last_name=$request->last_name;
        $user->email=$request->email;
        $user->phone_number=$request->phone_number;
        $user->address=$request->address;
        $user->password=Hash::make($request->password);
        if($request->hasFile('profile_picture')){
            $file=$request->file('profile_picture');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/users/',$filename);
            $user->profile_picture=$filename;
        }
        $user->save();
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
