@extends('welcome')
@section('title','change password :: Nimainteriors.com')

@section('content')


<section class="page">
<div class="customer-container container-fluid">
    <div class="row row-height">
      
        <div class=" d-flex flex-column content-center">
            <div class="container my-auto py-5">
                <div class="row">
                    <div class="col-lg-9 col-xl-7 mx-auto position-relative">
                        <form action="{{ route('customer.change.password') }}" class="input_style_1" method="post">
                            @csrf
                                                                                                
                            <div>
                                <h4 class="mb-3">Change Password</h4>
                                @if ($errors->any())
                                    <div class="alert alert-danger" role="alert">
                                        {{ $errors->first() }}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="new_password">New Password</label>
                                    <input type="password" class="form-control" name="new_password" id="new_password">
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input type="password" class="form-control" name="confirm_password" id="confirm_password">
                                </div>
                                                                            
                                <div class="text-center"><input type="submit" value="Change Password" class="btn_1"></div>
                            </div>
                        </form>
                        
                        
                        
                        
                        <p class="text-center mt-3 mb-0">Already have an account? <a href="/customer/login">Sign In</a></p>
                   
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