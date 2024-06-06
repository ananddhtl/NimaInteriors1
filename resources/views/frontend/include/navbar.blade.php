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

    .nav-container .sp-i {
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
            font-weight: 500;
            background: transparent;
        }

        .header-area .container-show .icon-container {
            text-align: center;
        }
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
</style>


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
                        <p style=" "><a href="/contact">Enkel open op afspraak </a></p>

                    </div>
                    <div class="contact-us-link d-flex align-items-center">
                        <div class="sp-i">
                            <i class="fa fa-envelope"></i>
                            <p class="contact-us-top-nav ml-3 underline-with-gap"><a
                                    href="mailto:info@nimainteriors.com">info@nimainteriors.com </a></p>

                        </div>
                        <div class="sp-i">
                            <i class="fa fa-phone"></i>
                            <p class="contact-us-top-nav ml-3 underline-with-gap"><a href="tel:+3232968266">+32 3 296 82
                                    66</a></p>

                        </div>
                    </div>

                </div>

                <div class=" right-bar">
                    {{-- drop down for langauge option --}}

                    <div class="header-account">
                        <div class="myaccount d-flex">
                            <div class="tongle" id="account-toggler">
                                <i class="fa fa-user"></i>
                                @if (auth()->check())
                                <span>{{ auth()->user()->fullname }}</span>
                                @else
                                <span>Account</span>
                                <i class="fa fa-angle-down"></i>
                                @endif
                            </div>
                            <div class="customer-ct content" id="account-dropdown">
                                <ul class="links">
                                    @if (auth()->check())
                                    <li class="first">
                                        <a class="top-link-myaccount" title="My Account" href="/customer/account">My
                                            Account</a>
                                    </li>
                                    <li>
                                        <a class="top-link-wishlist" title="My Wishlist" href="#">My Wishlist</a>
                                    </li>
                                    <li>
                                        <a class="top-link-checkout" title="Checkout" href="#">Order</a>
                                    </li>
                                    <li>
                                        <a class="top-link-profile" title="Profile" href="#">Profile</a>
                                    </li>
                                    <li>
                                        <form action="{{ route('customer.logout') }}" method="post">
                                            @csrf
                                            <button type="submit">Logout</button>
                                        </form>
                                    </li>
                                    @else
                                    <li class="last">
                                        <a class="top-link-login" title="Log In"
                                            href="{{ route('customer.login') }}">Login</a>
                                    </li>
                                    <li class="last">
                                        <a class="top-link-register" title="Register"
                                            href="{{ route('customer.register') }}">Register</a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                            <div class="wishlist">
                                <i class="fa fa-heart"></i>
                            </div>
                            <div class="c-cart">
                                <i class="fa fa-shopping-cart"></i>
                            </div>
                        </div>
                    </div>


                    <div class="mysetting">
                        <div class="tongle">
                            <div class="language-dropdown">
                                <a id="current-language" data-lang="{{ $current_locale }}" class="language-link"
                                    href="">
                                    <img id="current-flag" alt=""
                                        src="{{ asset('frontend/assets/images/photos/flag/' . ucfirst($current_locale) . '.png') }}">
                                    <span id="current-locale">{{ config('app.available_locales')[$current_locale]
                                        }}</span>
                                </a>
                                <div id="language-list" class="language-list">
                                    @foreach(config('app.available_locales') as $locale_code => $locale_name)
                                    @if($locale_code !== $current_locale)
                                    <a class="language-option" href="{{ route('language.switch', $locale_code) }}"
                                        data-locale="{{ $locale_code }}" data-locale-name="{{ $locale_name }}">
                                        <img alt=""
                                            src="{{ asset('frontend/assets/images/photos/flag/' . ucfirst($locale_code) . '.png') }}">
                                        <span>{{ $locale_name }}</span>
                                    </a>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
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
                <p style="margin: 0;"><a href="/contact">Enkel open op afspraak </a></p>

            </div>
            <div class="h-right">

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
                            <li><a href="/" id="home-link">{{ __('startpagina') }}</a></li>
                            <li><a href="/projecten" id="project-link">Projecten</a></li>
                            <li><a href="/blog" id="blog-link">Blogs</a></li>

                            <!-- Other navigation links -->
                            <li><a class="" href="/contact" id="contact-link">Contact</a></li>

                            {{-- <div class="vertical-line"></div> --}}
                            <li><a href="/shop" id="shop-link">Webshop</a></li>
                            {{-- <li><a href="#" id="search-link" class="s-form c-light">Zoeken <i
                                        class="fa fa-search"></i></a></li>
                            --}}
                            <li>

                                <div class="contact-us-link ham-contact-us">
                                    <div class="sp-i">
                                        <i class="fa fa-envelope"></i>
                                        <p class="contact-us-top-nav ml-3 "><a
                                                href="mailto:info@nimainteriors.com">info@nimainteriors.com </a></p>

                                    </div>
                                    <div class="sp-i">
                                        <i class="fa fa-phone"></i>
                                        <p class="contact-us-top-nav ml-3 "><a href=""> +32 3 296 82 66</a></p>

                                    </div>
                                    <div class="mysetting">
                                        <div class="tongle">
                                            <div class="language-dropdown">
                                                <a id="current-language" data-lang="{{ $current_locale }}"
                                                    class="language-link" href="">
                                                    <img id="current-flag" alt=""
                                                        src="{{ asset('frontend/assets/images/photos/flag/' . ucfirst($current_locale) . '.png') }}">
                                                    <span id="current-locale">{{
                                                        config('app.available_locales')[$current_locale] }}</span>
                                                </a>
                                                <div id="language-list" class="language-list">
                                                    @foreach(config('app.available_locales') as $locale_code =>
                                                    $locale_name)
                                                    @if($locale_code !== $current_locale)
                                                    <a class="language-option"
                                                        href="{{ route('language.switch', $locale_code) }}"
                                                        data-locale="{{ $locale_code }}"
                                                        data-locale-name="{{ $locale_name }}">
                                                        <img alt=""
                                                            src="{{ asset('frontend/assets/images/photos/flag/' . ucfirst($locale_code) . '.png') }}">
                                                        <span>{{ $locale_name }}</span>
                                                    </a>
                                                    @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>

                            </li>
                        </ul>
                        <form id="search-form" class="form-inline">
                            <input type="text" id="search" placeholder="Search..." class="form-control"
                                autocomplete="off">
                            <button type="submit" class="btn btn-primary">Search</button>
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
    document.addEventListener('DOMContentLoaded', () => {
        const currentLanguage = document.getElementById('current-language');
        const languageList = document.getElementById('language-list');
        const currentLocaleSpan = document.getElementById('current-locale');
        const currentFlagImg = document.getElementById('current-flag');
        let isMobile = false;

        // Check if the device is a mobile device
        if (/Mobi|Android/i.test(navigator.userAgent)) {
            isMobile = true;
        }

        // Function to update URL with selected language
        const updateURL = (locale) => {
        const url = new URL(window.location.href);
        url.searchParams.set('lang', locale);
        window.history.replaceState({}, '', url.toString());
    };

    // Toggle dropdown visibility on language button click for mobile devices
    if (isMobile) {
        currentLanguage.addEventListener('click', (event) => {
            event.preventDefault(); // Prevent default link behavior
            languageList.style.display = 'block';
        });
    } else {
        // Show dropdown on language button hover for desktop devices
        currentLanguage.addEventListener('mouseenter', () => {
            languageList.style.display = 'block';
        });

        currentLanguage.addEventListener('mouseleave', () => {
            setTimeout(() => {
                if (!languageList.matches(':hover')) {
                    languageList.style.display = 'none';
                }
            }, 200);
        });
    }

    // Listen for language option clicks
    languageList.querySelectorAll('.language-option').forEach(option => {
        option.addEventListener('click', (event) => {
            event.preventDefault(); // Prevent default link behavior

            const selectedLocale = option.getAttribute('data-locale');
            const selectedLocaleName = option.getAttribute('data-locale-name');
            const selectedLocaleFlag = option.querySelector('img').getAttribute('src');

            // Update current language display
            currentLocaleSpan.textContent = selectedLocaleName;
            currentFlagImg.setAttribute('src', selectedLocaleFlag);
            currentLanguage.setAttribute('data-lang', selectedLocale);

            // Update URL with selected language
            updateURL(selectedLocale);

            // Prevent default link behavior
            event.stopPropagation();
            event.stopImmediatePropagation();
            return false;
        });
    });

    // Prevent touch events on dropdown from closing it immediately
    languageList.addEventListener('click', (event) => {
        event.stopPropagation();
    });

    // Close the dropdown when tapping outside of it on mobile devices
    document.addEventListener('touchstart', (event) => {
            if (isMobile && !currentLanguage.contains(event.target) && !languageList.contains(event.target)) {
                languageList.style.display = 'none';
            }
        });
    });

</script>