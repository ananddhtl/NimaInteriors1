<footer>
	<div class="container container-footer">
		<div class="row">

			<div class="col-lg-3 col-md-4 col-sm-6 col-6">
				<h5>{{ __('Ga naar') }}</h5>
				<ul class="footer-nav">
					<li><a href="{{ route_with_locale('frontend.homepage') }}"><span>{{ __('Startpagina') }}</span></a>
					</li>
					<li><a href="{{ route_with_locale('projectlist') }}"><span>{{ __('Projecten') }}</span></a></li>

					<li><a href="{{ route_with_locale('bloglist') }}"><span>{{ __('Blogs') }}</span></a></li>
					<li><a href="{{ route_with_locale('frontend.contact') }}"><span>{{ __('Contacten') }}</span></a>
					</li>
				</ul>
			</div>

			<div class="col-lg-3 col-md-4 col-sm-12 footer-nav">
				<h5>{{ __('Neem contact op') }}</h5>
				<div class="address">
					<p>Tel. {{ $contactInfo->contactNumber }}</p>
					<p><a href="#">{{ $contactInfo->email }}</a></p>
					<p class="m-bold">{{ __('Open op afspraak') }}:</p>
					<p>{{ $contactInfo->address }}</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-12 col-sm-12">
				<h5>{{ __('Blijf op de hoogte') }}</h5>
				<ul class="social">
					{{-- here all the social sites will be also dynamic --}}
					<li><a href="https://www.facebook.com/nimainterieurs/"><i class="fa fa-facebook"></i></a></li>
					<li><a href="https://www.instagram.com/nima.interiors/"><i class="fa fa-instagram"></i></a></li>
					<li><a href="https://www.pinterest.com/nimainteriors/"><i class="fa fa-pinterest"></i></a></li>

				</ul>
			</div>
			<div class="col-lg-3 col-md-12 col-sm-12">
				<h5>{{ __('Haal inspiratie uit onze gratis brochure') }} </h5>

				{{-- <a href="{{ asset('frontend/assets/doc/Cataloog_NimaIneriors.pdf') }}" target="_blank"
					class="d-flex items-alig-center ">
					<button class="btn btn-c ">
						Download
					</button>
				</a> --}}
				<a href="#" data-toggle="modal" data-target="#emailModal" class="d-flex items-align-center">
					<button class="btn btn-c">Download</button>
				</a>
			</div>
			{{-- email valiation for download --}}
			<div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="emailModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="emailModalLabel">Enter Your Email</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form id="emailForm">
								<div class="form-group m-2">
									<label for="email">Email address</label>
									<input type="email" class="form-control" id="email" name="email" required>
								</div>
								<button type="submit" class="btn btn-c m-2">Submit</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>



		<div class="row copyright  d-flex justify-space-between">
			<div class=" col-lg-3 col-md-12 col-sm-12 text-left">
				<a href="{{ route_with_locale('generaltermandcondition') }}"><span>{{ __('Algemene voorwaarden')
						}}</span></a>
				<a href="{{ route_with_locale('privacy') }}"><span>{{ __('Privacyverklaring') }}</span></a>
			</div>
			{{-- <div class="col-lg-6 col-md-12 col-sm-12">
				<p class="">© 2021 nimainteriors. All Rights Reserved.</p>
			</div> --}}
			<div class=" col-lg-9 col-md-12 col-sm-12 text-right">
				<p class="opt-lang">{{ __('Talen') }}:</p>
				<div class="language-switcher">
					<ul id="select-language" class="lang">

						<br>
						<li>
							<a href="{{ route('language.switch', ['locale' => 'en']) }}">
								<img alt="" src="{{ asset('frontend/assets/images/photos/flag/en.png') }}">
								<span>EN</span>
							</a>
						</li>
						<span style="text-decoration: none;">/</span>
						<li>
							<a class="selected" href="{{ route('language.switch', ['locale' => 'be']) }}">
								<img alt="" src="{{ asset('frontend/assets/images/photos/flag/be.png') }}">
								<span>BE</span>
							</a>
						</li>
						<span style="text-decoration: none;">/</span>
						<li>
							<a class="selected" href="{{ route('language.switch', ['locale' => 'nl']) }}">
								<img alt="" src="{{ asset('frontend/assets/images/photos/flag/nl.png') }}">
								<span>NL</span>
							</a>
						</li>
					</ul>

				</div>
			</div>
		</div>
	</div>
</footer>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script>
    document.getElementById('emailForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const email = document.getElementById('email').value;

        if (validateEmail(email)) {
            // Perform an AJAX request to save the email
            $.ajax({
                url: '{{ route_with_locale("save.email") }}',
                method: 'POST',
                data: {
                    email: email,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        // Open the download link in a new window
                        window.open("{{ asset("admin/brochures/latest_brochure.pdf") }}", '_blank');
                        // Close the modal after a slight delay
                        setTimeout(function() {
                            $('#emailModal').modal('hide');
                        }, 500);
                    } else {
                        alert('Failed to save the email. Please try again.');
                    }
                },
                error: function(xhr) {
                    console.error('Error:', xhr.responseText);
                    alert('Failed to save the email. Please try again.');
                }
            });
        } else {
            alert('Please enter a valid email address.');
        }
    });

    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(String(email).toLowerCase());
    }
</script>

</body>
