@extends('layouts.auth')

@section('title', 'Đăng Nhập')

@section('content')
<div class="row bg-white">
    <!-- The image half -->
    <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent-3">
        <div class="row w-100 mx-auto text-center">
            <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto w-100">
                <img src="{{ asset('assets/images/media/pngs/5.png') }}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
            </div>
        </div>
    </div>
    <!-- The content half -->
    <div class="col-md-6 col-lg-6 col-xl-5 bg-white py-4">
        <div class="login d-flex align-items-center py-2">
            <!-- Demo content-->
            <div class="container p-0">
                <div class="row">
                    <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                        <div class="card-sigin">
                            <div class="mb-5 d-flex">
                                <a href="/" class="header-logo"><img src="{{ asset('assets/images/brand-logos/desktop-logo.png') }}" class="desktop-logo ht-40" alt="logo">
                                    <img src="{{ asset('assets/images/brand-logos/desktop-white.png') }}" class="desktop-white ht-40" alt="logo">
                                </a>
                            </div>
                            <div class="card-sigin">
                                <div class="main-signup-header">
                                    <h3>Welcome back!</h3>
                                    <h6 class="fw-medium mb-4 fs-17">Please sign in to continue.</h6>
                                    @if ($errors->any())
                                        @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger" role="alert">
                                            {{ $error }}
                                        </div>
                                        @endforeach
                                    @endif
                                    <form action="" method="post" autocomplete="on" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <label class="form-label">Email</label>
                                            <input class="form-control" name="email" placeholder="Enter your email" type="text" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label">Password</label>
                                            <input class="form-control" name="password" placeholder="Enter your password" type="password" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block w-100">Sign In</button>
                                        <!-- <div class="row mt-3">
                                            <div class="col-sm-6">
                                                <button class="btn btn-block w-100 btn-facebook"><i class="fab fa-facebook-f me-2"></i> Signup with
                                                    Facebook</button>
                                            </div>
                                            <div class="col-sm-6 mt-2 mt-sm-0">
                                                <button class="btn btn-info btn-block w-100"><i class="fab fa-twitter me-2"></i> Signup with
                                                    Twitter</button>
                                            </div>
                                        </div> -->
                                    </form>
                                    <!-- <div class="main-signin-footer mt-5">
                                        <p class="mb-1"><a href="forgot.html">Forgot password?</a></p>
                                        <p>Don't have an account? <a href="signup.html">Create an
                                                Account</a></p>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End -->
        </div>
    </div><!-- End -->
</div>
@endsection