@extends('welcome')
@section('title','login :: Nimainteriors.com')

@section('content')


<section class="page">
<div class="customer-container container-fluid">
    <div class="row row-height">
        
        <div class=" d-flex flex-column content-center">
            <div class="container my-auto py-5">
                <div class="row">
                    <div class="col-lg-9 col-xl-7 mx-auto position-relative">
                        <form action="{{ route('customer.login.post') }}" class="input_style_1" method="post">
                            @csrf
                        
                        
                            @if ($errors->has('email') || $errors->has('password'))
                                <div class="alert alert-danger" role="alert">
                                    Incorrect email or password.
                                </div>
                            @endif
                        
                            <div class="form-group">
                                <label for="email_address">Email Address</label>
                                <input type="email" name="email" id="email_address" class="form-control">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <div class="float-start">
                                    <label class="container_check">Remember Me
                                        <input type="checkbox" name="remember">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="float-end">
                                    <a class="ml-2" id="forgot" href="{{ route('customer.forgotpassword') }}">Forgot Password?</a>
                                </div>
                            </div>
                        
                            <button type="submit" class="btn_1 full-width">Login</button>
                        </form>
                        <p class="text-center mt-3 mb-0">Don't have an account? <a href="{{route('customer.register')}}">Sign Up</a></p>
                    
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- /row -->
</div>
</section>
@endsection
<!-- /container -->

<!-- COMMON SCRIPTS -->
<script src="js/common_scripts.js"></script>
<script src="js/common_func.js"></script>
