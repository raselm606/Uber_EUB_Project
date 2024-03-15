@extends('layouts.app')
@section('content')
    <div class="slider_section dark_section">
        <div class="container">
            <div class="row justify-content-center align-items-center pt-5 pb-5">
                <div class="col-lg-6 mb-3">
                    <div class="left_text">
                        <h1>Go anywhere with Uber</h1>
                        <p>Request a ride, hop in, and go.</p>
                        <a class="btn btn-secondary" href="{{url('/signup')}}">See Details</a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="uber_img">
                        <img width="100%" src="{{asset('public/frontend/images/slider.webp')}}" alt="slide_image">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="drive_seciton section_padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-3">
                    <div class="drive_image mb-3">
                        <img src="{{asset('public/frontend/images/earner-illustra.webp')}}" alt="drive_image">
                    </div>
                </div>
                <div class=" col-lg-6 mb-3">
                    <div class="drive_text mb-3">
                        <h1 class="mb-4">Drive when you want, <br>make what you need</h1>
                        <p>Make money on your schedule with deliveries or rides—or both. You can use your own car or choose a rental through Uber.</p>
                        <a href="{{route('signup')}}" class="btn btn-dark">Signup to Get started</a>
                    </div>
                </div>
            </div>

            <div class="row align-items-center mt-5">
                <div class=" col-lg-6 mb-3">
                    <div class="drive_text mb-3">
                        <h1 class="mb-4">The Uber you know, <br> reimagined for business</h1>
                        <p>Uber for Business is a platform for managing global rides and meals, and local deliveries, for companies of any size.</p>
                        <a href="{{route('login')}}" class="btn btn-dark">Login to Get started</a>
                    </div>
                </div>

                <div class="col-lg-6 mb-3">
                    <div class="drive_image mb-3">
                        <img src="{{asset('public/frontend/images/u4b-square.webp')}}" alt="drive_image">
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endsection
