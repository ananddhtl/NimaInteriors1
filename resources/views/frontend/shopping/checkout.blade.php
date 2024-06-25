@extends('welcome')
@section('title', 'Checkout :: Nimainteriors.com')

@section('content')
<style>
    .error-message {
        color: red;
        font-size: 12px;
        display: none;
    }
</style>
<section class="container mt-container">
    <div class="checkout">
        <div class="progress-line">
            <div class="flex-progress">
                <div class="line-absolute">
                    <p class="active-para">Information</p>
                    <i class="fa-regular fa-circle-check active-i"></i>
                </div>
                <div class="line-absolute text-align-center">
                    <p>Delivery</p>
                    <i class="fa-regular fa-circle-check"></i>
                </div>
                <div class="line-absolute text-align-center">
                    <p>Overview</p>
                    <i class="fa-regular fa-circle-check"></i>
                </div>
                <div class="line-absolute text-align-right">
                    <p>Payment</p>
                    <i class="fa-regular fa-circle-check"></i>
                </div>
            </div>
    
            <div class="line-progress">
                <div class="progress-relative"></div>
                <div class="progress-absolute" style="width: 15%;"></div>
            </div>
        </div>
        <div class="pay-section d-flex row">
            <!-- Cart -->
            <div class="cart-part col-lg-8 col-md-10 col-sm-12">
                <h3 class="head-color">Your Information</h3>
                <div class="order-type">
                    <div class="order-list private-list cart-active-list">
                        <p>Private</p>
                    </div>
                    <div class="order-list business-list">
                        <p>Business</p>
                    </div>
                </div>
                <form action="{{route_with_locale('ordercheckout',['locale' => app()->getLocale()]) }}" class="form-address" method="POST">
                    @csrf
                    <div class="business-form" id="business-form"
                        style="{{ session('order_data.active_tab') === 'Business' ? 'display: block;' : 'display: none;' }}">
                        <!-- Business form -->
                        <input type="hidden" id="active-tab" name="active_tab" value="Business">
                        <div class="new-form">
                            <label>Company name : *</label>
                            <input type="text" name="companyname" placeholder="Company Name" id="company-name"
                                value="{{ session('order_data.companyname') }}">
                            <span class="error-message" id="company-name-error"></span>
                        </div>
                        <div class="new-form">
                            <label>Reference No : (Optional)</label>
                            <input type="number" name="refno" placeholder="Reference No" id="reference-no"
                                value="{{ session('order_data.refno') }}">
                            <span class="error-message" id="reference-no-error"></span>
                        </div>
                        <div class="new-form">
                            <label>VAT Number : *</label>
                            <input type="number" name="vatno" placeholder="VAT Number" id="vat-number"
                                value="{{ session('order_data.vatno') }}">
                            <span class="error-message" id="vat-number-error"></span>
                        </div>
                        <div class="private-div">
                            <div class="private-form-new">
                                <div class="private-form">
                                    <label>First Name : *</label>
                                    <input type="text" name="fname" placeholder="First Name" id="business-first-name"
                                        value="{{ session('order_data.fname') }}">
                                    <span class="error-message" id="business-first-name-error"></span>
                                </div>
                                <div class="private-form">
                                    <label>Last Name : *</label>
                                    <input type="text" name="lname" placeholder="Last Name" id="business-last-name"
                                        value="{{ session('order_data.lname') }}">
                                    <span class="error-message" id="business-last-name-error"></span>
                                </div>
                            </div>
                            <div class="postal">
                                <label>Postal Code or municipality : *</label>
                                <input type="text" name="postalcode" placeholder="Eg. 2150 Borsbeek"
                                    id="business-postal-code" value="{{ session('order_data.postalcode') }}">
                                <span class="error-message" id="business-postal-code-error"></span>
                            </div>
                            <div class="postal">
                                <label>Street Name : *</label>
                                <input type="text" name="streetname" placeholder="Street Name" id="business-street-name"
                                    value="{{ session('order_data.streetname') }}">
                                <span class="error-message" id="business-street-name-error"></span>
                            </div>
                            <div class="house-state-no">
                                <div class="input-sate">
                                    <label for="">House number *</label>
                                    <input type="text" name="houseno" placeholder="Eg: 124" id="business-house-number"
                                        value="{{ session('order_data.houseno') }}">
                                    <span class="error-message" id="business-house-number-error"></span>
                                </div>
                                {{-- <div class="input-sate">
                                    <label for="">Suffix *</label>
                                    <input type="text" name="suffix" placeholder="Eg: A" id="business-suffix"
                                        value="{{ session('order_data.suffix') }}">
                                    <span class="error-message" id="business-suffix-error"></span>
                                </div> --}}
                                <div class="input-sate">
                                    <label for="">Bus No. (Optional)</label>
                                    <input type="text" name="busno" placeholder="Eg: 124" id="business-bus-number"
                                        value="{{ session('order_data.busno') }}">
                                    <span class="error-message" id="business-bus-number-error"></span>
                                </div>
                            </div>
                            <div class="house-state-no">
                                <div class="input-sate">
                                    <label for="">Phone No. *</label>
                                    <input type="text" name="phoneno" placeholder=""
                                        id="business-phone-number" value="{{ session('order_data.phoneno') }}">
                                    <span class="error-message" id="business-phone-number-error"></span>
                                </div>
                            </div>
                        </div>
                    </div> 
    
                    <div class="private-div" id="private-form"
                        style="{{ session('order_data.active_tab') === 'Private' ? 'display: block;' : 'display: none;' }}">
                        <!-- Private form -->
                        <input type="hidden" id="active-tab" name="active_tab" value="Private">
                        <div class="private-form-new">
                            <div class="private-form">
                                <label>First Name : *</label>
                                <input type="text" name="fname" placeholder="First Name" id="first-name"
                                    value="{{ session('order_data.fname') }}">
                                <span class="error-message" id="first-name-error"></span>
                            </div>
                            <div class="private-form">
                                <label>Last Name : *</label>
                                <input type="text" name="lname" placeholder="Last Name" id="last-name"
                                    value="{{ session('order_data.lname') }}">
                                <span class="error-message" id="last-name-error"></span>
                            </div>
                        </div>
                        <div class="postal">
                            <label>Postal Code or municipality : *</label>
                            <input type="text" name="postalcode" placeholder="Eg : 1200 / Pokhara" id="postal-code"
                                value="{{ session('order_data.postalcode') }}">
                            <span class="error-message" id="postal-code-error"></span>
                        </div>
                        <div class="postal">
                            <label>Street Name : *</label>
                            <input type="text" name="streetname" placeholder="Street Name" id="street-name"
                                value="{{ session('order_data.streetname') }}">
                            <span class="error-message" id="street-name-error"></span>
                        </div>
                        <div class="house-state-no">
                            <div class="input-sate">
                                <label for="">House number *</label>
                                <input type="text" name="houseno" placeholder="Eg: 124" id="house-number"
                                    value="{{ session('order_data.houseno') }}">
                                <span class="error-message" id="house-number-error"></span>
                            </div>
                            {{-- <div class="input-sate">
                                <label for="">Suffix *</label>
                                <input type="text" name="suffix" placeholder="Eg: A" id="suffix"
                                    value="{{ session('order_data.suffix') }}">
                                <span class="error-message" id="suffix-error"></span>
                            </div> --}}
                            <div class="input-sate">
                                <label for="">Bus No. (Optional)</label>
                                <input type="text" name="busno" placeholder="Eg: 124" id="bus-number"
                                    value="{{ session('order_data.busno') }}">
                                <span class="error-message" id="bus-number-error"></span>
                            </div>
                        </div>
                        <div class="house-state-no">
                            <div class="input-sate">
                                <label for="">Phone No. *</label>
                                <input type="text" name="phoneno" placeholder="Eg: +977 982419467" id="phone-number"
                                    value="{{ session('order_data.phoneno') }}">
                                <span class="error-message" id="phone-number-error"></span>
                            </div>
                        </div>
                    </div>
    
                    <div class="btn-smt">
                        <button class="btn" type="button">
                            Continue
                        </button>
                    </div>
                </form>
            </div>
            <!-- Cart Summary -->
            <div class="summary-section col-lg-4">
                <div class="cart-item-group pos-stick">
                    @php $summaryTotal = 0 @endphp
                    @if (session('cart'))
                    @foreach (session('cart') as $id => $details)
                    @php $summaryTotal += $details['price'] * $details['quantity'] @endphp
                    <div class="cart-item" style="padding-bottom: 15px;">
                        <div class="product-img-desc">
                            <div class="product-img">
                                <img class="product-image" src="{{ $details['image'] }}" alt="Product Image">
                            </div>
                            <div class="product-info">
                                <div class="product-relative">
                                    <a href="#" class="back-to-store-page">
                                        <p class="product-name">{{ $details['name'] }}</p>
                                    </a>
                                    <div class="product-color">Qty- <span class="color-product">{{ $details['quantity']
                                            }}</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    <p class="grand-total">Grand Total: $<span class="total-amount amount">{{ $summaryTotal }}</span></p>
                </div>
            </div>
        </div>
    </div>
   
