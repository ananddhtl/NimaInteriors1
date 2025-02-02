@extends('welcome')
@section('title','Contact:: Nimainteriors.com')
@section('content')

@if (session('message'))
<p>{{ 'message' }}</p> 
@endif
@if (session('error'))
<p>{{ 'error' }}</p> 
@endif
<section class="page">
    <!-- ***** Page Top Start ***** -->
    <div class="cover" data-image="{{ asset('frontend/assets/images/photos/project/project_cover.jpeg') }}">
        <div class="cover-top">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-3 col-lg-6">
                        <h1>{{ __('Contacten') }}</h1>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ***** Page Top End ***** -->

    <!-- ***** Page Content Start ***** -->
    <div class="page-bottom ">
        <!-- ***** Map Container Start ***** -->
        <div class="section map">

        </div>
        <!-- ***** Map Container End ***** -->

        <div class="container mb-4 b-line">
            <div class="contact-title-content">
                <h5>{{ __('Breng je interieur naar een hoger niveau met Nima Interiors') }}</h5>
                <div class="contact-text">
                    <p>{{ __('Benieuwd hoe wij jouw interieurinrichting transformeren? Maak een afspraak in onze showroom.') }}</p>
                    <p>{{ __('Vul het contactformulier in of bel ons vandaag nog. We staan klaar om je te helpen jouw visie werkelijkheid te maken.') }}</p>
                </div>
            </div>
        </div>

        <div class="contact-bottom">
            <div class="container">
                <div class="row">
                    @if (session('success'))
                    <div id="success-message" class="alert alert-success">
                        {!! session('success') !!}
                    </div>
                    @endif

                    <!-- ***** Contact Text Start ***** -->
                    <div class="col-lg-6 col-md-6 col-sm-12  text-right">
                        <h5>{{ __('Neem contact met ons op') }}</h5>
                        <div class="contact-text">
                            <p>{{ __('Open op afspraak') }} </p>
                            <p>{{ $contactInfo->address }}</p>
                            <p><a
                                href="mailto:info@nimainteriors.com"><p>{{ $contactInfo->email }}</p>
                            </a></p>
                            <p><a href="tel:+3232968266"><i class="fa fa-phone"></i>{{ $contactInfo->contactNumber }}
                            </a></p>
                        </div>
                        
                        <div class="iframe-container">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976!2d1!3d1!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2sHerentalsebaan+301%2C+2150+Borsbeek!5e0!3m2!1snl!2sBE!4v1714897402000"
                                loading="lazy"></iframe>
                        </div>
                    </div>
                    <!-- ***** Contact Text End ***** -->

                    <!-- ***** Contact Form Start ***** -->
                    <div class="col-lg-6 col-md-6 col-sm-12 border-left">
                        <form id="contactForm" action="{{ route_with_locale('contactform') }}" method="POST">
                            @csrf
                            <div class="contact-form">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <input type="text" class="form-u" name="fname" placeholder="{{ __('Voornaam') }}"
                                            value="{{ old('fname') }}">
                                        @if ($errors->has('fname'))
                                        <p class="error-form">{{ $errors->first('fname') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <input type="text" name="lname" placeholder="{{ __('Achternaam') }}"
                                            value="{{ old('lname') }}">
                                        @if ($errors->has('lname'))
                                        <p class="error-form">{{ $errors->first('lname') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 ">
                                        <select name="iam" class="form-select form-u" aria-label="Ik ben">
                                            <option disabled hidden {{ old('iam') ? '' : 'selected' }}>{{ __('Ik ben') }}</option>
                                            <option value="particulars" {{ old('iam')=='particulars' ? 'selected' : ''
                                                }}>{{ __('Particulier') }}</option>
                                            <option value="architect" {{ old('iam')=='architect' ? 'selected' : '' }}>
                                                {{ __('Architect') }}</option>
                                            <option value="constructionpromoter" {{ old('iam')=='constructionpromoter'
                                                ? 'selected' : '' }}>{{ __('Bouwpromoter') }}</option>
                                            <option value="others" {{ old('iam')=='others' ? 'selected' : '' }}>{{ __('Andere') }}
                                            </option>
                                        </select>
                                        @if ($errors->has('iam'))
                                        <p class="error-form">{{ $errors->first('iam') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 ">
                                        <select name="project" class="form-select form-u">
                                            <option disabled hidden {{ old('project') ? '' : 'selected' }}>{{ __('Kies project type') }}</option>
                                            <option value="newconstruction" {{ old('project')=='newconstruction'
                                                ? 'selected' : '' }}>{{ __('Nieuwbouw') }}</option>
                                            <option value="renovation" {{ old('project')=='renovation' ? 'selected' : ''
                                                }}>{{ __('Renovatie') }}</option>
                                            <option value="others" {{ old('project')=='others' ? 'selected' : '' }}>
                                                {{ __('Andere') }}</option>
                                        </select>
                                        @if ($errors->has('project'))
                                        <p class="error-form">{{ $errors->first('project') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <input type="text" name="phonenumber" placeholder="{{ __('Telefoonnummer') }}"
                                            value="{{ old('phonenumber') }}">
                                        @if ($errors->has('phonenumber'))
                                        <p class="error-form">{{ $errors->first('phonenumber') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <input type="text" name="streetnumber" placeholder="{{ __('Straatnaam en huis nummer') }}"
                                            value="{{ old('streetnumber') }}">
                                        @if ($errors->has('streetnumber'))
                                        <p class="error-form">{{ $errors->first('streetnumber') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <input type="text" name="pcodeandc" placeholder="{{ __('Postcode en stad') }}"
                                            value="{{ old('pcodeandc') }}">
                                        @if ($errors->has('pcodeandc'))
                                        <p class="error-form">{{ $errors->first('pcodeandc') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <input type="email" name="email" placeholder="{{ __('E-mailadres') }}"
                                            value="{{ old('email') }}">
                                        @if ($errors->has('email'))
                                        <p class="error-form">{{ $errors->first('email') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea name="message" placeholder="{{ __('Bericht') }}">{{ old('message') }}</textarea>
                                        @if ($errors->has('message'))
                                        <p class="error-form">{{ $errors->first('message') }}</p>
                                        @endif
                                    </div>
                                    <div
                                        class="col-lg-12 text-left height: 30px; display: flex; justify-content: center; align-items: center;">
                                        <button id="submitButton" class="btn btn-c float-right"
                                            type="submit">{{ __('Verzend') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>


                    </div>

                    <!-- ***** Contact Form End ***** -->
                </div>
            </div>
        </div>

    </div>


    <!-- ***** Page Content End ***** -->
</section>
<section class="section profile-section white pt-5">
    <div class="container white">
        <div class="row">
            <div class="img-profile col-lg-6 col-md-6 col-sm-12">

                <img src="{{ asset('frontend/assets/images/photos/contact/MajdaenAdam.jpeg') }}" class="img-fluid"
                    alt="Title">

            </div>
            <div class="profile-info col-lg-6 col-md-6 col-sm-12  text-justify">
                <h3 class=" pb-4">
                    {{ __('Een toegewijd familiebedrijf sinds 2014') }}
                </h3>
                <p>
                    {{ __('Welcome to Nima Interiors. Adam and Majda started with a shared passion for interiors. After years of experience at renowned interior companies, they decided to go their own way. What once began as a broad range of interior designs quickly evolved into a special focus on kitchens and every aspect of home comfort, comparable to the best of all modern furniture.') }}
                </p>
                <p>
                {{ __('Now, over twenty years later, they have specialized in designing and realizing refined interiors, from kitchens to every detail that contributes to the home\'s atmosphere. Throughout their journey, they have developed their own unique style, a style proudly recognized as that of Nima Interiors, but above all, as your personal signature.') }}
                </p>
            </div>
        </div>

    </div>
</section>
<script>
    document.getElementById('contactForm').addEventListener('submit', function(event) {
            var iamSelect = document.getElementById('iamSelect');
            var projectSelect = document.getElementById('projectSelect');
            
            if (iamSelect.value === null || iamSelect.value === '') {
                event.preventDefault(); // Prevent form submission
                alert('Selecteer een optie bij "Ik ben".'); // Display an alert message
            }
            
            if (projectSelect.value === null || projectSelect.value === '') {
                event.preventDefault(); // Prevent form submission
                alert('Selecteer een project type.'); // Display an alert message
            }
        });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Function to restore the scroll position
        function restoreScrollPosition() {
            var scrollpos = sessionStorage.getItem('scrollpos');
            if (scrollpos) {
                window.scrollTo(0, scrollpos);
                sessionStorage.removeItem('scrollpos');
            }
        }

        // Function to scroll to the success message or the contact form with an offset
        function scrollToRelevantSection() {
            var successMessage = document.getElementById('success-message');
            var offset = 380; // Adjust the offset value as needed

            if (successMessage) {
                window.scrollTo({
                    top: successMessage.getBoundingClientRect().top + window.pageYOffset - offset,
                    behavior: 'smooth'
                });
            } else {
                var contactForm = document.getElementById('contactForm');
                if (contactForm) {
                    window.scrollTo({
                        top: contactForm.getBoundingClientRect().top + window.pageYOffset - offset,
                        behavior: 'smooth'
                    });
                }
            }
        }

        // Store scroll position in sessionStorage before the form is submitted
        document.getElementById('contactForm').addEventListener('submit', function() {
            sessionStorage.setItem('scrollpos', window.scrollY);
        });

        // Restore scroll position and scroll to relevant section after the page reloads
        restoreScrollPosition();
        
    // Only scroll to relevant section if there is a success message or form errors
    if (document.getElementById('success-message') || document.querySelector('.error-form')) {
        scrollToRelevantSection();
    }
    });
</script>

@endsection