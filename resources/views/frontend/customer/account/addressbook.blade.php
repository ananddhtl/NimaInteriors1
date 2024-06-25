@extends('welcome')
@section('title', 'change password :: Nimainteriors.com')

@section('content')


<div id="newModal" class="new-modal">
    <div class="new-modal-content">
        <div class="new-modal-header">
            <div class="address-modal-title">
                <h4>Edit Address</h4>
            </div>
            <div class="close-modal">
                <span class="modal-close">&times;</span>
            </div>
        </div>
        <div class="new-modal-body">
            <form id="addressForm" action="{{ route_with_locale('address.update') }}" method="POST">
                @csrf
               
                <input type="hidden" name="id" id="addressId">
                <div class="address-change">
                    <div class="address-box">
                        <label for="addresstype">Address Type : <span>*</span></label>
                        <div>
                            <input type="radio" id="home" name="addresstype" value="home" required>
                            <label for="home">Home</label>
                        </div>
                        <div>
                            <input type="radio" id="work" name="addresstype" value="work" required>
                            <label for="work">Work</label>
                        </div>
                        <div>
                            <input type="radio" id="otherwise" name="addresstype" value="otherwise" required>
                            <label for="otherwise">Otherwise</label>
                        </div>
                    </div>
                    <div class="address-box">
                        <label for="fullname">Full Name : <span>*</span></label>
                        <input type="text" name="fullname" id="fullname" placeholder="Enter Your Full Name" required>
                    </div>
                    <div class="address-box">
                        <label for="postcode">Post Code : <span>*</span></label>
                        <input type="text" name="postcode" id="postcode" placeholder="Enter Post Code" required>
                    </div>
                    <div class="address-box">
                        <label for="houseno">House No : <span>*</span></label>
                        <input type="text" name="houseno" id="houseno" placeholder="Enter House No" required>
                    </div>
                    <div class="address-box">
                        <label for="addition">Addition : <span>*</span></label>
                        <input type="text" name="addition" id="addition" placeholder="Enter Addition" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>


    <div class="container">
        <div class="user-profile">
            @include('frontend.customer.account.sidebar')


            <div class="user-description">
    <h5>Your Address Book</h5>

    @if($data->isEmpty())
        <a href="{{ route_with_locale('add.address') }}">
            <button>Add Address Book</button>
        </a>
    @endif

    <div class="user-info address-billing">
        <ul>
            @foreach ($data as $address)
                <li><strong>Address:</strong> {{ $address->addresstype }}</li>
                <li><strong>Full Name:</strong> {{ $address->fullname }}</li>
                <li><strong>Post Code:</strong> {{ $address->postcode }}</li>
                <li><strong>House No:</strong> {{ $address->houseno }}</li>
                <li><strong>Addition:</strong> {{ $address->addition }}</li>
                <div class="default-address">
                    <li>Default Delivery Address</li>
                    <li>Default Billing Address</li>
                </div>
                <p class="edit-address" data-id="{{ $address->id }}"
                   data-addresstype="{{ $address->addresstype }}" data-fullname="{{ $address->fullname }}"
                   data-postcode="{{ $address->postcode }}" data-houseno="{{ $address->housenumber }}"
                   data-addition="{{ $address->addition }}">Edit</p>
            @endforeach
        </ul>
    </div>
</div>

        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.edit-address').forEach(function(button) {
        button.addEventListener('click', function() {
            // Get the data from the button's data attributes
            const id = this.getAttribute('data-id');
            const addresstype = this.getAttribute('data-addresstype');
            const fullname = this.getAttribute('data-fullname');
            const postcode = this.getAttribute('data-postcode');
            const houseno = this.getAttribute('data-houseno');
            const addition = this.getAttribute('data-addition');

            // Fill the form inputs with the data
            document.getElementById('addressId').value = id;
            document.getElementById('fullname').value = fullname;
            document.getElementById('postcode').value = postcode;
            document.getElementById('houseno').value = houseno;
            document.getElementById('addition').value = addition;

            // Check the appropriate radio button
            document.querySelector(`input[name="addresstype"][value="${addresstype}"]`).checked = true;

            // Show the modal
            document.getElementById('newModal').style.display = 'block';
        });
    });

    // Close the modal
    document.querySelector('.modal-close').addEventListener('click', function() {
        document.getElementById('newModal').style.display = 'none';
    });
});
</script>

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
