@extends('welcome')
@section('title', 'Overview :: Nimainteriors.com')

@section('content')
<section class="container mt-container">
    <div class="checkout">
        <div class="progress-line">
            <div class="flex-progress">
                <div class="line-absolute">
                    <p class="active-para">Information</p>
                    <i class="fa-regular fa-circle-check active-i"></i>
                </div>
                <div class="line-absolute text-align-center">
                    <p class="active-para">Delivery</p>
                    <i class="fa-regular fa-circle-check active-i"></i>
                </div>
                <div class="line-absolute text-align-center">
                    <p class="active-para">Overview</p>
                    <i class="fa-regular fa-circle-check active-i"></i>
                </div>
                <div class="line-absolute text-align-right">
                    <p>Payment</p>
                    <i class="fa-regular fa-circle-check"></i>
                </div>
            </div>

            <div class="line-progress">
                <div class="progress-relative">

                </div>
                <div class="progress-absolute" style="width: 65%;">

                </div>
            </div>
        </div>
        <div class="pay-section d-flex row">


            <!-- Cart -->
            <div class="cart-part col-lg-8 col-md-10 col-sm-12">

                <h3 class="head-color">Overview</h3>
                <div class="address-overview">
                    <p><b>Is Your Information Correct?</b></p>
                    <div class="address-col">
                        <div class="address-left">
                            <p><b>Information :</b></p>
                            <ul>
                                <li>{{ session('order_data.fname') }} {{ session('order_data.lname') }}</li>
                                <li>{{ session('order_data.streetname') }}, {{ session('order_data.houseno') }},
                                    {{ session('order_data.postalcode') }}</li>
                            </ul>
                        </div>
                        <div class="address-right">
                            <p><b>Contact information :</b></p>
                            <ul>
                                <li>{{ session('order_data.email') }}</li>
                                <li>{{ session('order_data.phoneno') }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="change-info">
                        <a href="{{ route_with_locale('checkout') }}"><i class="fa-solid fa-chevron-right"></i> Change
                            Information</a>
                    </div>
                </div>

                <div class="address-overview">
                    <p><b>Pickup date</b></p>
                    <div class="address-col">
                        <div class="address-left">
                            <p><b>{{ session('pickup_date') }}</b></p>
                        </div>
                    </div>
                    <div class="change-info">
                        <a href="{{ route_with_locale('shoppingdelivery') }}"><i class="fa-solid fa-chevron-right"></i>
                            Change Date</a>
                    </div>
                </div>


                <div class="address-delivery-select">
                    <p><b>How would you like to pay?</b></p>
                    {{-- <div class="payment-select-box active-delivery-box">
                        <div class="payment-box-new">
                            <p><b>Pay Through Credit Card :</b></p>
                            <div class="card-icon-flex">
                                <i class="fa fa-cc-visa" style="color:navy;"></i>
                                <i class="fa fa-cc-amex" style="color:blue;"></i>
                                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                <i class="fa fa-cc-discover" style="color:orange;"></i>
                            </div>
                        </div>
                        <form action="" class="payment-form-credit">
                            <input type="text" placeholder="Name on the card" class="input-50">
                            <input type="number" placeholder="Credit card number" class="input-50">
                            <input type="text" placeholder="Expire Month" class="input-30">
                            <input type="number" placeholder="Expire Year" class="input-30">
                            <input type="number" placeholder="CVV" class="input-30">
                        </form>
                    </div> --}}
                    <div class="payment-select-box">
                        <div class="payment-box-new">
                            <p><b>Pay Via Cash :</b></p>
                            <div class="card-icon-flex">
                                <i class="fa-regular fa-money-bill-1" style="color: navy;"></i>
                            </div>
                        </div>
                    </div>
                  
                       
                            <div class="payment-select-box">
                                <div class="payment-box-new">
                                    <p><b>Online payment :</b></p>
                                    <div class="card-icon-flex">
                                        <i class="fa-regular fa-money-bill-1" style="color: navy;"></i>
                                    </div>
                                </div>
                            </div>
                       
                    
                    <form action="{{route_with_locale('orderitems')}}" method="POST">
                        @csrf

                        <input type="hidden" name="selected_tab" id="selected_tab" value="credit_card">
                        <button class="address-next">Continue</button>
                    </form>
                </div>

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
                    <p class="grand-total">Grand Total: $<span class="total-amount amount">{{ $summaryTotal }}</span>
                    </p>
                </div>
            </div>

        </div>
    </div>
    </div>
</section>
<script>
    document.querySelectorAll('.payment-select-box').forEach(box => {
        box.addEventListener('click', function() {
            document.querySelectorAll('.payment-select-box').forEach(box => box.classList.remove('active-delivery-box'));
            this.classList.add('active-delivery-box');

            var selectedTabValue = this.querySelector('b').innerText.trim();
            document.getElementById('selected_tab').value = selectedTabValue;
        });
    });
</script>

@endsection