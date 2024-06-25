@extends('welcome')
@section('title','Plaatsing Nima Interiors : Nimainteriors.com')
@section('content')
<section class="page">

<div class="cover" data-image="{{asset('frontend/assets/images/photos/project/project_cover.jpeg')}}">
    <div class="cover-top">
        <div class="container d-flex justify-content-center align-items-center">
            <div class="title-blog " style="margin-top:50px; font-size:35px;">
                <div class="">
                    <h1>{{$blog->title_translation}}</h1>
                </div>
            </div>
           
        </div>
    </div>
</div>
<!-- ***** Page Top End ***** -->
<div class="page-bottom">
    <div class="container mb-6">
        <div >
             {{-- <h2 class="text-center mb-5">{{$blog->title}}</h2> --}}
          

            <div class="blog-content text-justify mt-4">
              
                {!! $blog->description_translation !!}
            </div>
            <div class="text-center">
            
                <a href="{{ route_with_locale('frontend.contact') }}" class="btn  btn-c" style="color: #f7f7f7;">
                    {{ __('Plan een afspraak') }}
                   
                </a>
            </div>
            
        </div>
        
    </div>
</div>
</section>
@endsection