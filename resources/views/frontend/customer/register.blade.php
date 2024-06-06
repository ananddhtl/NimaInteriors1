@extends('welcome')
@section('title','Register :: Nimainteriors.com')

@section('content')



<section class="page">
<div class="customer-container container-fluid">
    <div class="row row-height">
     
          
        <div class=" d-flex flex-column content-center">
            <div class="container my-auto py-5">
                <div class="row">
                    <div class="col-lg-9 col-xl-7 mx-auto position-relative">
                        <form action="{{ route('customer.normaluserdata') }}" class="input_style_1" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="full_name">Full Name</label>
                                <input type="text" name="fullname" id="full_name" class="form-control">
                                @error('fullname')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email_address">Email Address</label>
                                <input type="email" name="email" id="email_address" class="form-control">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password1">Password</label>
                                <input type="password" name="password1" id="password1" class="form-control">
                                @error('password1')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password2">Confirm Password</label>
                                <input type="password" name="password2" id="password2" class="form-control">
                                @error('password2')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div id="pass-info" class="clearfix"></div>
                            <div class="mb-4">
                                <label class="container_check">I agree to the <a href="#"
                                        data-bs-toggle="modal" data-bs-target="#terms-txt">Terms and Privacy
                                        Policy</a>.
                                    <input type="checkbox" name="agree_terms">
                                    <span class="checkmark"></span>
                                </label>
                                @error('agree_terms')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn_1 full-width">Sign Up</button>
                        </form>
                        <p class="text-center mt-3 mb-0">Already have an account? <a href="{{route('customer.login')}}">Sign In</a></p>
                   
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
