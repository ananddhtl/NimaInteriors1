@extends('welcome')
<style>
    .product-details {
        overflow: hidden;

    }

    .Product-detail {
        margin-top: 200px;
    }

    /* preview and preview mini css */
    .image-gallery-main {
        width: auto;
        height: auto;

    }

    .image-gallery-main .main-preview {
        width: 100%;
        border: 1px solid #dfdfdf;
        overflow: hidden;
        height: 500px;
        padding: 20px;
    }

    .image-gallery-main .main-preview .preview-img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .preview-img a {
        width: 100%;
        height: 100%;
    }

    .image-gallery-main .main-preview .preview-img img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    /*mini preview*/
    .image-gallery-main .mini-preview .img-container {
        display: flex;
        gap: 10px;
        height: auto;
        overflow: auto;
        width: 100%;
        padding-bottom: 5px;
    }

    .image-gallery-main .mini-preview {
        position: relative !important;
        margin-top: 10px;
    }

    .image-gallery-main .mini-preview button {
        border: 1px solid black !important;
        border-radius: 0px !important;
        background-color: black !important;
        color: white !important;
        position: absolute;
        padding: 5px 10px !important;
        opacity: 0.7;
        transition: 0.5s;
        display: none;
    }

    .image-gallery-main .mini-preview:hover button {
        display: block;
    }

    .image-gallery-main .mini-preview button:hover {
        opacity: 1;
    }

    .image-gallery-main .mini-preview button i {
        font-size: 13px !important;
    }

    button.left-btn {
        left: 5px;
        top: 50px;
    }

    button.right-btn {
        right: 5px;
        top: 50px;
    }

    .image-gallery-main .mini-preview .img-container .mini-preview-img {
        width: 130px;
        height: 130px;
        cursor: pointer;
        border: 2px solid transparent;
    }


    /*mini preview*/


    /*coustume slider*/
    .custom-slider-container {
        margin-top: 30px;
    }

    .custom-wrapper {
        display: flex;
        max-width: 1200px;
        position: relative;
    }

    .custom-wrapper i {
        top: 50%;
        height: 44px;
        width: 44px;
        color: white;
        cursor: pointer;
        font-size: 1.15rem;
        position: absolute;
        text-align: center;
        line-height: 44px;
        background: var(--primary-color);
        border-radius: 50%;
        transform: translateY(-50%);
        transition: transform 0.1s linear;
    }

    .custom-wrapper i:active {
        transform: translateY(-50%) scale(0.9);
    }

    .custom-wrapper i:hover {
        background: #3a624193;
    }

    .custom-wrapper i:first-child {
        left: -22px;
        display: none;
    }

    .custom-wrapper i:last-child {
        right: -22px;
    }

    .custom-carousel {
        font-size: 0px;
        cursor: pointer;
        overflow: hidden;
        white-space: nowrap;
        scroll-behavior: smooth;
    }

    .custom-carousel.dragging {
        cursor: grab;
        scroll-behavior: auto;
    }

    .custom-carousel.dragging img {
        pointer-events: none;

        object-fit: cover;
    }

    .custom-carousel img {
        margin-left: 15px;
        height: auto;
        object-fit: cover;
        user-select: none;
        width: calc(100% / 4);
        height: 120px;
    }

    .custom-carousel img:first-child {
        margin-left: 0px;
    }

    /*costume slider*/

    .product-details-lvl1 {
        display: flex;
        gap: 20px;
    }

    .sticky-product {
        position: sticky;
        top: 95px;

    }

    .Product-detail .details .tools-lvl-3 .add-to-cart-container,
    .Product-detail .details .tools-lvl-3 .wishlist {
        position: fixed;
        z-index: 1000;
        top: 0;
        height: 100%;
        width: 33%;
        background-color: #fff;
        padding: 10px;
        border: solid 2px #000;
        display: none;
    }

    .add-cart-btn {
        border: 1px solid black;
        font-size: 17px !important;
        padding: 10px 30px;
        background-color: white;
        transition: 0.3s;
    }

    .wish-list-btn {
        border: 1px solid red;
        font-size: 17px !important;
        padding: 10px 15px;
        background-color: red;
        transition: 0.3s;
        color: white;
    }

    .add-cart-btn:hover {
        background-color: black;
        color: white;
    }

    .Product-detail .details .tools-lvl-3 .close {
        float: right;
    }

    .Product-detail .details .text {
        font-size: large;
        font-weight: 700;
    }

    .Product-detail .details .qty {
        border: 1px solid black;
        width: 130px;
        background-color: white;
    }


    .Product-detail .details .qty .qty-text {

        width: 50%;
        text-align: center;
        padding: 8px;
    }

    button.plus-btn {
        border: none;
        background-color: white;
        width: 25%;
        text-align: center;
    }

    button.minus-btn {
        border: none;
        background-color: white;
        width: 25%;
        text-align: center;
    }

    .available-stock {
        margin-top: 10px;
        font-size: 14px;
        color: rgb(161, 161, 161);
        letter-spacing: 1px;
        font-weight: 400;
    }

    .Product-detail .details .tools-lvl-2 #size {
        width: 350px;
        height: 35px;
        font-size: 20px;
    }

    .Product-detail .details .product-price,
    .Product-detail .details .product-name {
        font-size: 20px;
    }

    .Product-detail .details .product-price {
        font-weight: 700;
    }

    /* Style the buttons that are used to open and close the accordion panel */
    .accordion {
        margin-bottom: 35px;
        margin-left: 55px;
    }

    .accordion-btn {
        background-color: #8d786c;
        color: #fff;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        text-align: justify;
        border: none;
        outline: none;
        transition: 0.4s;
    }

    .accordion-btn .accordion-collapse,
    .accordion-btn .accordion-extend {
        float: right;
    }

    .accordion-btn .accordion-collapse {
        display: none;
    }


    .accordion:hover {
        background-color: #8e654e;
    }

    .panel {
        padding: 0 18px;
        background-color: white;
        display: none;
        overflow: hidden;
    }

    .product-details-lvl2 .related {
        background-color: #b09d92;
        padding: 50px;
        padding-left: 100px;
        text-align: center;
        color: white;
    }

    .product-details-lvl3 .recent {
        text-align: center;
        padding: 50px;
        padding-left: 100px;
    }

    .related,
    .recent {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
    }

    .products-new .layout {
        display: flex;
        gap: 15px;
    }

    .products-new h2.heading-head {
        margin-bottom: 30px;
        text-align: center;
        font-size: 28px;
    }

    h2.heading-head:before {
        margin-right: 10px;
        width: 70px;
        height: 3px;
        background: #606060;
        content: "";
        display: inline-block;
        vertical-align: middle;
        position: relative;
        top: 50%;
        left: 0;
        -webkit-transform: translate(0, -50%);
    }

    h2.heading-head:after {
        margin-left: 10px;
        width: 70px;
        height: 3px;
        background: #606060;
        content: "";
        display: inline-block;
        vertical-align: middle;
        position: relative;
        top: 50%;
        right: 0;
        -webkit-transform: translate(0, -50%);
    }

    p.desc-para {
        line-height: 28px;
        color: #a8a8a8;
        margin-top: 10px;
        font-size: 16px;
        text-align: justify;
        font-weight: 300;
    }


    select.color-selection {
        margin-top: 15px;
        padding: 10px;

        cursor: pointer;
    }

    .size-heading span {
        color: rgb(179, 179, 179);
        font-style: italic;
        font-size: 18px;
        font-weight: 400;
    }

    .size-checkbox {
        margin-top: 20px;
        display: flex;
        gap: 30px;

    }

    .check-box {
        display: flex;
        align-items: center;

    }

    .size-checkbox input {
        width: 16px;
        height: 16px;
        cursor: pointer;
    }

    .size-checkbox label {
        color: #949494;
        margin-left: 5px;
        font-size: 17px;
        cursor: pointer;
    }

    .product-tabs-desc {
        margin-top: 20px;
    }

    .description p {
        font-size: 15px;
        margin-top: 10px;
        text-align: justify;
        font-weight: 400;
        line-height: 25px;
    }

    .product-details-modal a {
        color: #606060;
        cursor: pointer;
    }

    .product-details-modal {
        padding: 13px 0px;
        position: relative;
    }

    .product-details-modal i {
        position: absolute;
        top: 17px;
        right: 0px;
        font-size: 23px;
    }

    .div-related-product-courser {
        position: relative;
    }

    .new-prev {
        position: absolute;
        top: 35%;
        left: -10px;
        z-index: 8;
        background-color: #000;
        color: white !important;
        padding: 10px;
        font-size: 20px;
        cursor: pointer;
    }

    .new-next {
        position: absolute;
        top: 35%;
        right: -10px;
        z-index: 8;
        background-color: #000;
        color: white !important;
        padding: 10px;
        font-size: 20px;
        cursor: pointer;
    }

    .modal-details {
        position: fixed;
        top: 0px;
        left: 0px;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 99999;
        display: none;
    }

    .display-side-modal {
        display: block !important;
    }

    .right-none {
        right: 0px !important;
    }

    .modal-desc {
        position: absolute;
        right: -4000px;
        padding: 25px;
        width: 450px;
        height: 100%;
        background-color: white;
        overflow-y: auto;
        transition: 0.3s;
    }

    .modal-desc p {
        margin-top: 10px;
        text-align: justify;
        font-size: 14px;
        font-weight: 400;
        line-height: 25px;
        color: rgb(148, 148, 148);
    }

    .modal-desc h4 {
        font-size: 22px;
        margin-top: 20px;
    }

    .modal-desc ul li {
        margin-top: 10px;
        color: rgb(148, 148, 148);
        font-size: 14px;
    }

    .modal-details .fa-xmark {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
        color: black;
        font-size: 18px;
    }

    .modal-desc ul li i {
        font-size: 12px !important;
        margin-right: 10px;
    }

    .modal-desc textarea {
        margin-top: 10px;
        width: 100%;
        padding: 10px;
        height: 130px;
        border-radius: 5px;
        border: 1px solid rgb(148, 148, 148);
    }

    .modal-desc input {
        margin-top: 10px;
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid rgb(148, 148, 148);
    }

    .modal-desc form button {
        background-color: black;
        color: white;
    }

    @media (max-width:1000px) {
        .product-details-lvl1 {
            flex-wrap: wrap;
            padding: 20px;
        }

        .product-details-lvl1 .col-md-8 {
            width: 100% !important;
        }

        .product-details-lvl1 .col-md-4 {
            width: 100% !important;
        }
    }

    @media (max-width: 600px) {
        .accordion {
            margin-left: 0px;
        }

        .product-details {
            overflow: hidden;
        }

        .Product-detail {
            padding: 0px;
        }

        .image-gallery-main .mini-preview .img-container {
            display: flex;
            flex-direction: row;
        }

        .image-gallery-main .mini-preview .prev,
        .image-gallery-main .mini-preview .next {
            display: none;
        }

        .image-gallery-main .mini-preview {
            margin-top: 10px;
            margin-bottom: -450px;
        }

        .image-gallery-main .main-preview {
            height: 250px;
            overflow: hidden;
        }

        .image-gallery-main .main-preview .preview-img {
            width: 100%;
            height: 100%;
        }

        .image-gallery-main .main-preview .preview-img img {
            width: 100%;
            height: 100%;
        }

        .product-details-lvl2 .related {
            padding: 10px;
            padding-left: 20px;
            height: auto;
        }

        .card {
            width: 170px;
        }

        .title-container {
            margin-bottom: 0px;
        }

        .container-title {
            font-size: 22px;
        }

        .product-details-lvl3 .recent {
            text-align: center;
            padding-top: 50px !important;
            padding-left: 15.2px !important;
            padding: 0px;
        }
    }

    @media (max-width:595px) {
        .product-tabs-desc {
            margin-top: 500px;
        }

        .sticky-product .d-flex {
            flex-wrap: wrap !important;
        }

        .modal-desc {
            width: 85%;
        }
    }
