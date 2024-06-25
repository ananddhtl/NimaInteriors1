{{-- all the data need to be dynamic --}}
@extends('welcome')
@section('title','Projecten : Nimainteriors.com')
@section('content')
<section class="page">
    <!-- ***** Page Top Start ***** -->
    <div class="cover" data-image="{{ asset('frontend/assets/images/photos/project/project_cover.jpeg') }}">
        <div class="cover-top">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-3 col-lg-6">
                        <h1>{{ __('Onze Projecten') }}</h1>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ***** Page Top End ***** -->

    <!-- ***** Page Content Start ***** -->
    <div class="page-bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center border-bottom border-bottom-primary border-bottom-1 mb-md-4">
                    <h2 class="mb-4">{{ __('Laat je Inspireren door Nima Interiors') }}</h2>
                    <p class="mb-8 text-center">{{ __('Bij Nima Interiors transformeren we keukens tot verfijnde woonruimtes. Onze ontwerpen staan garant voor tijdloze elegantie en combineren functionaliteit met verfijning. Elk detail wordt zorgvuldig overwogen en jouw persoonlijke touch wordt naadloos geïntegreerd. Bij ons vind je de perfecte harmonie tussen vorm en functie.') }}</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mt-4">
                    <div class="project-grid">
                        <div class="row">

                            @foreach($projectlist as $item)
                            <div class="col-lg-4 col-md-6 col-sm-12 text-center">

                                <a href="{{ route_with_locale('projectdesc', ['slug' => $item->slug]) }}"
                                    class="project-grid-item">
                                    <div class="text-h3 ">
                                        <h3>{{$item->title_translation}}</h3>
                                    </div>
                                    <div class="img">
                                        <img src="{{ asset('admin/project/' . $item->thumbnail) }}" alt="">
                                    </div>
                                    <div class="text">

                                        <p>{{$item->description_translation }}</p>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- ***** Page Content End ***** -->
</section>
<section class="section white">
    <div class="container white text-center container-cus">
        <h2>{{ __('Onze partners') }}</h2>

        <div class="partner-grid">
            @foreach($partners as $partner)
            <div>
                <a href="{{ $partner->link }}" class="partner-item" target="_blank">
                    <img src="{{ asset('storage/' . $partner->image) }}" alt="{{ $partner->name }}">
                    <p>{{ $partner->name }}</p>
                </a>
            </div>


            @endforeach
        </div>
    </div>


    </div>
</section>
@endsection