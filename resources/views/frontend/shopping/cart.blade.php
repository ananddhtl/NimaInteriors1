@extends('welcome')
@section('title', 'login :: Nimainteriors.com')
<style>
.container .cart-part {
    padding-bottom: 10px;
    margin-bottom: 40px;
    position: relative;
}

.mt-container {
    padding-top: 20px;
}

.mt-container .pay-section {
    margin-top: 200px;
}

.title {
    text-align: left;
    font-size: 2em;
    margin-bottom: 20px;
}

.button.checkout {
    display: block;
    margin-bottom: 20px;
    padding: 5px 10px;
    text-transform: uppercase;
    background-color: #fff;
    color: #000;
    border: solid 1px;
    cursor: pointer;
    text-align: center;
}

.button.checkout:hover {
    background-color: #000;
    color: #fff;
    transition: color 0.2s, background-color 0.2s;
}

.shopping-cart {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

.column-header,
.shopping-cart th,
.shopping-cart td {
    padding: 15px;
    text-align: left;
    border: 1px solid #ddd;
}

.product-info {
    align-items: center;
}

.product-image {
    width: 80px;
    height: 80px;
    margin-right: 10px;
}

.quantity-container {
    margin-top: 40px !important;
}

.product-quantity .qty-text {
    border: solid 2px;
}

.product-quantity {
    display: flex;
    justify-content: right;
    margin-bottom: 5px;
}

.button.remove {
    background: none;
    border: none;
    cursor: pointer;
}

.buttons {
    display: flex;
    justify-content: space-between;
}

.buttons .button {
    padding: 5px 10px;
    border: 1px solid #000;
    background-color: #fff;
    color: #000;
    cursor: pointer;
}

.buttons .button:hover {
    background-color: #f2f2f2;
}

.button.continue {
    margin-right: auto;
}

.button.update,
.button.clear {
    margin-left: 19px;
}

.button.continue:hover,
.button.update:hover,
.button.clear:hover {
    background-color: #000;
    color: #fff;
    transition: color 0.2s, background-color 0.2s;
}

.summary-section {
    justify-content: space-between;

}

.totals {
    background-color: #fff;
    position: sticky;
    top: 110px;
    width: auto;
    padding: 20px;
    height: fit-content;
    box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
}

.totals h2 {
    font-size: 1.2em;
    margin-bottom: 20px;
}

.discount-codes form {
    display: flex;
    flex-direction: column;
}

.discount-codes label {
    margin-bottom: 10px;
    font-weight: bold;
}

.summary-section input,
.estimate-shipping input {
    margin-bottom: 10px;
    padding: 10px;
    border: 1px solid #ddd;
    width: 100%;
}

.button.get-quote,
.button.apply-coupon {
    padding: 10px;
    border: 1px solid #000;
    background-color: #fff;
    color: #000;
    cursor: pointer;
    align-self: flex-start;
}



.totals .subtotal,
.totals .grand-total {
    font-size: 1.2em;
    margin-bottom: 10px;
}

.totals .grand-total .amount {
    /* color: #938064; */
    color: black;
    font-size: 1.5em;
    font-weight: bold;
}

.button.proceed-to-checkout {
    padding: 10px;
    border: 1px solid black;
    background-color: #fff;
    color: #000;
    cursor: pointer;
    margin-bottom: 8px;
    width: 100%;
    text-align: center;
}

button.cont-shop {
    padding: 10px;
    border: 1px solid black;
    background-color: black;
    color: white;
    cursor: pointer;
    margin-bottom: 8px;
    width: 100%;
    text-align: center;
}

.button.multiple-addresses {
    padding: 10px;
    color: #000;
    cursor: pointer;
    margin-bottom: 8px;
    width: 100%;
    justify-content: right;
}

/* .button.proceed-to-checkout:hover,
.button.get-quote:hover,
.button.apply-coupon:hover {
    background-color: #000;
    color: #fff;
    transition: color 0.2s, background-color 0.2s;
} */

.button.multiple-addresses:hover {
    color: #938064;
    transition: color 0.2s;
}

.product-quantity .quantity-container {
    width: 100px;
    display: flex;
    margin: 0;
    border: 1px solid rgb(179, 179, 179);
}

.product-quantity .quantity-container .button.plus,
.product-quantity .quantity-container .button.minus {
    border: none;
    padding: 3px;
    width: 25%;
    background-color: transparent !important;
}

.product-quantity .quantity-container .qty-text {
    font-size: 17px;
    display: block;
    width: 50%;
    text-align: center;
    background-color: white;

    border: none;
}

.cart-item {
    border-bottom: 2px solid #ececec;
}

.cart-item:last-child {
    border-bottom: none;
}

/* .container .pay-section .cart-part .cart-head {
    gap: 465px;
} */

.container .pay-section .cart-part .cart-item {
    display: flex;
    padding-bottom: 10px;
}

.product-quantity-remove {
    position: relative;
    width: 30%;
    text-align: right;
    padding-right: 20px;
}

.remove-icon {
    position: absolute;
    top: 10px;
    right: 20px;
}

.remove-icon i {
    color: rgb(180, 7, 7);
}

.product-img-desc {
    display: flex;
    width: 70%;
    gap: 20px;
}


.product-img {
    width: 39%;
}

.product-img img {
    width: 100%;
    height: auto;
}

.checkout-total {
    margin-top: 60px;
}

.cart-item-group {
    box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
    padding: 15px;
    margin-bottom: 20px;
}

.cart-item-group h5 {
    font-size: 20px;
    width: 50%;
}

/* .your-address{
    margin-top: 10px;
} */

.your-address ul li {
    margin-top: 15px;
    font-size: 15px;
    color: rgb(109, 108, 108);
}

.edit-btn {
    width: 50%;
    justify-content: right;
    display: flex;
}

.edit-btn i {
    cursor: pointer;
}

.cart-address-heading {
    border-bottom: 2px solid #ececec;
    padding-bottom: 15px;
    display: flex;
    align-items: center;
}

.cart-item-group .cart-item {
    margin-bottom: 10px !important;
}

.container .pay-section .cart-part .cart-item .product-info .back-to-store-page .product-name {
    font-size: 21px;
    color: #000;
}


.container .pay-section .cart-part .cart-item .product-quantity {

    margin-top: 10px;
}



.container .pay-section .cart-part .cart-item .product-subtotal {
    font-size: 21px;
    font-weight: 400;

}



/*modal popup*/
.new-modal {
    display: none;
    position: fixed;
    z-index: 999999999;
    padding-top: 100px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0, 0, 0);
    background-color: rgba(0, 0, 0, 0.4);
}

