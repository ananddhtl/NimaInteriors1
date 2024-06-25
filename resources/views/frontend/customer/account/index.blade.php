@extends('welcome')
@section('title', 'change password :: Nimainteriors.com')

@section('content')
    @if (session('success'))
        <div id="snackbar">
            {{ session('success') }}
        </div>
    @endif
    <div id="newModal" class="new-modal">

        <div class="new-modal-content">
            <div class="new-modal-header">
                <div class="address-modal-title">
                    <h4>Update Information</h4>
                </div>
                <div class="close-modal">
                    <span class="modal-close">&times;</span>
                </div>


            </div>
            <div class="new-modal-body">
                <form method="POST" action="{{ route_with_locale('profile.update') }}">
                    @csrf
                    <div class="address-change">
                        <div class="address-box">
                            <label for="">Full Name : <span>*</span></label>
                            <input type="text" id="name" name="name" value="{{ auth()->user()->fullname }}"
                                required>
                        </div>
                        <div class="address-box">
                            <label for="">Gender : <span>*</span></label>
                            <select id="gender" name="gender" class="form-control" required>
                                <option value="">Select Gender</option>
                                <option value="male" {{ auth()->user()->gender == 'male' ? 'selected' : '' }}>Male
                                </option>
                                <option value="female" {{ auth()->user()->gender == 'female' ? 'selected' : '' }}>Female
                                </option>
                                <option value="other" {{ auth()->user()->gender == 'other' ? 'selected' : '' }}>Other
                                </option>
                            </select>
                        </div>
                        <div class="address-box">
                            <label for="">Mobile No : <span>*</span></label>
                            <input type="number" id="email" name="phonenumber"
                                value="{{ auth()->user()->phonenumber }}" required>
                        </div>
                        <div class="address-box">
                            <label for="">DOB : <span>*</span></label>
                            <input type="date" id="email" name="dob" value="{{ auth()->user()->dob }}" required>
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
                <h5>Your Information</h5>

                <div class="user-info address-billing">
                    <ul>

                        <li><strong>Full Name:</strong> {{ auth()->user()->fullname }}</li>
                        <li><strong>Gender:</strong> {{ auth()->user()->gender }}</li>
                        <li><strong>Contact :</strong> {{ auth()->user()->phonenumber }}</li>
                        <li><strong>DOB:</strong> {{ auth()->user()->dob }}</li>


                        <p id="modalbtn" class="edit-address">Edit</p>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <script>
        var modal = document.getElementById("newModal");
        var btn = document.getElementById("modalbtn");
        var span = document.getElementsByClassName("modal-close")[0];

        btn.onclick = function() {
            modal.style.display = "block";
        }

        span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
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
