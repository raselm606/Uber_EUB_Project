@extends('layouts.app')
@section('content')
    <div class="top_notch  mb-3 p-3" style="background: #FFFBEE;">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-12">
                    <div class="top_section d-flex align-items-center justify-content-between ">
                        <h3>All Users</h3>
                        <p>Home > All Users</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main_profile">
        <div class="container">
            <div class="row mb-3">
                <div class="col-lg-12 mb-3">
                    <div class="user_photo_info d-flex align-items-center justify-content-between">
                        <div class="user_photo d-flex align-items-center justify-content-between">
                            <div class="img_area mr-4">
                                <img style="margin-right: 20px;" width="100" src="{{asset('public/frontend/images/partner-img.webp')}}" alt="">
                            </div>
                            <div class="user_info ml-4">
                                <h5>{{Auth::user()->fname}} {{Auth::user()->lname}}</h5>
                                <p>Email: {{Auth::user()->email}} <br> Mobile: {{Auth::user()->phone}}</p>



                            </div>
                        </div>
                        <h3>Partnership with Uber</h3>
                    </div>
                </div>
            </div>
            <hr>




            <div class="row mb-4 bg-light mt-5">
                <div class="col-lg-12">
                        <h5 class="mb-4 text-primary">All Uber Users List:</h5>


                    <div class="current_ride_request_table table-responsive">
                        <table id="myTable4" class="display  table  table-striped table-hover table-bordered" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>User Type</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>SL</th>
                                <th>User Type</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Status</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        @if($user->user_type == 1)
                                            <span class="badge text-bg-info"><i class="fa-solid fa-user"></i> Rider</span>
                                            @elseif($user->user_type == 2)
                                            <span class="badge text-bg-primary"><i class="fa-solid fa-truck"></i> Driver</span>
                                            @endif
                                    </td>
                                    <td>{{$user->fname}} </td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>
                                        @if($user->verification_code == null)
                                        <button  class="btn btn-sm btn-primary"><i class="fa-solid fa-check"></i> Verified </button>
                                        @else
                                        <button   class="btn btn-sm btn-danger"><i class="fa-solid fa-xmark"></i> inactive</button>
                                            @endif
                                    </td>
                                </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>

@endsection