</style>
@section('title', 'Product detail:: Nimainteriors.com')
@section('content')

<div class="modal-details" style="display:none;">
    <div class="modal-desc">
        <i class="fa-solid fa-xmark close-desc-modal"></i>
        <h4 id="modal-title"></h4>
        <div id="modal-description"></div>
    </div>
</div>



<!-- preview and minipreview -->
<div class="Product-detail container">
    <div class="product-details-lvl1">
        <div class="col-lg-7 col-sm-8 col-md-8">
            <!-- image gallary -->
            <div class="image-gallery-main">
                <!-- big carousel -->
                <div class="main-preview">
                    @foreach ($productimages as $index => $image)
                    <div class="preview-img page-gallery-wrapper" style="{{ $index === 0 ? '' : 'display:none;' }}">
                        <a href="{{ asset($image->images) }}" class="page-gallery">
                            <img src="{{ asset($image->images) }}" alt="{{ $index + 1 }}">
                        </a>
                    </div>
                    @endforeach
                </div>

                <!-- mini carousel -->
                <div class="mini-preview">
                    <div class="img-container">
                        @foreach ($productimages as $index => $image)
                        <div class="img-container-mini">
                            <img src="{{ asset($image->images) }}" alt="{{ $index + 1 }}" class="mini-preview-img">
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="product-tabs-desc">
                    <div class="description">
                        <h4>Product Description :</h4>
                        <p>{{ $itemsdetails->itemDetails }}</p>
                    </div>
                    <hr>
                    <div class="product-details-modals">
                        @foreach ($productdesc as $desc)
                        <div class="product-details-modal">
                            <a class="open-modal" data-title="{{ $desc->title }}"
                                data-description="{{ $desc->description }}">
                                <h4>{{ $desc->title }}</h4> <i class="fa-solid fa-chevron-right"></i>
                            </a>
                        </div>
                        <hr>
                        @endforeach
                    </div>
                    <hr>
                    <div class="div-related-product-courser">
                        <h4 style="margin-bottom: 25px;">Similar Products</h4>
                        <div class="slider-wrapper">
                            <div class="base">
                                <div class="prev new-prev">
                                    <i class="fa fa-angle-left"></i>
                                </div>
                                <div class="next new-next">
                                    <i class="fa fa-angle-right"></i>
                                </div>
                            </div>
                            <div class="owl-carousel">
                                @foreach ($similarProducts as $item)
                                <div class="item">

                                    <a href="{{ route_with_locale('productdesc', ['slug' => $item->slug]) }}">


                                        <div class="image-container">
                                            <img src="{{ $item->thumbnail }}" alt="Modular Modern Chair">

                                            <div class="coupen-product heart">
                                                <p style="padding-left: 5px;"><a href=""> <i
                                                            class="fa fa-heart"></i></a></p>
                                            </div>

                                            <div class="action-box">
                                                <div class="add-to-cart">
                                                    <a href="{{ route_with_locale('addtocart', ['locale' => $locale, 'id' => $itemsdetails->commonCode_id]) }}">
                                                        <button class="add-cart-btn">Add to cart</button>
                                                    </a>
                                                    
                                                </div>

                                            </div>
                                        </div>

                                        <div class="details"
                                            style="background-color: white!important; text-align: center!important;">
                                            <h2 class="product-name">{{ $item->itemName }}</h2>
                                            <p class="price">${{ $itemsdetails->sellRate }} <span
                                                    class="original-price">${{ $itemsdetails->mrp }}</span>
                                            </p>

                                        </div>

                                    </a>


                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <hr>
                    <span class="delivery-text"><i class="fa-solid fa-stopwatch"></i> Home Delivery within 4-6
                        weeks</span>
                </div>
                <!-- <div class="custom-slider-container ">
                                                                                                                    <div class="custom-wrapper">
                                                                                                                        <i id="left" class="custom-fa-solid custom-fa-angle-left"></i>
                                                                                                                        <div class="custom-carousel">
                                                                                                                            <img src="assets/images/photos/home/show2.jpeg" alt="1" class="mini-preview-img">
                                                                                                                            <img src="assets/images/photos/home/showroom1.jpeg" alt="2"
                                                                                                                                class="mini-preview-img">
                                                                                                                            <img src="assets/images/photos/home-1/29200.jpg" alt="3" class="mini-preview-img">
                                                                                                                            <img src="assets/images/photos/home-1/30800.jpg" alt="4" class="mini-preview-img">
                                                                                                                            <img src="assets/images/photos/home-1/30802.jpg" alt="5" class="mini-preview-img">
                                                                                                                            <img src="assets/images/photos/home-1/30803.jpg" alt="6" class="mini-preview-img">
                                                                                                                        </div>
                                                                                                                        <i id="right" class="custom-fa-solid custom-fa-angle-right"></i>
                                                                                                                    </div>
                                                                                                                </div> -->
            </div>
        </div>
        <!-- details -->
        <div class="col-lg-5 col-md-4 col-sm-4">
            <div class="details sticky-product">
                <!-- name and price -->
                <div class="product-title">
                    {{-- <a href="#" style="text-decoration: none; color: grey;">NIMA INTERIOR COLLECTIONS</a> --}}
                    <div class="product-name">{{ $itemsdetails->itemName }}</div>
                    <div class="product-price">${{ $itemsdetails->sellRate }}</div>
                    <p class="available-stock">Availability: In Stock</p>
                </div>
                <hr>
                <!-- color of product -->


                <!-- toolbar -->
                <!-- Addon Details Section -->
                <div class="tools-lvl-2 pt-2 pb-1">
                    @foreach ($itemsdetails->addondetails as $addonType => $addons)
                    <h5 class="size-heading">- {{ $addonType }} <span>(Select the one you need *)</span> </h5>
                    <hr>
                    <div class="size-radio">
                        @foreach ($addons as $index => $addon)
                        @php
                        $addonParts = explode(' - ', $addon);
                        $addonLabel = $addonParts[0];
                        $addonPrice = isset($addonParts[1]) ? $addonParts[1] : '';
                        $isFirst = $index === 0 ? 'checked' : '';
                        @endphp
                        <div class="radio-box">
                            <input type="radio" id="{{ strtolower($addonType) }}-{{ strtolower($addonLabel) }}"
                                name="{{ strtolower($addonType) }}" value="{{ strtolower($addonLabel) }}"
                                data-price="{{ $addonPrice }}"
                                onchange="updateRadios('{{ strtolower($addonType) }}-{{ strtolower($addonLabel) }}')" {{
                                $isFirst }}>
                            <label for="{{ strtolower($addonType) }}-{{ strtolower($addonLabel) }}">{{ $addonLabel }}
                                {{ $addonPrice }}</label>
                        </div>
                        <hr>
                        @endforeach

                    </div>
                    @endforeach


                </div>


                <hr>
                <!-- quantity and controls -->
                <div class="tools-lvl-3 r4 pt-2 pb-1 d-flex gap-3">
                    {{-- <div class="qty d-flex">
                        <button class="plus-btn" onclick="decrement();"><i class="fa-solid fa-minus"></i></button>
                        <div class="qty-text">1</div>
                        <button class="minus-btn" onclick="increment();"><i class="fa-solid fa-plus"></i></button>
                    </div> --}}
                    <a
                        href="{{ route_with_locale('addtocart', ['locale' => $locale,'id' => $itemsdetails->commonCode_id]) }}">
                        <button class="add-cart-btn">
                            <p>Add To Cart</p>
                        </button>
                    </a>


                    {{-- <div class="add-to-cart-container">
                        <h1>Add to cart
                            <button><i class="fa-solid fa-xmark"></i></button>
                        </h1>
                    </div> --}}

                    <button class="wish-list-btn" onclick="showsidebar('wishlist')"><i
                            class="fa-solid fa-heart"></i></button>
                    <div class="wishlist">
                        <h1>wishlist
                            <button class="close" onclick="close('wishlist')"><i class="fa-solid fa-xmark"></i></button>
                        </h1>
                    </div>
                </div>

            </div>
        </div>
    </div>


