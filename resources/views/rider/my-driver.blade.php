@extends('layouts.app')
@section('content')
    <div class="top_notch  mb-3 p-3" style="background: #FFFBEE;">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-12">
                    <div class="top_section d-flex align-items-center justify-content-between ">
                        <h3>Dashboard</h3>
                        <p>Home > My Dashboard</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main_profile " style="margin-bottom: 100px;">
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

            <div class="row mb-3 mt-3">
                <h4 class="mb-3">Total Overview: </h4>
                <div class="col-lg-3">
                    <div class="overview_item bg-light text-center p-4">
                        <h4>{{$current_ride->count()}}</h4>
                        <p class="text-warning">Current Ride Request</p>
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <div class="overview_item bg-light text-center p-4">
                        <h4>{{$current_ride->count() + $complete_ride->count()}}</h4>
                        <p class="text-primary">Total Rides</p>
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <div class="overview_item bg-light text-center p-4">
                        <h4>{{$complete_ride->sum('amount')}}</h4>
                        <p class="text-info">Total Earnings</p>
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <div class="overview_item bg-light text-center p-4">
                        <h4>{{$cancel_ride->count()}}</h4>
                        <p class="text-danger">Total Ride Canceled</p>
                    </div>
                </div>

            </div>

            @if(session()->has('msg'))
                <div class="alert alert-{{session()->get('alert-type')}}  alert-dismissible fade show" role="alert">
                    {{ session()->get('msg') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <ul class="nav nav-tabs ride_tab" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                        Ride Request <span class="badge text-bg-warning">{{$current_ride->count()}}</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">
                        Ride Completed <span class="badge text-bg-success">{{$complete_ride->count()}}</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">
                        Ride Canceled <span class="badge text-bg-danger">{{$cancel_ride->count()}}</span>
                    </button>
                </li>

            </ul>
            <div class="tab-content " id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <div class="row mb-4">
                        <div class="col-lg-12">
                            <h5 class="mb-3 mt-3 text-success">Current All Ride Request:</h5>
                            <div class="current_ride_request_table table-responsive">
                                <table id="myTable" class="display  table  table-striped table-hover table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Rider Name</th>
                                        <th>Mobile</th>
                                        <th>Destination</th>
                                        <th>Ride Type</th>
                                        <th>Amount</th>
                                        <th>Payment Method</th>
                                        <th>Rider Request</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th>Rider Name</th>
                                        <th>Mobile</th>
                                        <th>Destination</th>
                                        <th>Ride Type</th>
                                        <th>Amount</th>
                                        <th>Payment Method</th>
                                        <th>Rider Request</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($current_ride as $current)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$current->rider_name}}</td>
                                            <td>{{$current->mobile}}</td>
                                            <td>Location:<strong>{{$current->current_location}}</strong> <br>
                                                Destination:<strong>{{$current->destination}}</strong> <br>
                                                Estimate: <strong>{{$current->kilo}} KM</strong>
                                            </td>
                                            <td> @if($current->ride_type == 0)
                                                <img src="{{asset('public/frontend/images/moto.webp')}}" alt=""> <br> Uber Moto
                                                     @elseif($current->ride_type == 1)
                                                    <img src="{{asset('public/frontend/images/uberx.webp')}}" alt="">
                                                    <br> UberX

                                                     @elseif($current->ride_type == 2)
                                                    <img src="{{asset('public/frontend/images/uberxl.webp')}}" alt=""><br>
                                                    <br> Uber XL

                                                    @elseif($current->ride_type == 3)
                                                    <img style="filter: sepia(2);" src="{{asset('public/frontend/images/moto.webp')}}" alt=""><br>
                                                    Uber Eats

                                                    @elseif($current->ride_type == 4)
                                                    <img src="{{asset('public/frontend/images/uberpremium.webp')}}" alt=""><br>
                                                    Uber Premium
                                                     @endif
                                            </td>
                                            <td>{{$current->amount}} TK</td>
                                            <td>
                                                @if($current->payment == 0)
                                                    <img src="{{asset('public/frontend/images/dollars.png')}}" alt="">
                                                    <br>Cash
                                                    @elseif($current->payment == 1)
                                                    <img src="{{asset('public/frontend/images/app.png')}}" alt=""><br>Mobile Banking
                                                    @elseif($current->payment == 2)
                                                    <img src="{{asset('public/frontend/images/card.png')}}" alt=""><br>Debit Card
                                                    @endif
                                            </td>
                                            <td>
                                                <a href="#accept{{$current->id}}" data-bs-toggle="modal" class="btn btn-sm btn-primary"><i class="fa-solid fa-check"></i> Accept </a>
                                                <a href="#decline{{$current->id}}" data-bs-toggle="modal" class="btn btn-sm btn-danger"><i class="fa-solid fa-xmark"></i> Decline</a>
                                            </td>

                                        </tr>

                                        <!-- Accept Ride-->
                                        <div class="modal fade" id="accept{{$current->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                             aria-hidden="true">
                                            <div class="modal-dialog " role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header text-center">
                                                        <h5 class="modal-title" id="exampleModalLabel">You have new ride.. </h5>
                                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">

                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <form action="{{route('update.status.accept', [$current->id])}}" method="post" >
                                                        @csrf
                                                        <!-- Save changes button-->
                                                            <h5><label class="text-dark">Keep your passenger safe! I accept the terms!</h5>
                                                            <button type="submit" class="btn btn-success" ><i class="fa-solid fa-truck"></i> Continue Ride</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Accept Ride-->

                                        <!-- Decline Ride-->
                                        <div class="modal fade" id="decline{{$current->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                             aria-hidden="true">
                                            <div class="modal-dialog " role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header text-center">
                                                        <h5 class="modal-title" id="exampleModalLabel">Do you want to Cancel the ride? </h5>
                                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">

                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <form action="{{route('update.status.decline', [$current->id])}}" method="post" >
                                                        @csrf
                                                        <!-- Save changes button-->
                                                            <h5><label class="text-danger">Your ride will be canceled and you are losing your earnings!</h5>
                                                            <button type="submit" class="btn btn-danger" ><i class="fa-solid fa-xmark"></i> Yes Cancel Ride</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Decline Ride-->
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                    <div class="row mb-4">
                        <div class="col-lg-12">
                            <h5 class="mb-3 mt-3">All Completed Ride:</h5>
                            <div class="current_ride_request_table table-responsive">
                                <table id="myTable2" class="display  table  table-striped table-hover table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Rider Name</th>
                                        <th>Mobile</th>
                                        <th>Destination</th>
                                        <th>Ride Type</th>
                                        <th>Amount</th>
                                        <th>Payment Method</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th>Rider Name</th>
                                        <th>Mobile</th>
                                        <th>Destination</th>
                                        <th>Ride Type</th>
                                        <th>Amount</th>
                                        <th>Payment Method</th>
                                        <th>Status</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($complete_ride as $complete)
                                        <tr>
                                            <td>1</td>
                                            <td>{{$complete->rider_name}}</td>
                                            <td>{{$complete->mobile}}</td>
                                            <td>
                                                Location:<strong>{{$complete->current_location}}</strong> <br>
                                                Destination:<strong>{{$complete->destination}}</strong> <br>
                                                Estimate: <strong>{{$complete->kilo}} KM</strong>
                                            </td>
                                            <td> @if($complete->ride_type == 0)
                                                    <img src="{{asset('public/frontend/images/moto.webp')}}" alt=""> <br> Uber Moto
                                                @elseif($complete->ride_type == 1)
                                                    <img src="{{asset('public/frontend/images/uberx.webp')}}" alt="">
                                                    <br> UberX

                                                @elseif($complete->ride_type == 2)
                                                    <img src="{{asset('public/frontend/images/uberxl.webp')}}" alt=""><br>
                                                    <br> Uber XL

                                                @elseif($complete->ride_type == 3)
                                                    <img style="filter: sepia(2);" src="{{asset('public/frontend/images/moto.webp')}}" alt=""><br>
                                                    Uber Eats

                                                @elseif($complete->ride_type == 4)
                                                    <img src="{{asset('public/frontend/images/uberpremium.webp')}}" alt=""><br>
                                                    Uber Premium
                                                @endif
                                            </td>
                                            <td>{{$complete->amount}} TK</td>
                                            <td>
                                                @if($complete->payment == 0)
                                                    <img src="{{asset('public/frontend/images/dollars.png')}}" alt="">
                                                    <br>Cash
                                                @elseif($complete->payment == 1)
                                                    <img src="{{asset('public/frontend/images/app.png')}}" alt=""><br>Mobile Banking
                                                @elseif($complete->payment == 2)
                                                    <img src="{{asset('public/frontend/images/card.png')}}" alt=""><br>Debit Card
                                                @endif
                                            </td>
                                            <td>
                                                <btn  class="btn btn-sm btn-success"><i class="fa-solid fa-truck"></i> Completed </btn>
                                            </td>

                                        </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                    <div class="row mb-4">
                        <div class="col-lg-12">
                            <h5 class="mb-3 mt-3 text-danger">All Canceled Ride:</h5>
                            <div class="current_ride_request_table table-responsive">
                                <table id="myTable3" class="display  table  table-striped table-hover table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Rider Name</th>
                                        <th>Mobile</th>
                                        <th>Destination</th>
                                        <th>Ride Type</th>
                                        <th>Amount</th>
                                        <th>Payment Method</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th>Rider Name</th>
                                        <th>Mobile</th>
                                        <th>Destination</th>
                                        <th>Ride Type</th>
                                        <th>Amount</th>
                                        <th>Payment Method</th>
                                        <th>Status</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>

                                        @foreach($cancel_ride as $complete)
                                            <tr>
                                                <td>1</td>
                                                <td>{{$complete->rider_name}}</td>
                                                <td>{{$complete->mobile}}</td>
                                                <td>
                                                    Location:<strong>{{$complete->current_location}}</strong> <br>
                                                    Destination:<strong>{{$complete->destination}}</strong> <br>
                                                    Estimate: <strong>{{$complete->kilo}} KM</strong>
                                                </td>
                                                <td> @if($complete->ride_type == 0)
                                                        <img src="{{asset('public/frontend/images/moto.webp')}}" alt=""> <br> Uber Moto
                                                    @elseif($complete->ride_type == 1)
                                                        <img src="{{asset('public/frontend/images/uberx.webp')}}" alt="">
                                                        <br> UberX

                                                    @elseif($complete->ride_type == 2)
                                                        <img src="{{asset('public/frontend/images/uberxl.webp')}}" alt=""><br>
                                                        <br> Uber XL

                                                    @elseif($complete->ride_type == 3)
                                                        <img style="filter: sepia(2);" src="{{asset('public/frontend/images/moto.webp')}}" alt=""><br>
                                                        Uber Eats

                                                    @elseif($complete->ride_type == 4)
                                                        <img src="{{asset('public/frontend/images/uberpremium.webp')}}" alt=""><br>
                                                        Uber Premium
                                                    @endif
                                                </td>
                                                <td>{{$complete->amount}} TK</td>
                                                <td>
                                                    @if($complete->payment == 0)
                                                        <img src="{{asset('public/frontend/images/dollars.png')}}" alt="">
                                                        <br>Cash
                                                    @elseif($complete->payment == 1)
                                                        <img src="{{asset('public/frontend/images/app.png')}}" alt=""><br>Mobile Banking
                                                    @elseif($complete->payment == 2)
                                                        <img src="{{asset('public/frontend/images/card.png')}}" alt=""><br>Debit Card
                                                    @endif
                                                </td>
                                                <td>
                                                    <btn  class="btn btn-sm btn-danger"><i class="fa-solid fa-rectangle-xmark"></i> Canceled </btn>
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
            <hr>




        </div>
    </div>

@endsection
