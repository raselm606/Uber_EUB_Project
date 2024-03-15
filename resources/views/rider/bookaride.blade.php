@extends('layouts.app')
@section('content')
    <div class="signup mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-7 mb-3">
                    <h4 >Let's Ride</h4>
                    @if(session()->has('msg'))
                        <div class="alert alert-{{session()->get('alert-type')}}  alert-dismissible fade show" role="alert">
                            {{ session()->get('msg') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="{{route('bookaride')}}" method="post">
                        @csrf
                        <div class="card main_form">
                            <div class="card-body p-5">
                                <div class="mb-3">
                                    <label for="rider_name" class="form-label">Rider Name</label>
                                    <input type="text" class="form-control" id="rider_name" name="rider_name" value="{{old('rider_name')}}">
                                    @error('rider_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="mobile" class="form-label">Mobile Number</label>
                                    <input type="text" class="form-control" id="mobile" name="mobile" value="{{old('mobile')}}">
                                    @error('mobile')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="current_location"   class="form-label">Enter Location</label>
                                    <select name="current_location" id="current_location" class="form-select" aria-label="Default select example">
                                        <option value="">Select Location</option>
                                        <option value="Mirpur 1">Mirpur 1</option>
                                        <option value="Mirpur 2">Mirpur 2</option>
                                        <option value="Mirpur 10">Mirpur 10</option>
                                        <option value="Mirpur 11">Mirpur 11</option>
                                        <option value="Mirpur 12">Mirpur 12</option>
                                    </select>
                                    @error('current_location')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="destination" class="form-label">Enter Destination</label>
                                    <select name="destination" id="destination" class="form-select" aria-label="Default select example">
                                        <option value="">Select Destination</option>
                                        <option value="Uttara">Uttara</option>
                                        <option value="Danmondi">Danmondi</option>
                                        <option value="Mohammadpur">Mohammadpur</option>
                                        <option value="Kajipara">Kajipara</option>
                                        <option value="Motijil">Motijil</option>
                                    </select>
                                    @error('destination')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="payment" class="form-label">Payment Method:</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="payment" id="inlineRadio1" value="0">
                                        <label class="form-check-label" for="inlineRadio1">Cash</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="payment" id="inlineRadio2" value="1">
                                        <label class="form-check-label" for="inlineRadio2">Mobile Banking</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="payment" id="inlineRadio3" value="2" >
                                        <label class="form-check-label" for="inlineRadio3">Debit Card</label>
                                    </div>
                                    <br>
                                    @error('payment')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="ride_type" class="form-label">Choose a ride:</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ride_type" id="ride_type" value="0">
                                        <img src="{{asset('public/frontend/images/moto.webp')}}" alt=""><br>
                                        <label class="form-check-label" for="inlineRadio1">Uber Moto</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ride_type" id="ride_type" value="1">
                                        <img src="{{asset('public/frontend/images/uberx.webp')}}" alt=""><br>
                                        <label class="form-check-label" for="inlineRadio2">UberX</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ride_type" id="ride_type" value="2">
                                        <img src="{{asset('public/frontend/images/uberxl.webp')}}" alt=""><br>
                                        <label class="form-check-label" for="inlineRadio2">Uber XL</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ride_type" id="ride_type" value="3">
                                        <img style="filter: sepia(2);" src="{{asset('public/frontend/images/moto.webp')}}" alt=""><br>
                                        <label class="form-check-label" for="inlineRadio2">Uber Eats</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ride_type" id="ride_type" value="4" >
                                        <img src="{{asset('public/frontend/images/uberpremium.webp')}}" alt=""><br>
                                        <label class="form-check-label" for="inlineRadio3">Uber Premium</label>
                                    </div>
                                    <br>

                                    @error('ride_type')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 mt-5 d-grid ">
                                    <button class="btn btn-block btn-lg p-3 btn-dark" type="submit">Book Now</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-5 mb-3 mt-4">
                    <div class="ride_map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.9697758592!2d90.3427145751207!3d23.784090587482492!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c08d0c699e55%3A0xc18e7cac04034b1b!2sEuropean%20University%20of%20Bangladesh!5e0!3m2!1sen!2sbd!4v1710497568522!5m2!1sen!2sbd"
                            width="100%"  height="650" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
