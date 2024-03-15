@extends('layouts.app')
@section('content')
    <div class="signup mt-5 mb-5 vh-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h4 class="text-center">Please Login Here</h4>
                    @if(session()->has('msg'))
                        <div class="alert alert-{{session()->get('alert-type')}}  alert-dismissible fade show" role="alert">
                            {{ session()->get('msg') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="{{route('login_submit')}}" method="post">
                        @csrf
                        <div class="card main_form">
                            <div class="card-body p-5">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}">
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
                                <div class="mb-3 d-grid ">
                                    <button class="btn btn-block btn-lg btn-dark" type="submit">Login</button>
                                </div>
                                <p class="text-center">Don't have an account? <a href="{{route('signup')}}">Signup Here</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
