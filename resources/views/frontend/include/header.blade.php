<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	{{-- <title>en Projecten:: Nimainteriors.com</title> --}}

	<title>@yield('title', 'Nimainteriors.com')</title>

	{{-- meta data will be also dynamic --}}
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content=""/>

	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="{{ asset('frontend/assets/images/favicon/favbrt.ico') }}" />

	<!-- Bootstrap & Plugins CSS -->
	<link href="{{asset('frontend/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('frontend/assets/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('frontend/assets/css/owl.carousel.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('frontend/assets/css/owl.theme.default.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('frontend/assets/css/magnific-popup.css')}}" rel="stylesheet" type="text/css">

	<link href="{{ asset('backend/assets/libs/quill/quill.core.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/libs/quill/quill.bubble.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/libs/quill/quill.snow.css')}}" rel="stylesheet" type="text/css" />
	<!-- Custom CSS -->
	<link href="{{asset('frontend/assets/css/style.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('frontend/assets/css/Shopping-cart.css')}}" rel="stylesheet" type="text/css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/c8371491b6.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>