

@extends('layouts.app')
@section('content')
    <div class="signup mt-5 mb-5 vh-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                        <div class="card-body">

                            <h1>Email Verification</h1>
                            <p>Please verify your email address by clicking the link in the email we sent you. Otherwise you can't Book a Ride.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
