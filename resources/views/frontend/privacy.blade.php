@extends('welcome')
@section('content')
<section class="page">

    <div class="cover" data-image="{{asset('frontend/assets/images/photos/project/project_cover.jpeg')}}">
        <div class="cover-top">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-3 col-lg-6">
                        <h1>Privacy</h1>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ***** Page Top End ***** -->
    <div class="page-privacy">
        <div class="container inner-container mb-6">
            <div>
                 <div class="privacy-content text-justify mt-4 mb-4 ql-editor">
                    {!! $data[0]->description !!}

                </div>

            </div>

        </div>
    </div>
</section>
@endsection