</div>



<!-- accordian -->
<div class="container">
    <div class="products-you-may-like">
        <div class="col-lg-12 col-md-7 col-sm-12 mt-5">
            <div class="products-new ">
                <h2 class="heading-head">Product You May Like</h2>
                <div class="layout r5">
                    @foreach ($productsYouMayLike as $item)
                    <a href="{{ route_with_locale('productdesc', ['slug' => $item->slug]) }}">
                        <div class="card">
                            <div class="image-container">
                                <img src="{{ $item->thumbnail }}" alt="Modular Modern Chair">

                                <div class="coupen-product heart">
                                    <p><a href=""> <i class="fa fa-heart"></i></a></p>
                                </div>
                                <div class="action-box">
                                    <div class="add-to-cart">
                                        {{-- <a href="javascript:void(0);"
                                            onclick="addToCart('{{ route_with_locale('addtocart', ['locale' => $locale,'id' => $itemsdetails->commondCode_id]) }}');">
                                            <p>Add To Cart</p>
                                        </a> --}}


                                    </div>

                                </div>
                            </div>

                            <div class="details">
                                <h2 class="product-name">{{ $item->itemName }}</h2>
                                <p class="price">${{ $item->itemName }} <span class="original-price">${{ $item->mrp
                                        }}</span></p>

                            </div>
                        </div>
                    </a>
                    @endforeach

                </div>

            </div>

        </div>
    </div>
