@extends('welcome')
@section('title', 'Delivery :: Nimainteriors.com')

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
                    <p>Overview</p>
                    <i class="fa-regular fa-circle-check"></i>
                </div>
                <div class="line-absolute text-align-right">
                    <p>Payment</p>
                    <i class="fa-regular fa-circle-check"></i>
                </div>
            </div>
    
            <div class="line-progress">
                <div class="progress-relative">
    
                </div>
                <div class="progress-absolute" style="width: 35%;">
    
                </div>
            </div>
        </div>
        <div class="pay-section d-flex row">
    
    
            <!-- Cart -->
            <div class="cart-part col-lg-8 col-md-10 col-sm-12">
    
                <h3 class="head-color">Delivery</h3>
                <div class="your-address-col">
                    <p><b>Your Address:</b> {{ session('order_data.streetname') }} {{ session('order_data.houseno') }}, {{
                        session('order_data.postalcode') }}</p>
                    <div class="change-add">
                        <a href="{{route_with_locale('checkout',['locale' => app()->getLocale()]) }}"><i class="fa-solid fa-chevron-right"></i> Change
                            Address</a>
                    </div>
    
                </div>
                <form action="{{ route_with_locale('orderdelivery',['locale' => app()->getLocale()])  }}" method="POST">
                    @csrf
                    <div class="address-delivery-select">
                        <div class="delivery-box active-delivery-box">
                            <div class="left-box-delivery">
                                <p><b>Free Delivery</b></p>
                            </div>
                            <div class="right-box-delivery">
                                <div class="date-between">
                                    <p>From tomorrow between 8:00 and 11:00 Am</p>
                                </div>
                                <div class="cost-delivery">
                                    <p class="free-cost">Free</p>
                                </div>
                            </div>
                            <input type="hidden" name="delivery_option" value="free_delivery">
                        </div>
                        <div class="delivery-box">
                            <div class="left-box-delivery">
                                <p><b>Evening Delivery</b></p>
                            </div>
                            <div class="right-box-delivery">
                                <div class="date-between">
                                    <p>From tomorrow between 8:00 and 11:00 Am</p>
                                </div>
                                <div class="cost-delivery">
                                    <p class="charge-cost">$ 1.00</p>
                                </div>
                            </div>
                            <input type="hidden" name="delivery_option" value="evening_delivery">
                        </div>
                        <button type="submit" class="address-next">Continue</button>
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
   </section>
<script>
    document.querySelectorAll('.delivery-box').forEach(box => {
			box.addEventListener('click', function () {

				document.querySelectorAll('.delivery-box').forEach(box => box.classList.remove('active-delivery-box'));


				this.classList.add('active-delivery-box');
			});
		});
</script>
@endsection