.new-modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 55%;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s;
}

@-webkit-keyframes animatetop {
    from {
        top: -300px;
        opacity: 0
    }

    to {
        top: 0;
        opacity: 1
    }
}

@keyframes animatetop {
    from {
        top: -300px;
        opacity: 0
    }

    to {
        top: 0;
        opacity: 1
    }
}

.modal-close {
    color: black;

    font-size: 28px;
    font-weight: bold;
}

.modal-close:hover,
.modal-close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.new-modal-header {
    padding: 10px 16px;
    border-bottom: 1px solid rgb(189, 188, 188);
    display: flex;
    margin-bottom: 10px;
}

.address-modal-title {
    width: 50%;
    display: flex;
    align-items: center;
}

.close-modal {
    width: 50%;
    text-align: right;
}

.new-modal-body {
    padding: 15px 16px;
}

.address-box label {
    width: 100%;
    margin-bottom: 5px;
}

.address-box input {
    width: 100%;
    padding: 8px;
}

.new-modal-body form {
    margin-left: 10px;
}

.address-change {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin-bottom: 20px;

}

.address-box {
    width: calc(50% - 20px);
}

/*modal pop up*/

@media (max-width:550px) {
    .container {
        width: 90%;
        padding: 0px;
    }

    .container .pay-section .cart-part .cart-head {
        gap: 0px;
    }

    .container .pay-section .cart-part .cart-head .cont-shop {
        margin-left: 100px;
    }

    .container .cart-part {
        margin-bottom: 0px !important;
    }

    .product-img-desc {
        display: block;
    }

    .porduct-relative {
        position: static;
        transform: translate(0, 0);
        margin-top: 5px;
    }
}
</style>
@section('content')
@if (session('success'))
<div id="snackbar">
    {{ session('success') }}