</div>

<script>
    function addToCart(baseUrl) {
            const selectedAddons = {};


            document.querySelectorAll('.size-radio input[type="radio"]:checked').forEach((radio) => {
                const addonType = radio.name;
                const addonValue = radio.value;
                selectedAddons[addonType] = addonValue;
            });

            
            const quantity = parseInt(document.querySelector('.qty-text').textContent);


            console.log('Selected Addons:', selectedAddons);
            console.log('Quantity:', quantity);


            const queryString = new URLSearchParams(selectedAddons);
            queryString.append('quantity', quantity);


            console.log('Query String:', queryString.toString());


            window.location.href = `${baseUrl}?${queryString.toString()}`;
        }
</script>


<script>
    function updateCheckboxes(checkedId) {
            var checkboxes = document.getElementsByName('size');
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].id !== checkedId) {
                    checkboxes[i].checked = false;
                }
            }
        }
</script>

<script>
    $('.open-modal').click(function() {
            $('.modal-details').addClass("display-side-modal");
            $('.modal-desc').addClass("right-none");
        });

        $('.close-desc-modal').click(function() {
            $('.modal-details').removeClass("display-side-modal");
            $('.modal-desc').removeClass("right-none");
        });
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.querySelector('.modal-details');
            const modalTitle = document.getElementById('modal-title');
            const modalDescription = document.getElementById('modal-description');
            const closeModal = document.querySelector('.close-desc-modal');

            document.querySelectorAll('.open-modal').forEach(function(button) {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const title = this.getAttribute('data-title');
                    const description = this.getAttribute('data-description');

                    modalTitle.innerHTML = title;
                    modalDescription.innerHTML = description;
                    modal.style.display = 'block';
                });
            });

            closeModal.addEventListener('click', function() {
                modal.style.display = 'none';
            });
        });
