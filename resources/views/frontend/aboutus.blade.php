@extends('welcome')
@section('content')
<section class="page">
		<!-- ***** Page Top Start ***** -->
		<div class="cover" data-image="{{asset('frontend/assets/images/photos/cover.jpg')}}">
			<div class="cover-top">
				<div class="container">
					<div class="row">
						<div class="offset-lg-3 col-lg-6">
							<h1>ABOUT US</h1>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<ol class="breadcrumb">
								<li><a href="index.html">Home</a></li>
								<li class="active">About Us</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- ***** Page Top End ***** -->
	</section>


	<!-- ***** Features Big Item Start ***** -->
	<section class="section padding-bottom-120">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 col-md-12 col-sm-12 align-self-center mobile-bottom-fix">
					<div class="left-heading">
						<h2 class="section-title dotted">What We Do</h2>
					</div>
					<div class="left-text">
						<p class="dark">Etiam eu felis condimentum, lacinia lorem eget, dictum nisl. Vestibulum lacinia erat at. </p>
						<p class="margin-bottom-40">Magnis dis parturient montes, nascetur ridiculus mus. Nunc et mauris quis urna fringilla dapibus a at mauris. Vivamus mattis est.</p>
						<ul class="margin-bottom-40">
							<li>Parturient montes, nascetur.</li>
							<li>Ridiculus mus. Nunc et mauris.</li>
							<li>Quis urna fringilla dapibus a at mauris.</li>
						</ul>

						<div class="row page-gallery-wrapper">
							<div class="col-lg-6 col-md-6 col-sm-6 col-6">
								<a href="{{asset('frontend/assets/images/photos/home/1.jpg')}}" class="page-gallery">
									<img src="{{asset('frontend/assets/images/photos/home/1.jpg')}}" alt="">
								</a>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-6">
								<a href="{{asset('frontend/assets/images/photos/home/2.jpg')}}" class="page-gallery">
									<img src="{{asset('frontend/assets/images/photos/home/2.jpg')}}" alt="">
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="offset-lg-1 col-lg-6 col-md-12 col-sm-12 align-self-center" data-scroll-reveal="enter right move 30px over 0.6s after 0.3s">
					<img src="{{asset('frontend/assets/images/photos/home/3.jpg')}}" class="img-fluid float-right" alt="Title">
				</div>
			</div>
		</div>
	</section>
	<!-- ***** Features Big Item End ***** -->



	<!-- ***** Home Parallax Area Start ***** -->
	<section class="half-parallax">
		<div class="parallax-image"></div>
		<div class="parallax-items">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-6 col-sm-12">
						<div class="parallax-item">
							<i class="fa fa-hourglass-o"></i>
							<h5 class="feature-title">PLANNING</h5>
							<p>Proin luctus odio et purus iaculis, et porta ex molestie. Curabitur euismod nulla enim.</p>
							<a class="dark-btn" href="#">
								<span class="show-btn">READ MORE</span>
								<span class="hide-btn">READ MORE</span>
							</a>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-12">
						<div class="parallax-item">
							<i class="fa fa-connectdevelop"></i>
							<h5 class="feature-title">INTERIOR</h5>
							<p>Vestibulum justo odio, auctor sed elit vitae, sollicitudin varius metus. Maecenas diam.</p>
							<a class="dark-btn" href="#">
								<span class="show-btn">READ MORE</span>
								<span class="hide-btn">READ MORE</span>
							</a>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-12">
						<div class="parallax-item">
							<i class="fa fa-flag-o"></i>
							<h5 class="feature-title">EXTERIOR</h5>
							<p>Integer tincidunt aliquam nibh. Sed sed velit tristique, egestas lorem eu, fermentum diam.</p>
							<a class="dark-btn" href="#">
								<span class="show-btn">READ MORE</span>
								<span class="hide-btn">READ MORE</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ***** Home Parallax Area End ***** -->


	<!-- ***** Our Team Start ***** -->
	<section class="section padding-top-70">
		<div class="container">
			<!-- ***** Section Title Start ***** -->
			<div class="row">
				<div class="col-lg-12">
					<div class="center-heading">
						<h2 class="section-title">Our Team</h2>
					</div>
				</div>
				<div class="offset-lg-3 col-lg-6">
					<div class="center-text">
						<p>Donec vulputate urna sed rutrum venenatis. Cras consequat magna quis arcu elementum, quis congue risus.</p>
					</div>
				</div>
			</div>
			<!-- ***** Section Title End ***** -->

			<div class="row">
				<!-- ***** Team Item Start ***** -->
				<div class="col-lg-4 col-md-6 col-sm-12 position-relative">
					<div class="person-item">
						<div class="img">
							<img src="{{asset('frontend/assets/images/photos/team/1.jpg')}}" alt="">
						</div>
						<div class="content">
							<div class="text">
								<h5 class="user-name">Fletch Skinner</h5>
								<span>DESIGNER</span>
								<ul class="social">
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
									<li><a href="#"><i class="fa fa-github"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- ***** Team Item End ***** -->

				<!-- ***** Team Item Start ***** -->
				<div class="col-lg-4 col-md-6 col-sm-12 position-relative">
					<div class="person-item active">
						<div class="img">
							<img src="{{asset('frontend/assets/images/photos/team/2.jpg')}}" alt="">
						</div>
						<div class="content">
							<div class="text">
								<h5 class="user-name">Hanson Deck</h5>
								<span>ARCHITECT</span>
								<ul class="social">
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
									<li><a href="#"><i class="fa fa-github"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- ***** Team Item End ***** -->

				<!-- ***** Team Item Start ***** -->
				<div class="col-lg-4 col-md-6 col-sm-12 position-relative">
					<div class="person-item">
						<div class="img">
							<img src="{{asset('frontend/assets/images/photos/team/3.jpg')}}" alt="">
						</div>
						<div class="content">
							<div class="text">
								<h5 class="user-name">Natalya Under</h5>
								<span>ART DIRECTOR</span>
								<ul class="social">
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
									<li><a href="#"><i class="fa fa-github"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- ***** Team Item End ***** -->
			</div>
		</div>
	</section>
	<!-- ***** Our Team End ***** -->
@endsection
