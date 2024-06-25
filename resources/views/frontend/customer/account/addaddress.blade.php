@extends('welcome')
@section('title', 'change password :: Nimainteriors.com')

@section('content')




    <div class="container">
        <div class="user-profile">
            @include('frontend.customer.account.sidebar')
            <div class="user-description">
                <h5>User Information</h5>
                <div class="user-info">
                <form id="addressForm" method="POST" action="{{ route_with_locale('storeaddressbook',['locale' => app()->getLocale()]) }}">
    @csrf
    <div class="whole-form">
        <div class="info-box">
            <label for="name">Where do you want this address:</label>

            <input type="radio" id="home" name="addresstype" value="home"
                {{ old('addresstype') == 'home' ? 'checked' : '' }}>
            <label for="home">Home</label>
        </div>

        <div class="info-box">
            <input type="radio" id="work" name="addresstype" value="work"
                {{ old('addresstype') == 'work' ? 'checked' : '' }}>
            <label for="work">Work</label>
        </div>

        <div class="info-box">
            <input type="radio" id="otherwise" name="addresstype" value="otherwise"
                {{ old('addresstype') == 'otherwise' ? 'checked' : '' }}>
            <label for="otherwise">Otherwise</label>
        </div>

        <div class="info-box">
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" value="{{ old('fullname') }}" required>
            @error('fullname')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="info-box">
            <label for="postalCode">Postal Code:</label>
            <input type="text" id="postalCode" name="postalCode" value="{{ old('postalCode') }}" required>
            @error('postalCode')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="info-box">
            <label for="houseNo">House No.:</label>
            <input type="text" id="houseNo" name="houseNo" value="{{ old('houseNo') }}" required>
            @error('houseNo')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="info-box">
            <label for="additional">Addition :</label>
            <input type="text" id="additional" name="additional" value="{{ old('additional') }}">
            @error('additional')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <button type="submit" class="submit-btn">Update Address Book</button>
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
