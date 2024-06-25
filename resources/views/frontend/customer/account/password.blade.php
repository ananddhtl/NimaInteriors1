@extends('welcome')
@section('title', 'change password :: Nimainteriors.com')

@section('content')

    @if (session('success'))
        <div id="snackbar">
            {{ session('success') }}
        </div>
    @endif

    <div class="container">
        <div class="user-profile">
            @include('frontend.customer.account.sidebar')
            <div class="user-description">
                <h5>User Information</h5>
                <div class="user-info">
                    <form method="POST" action="{{ route_with_locale('profile.password.update') }}">
                        @csrf
                        <div class="whole-form">
                            <div class="info-box">
                                <label for="currentpassword">Current Password <span>*</span></label>
                                <input type="password" id="currentpassword" name="currentpassword" >
                                @if ($errors->has('currentpassword'))
                                    <div class="error-message">
                                        <p>{{ $errors->first('currentpassword') }}</p>
                                    </div>
                                @endif
                            </div>
                            <div class="info-box">
                                <label for="newpassword">New Password <span>*</span></label>
                                <input type="password" id="newpassword" name="newpassword" >
                                @if ($errors->has('newpassword'))
                                    <div class="error-message">
                                        <p>{{ $errors->first('newpassword') }}</p>
                                    </div>
                                @endif
                            </div>
                            <div class="info-box">
                                <label for="confirmpassword">Confirm Password <span>*</span></label>
                                <input type="password" id="confirmpassword" name="newpassword_confirmation" >
                                @if ($errors->has('newpassword_confirmation'))
                                    <div class="error-message">
                                        <p>{{ $errors->first('newpassword_confirmation') }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <button type="submit" class="submit-btn">Update Information</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection

{{-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        const menuItems = document.querySelectorAll('.left-bar ul li');
        const sections = document.querySelectorAll('.card-body > div');
        const cardHeader = document.getElementById('card-header');
    
        menuItems.forEach(item => {
            item.addEventListener('click', function() {
                const contentId = this.getAttribute('data-content');
                const headerText = this.getAttribute('data-header');
    
                sections.forEach(section => {
                    if (section.id === contentId) {
                        section.classList.remove('hidden');
                    } else {
                        section.classList.add('hidden');
                    }
                });
    
                menuItems.forEach(menuItem => {
                    menuItem.classList.remove('active');
                });
                this.classList.add('active');
    
                // Update the card header
                cardHeader.textContent = headerText;
            });
        });
    
        const defaultContentId = document.querySelector('.left-bar li.active').getAttribute('data-content');
        document.getElementById(defaultContentId).classList.remove('hidden');
    
        const defaultHeaderText = document.querySelector('.left-bar li.active').getAttribute('data-header');
        cardHeader.textContent = defaultHeaderText;
    });
    </script>
     --}}
