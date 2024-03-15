<?php

namespace App\Http\Controllers;

use App\Mail\VerifyEmail;
use App\Models\RequestRide;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthRiderUser extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()){
            return redirect()->route('mydriver');
        }else{
            return view('signup');
        }


    }

    public function register(Request $request){
        $request->validate([
            'user_type' => ['required'],
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'max:11', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'retype_password' => ['required', 'min:8', 'same:password'],
        ]);

        $user = User::create([
            'user_type' => $request->user_type,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'verification_code' => Str::random(40), // Generate verification code
        ]);

        // Send verification email
        Mail::to($user->email)->send(new VerifyEmail($user));

        $notification = array(
            'msg' =>'Registration successful. Please check your email for verification.',
            'alert-type' =>'success',
        );
        return redirect()->back()->with($notification);
    }
    public function login(){
        if(Auth::user()){
            return redirect()->route('mydriver');
        }else{
            return view('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function loginSubmit(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $notification = array(
                'msg' =>'Login Success!',
                'alert-type' =>'success',
            );
            return redirect()->route('mydriver')->with($notification); // Redirect to intended page
        } else {
            $notification = array(
                'msg' =>'Invalid Credentials!',
                'alert-type' =>'danger',
            );
            return redirect()->back()->withInput()->with($notification);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }


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
