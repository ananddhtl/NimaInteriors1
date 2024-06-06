@extends('welcome')
@section('content')
<section class="page">
		<!-- ***** Page Top Start ***** -->
		<div class="cover" data-image="{{asset('frontend/assets/images/photos/cover.jpg')}}">
			<div class="cover-top">
				<div class="container">
					<div class="row">
						<div class="offset-lg-3 col-lg-6">
							<h1>F.A.Q.</h1>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<ol class="breadcrumb">
								<li><a href="index.html">Home</a></li>
								<li class="active">F.A.Q.</li>
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
					<!-- ***** Page Content Start ***** -->
					<div class="col-lg-8 col-md-12 col-sm-12">
						<div class="faq-wrapper">
							<div class="faq-header">
								<h2>Freequently Asked Questions</h2>
								<p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed finibus faucibus congue. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>

								<div class="search">
									<input type="text" placeholder="Search asked questions">
									<button><i class="fa fa-search"></i></button>
								</div>
							</div>
						</div>

						<div class="accordion" id="accordionExample">
							<div class="accordion-item">
								<h2 class="accordion-header" id="heading-1">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="false" aria-controls="collapse-1">
										<span class="num">1</span>How does inox Internet work?
									</button>
								</h2>
								<div id="collapse-1" class="accordion-collapse collapse" aria-labelledby="heading-1" data-bs-parent="#accordionExample">
									<div class="accordion-body">
										<p>Donec tempus sodales dolor, at efficitur enim posuere auctor. Nam et nisi eu purus tempor faucibus aliquet vitae orci. Curabitur sollicitudin leo et magna pharetra efficitur. Nullam et scelerisque lectus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque faucibus sit amet odio eget scelerisque. Mauris dictum cursus ornare.</p>
										<p>Ut vehicula blandit tellus. Sed sit amet bibendum leo, non sagittis neque. Nam fringilla fermentum tortor, ac gravida velit facilisis id. Donec congue ullamcorper velit, at malesuada arcu faucibus pretium. Donec rhoncus magna sit amet massa venenatis, ut convallis justo ultricies.</p>
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="heading-2">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
										<span class="num">2</span>How fast is the inox Internet service?
									</button>
								</h2>
								<div id="collapse-2" class="accordion-collapse collapse" aria-labelledby="heading-2" data-bs-parent="#accordionExample">
									<div class="accordion-body">
										<p>Donec tempus sodales dolor, at efficitur enim posuere auctor. Nam et nisi eu purus tempor faucibus aliquet vitae orci. Curabitur sollicitudin leo et magna pharetra efficitur. Nullam et scelerisque lectus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque faucibus sit amet odio eget scelerisque. Mauris dictum cursus ornare.</p>
										<p>Ut vehicula blandit tellus. Sed sit amet bibendum leo, non sagittis neque. Nam fringilla fermentum tortor, ac gravida velit facilisis id. Donec congue ullamcorper velit, at malesuada arcu faucibus pretium. Donec rhoncus magna sit amet massa venenatis, ut convallis justo ultricies.</p>
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="heading-3">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
										<span class="num">3</span>Can I keep my home phone number?
									</button>
								</h2>
								<div id="collapse-3" class="accordion-collapse collapse" aria-labelledby="heading-3" data-bs-parent="#accordionExample">
									<div class="accordion-body">
										<p>Donec tempus sodales dolor, at efficitur enim posuere auctor. Nam et nisi eu purus tempor faucibus aliquet vitae orci. Curabitur sollicitudin leo et magna pharetra efficitur. Nullam et scelerisque lectus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque faucibus sit amet odio eget scelerisque. Mauris dictum cursus ornare.</p>
										<p>Ut vehicula blandit tellus. Sed sit amet bibendum leo, non sagittis neque. Nam fringilla fermentum tortor, ac gravida velit facilisis id. Donec congue ullamcorper velit, at malesuada arcu faucibus pretium. Donec rhoncus magna sit amet massa venenatis, ut convallis justo ultricies.</p>
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="heading-4">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-4" aria-expanded="false" aria-controls="collapse-4">
										<span class="num">4</span>How does the NBN affect my inox Internet Service?
									</button>
								</h2>
								<div id="collapse-4" class="accordion-collapse collapse" aria-labelledby="heading-4" data-bs-parent="#accordionExample">
									<div class="accordion-body">
										<p>Donec tempus sodales dolor, at efficitur enim posuere auctor. Nam et nisi eu purus tempor faucibus aliquet vitae orci. Curabitur sollicitudin leo et magna pharetra efficitur. Nullam et scelerisque lectus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque faucibus sit amet odio eget scelerisque. Mauris dictum cursus ornare.</p>
										<p>Ut vehicula blandit tellus. Sed sit amet bibendum leo, non sagittis neque. Nam fringilla fermentum tortor, ac gravida velit facilisis id. Donec congue ullamcorper velit, at malesuada arcu faucibus pretium. Donec rhoncus magna sit amet massa venenatis, ut convallis justo ultricies.</p>
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="heading-5">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-5" aria-expanded="false" aria-controls="collapse-5">
										<span class="num">5</span>I’ve handed in my application. Now what happens?
									</button>
								</h2>
								<div id="collapse-5" class="accordion-collapse collapse" aria-labelledby="heading-5" data-bs-parent="#accordionExample">
									<div class="accordion-body">
										<p>Donec tempus sodales dolor, at efficitur enim posuere auctor. Nam et nisi eu purus tempor faucibus aliquet vitae orci. Curabitur sollicitudin leo et magna pharetra efficitur. Nullam et scelerisque lectus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque faucibus sit amet odio eget scelerisque. Mauris dictum cursus ornare.</p>
										<p>Ut vehicula blandit tellus. Sed sit amet bibendum leo, non sagittis neque. Nam fringilla fermentum tortor, ac gravida velit facilisis id. Donec congue ullamcorper velit, at malesuada arcu faucibus pretium. Donec rhoncus magna sit amet massa venenatis, ut convallis justo ultricies.</p>
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="heading-6">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-6" aria-expanded="false" aria-controls="collapse-6">
										<span class="num">6</span>What is involved in a standard install? 
									</button>
								</h2>
								<div id="collapse-6" class="accordion-collapse collapse" aria-labelledby="heading-6" data-bs-parent="#accordionExample">
									<div class="accordion-body">
										<p>Donec tempus sodales dolor, at efficitur enim posuere auctor. Nam et nisi eu purus tempor faucibus aliquet vitae orci. Curabitur sollicitudin leo et magna pharetra efficitur. Nullam et scelerisque lectus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque faucibus sit amet odio eget scelerisque. Mauris dictum cursus ornare.</p>
										<p>Ut vehicula blandit tellus. Sed sit amet bibendum leo, non sagittis neque. Nam fringilla fermentum tortor, ac gravida velit facilisis id. Donec congue ullamcorper velit, at malesuada arcu faucibus pretium. Donec rhoncus magna sit amet massa venenatis, ut convallis justo ultricies.</p>
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="heading-7">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-7" aria-expanded="false" aria-controls="collapse-7">
										<span class="num">7</span>What if mapping is unsuccessful, do I have any other options? 
									</button>
								</h2>
								<div id="collapse-7" class="accordion-collapse collapse" aria-labelledby="heading-7" data-bs-parent="#accordionExample">
									<div class="accordion-body">
										<p>Donec tempus sodales dolor, at efficitur enim posuere auctor. Nam et nisi eu purus tempor faucibus aliquet vitae orci. Curabitur sollicitudin leo et magna pharetra efficitur. Nullam et scelerisque lectus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque faucibus sit amet odio eget scelerisque. Mauris dictum cursus ornare.</p>
										<p>Ut vehicula blandit tellus. Sed sit amet bibendum leo, non sagittis neque. Nam fringilla fermentum tortor, ac gravida velit facilisis id. Donec congue ullamcorper velit, at malesuada arcu faucibus pretium. Donec rhoncus magna sit amet massa venenatis, ut convallis justo ultricies.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- ***** Page Content End ***** -->

					<!-- ***** Aside Start ***** -->
					<div class="col-lg-4 col-md-12 col-sm-12">
						<aside class="default-aside">
							<div class="sidebar">
								<ul>
									<li><a href="#">Modern Kitchens</a></li>
									<li class="active"><a href="#">Modern Bathroom</a></li>
									<li><a href="#">Decorative Chair</a></li>
									<li><a href="#">Rooms Cabinetry</a></li>
									<li><a href="#">Modern Rooms</a></li>
									<li><a href="#">Minimal Offices</a></li>
									<li><a href="#">Modern Bedrooms</a></li>
									<li><a href="#">Working Places</a></li>
								</ul>

								<div class="box">
									<img src="assets/images/photos/home/1.jpg" alt="">
									<div class="hovered align-self-center">
										<p>You can contact us for purchase, installation and customizations. </p>
										<a class="light-btn" href="#">
											<span class="show-btn">CONTACT US</span>
											<span class="hide-btn">CONTACT US</span>
										</a>
									</div>
								</div>
							</div>
						</aside>
					</div>
					<!-- ***** Aside End ***** -->
				</div>
			</div>
		</div>
		<!-- ***** Page Content End ***** -->
	</section>
@endsection