@extends('welcome')
@section('title','Plaatsing Nima Interiors : Nimainteriors.com')
@section('content')
<section class="page">

<div class="cover" data-image="{{asset('frontend/assets/images/photos/project/project_cover.jpeg')}}">
    <div class="cover-top">
        <div class="container d-flex justify-content-center align-items-center">
            <div class="title-blog " style="margin-top:50px; font-size:35px;">
                <div class="">
                    <h1>Plaatsing Nima Interiors</h1>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Project</li>
                    </ol>
                </div>
            </div> --}}
        </div>
    </div>
</div>
<!-- ***** Page Top End ***** -->
<div class="page-bottom">
    <div class="container mb-6">
        <div >
            {{-- <h3 class="text-center mb-5">Benieuwd naar de werkwijze bij Nima Interiors?</h3> --}}
             <h2 class="text-center mb-5">{{$blog->title}}</h2>
            {{-- <h4>
                Van Droom naar Realiteit: Keukenexpertise bij Nima Interiors
            </h4> --}}

            <div class="blog-content text-justify mt-4">
                {{-- <p >
                    Heb je al geruime tijd een levendig beeld, een schets, of zelfs een volledig ontwerp van je ideale keuken in gedachten? Een droomkeuken die je niet loslaat, maar waarvan je nog niet zeker weet hoe je die in werkelijkheid tot leven kunt brengen? Bij Nima Interiors kan je rekenen op uitstekende expertise. Wij geloven dat de fijnste details het verschil maken
                </p>
                <p>Vanaf het allereerste moment tot de laatste handeling, zijn wij er om je te begeleiden bij het verwezenlijken van jouw project. Bij ons ben je meer dan een klant; je bent een partner in het creëren van iets buitengewoons. Onze showroom staat open voor al je vragen en twijfels. Aarzel niet om een afspraak te maken. We streven ernaar om jouw wensen te begrijpen en bieden advies op maat, afgestemd op jouw unieke behoeften.</p>
                <p >
                    Onze details maken het verschil. Nadat we elk aspect hebben besproken, gaan we over naar het ontwerp dat perfect aansluit bij jouw wensen. Bij Nima Interiors staat vakmanschap centraal. We streven naar perfectie en zetten ons in om jouw dromen tot in de kleinste details te realiseren. Kan je het dromen? Dan kunnen wij het maken.
        
        
                </p> --}}
                {!! $blog->description !!}
            </div>
            <div class="text-center">
            
                <a href="/contact" class="btn  p-4 " style="color: #000;
                background-color: #f5f5f5;
                border-color: #6e7275;
                font-size:1.2rem">
                    Plan een afspraak
                   
                </a>
            </div>
            
        </div>
        
    </div>
</div>
</section>
@endsection