</section>




<script>
    document.addEventListener('DOMContentLoaded', function () {
    const privateList = document.querySelector('.private-list');
    const businessList = document.querySelector('.business-list');
    const privateForm = document.getElementById('private-form');
    const businessForm = document.getElementById('business-form');
    const submitButton = document.querySelector('.btn-smt button');

    // Hidden input field for active tab value
    const activeTabInput = document.createElement('input');
    activeTabInput.type = 'hidden';
    activeTabInput.id = 'active-tab';
    activeTabInput.name = 'active_tab';
    activeTabInput.value = 'Private'; // Default value
    document.querySelector('.form-address').appendChild(activeTabInput);

    privateList.addEventListener('click', function () {
        privateList.classList.add('cart-active-list');
        businessList.classList.remove('cart-active-list');
        privateForm.style.display = 'block';
        businessForm.style.display = 'none';
        activeTabInput.value = 'Private'; // Update active tab value
    });

    businessList.addEventListener('click', function () {
        businessList.classList.add('cart-active-list');
        privateList.classList.remove('cart-active-list');
        businessForm.style.display = 'block';
        privateForm.style.display = 'none';
        activeTabInput.value = 'Business'; // Update active tab value
    });

    submitButton.addEventListener('click', function (event) {
        clearErrorMessages();
        let isValid = true;

        if (privateForm.style.display === 'block') {
            isValid = validatePrivateForm();
        } else if (businessForm.style.display === 'block') {
            isValid = validateBusinessForm();
        }

        if (isValid) {
            document.querySelector('.form-address').submit();
        }
    });

    function validatePrivateForm() {
        let isValid = true;

        // Validation logic for private form fields...
        const firstName = document.getElementById('first-name');
        const lastName = document.getElementById('last-name');
        const postalCode = document.getElementById('postal-code');
        const streetName = document.getElementById('street-name');
        const houseNumber = document.getElementById('house-number');
  
        const phoneNumber = document.getElementById('phone-number');

        const errorMessages = {
            'first-name': 'First name is required.',
            'last-name': 'Last name is required.',
            'postal-code': 'Postal code is required.',
            'street-name': 'Street name is required.',
            'house-number': 'House number is required.',
        
            'phone-number': 'Phone number is required.'
        };

        isValid = validateFields([firstName, lastName, postalCode, streetName, houseNumber,  phoneNumber], errorMessages);

        return isValid;
    }

    function validateBusinessForm() {
        let isValid = true;

        // Validation logic for business form fields...
        const companyName = document.getElementById('company-name');
        const vatNumber = document.getElementById('vat-number');
        const businessFirstName = document.getElementById('business-first-name');
        const businessLastName = document.getElementById('business-last-name');
        const businessPostalCode = document.getElementById('business-postal-code');
        const businessStreetName = document.getElementById('business-street-name');
        const businessHouseNumber = document.getElementById('business-house-number');
    
        const businessPhoneNumber = document.getElementById('business-phone-number');

        const errorMessages = {
            'company-name': 'Company name is required.',
            'vat-number': 'VAT number is required.',
            'business-first-name': 'First name is required.',
            'business-last-name': 'Last name is required.',
            'business-postal-code': 'Postal code is required.',
            'business-street-name': 'Street name is required.',
            'business-house-number': 'House number is required.',
    
            'business-phone-number': 'Phone number is required.'
        };

        isValid = validateFields([companyName, vatNumber, businessFirstName, businessLastName, businessPostalCode, businessStreetName, businessHouseNumber, businessSuffix, businessPhoneNumber], errorMessages);

        return isValid;
    }

    function validateFields(fields, errorMessages) {
        let isValid = true;

        fields.forEach(field => {
            if (field.value.trim() === '') {
                isValid = false;
                showError(field, errorMessages[field.id]);
            }
        });

        return isValid;
    }

    function showError(inputElement, message) {
        const errorElement = inputElement.nextElementSibling;
        errorElement.textContent = message;
        errorElement.style.display = 'block';
    }

    function clearErrorMessages() {
        const errorMessages = document.querySelectorAll('.error-message');
        errorMessages.forEach(message => {
            message.style.display = 'none';
            message.textContent = '';
        });
    }
});

</script>


@endsection