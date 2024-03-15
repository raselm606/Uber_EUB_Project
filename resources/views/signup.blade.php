@extends('layouts.app')
@section('content')
    <div class="signup mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h4 class="text-center">Please Signup here</h4>
                    @if(session()->has('msg'))
                        <div class="alert alert-{{session()->get('alert-type')}}  alert-dismissible fade show" role="alert">
                            {{ session()->get('msg') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="{{route('signup')}}" method="post">
                        @csrf
                        <div class="card main_form">
                            <div class="card-body p-5">
                                <div class="mb-3">
                                    <label for="" class="form-label">I want to</label>
                                    <select name="user_type" class="form-select" aria-label="Default select example">
                                        <option value="1">Ride</option>
                                        <option value="2">Drive</option>
                                    </select>
                                    @error('user_type')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="fname" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="fname" name="fname" value="{{old('fname')}}">
                                    @error('fname')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="lname" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="lname" name="lname" value="{{old('lname')}}">
                                    @error('lname')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone')}}">
                                    @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"  >
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="retype_password" class="form-label">Retype Password</label>
                                    <input type="password" class="form-control" id="retype_password" name="retype_password"  >
                                    @error('retype_password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 d-grid ">
                                    <button class="btn btn-block btn-lg btn-dark" type="submit">Sign Up</button>
                                </div>
                                <p class="text-center">Already have an account? <a href="{{route('login')}}">Login Here</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
