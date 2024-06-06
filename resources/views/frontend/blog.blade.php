@extends('welcome')
@section('title','Blog : Nimainteriors.com')
@section('content')

<section class="page">
    <!-- ***** Page Top Start ***** -->
    <div class="cover" data-image="{{asset('frontend/assets/images/photos/project/project_cover.jpeg')}}">
        <div class="cover-top">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-3 col-lg-6">
                        <h1>Verhalen en inzichten</h1>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li><a href="index.html">Home</a></li>
                            <li class="active">Blog</li>
                        </ol>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- ***** Page Top End ***** -->

    <!-- ***** Page Content Start ***** -->
    <div class="page-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 margin-bottom-30">
                    <div class="row d-flex justify-content-around">
                        <!-- ***** Blog Item Start ***** -->
                        @foreach($bloglist as $item)
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-4 mr-2" >
                            <a href="{{ route('blogsinglelist', $item->slug) }}" class="">
                                <div class="content">
                                    {{-- <h3>Hoe lang duurt de plaatsing van een nieuwe keuken?</h3> --}}
                                    <h3>{{$item->title}}</h3>
                                </div>
                                <div class="">
                                    {{-- <img src="{{ asset('frontend/assets/images/photos/welcome/blog-1.jpeg') }}" alt="" style="width: 80%; height: 300px;"> --}}
                                    <img src="{{ asset('admin/blog/' . $item->image) }}" alt="" style="width: 80%; height: 300px;">
                                </div>
                            </a>
                        </div>
                        @endforeach
                        <!-- ***** Blog Item End ***** -->
            
                     
                      
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- ***** Page Content End ***** -->
</section>

@endsection