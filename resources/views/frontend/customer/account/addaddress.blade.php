@extends('welcome')
@section('title', 'change password :: Nimainteriors.com')

@section('content')

    <section class="page profile">
        <div class="container-fluid customer-container">
            <div class="row-height c-account">
                <div class="row">
                    @include('frontend.customer.account.sidebar')
                    <div class="col-lg-10 right-form show-d">
                        <div class="profile-setting">
                            <div class="card">
                                <div class="card-header" id="card-header">Add Address Book</div>
                                <div class="card-body">


                                    <form id="addressForm" method="POST" action="{{ route('storeaddressbook') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12 form-group">
                                                <label for="name">Where do you want this address:</label>
                                                <div>
                                                    <input type="checkbox" id="home" name="addresstype[]"
                                                        value="home">
                                                    <label for="home">Home</label>
                                                </div>
                                                <div>
                                                    <input type="checkbox" id="work" name="addresstype[]"
                                                        value="work">
                                                    <label for="work">Work</label>
                                                </div>
                                                <div>
                                                    <input type="checkbox" id="otherwise" name="addresstype[]"
                                                        value="otherwise">
                                                    <label for="otherwise">Otherwise</label>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 form-group">
                                                <label for="fullname">Full Name:</label>
                                                <input type="text" id="fullname" name="fullname" required>
                                            </div>
                                            <div class="col-lg-12 form-group">
                                                <label for="postalCode">Postal Code:</label>
                                                <input type="text" id="postalCode" name="postalCode" required>
                                            </div>
                                            <div class="col-lg-12 form-group">
                                                <label for="houseNo">House No.:</label>
                                                <input type="text" id="houseNo" name="houseNo" required>
                                            </div>
                                            <div class="col-lg-12 form-group">
                                                <label for="additional">Addition :</label>
                                                <input type="text" id="additional" name="additional">
                                            </div>

                                            <div class="col-lg-12">
                                                <button class="btn btn-secondary" type="submit">Save Address</button>
                                            </div>
                                        </div>
                                    </form>


                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        </div>
    </section>

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