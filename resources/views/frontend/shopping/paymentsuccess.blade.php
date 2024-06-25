@extends('welcome')
@section('title', 'login :: Nimainteriors.com')

@section('content')

    <section class="container mt-container">
        <div class="checkout">
        <div class="payment-success">
            <img src="{{ asset('frontend/assets/images/success.png') }}" alt="">
            <h5>Thank You!</h5>
            <p>Your order has been proceed successfully!</p>
            <div class="go-home-purchas">
                <a href="">Dashboard</a>
                <a href="">Shop More</a>
            </div>
        </div>
        </div>
    </section>
@endsection
