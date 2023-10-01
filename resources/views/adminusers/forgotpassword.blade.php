@extends('layouts.login')
@section('content')
<!-- Forgot Password Content Section Start -->
<div class="auth-content my-auto">
    <div class="text-center">
        <h5 class="mb-0">Reset Password</h5>
    </div>
    <div class="alert alert-primary text-center my-4" role="alert">
        Enter your Email and instructions will be sent to you!
    </div>
    <form id="basic-form" action="" class="mt-4" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" autocomplete="off" value="{{old('email')}}" placeholder="Enter Email" name="email">
            @error('email')
            <div class="text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 mt-4">
            <button class="btn btn-success w-100 waves-effect waves-light" type="submit">Submit</button>
        </div>
    </form>
    <div class="mt-5 text-center">
        <p class="text-muted mb-0">Remember It ? <a href="{{ route('adminusers.login') }}" class="text-success fw-semibold"> Sign In </a> </p>
    </div>
</div>
<!-- Forgot Password Content Section End -->
@endsection