</div>
@endif
<section class="container mt-container cart-container">
    <div class="pay-section d-flex row">


        <!-- Cart -->
        <div class="cart-part col-lg-8 col-md-10 col-sm-12">


            <div class="cart-item-group">
                @php $total = 0 @endphp
                @if (session('cart'))
                @foreach (session('cart') as $id => $details)
                @php $total += $details['price'] * $details['quantity'] @endphp
                <div class="cart-item" data-id="{{ $id }}">
                    <div class="product-img-desc">
                        <div class="product-img">
                            <img class="product-image" src="{{ $details['image'] }}" alt="Product Image">
                        </div>
                        <div class="product-info">
                            <div class="product-relative">
                                <a href="{{ route('productdesc', ['slug' => $details['slug']]) }}"
                                    class="back-to-store-page">
                                    <p class="product-name">{{ $details['name'] }}</p>
                                </a>
                                <div class="product-size">${{ $details['price'] }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="product-quantity-remove">
                        <div class="product-quantity">
                            <div class="quantity-container">
                                <button class="button minus bg-light" onclick="updateQuantity({{ $id }}, 'decrease')">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <span class="qty-text" id="quantity_{{ $id }}">{{ $details['quantity'] }}</span>
                                <button class="button plus bg-light" onclick="updateQuantity({{ $id }}, 'increase')">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <button class="button remove remove-icon remove-from-cart">
                            <span class="close-text"><i class="fa-solid fa-trash"></i></span>
                        </button>
                        @php
                        $totalPrice = $details['price'] * $details['quantity'];
                        @endphp
                        <div class="product-subtotal" id="subtotal_{{ $id }}">${{ $totalPrice }}
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
                <div id="total">${{ $total }}</div>


            </div>
        </div>
        <!-- Cart Summary -->
        <div class="summary-section col-lg-4">
            <div class="totals">
                <p class="subtotal">Subtotal: $<span id="subtotal-amount">{{ $total }}</span></p>
                {{-- <label for="coupon">Enter your coupon code if you have one.</label>
                    <input type="text" id="coupon" name="coupon"> --}}
                <button class="button apply-coupon">Apply Coupon</button>
                <p class="grand-total">Grand Total: $<span id="grand-total-amount">{{ $total }}</span></p>
                <form action="{{ route_with_locale('checkout') }}" method="POST">
                    @csrf
                    <button type="submit" class="button proceed-to-checkout">Proceed to Checkout</button>
                </form>

                <button class="cont-shop">Continue Shopping</button>

            </div>
        </div>
    </div>
</section>

<script>
function updateQuantityInput() {
    var quantityInput = document.getElementById('quantityInput');
    var quantityText = document.getElementById('quantity_0').innerText;
    quantityInput.value = quantityText;
}


document.getElementById('checkoutForm').addEventListener('submit', function() {
    updateQuantityInput();
});
</script>
<!-- Your custom script -->
<script>
$(document).ready(function() {
    $(".remove-from-cart").click(function(e) {
        e.preventDefault();

        var ele = $(this);

        if (confirm("Are you sure you want to remove this item from the cart?")) {
            $.ajax({
                url: '{{ route_with_locale('removecart') }}',
                method: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.closest(".cart-item").data("id")
                },
                success: function(response) {
                    if (response.success) {
                        // Optionally show a success message
                        alert('Item removed successfully!');
                        window.location.reload();
                    } else {
                        alert('Failed to remove item from cart.');
                        console.log(response);
                    }
                },
                error: function(xhr, status, error) {
                    alert(
                        'There was an error removing the item from the cart. Please try again.'
                    );
                    console.error('AJAX error:', status, error);
                    console.log('Response:', xhr.responseText);
                }
            });
        }
    });
});
</script>
<script>
var price = parseFloat({
    {
        @$details['price']
    }
});
var quantity = parseInt({
    {
        @$details['quantity']
    }
});

function decrease(index) {
    var quantityElement = document.getElementById('quantity_' + index);
    var quantity = parseInt(quantityElement.innerText);
    if (quantity > 1) {
        quantityElement.innerText = quantity - 1;
        updateSubtotal(index);
    }
}

function increase(index) {
    var quantityElement = document.getElementById('quantity_' + index);
    var quantity = parseInt(quantityElement.innerText);
    quantityElement.innerText = quantity + 1;
    updateSubtotal(index);
}

function updateSubtotal(index) {
    var quantity = parseInt(document.getElementById('quantity_' + index).innerText);
    var subtotal = quantity * price;
    document.getElementById('subtotal-amount').innerText = subtotal.toFixed(2);
    updateGrandTotal();
}

function updateGrandTotal() {
    var subtotal = parseFloat(document.getElementById('subtotal-amount').innerText);
    var grandTotal = subtotal;
    document.getElementById('grand-total-amount').innerText = grandTotal.toFixed(2);
}
</script>

<script>
function updateQuantity(id, action) {
    let quantityElement = document.getElementById('quantity_' + id);
    let subtotalElement = document.getElementById('subtotal_' + id);
    let quantity = parseInt(quantityElement.innerText);

    if (action === 'decrease' && quantity > 1) {
        quantity--;
    } else if (action === 'increase') {
        quantity++;
    } else {
        return; // Prevent decreasing below 1
    }

    // Update the quantity on the page
    quantityElement.innerText = quantity;

    // Send AJAX request to update the quantity in session
    fetch('{{ route_with_locale('updatecart') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Correctly include CSRF token
                },
                body: JSON.stringify({
                    id: id,
                    quantity: quantity
                })
            })
        .then(response => response.json())
        .then(data => {
            if (data.subtotal !== undefined) {
                subtotalElement.innerText = '$' + (data.subtotal).toFixed(2);
            }

            if (document.getElementById('total')) {
                document.getElementById('total').innerText = '$' + (data.total).toFixed(2);
            }

            if (document.getElementById('subtotal-amount')) {
                document.getElementById('subtotal-amount').innerText = (data.total).toFixed(2);
            }

            if (document.getElementById('grand-total-amount')) {
                document.getElementById('grand-total-amount').innerText = (data.total).toFixed(2);
            }
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
}
</script>



@endsection