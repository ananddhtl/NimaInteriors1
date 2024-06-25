@extends('welcome')
@section('title','forgort password :: Nimainteriors.com')

@section('content')


<section class="page">
<div class="customer-container container-fluid">
    <div class="row row-height">
       
        <div class=" d-flex flex-column content-center">
            <div class="container my-auto py-5">
                <div class="row">
                    <div class="col-lg-9 col-xl-7 mx-auto position-relative">
                        <form action="{{ route_with_locale('customer.forgot.password') }}" class="input_style_1" method="post">
                            @csrf
                                                
                            <div>
                                <h4 class="mb-3">Forgot Password</h4>
                                @if ($errors->has('email'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="email">Login email</label>
                                    <input type="email" class="form-control" name="email" id="email">
                                </div>
                                <p>You will receive an email containing a link allowing you to reset your password to a new preferred one.</p>
                                <div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
                            </div>
                        </form>
                        <p class="text-center mt-3 mb-0">Already have an account? <a href="{{route_with_locale('customer.login')}}">Sign In</a></p>
                   
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
