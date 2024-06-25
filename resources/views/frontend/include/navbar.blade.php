<div class="preloader-wrapper">
    <div class="loader"></div>
</div>
<style>
    .whole-container,
    .container-show {
        display: none;
    }

    .nav-container .left-bar {
        gap: 15px;
        padding: 15px;
    }

    .nav-container .left-bar i {
        color: #606F060;
    }

    .nav-container .left-bar a {
        color: #606060;
    }

    .nav-container .right-bar {
        /* display: none; */
        display: flex;
        gap: 20px;
    }

    .nav-container .right-bar i {
        color: #606060;
    }

    .nav-container .right-bar a {
        color: #606060;
    }

    .nav-container .line {
        width: 100%;

    }

    .nav-container .top-bar {
        font-size: 12px;

    }

    .nav-container .contact-us-link {
        display: flex;
        gap: 15px;
    }

    .container-top-header .sp-i {
        display: flex;
        gap: 5px;
        align-items: center
    }

    .header-area .main-nav .nav li .c-light {
        color: rgb(152, 152, 152);

    }

    .header-area .main-nav .nav li .c-light:hover {
        border-bottom: none;

    }

    .header-area .main-nav .nav li .s-form {
        /* position: absolute; */
    }

    .header-area .main-nav .form-inline {
        position: absolute;
        margin-top: 200px;
        width: 50%;
        right: 0;
    }

    .header-area .main-nav .nav .form-inline .form-control {
        height: 40px;
    }

    #search-form {
        display: none;
        /* Initially hidden */

    }

    .nav-container .contact-us-top-nav {

        margin-left: 5px;
    }

    .whole-container {
        border-bottom: 1px solid rgb(236, 236, 236);
    }

    .container-show {
        display: none;
        text-decoration: none;

    }

    .element-with-border {
        position: relative;
        /* Required for positioning the pseudo-element */
    }

    .element-with-border::after {
        content: '';
        position: absolute;
        top: -1px;
        /* Adjust as needed to position the pseudo-element */
        left: -1px;
        /* Adjust as needed to position the pseudo-element */
        right: -1px;
        /* Adjust as needed to position the pseudo-element */
        bottom: -1px;
        /* Adjust as needed to position the pseudo-element */
        border: 0.1px solid #e9e8e8;
        /* This creates a very fine line border */
        pointer-events: none;
        /* Ensure the pseudo-element does not interfere with pointer events */
    }

    .container-top-header {
        margin: 0 40px;
    }

    .underline-with-gap {
        display: inline-block;
        padding-bottom: 1px;
        /* Adjust as needed */
        border-bottom: 1px solid #b7b7b7;
        /* Adjust thickness and color as needed */
        text-decoration: none;
        /* Remove default underline */
    }

    .vertical-line {
        width: 1px;
        height: 40px;
        background-color: black;
        /* Change color here if needed */
    }

    @media (max-width: 991px) {
        .container-show {
            display: block;
            text-align: center
        }

        .header-area .container-show {
            border-bottom: 1px solid rgb(236, 236, 236);
        }

        .header-area .container-show a,
        .header-area .container-show i {
            color: #595959;
            font-size: 12px;

            background: transparent;
        }

        .header-area .container-show .icon-container {
            text-align: center;
        }
    }

    .flags {
        cursor: pointer;
    }

    .language-dropdown {
        position: relative;
        display: inline-block;
    }

    .language-list {
        display: none;
        position: absolute;
        background-color: white;
        min-width: 160px;
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        z-index: 1;
        margin-top: 10px;
    }

    .language-list a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: flex;
        align-items: center;
    }

    .language-list a:hover {
        background-color: #f1f1f1;
    }

    .language-option img {
        margin-right: 10px;
    }

    .top-new-right {
        display: flex;
        gap: 20px;
        width: 50%;
        justify-content: right;
        align-items: center;
    }

    .top-new-right a {
        color: #606060;
        font-size: 14px !important;
    }

    .login-register {
        display: flex;
        gap: 20px;

    }

    .userprofile {
        position: relative;
    }

    .dropdown-show {
        display: block !important;
    }

    .user-dropdown {
        position: absolute;
        top: 42px;
        /* left: 0px; */
        width: 150px;
        background-color: white;
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        display: none;
        z-index: 99;
    }

    .language-dropdown {
        position: absolute;
        top: 42px;
        z-index: 99;
        width: 75px;
        background-color: white;
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        padding: 10px;
        display: none;
    }

    .user-dropdown ul li {
        padding: 10px;
        border-bottom: 1px solid rgb(211, 211, 211);
    }

    .user-dropdown ul li a {
        font-size: 13px;
    }

    .user-dropdown ul li:last-child {
        border-bottom: none !important;
    }

    .userprofile p {
        display: flex;
        align-items: center;
        cursor: pointer;
    }

    .userprofile i.acc-user {
        font-size: 12px;
        margin-right: 10px;
    }

    .caret-up-dropdown {
        position: absolute;
        top: -10px;
    }

    .caret-up-dropdown i {
        font-size: 20px;
        margin-left: 10px;
        color: white;
    }

    .userprofile i.fa-caret-down {
        font-size: 12px;
        margin-left: 7px;
    }

    .cart-new span {
        margin-left: 5px;
        color: rgb(221, 156, 119);
        font-weight: bold;
    }

    .profile-ul {
        background: #f1f1f1;
        z-index: 4;
    }

    /modal popup/ .new-modal {
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

    .search-lists {
        display: flex;
        gap: 10px;
    }

    .search-lists input {
        padding: 10px;
        width: 85%;
    }

    .search-lists button {
        width: 15%;
    }

    .new-modal-body {
        padding: 15px 16px;
    }

    .new-modal-body form {
        margin-left: 10px;
    }
    .option-lang{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-content: center;
    }
    .option-lang a{
        padding:5px;
    }
</style>
<div id="newModal" class="new-modal">

    <div class="new-modal-content">
        <div class="new-modal-header">
            <div class="address-modal-title">
                <h4>Search Items</h4>
            </div>
            <div class="close-modal">
                <span class="modal-close">&times;</span>
            </div>
        </div>
        <div class="new-modal-body">
            <form action="{{ route_with_locale('searchresults') }}" method="GET">
                <div class="search-lists">
                    <form>
                        <input type="text" name="query" autocomplete="off" placeholder="Search......">
                        <button class="btn btn-primary" type="submit">{{ __('Zoeken') }}</button>
                    </form>


                </div>

            </form>
        </div>

    </div>

</div>


<header class="header-area">
    <div class="whole-container nav-container bg-gray1 pa-4">
        <div class="container-top-header">
            <div class="top-bar d-flex justify-content-between align-items-center">

                <div class="left-bar d-flex">
                    <div class="social-sites d-flex ">
                        <p><a href="https://www.facebook.com/nimainterieurs/" class="site-bg" target="_blank"><i
                                    class="fa fa-facebook">&nbsp; </i></a></p>
                        <p style="margin-left: 3px;"><a href="https://www.pinterest.com/nimainteriors/" class="site-bg"
                                target="_blank"><i class="fa fa-pinterest">&nbsp; </i></a></p>
                        <p style="margin-left: 3px;"><a href="https://www.instagram.com/nima.interiors/" class="site-bg"
                                target="_blank"><i class="fa fa-instagram">&nbsp;&nbsp; </i></a></p>

                    </div>
                    <div class="sp-i">
                        <i class="fa fa-info-circle"></i>
                        <p style=" "><a href="{{ route_with_locale('frontend.contact') }}">{{ __('Enkel open op afspraak') }} </a></p>

                    </div>
                    <div class="contact-us-link d-flex align-items-center">
                        <div class="sp-i">
                            <i class="fa fa-envelope"></i>
                            <p class="contact-us-top-nav ml-3 underline-with-gap"><a
                                    href="mailto:info@nimainteriors.com">{{ $contactInfo->email }}</a></p>

                        </div>
                        <div class="sp-i">
                            <i class="fa fa-phone"></i>
                            <p class="contact-us-top-nav ml-3 underline-with-gap"><a href="tel:+3232968266">{{
                                    $contactInfo->contactNumber }}</a></p>

                        </div>
                    </div>

                </div>

                <div class="top-new-right">
                    @if (auth()->check())
                    <div class="userprofile">
                        <p class="show-dropdown"><i class="fa-solid fa-user acc-user"></i>
                            {{ auth()->user()->fullname }} <i class="fa-solid fa-caret-down"></i></p>
                        <div class="user-dropdown">
                            <div class="caret-up-dropdown">
                                <i class="fa-solid fa-caret-up"></i>
                            </div>
                            <ul>
                                <li><a href="{{ route_with_locale('dashboard') }}">{{ __('Profiel') }}</a></li>
                                <li>
                                    <form action="{{ route_with_locale('customer.logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn"><i
                                                class="fa-solid fa-arrow-right-from-bracket"></i>{{ __('Afmelden')
                                            }}</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @else
                    <div class="login-register">
                        <a href="{{ route_with_locale('customer.login') }}"><i class="fa-solid fa-user"></i></a>

                    </div>
                    @endif
                    @php
                    $totalQuantity = 0;
                    if (session('cart')) {
                    foreach (session('cart') as $item) {
                    $totalQuantity += $item['quantity'];
                    }
                    }
                    @endphp

                    <a href="{{ route_with_locale('cart') }}" class="cart-new">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span>({{ $totalQuantity }})</span>
                    </a>

                    <a href="{{ route_with_locale('wishlist', ['locale' => $locale]) }}" class="cart-new" id="wishlist-count"><i class="fa-solid fa-heart"></i><span>0</span></a>
                    {{-- flag language option start here --}}
                    <div class="flags">
                        <a class="flag-default" id="current-language">
                            @if ($current_locale === 'nl_be')
                            <img alt="" src="{{ asset('frontend/assets/images/photos/flag/be.png') }}">
                            BE
                            @elseif ($current_locale === 'nl')
                            <img alt="" src="{{ asset('frontend/assets/images/photos/flag/nl.png') }}">
                            NL
                            @elseif ($current_locale === 'en')
                            <img alt="" src="{{ asset('frontend/assets/images/photos/flag/en.png') }}">
                            EN
                            @endif
                            <i class="fa-solid fa-caret-down"></i>

                        </a>
                        <div class="language-dropdown">
                            <div class="caret-up-dropdown">
                                <i class="fa-solid fa-caret-up"></i>
                            </div>

                            @if ($current_locale === 'nl_be')
                            <div class="option-lang">
                                <a href="{{ route('language.switch', ['locale' => 'en']) }}" id="EN-language">
                                    <img alt="" src="{{ asset('frontend/assets/images/photos/flag/en.png') }}">
                                    EN
                                </a>
                                <a href="{{ route('language.switch', ['locale' => 'nl']) }}" id="NL-language">
                                    <img alt="" src="{{ asset('frontend/assets/images/photos/flag/nl.png') }}">
                                    NL
                                </a>
                            </div>
                            
                            @elseif ($current_locale === 'nl')
                            <div class="option-lang">
                                <a href="{{ route('language.switch', ['locale' => 'nl_be']) }}" id="BE-language">
                                    <img alt="" src="{{ asset('frontend/assets/images/photos/flag/be.png') }}">
                                    BE
                                </a>
                                <a href="{{ route('language.switch', ['locale' => 'en']) }}" id="EN-language">
                                    <img alt="" src="{{ asset('frontend/assets/images/photos/flag/en.png') }}">
                                    EN
                                </a>
                            </div>
                         
                            @elseif ($current_locale === 'en')
                            <div class="option-lang">
                                <a href="{{ route('language.switch', ['locale' => 'nl_be']) }}" id="BE-language">
                                    <img alt="" src="{{ asset('frontend/assets/images/photos/flag/be.png') }}">
                                    BE
                                </a>
                                <a href="{{ route('language.switch', ['locale' => 'nl']) }}" id="NL-language">
                                    <img alt="" src="{{ asset('frontend/assets/images/photos/flag/nl.png') }}">
                                    NL
                                </a>
                            </div>
                          
                            @endif
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
    </div>
    <div class="container-show bg-gray1 pa-4 ">
        <div class="h-top align-items-center  p-2">
            <div class="h-left d-flex justify-content-center">
                <div class="icon-container">
                    <i class="fa fa-info-circle "></i>
                </div>

                <span class="p-1"></span>
                <p style="margin: 0;"><a href="{{ route_with_locale('frontend.contact') }}">{{ __('Enkel open op afspraak') }} </a></p>

            </div>
            <div class="top-new-right">
                @if (auth()->check())
                <div class="userprofile">
                    <p class="show-dropdown"><i class="fa-solid fa-user acc-user"></i>
                        <i class="fa-solid fa-caret-down"></i>
                    </p>
                    <div class="user-dropdown">
                        <div class="caret-up-dropdown">
                            <i class="fa-solid fa-caret-up"></i>
                        </div>
                        <div class="profile-ul">
                            <ul>
                                <li><a href="{{ route_with_locale('dashboard') }}">{{ __('Profiel') }}</a></li>
                                <li>
                                    <form action="{{ route_with_locale('customer.logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn"><i
                                                class="fa-solid fa-arrow-right-from-bracket"></i> {{ __('Afmelden')
                                            }}</button>
                                    </form>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                @else
                <div class="login-register">
                    <a href="{{ route_with_locale('customer.login') }}"><i class="fa-solid fa-user"></i></a>

                </div>
                @endif

                {{-- cart shop --}}

                @php
                $totalQuantity = 0;
                if (session('cart')) {
                foreach (session('cart') as $item) {
                $totalQuantity += $item['quantity'];
                }
                }
                @endphp

                <a href="{{ route_with_locale('cart') }}" class="cart-new">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span>({{ $totalQuantity }})</span>
                </a>
                {{-- wishlist --}}
                <a href="{{ route_with_locale('wishlist', ['locale' => $locale]) }}" class="cart-new" id="wishlist-count"><i class="fa-solid fa-heart"></i><span>0</span></a>                <div class="flags">
                    <a class="flag-default" id="current-language">
                        @if ($current_locale === 'nl_be')
                        <img alt="" src="{{ asset('frontend/assets/images/photos/flag/be.png') }}">
                        BE
                        @elseif ($current_locale === 'nl')
                        <img alt="" src="{{ asset('frontend/assets/images/photos/flag/nl.png') }}">
                        NL
                        @elseif ($current_locale === 'en')
                        <img alt="" src="{{ asset('frontend/assets/images/photos/flag/en.png') }}">
                        EN
                        @endif
                        <i class="fa-solid fa-caret-down"></i>

                    </a>
                    <div class="language-dropdown">
                        <div class="caret-up-dropdown">
                            <i class="fa-solid fa-caret-up"></i>
                        </div>

                        @if ($current_locale === 'nl_be')
                            <a href="{{ route('language.switch', ['locale' => 'en']) }}" id="EN-language">
                                <img alt="" src="{{ asset('frontend/assets/images/photos/flag/en.png') }}">
                                EN
                            </a>
                            <a href="{{ route('language.switch', ['locale' => 'nl']) }}" id="NL-language">
                                <img alt="" src="{{ asset('frontend/assets/images/photos/flag/nl.png') }}">
                                NL
                            </a>
                        @elseif ($current_locale === 'nl')
                            <a href="{{ route('language.switch', ['locale' => 'nl_be']) }}" id="BE-language">
                                <img alt="" src="{{ asset('frontend/assets/images/photos/flag/be.png') }}">
                                BE
                            </a>
                            <a href="{{ route('language.switch', ['locale' => 'en']) }}" id="EN-language">
                                <img alt="" src="{{ asset('frontend/assets/images/photos/flag/en.png') }}">
                                EN
                            </a>
                        @elseif ($current_locale === 'en')
                            <a href="{{ route('language.switch', ['locale' => 'nl_be']) }}" id="BE-language">
                                <img alt="" src="{{ asset('frontend/assets/images/photos/flag/be.png') }}">
                                BE
                            </a>
                            <a href="{{ route('language.switch', ['locale' => 'nl']) }}" id="NL-language">
                                <img alt="" src="{{ asset('frontend/assets/images/photos/flag/nl.png') }}">
                                NL
                            </a>
                        @endif
                        
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="container-top-header">
        <div class="row">
            <div class="col-12 ">
                <nav style="" class="main-nav ">
                    <div class="main-flex">
                        <a href="/" class="logo">
                            <img src="{{ asset('frontend/assets/images/nima_logo.png') }}" alt="nima" />
                        </a>

                        <ul class="nav">
                            <li><a href="{{ route_with_locale('frontend.homepage') }}
                                " id="home-link">{{ __('Startpagina') }}</a></li>
                            <li><a href="{{ route_with_locale('projectlist') }}" id="project-link">{{ __('Projecten')
                                    }}</a>
                            </li>
                            <li><a href="{{ route_with_locale('bloglist') }}" id="blog-link">{{ __('Blogs') }}</a></li>

                            <!-- Other navigation links -->
                            <li><a class="" href="{{ route_with_locale('frontend.contact') }}" id="contact-link">{{
                                    __('Contacten') }}</a></li>

                            {{-- <div class="vertical-line"></div> --}}
                            <li><a href="{{ route_with_locale('productslist') }}" id="shop-link">{{ __('Webshop') }}</a>
                            </li>

                            <li>
                                <div class="search-icon">
                                    <i class="fa-solid fa-magnifying-glass" id="modalbtn"></i>
                                </div>
                            </li>

                            {{-- <div id="search-form" style="display: none;">
                                <form id="search-form-field" action="{{ route('search') }}" method="GET">
                                    <input type="text" name="keyword" placeholder="Search..." id="search-input">
                                    <button type="submit">Search</button>
                                </form>
                                <div id="search-results" style="display: none;"></div>
                            </div> --}}
                            <li>


                                <div class="contact-us-link ham-contact-us">
                                    <div class="sp-i">
                                        <i class="fa fa-envelope"></i>
                                        <p class="contact-us-top-nav ml-3 "><a href="mailto:info@nimainteriors.com">{{
                                                $contactInfo->email }}</a></p>

                                    </div>
                                    <div class="sp-i">
                                        <i class="fa fa-phone"></i>
                                        <p class="contact-us-top-nav ml-3 "><a href=""> {{ $contactInfo->contactNumber
                                                }}</a></p>

                                    </div>

                                </div>
                            </li>
                            <li>

                            </li>
                        </ul>
                        <form id="search-form" class="form-inline">
                            <input type="text" id="search" placeholder="Search..." class="form-control"
                                autocomplete="off">
                            <button type="submit" class="btn btn-primary">{{ __('Zoeken') }}</button>
                        </form>
                        <a class="menu-trigger">
                            <span>Menu</span>
                        </a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>


<script>
    $(document).ready(function() {

        $('.flag-default').on('click', function() {
            $('.language-dropdown').toggleClass('dropdown-show');
        });


        $('#english-language').on('click', function() {

            var usSVG = $('#english-language svg').parent().html();
            var belgiumSVG = $('#belgium-language svg').parent().html();


            $('#belgium-language svg').parent().html(usSVG);
            $('#english-language svg').parent().html(belgiumSVG);


            $('#belgium-language i').remove();
            $('#english-language i').remove();

            var caretIcon = '<i class="fa-solid fa-caret-down"></i>';
            $('#belgium-language').append(caretIcon);
            $('#english-language').append(caretIcon);

            // Hide the dropdown after swap
            $('.language-dropdown').removeClass('dropdown-show');
        });
        $('.show-dropdown').on('click', function() {
        $('.user-dropdown').toggleClass('dropdown-show');
    });

    $('.accept-cookies').on('click', function() {
        $('.cookies-popup').addClass('cookies-display-none');
    });

    $('.cancle-cookies').on('click', function() {
        $('.cookies-popup').addClass('cookies-display-none');
});
    });
   
</script>
<script>
    var modal = document.getElementById("newModal");
    var btn = document.getElementById("modalbtn");
    var span = document.getElementsByClassName("modal-close")[0];

    btn.onclick = function () {
        modal.style.display = "block";
    }

    span.onclick = function () {
        modal.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>