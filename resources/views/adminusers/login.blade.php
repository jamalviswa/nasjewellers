@extends('layouts.login')
@section('content')
<!-- Login Content Section Start -->
<div class="auth-content my-auto">
    <div class="text-center">
        <h5 class="mb-0">Welcome Back !</h5>
        <p class="text-muted mt-2">Sign in to continue</p>
    </div>
    <form id="basic-form" action="{{ route('adminusers.store') }}" class="mt-4 pt-2" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" autocomplete="off" value="{{old('email')}}" placeholder="Enter Your Email" name="email">
            @error('email')
            <div class="text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <div class="d-flex align-items-start">
                <div class="flex-grow-1">
                    <label class="form-label">Password</label>
                </div>
                <div class="flex-shrink-0">
                    <div class="">
                        <a href="{{ route('adminusers.forgotpassword') }}" class="text-muted">Forgot password?</a>
                    </div>
                </div>
            </div>
            <div class="input-group auth-pass-inputgroup">
                <input type="password" class="form-control" autocomplete="off" value="{{old('password')}}" name="password" placeholder="Enter Your password" aria-label="Password" aria-describedby="password-addon">
                <button class="btn btn-light shadow-none ms-0" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
            </div>
            @error('password')
            <div class="text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <button class="btn btn-success w-100 waves-effect waves-light" type="submit">Log In</button>
        </div>
    </form>
</div>
<!-- Login Content Section End -->
@endsection