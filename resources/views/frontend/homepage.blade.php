@extends('welcome')

@section('content')
<!-- ***** Welcome Area Start ***** -->
<div class="welcome">
    
    <div class="welcome-content">
        @foreach($homepagecontents as $content)
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <div class="welcome-text">
                        <h1>{{ $content->title_translation }}</h1>
                        <p>{{ $content->content_translation }}</p>
                        <a class="btn btn-c" href="{{ route_with_locale('frontend.contact') }}">
                            <span>{{ __('Plan jouw showroombezoek') }}</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="slider-position">&nbsp;</div>
                </div>
            </div>
        </div>
        <div class="slider-wrapper">
            <div class="base">
                <div class="prev">
                    <i class="fa fa-angle-left"></i>
                </div>
                <div class="next">
                    <i class="fa fa-angle-right"></i>
                </div>
            </div>
            {{-- Check if carousel items exist --}}
            @if ($content->carouselItems->isNotEmpty())
                <div class="owl-carousel">
                    @foreach($content->carouselItems as $item)
                    
                        <div class="item">
                            <div class="img">
                             
        
                                <a href="{{ route_with_locale('projectdesc', ['slug' => $item->project->slug]) }}" class="project-grid-item">
                                    <img src="{{ asset('storage/' . $item->image) }}" class="d-block w-100" alt="...">
                                </a>
                                   </div>
                           
                            <div class="text">
                                <p>{{ $item->text_translation }}p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p>No carousel items found.</p>
            @endif
        
        </div>
        @endforeach
    </div>
    
</div>

<!-- ***** Welcome Area End ***** -->

<!-- ***** Features Big Item Start ***** -->
<section class="section white padding-bottom-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-12 col-sm-12 align-self-center mobile-bottom-fix">
                <div class="left-heading">
                    <h2 class="section-title dotted">{{ __('Jouw bestemming voor verfijnde keukens en interieurdesign') }}</h2>
                </div>
                <div class="left-text">
                    <p class="dark">{{ __('Bij Nima Interiors ligt de focus op verfijnd detailwerk dat groot verschil maakt. Wij geloven in de kracht van strakke, tijdloze ontwerpen. Elk element van onze keukens is met zorg en precisie ontworpen, met aandacht voor de kleinste details. Bij ons wordt elk idee, hoe verfijnd ook, werkelijkheid.') }}

                    </p>
                    <p>{{ __('Wij hanteren een persoonlijke benadering waarbij jouw visie centraal staat. Denk je aan een moderne keuken met strakke lijnen of wil je een tijdloos klassiek ontwerp? Bij Nima Interiors in Borsbeek kunnen we de keuken die jij in gedachten hebt werkelijkheid maken.') }} </p>



                </div>
                <a class="section-btn" href="{{ route_with_locale('frontend.contact') }}">
                    <div class="btn btn-c">
                        {{ __('Maak een afspraak') }}
                    </div>
                </a>

            </div>
            <div class="offset-lg-1 col-lg-6 col-md-12 col-sm-12 align-self-center">
                <div data-scroll-reveal="enter right move 30px over 0.6s after 0.3s">
                    <img src="{{ asset('frontend/assets/images/photos/welcome/home-1.jpeg') }}"
                        class="img-fluid float-right" alt="Title">
                </div>

            </div>

        </div>
    </div>
</section>
<!-- ***** Features Big Item End ***** -->

<!-- ***** Home Parallax Area Start ***** -->
<section class="half-parallax">



</section>
<!-- ***** Home Parallax Area End ***** -->
<!-- ***** Features Big Item Start ***** -->
<section class="section ">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 align-self-center mobile-bottom-fix">
                <div class="row no-gutters">
                    <div class="col-lg-6  ">
                        <div data-scroll-reveal="enter right move 30px over 0.6s after 0.3s">
                            <img src="{{ asset('frontend/assets/images/photos/home/showroom1.jpeg') }}"
                                class="img-fluid float-right" alt="Title">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div data-scroll-reveal="enter right move 30px over 0.6s after 0.3s">
                            <img src="{{ asset('frontend/assets/images/photos/home/show2.jpeg') }}"
                                class="img-fluid float-right" alt="Title">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4  col-sm-12 ">
                <div class="left-heading">
                    <h2 class="section-title dotted">{{ __('Onze showroom') }}</h2>
                </div>
                <div class="left-text">
                    <p class="dark">{{ __('Stap binnen en laat je verwelkomen in een tijdloze ruimte van inspiratie. We nodigen je graag uit op afspraak en nemen de tijd om samen jouw droomkeuken tot in detail te bespreken.') }} </p>
                    <p class="dark"> {{ __('Onze showroom in Borsbeek biedt een verfijnde setting om jouw nieuwe keuken zonder haast te kiezen. Laat je creativiteit de vrije loop terwijl je onze diverse showroomkeukens verkent') }}</p>



                </div>
                <div>
                    <a href="{{ route_with_locale('frontend.contact') }}" class="btn btn-c ">
                        {{ __('Plan een afspraak') }}

                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
