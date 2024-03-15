<?php

namespace App\Http\Controllers\rider;

use App\Http\Controllers\Controller;
use App\Models\RequestRide;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookaRideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            return view('rider.bookaride');
        }else{
            $notification = array(
                'msg' =>'Your must login to view this page',
                'alert-type' =>'danger',
            );
            return redirect()->route('signup')->with($notification);
        }

    }
    public function bookRequest(Request $request){

        $request->validate([
            'rider_name' => ['required', 'string', 'max:255'],
            'mobile' => ['required',  'max:11'],
            'current_location' => ['required'],
            'destination' => ['required'],
            'payment' => ['required'],
            'ride_type' => ['required'],
        ]);

        $book = new RequestRide();
        $book->user_id = Auth::id();
        $book->rider_name = $request->rider_name;
        $book->mobile = $request->mobile;
        $book->current_location = $request->current_location;
        $book->destination = $request->destination;
        $book->payment = $request->payment;
        $book->ride_type = $request->ride_type;

        $book->amount = rand(1, 100) * 5; //5tk per kilo
        $book->kilo = rand(1, 30);
        $book->save();

        $notification = array(
            'msg' =>'You have a new Ride Request!',
            'alert-type' =>'success',
        );
        return redirect()->route('mydriver')->with($notification);
    }
    public function myDriver(){
        $current_ride = RequestRide::orderBy('id','desc')->where('user_id', Auth::id())->where('status','0')->get();
        $complete_ride = RequestRide::where('user_id', Auth::id())->where('status','1')->get();
        $cancel_ride = RequestRide::where('user_id', Auth::id())->where('status','2')->get();
        return view('rider.my-driver',compact('current_ride','complete_ride','cancel_ride'));
    }

    public function rideAccept($id){
        $ride = RequestRide::findOrFail($id);
        $ride->status = 1;
        $ride->save();

        $notification = array(
            'msg' =>'Congratulations! You have Accepted a New Ride!',
            'alert-type' =>'info',
        );
        return redirect()->back()->with($notification);
    }

    public function rideDecline($id){
        $ride = RequestRide::findOrFail($id);
        $ride->status = 2;
        $ride->save();

        $notification = array(
            'msg' =>'You just canceled a ride!',
            'alert-type' =>'danger',
        );
        return redirect()->back()->with($notification);
    }


    public function alluser(){
        $users = User::orderBy('id','desc')->where('status','0')->get();
        return view('rider.all-users',compact('users'));
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
