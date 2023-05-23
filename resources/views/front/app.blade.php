
<!-- Phần chân trang -->


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Thai market - Restaurant</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="/assets/fronts/css/animate.css">
	
	<link rel="stylesheet" href="/assets/fronts/css/owl.carousel.min.css">
	<link rel="stylesheet" href="/assets/fronts/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="/assets/fronts/css/magnific-popup.css">

	<link rel="stylesheet" href="/assets/fronts/css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="/assets/fronts/css/jquery.timepicker.css">

	
	<link rel="stylesheet" href="/assets/fronts/css/flaticon.css">
	<link rel="stylesheet" href="/assets/fronts/css/style.css">
</head>
<body>
    {{-- header-start --}}
    @include('front.header')
    {{-- header-end --}}
	
	@yield('content')

	{{-- footer-start --}}
    @include('front.footer')
	{{-- footer-end --}}
		<!-- loader -->
		<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
		<script src="/assets/fronts/js/jquery.min.js"></script>
		<script src="/assets/fronts/js/jquery-migrate-3.0.1.min.js"></script>
		<script src="/assets/fronts/js/popper.min.js"></script>
		<script src="/assets/fronts/js/bootstrap.min.js"></script>
		<script src="/assets/fronts/js/jquery.easing.1.3.js"></script>
		<script src="/assets/fronts/js/jquery.waypoints.min.js"></script>
		<script src="/assets/fronts/js/jquery.stellar.min.js"></script>
		<script src="/assets/fronts/js/owl.carousel.min.js"></script>
		<script src="/assets/fronts/js/jquery.magnific-popup.min.js"></script>
		<script src="/assets/fronts/js/jquery.animateNumber.min.js"></script>
		<script src="/assets/fronts/js/bootstrap-datepicker.js"></script>
		<script src="/assets/fronts/js/jquery.timepicker.min.js"></script>
		<script src="/assets/fronts/js/scrollax.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
		<script src="/assets/fronts/js/google-map.js"></script>
		<script src="/assets/fronts/js/main.js"></script>
		
		@yield('js-main');
	</body>
</html>