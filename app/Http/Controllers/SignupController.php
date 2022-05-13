<?php

namespace App\Http\Controllers;

use App\Models\Signup;
use Illuminate\Http\Request;


class SignupController extends Controller
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
        // SignUp form Validation Start
        // $this->validate($request, [
        //     'name' => 'required',
        //     'age'=>'required',
        //     'gender'=>'required',
        //     'email' => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
        //     'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        //     'password'=>'required|regex:^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$',
        //     'address' => 'required'
        //  ]);

        //  Sign Up form Validation end

        // $signup = new Signup;
        // $signup->name = $request->request('signupname');
        // $signup->age = $request->request('signupage');
        // $signup->gender = $request->request('signupgender');
        // $signup->mobile = $request->request('signupmobile');
        // $signup->email = $request->request('signupemail');
        // $signup->password = $request->request('signuppassword');
        // $signup->address = $request->request('signupaddress');
        // $signup->save();
        // return redirect('/');
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