</script>
<script>
    function showsidebar(className) {
            document.getElementsByClassName(`${className}`)[0].style.display = "block";
        }


        function close(className) {
            document.getElementsByClassName(`${className}`)[0].style.display = "none";
        }



        function increment() {
            var qtyElement = document.getElementsByClassName("qty-text")[0];
            var qty = parseInt(qtyElement.innerHTML);
            qty += 1;
            qtyElement.innerHTML = qty;
        }

        function decrement() {
            var qtyElement = document.getElementsByClassName("qty-text")[0];
            var qty = parseInt(qtyElement.innerHTML);
            qty -= 1;
            // if qty is zero it stys zero
            if (qty < 0) {
                qty = 0;
            }
            qtyElement.innerHTML = qty;
        }

        // accordian script

        var acc = document.getElementsByClassName("accordion-btn");
        var extend = document.getElementsByClassName("accordion-extend");
        var collapse = document.getElementsByClassName("accordion-collapse");

        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");

                var panel = this.nextElementSibling;

                if (panel.style.display === "block") {
                    panel.style.display = "none";
                    this.querySelector(".accordion-extend").style.display = "block";
                    this.querySelector(".accordion-collapse").style.display = "none";
                } else {
                    panel.style.display = "block";
                    this.querySelector(".accordion-extend").style.display = "none";
                    this.querySelector(".accordion-collapse").style.display = "block";
                }
            });
        }
        document.addEventListener('DOMContentLoaded', (event) => {
            const qtyText = document.querySelector('.qty-text');
            let qty = parseInt(qtyText.innerText, 10);

            window.increment = function() {
                qty++;
                qtyText.innerText = qty;
            }

            window.decrement = function() {
                if (qty > 1) { // Prevent going below 1
                    qty--;
                    qtyText.innerText = qty;
                }
            }
        });
</script>



@endsection