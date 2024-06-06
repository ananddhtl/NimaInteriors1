@extends('welcome')
@section('content')
<section class="page">
		<!-- ***** Page Top Start ***** -->
		<div class="cover" data-image="{{asset('frontend/assets/images/photos/cover.jpg')}}">
			<div class="cover-top">
				<div class="container">
					<div class="row">
						<div class="offset-lg-3 col-lg-6">
							<h1>GALLERY</h1>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<ol class="breadcrumb">
								<li><a href="index.html">Home</a></li>
								<li class="active">Gallery</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- ***** Page Top End ***** -->

		<!-- ***** Page Content Start ***** -->
		<div class="page-bottom">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 margin-bottom-30">
						<div class="page-single">
							<div class="row page-gallery-wrapper">
								<div class="col-lg-3 col-md-6 col-sm-6 col-6">
									<a href="{{asset('frontend/assets/images/photos/gallery/1.jpg')}}" class="page-gallery">
										<img src="{{asset('frontend/assets/images/photos/gallery/1.jpg')}}" alt="">
									</a>
								</div>
								<div class="col-lg-3 col-md-6 col-sm-6 col-6">
									<a href="{{asset('frontend/assets/images/photos/gallery/2.jpg')}}" class="page-gallery">
										<img src="{{asset('frontend/assets/images/photos/gallery/2.jpg')}}" alt="">
									</a>
								</div>
								<div class="col-lg-3 col-md-6 col-sm-6 col-6">
									<a href="{{asset('frontend/assets/images/photos/gallery/3.jpg')}}" class="page-gallery">
										<img src="{{asset('frontend/assets/images/photos/gallery/3.jpg')}}" alt="">
									</a>
								</div>
								<div class="col-lg-3 col-md-6 col-sm-6 col-6">
									<a href="{{asset('frontend/assets/images/photos/gallery/4.jpg')}}" class="page-gallery">
										<img src="{{asset('frontend/assets/images/photos/gallery/4.jpg')}}" alt="">
									</a>
								</div>
								<div class="col-lg-3 col-md-6 col-sm-6 col-6">
									<a href="{{asset('frontend/assets/images/photos/gallery/5.jpg')}}" class="page-gallery">
										<img src="{{asset('frontend/assets/images/photos/gallery/5.jpg')}}" alt="">
									</a>
								</div>
								
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<!-- ***** Pagination Start ***** -->
						<nav>
							<ul class="pagination justify-content-center">
								<li class="page-item">
									<a class="page-link" href="#" aria-label="Previous">
										<span aria-hidden="true">&laquo;</span>
										<span class="sr-only">Previous</span>
									</a>
								</li>
								<li class="page-item"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link active" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item">
									<a class="page-link" href="#" aria-label="Next">
										<span aria-hidden="true">&raquo;</span>
										<span class="sr-only">Next</span>
									</a>
								</li>
							</ul>
						</nav>
						<!-- ***** Pagination End ***** -->
					</div>
				</div>
			</div>
		</div>
		<!-- ***** Page Content End ***** -->
	</section>
@endsection
