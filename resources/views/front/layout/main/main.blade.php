<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
        <title>NCR HOUSING</title>
	<link rel="shortcut icon" type="image/png" href="{{asset('assets/site/img/favicon.png')}}">
		<!-- <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/> -->

		
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
  integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
  crossorigin=""/>

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />	
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	
  <!-- Custom CSS -->
        <link href="assets/site/css/styles.css" rel="stylesheet">
		<link href="assets/site/css/plugins/slick.css" rel="stylesheet">
		<link href="assets/site/css/plugins/slick-theme.css" rel="stylesheet">
		<link href="assets/site/css/loader.css" rel="stylesheet">
		
		
<style>
html{
scroll-behavior: smooth;
}
</style>		

        @yield('custom_css')
</head>
<body>
    @include('front.layout.main.header')

    @yield('content')

    @include('front.layout.main.footer')

    <!-- ============================================================== -->
		<!-- All Jquery -->
		<!-- ============================================================== -->
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
	<input id="url" type="hidden" value="{{env('API_URL')}}">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js" integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
		
	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
	integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
	crossorigin=""></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
		
	<script src="assets/site/js/jquery.min.js"></script>
		<!-- <script src="assets/js/owl.carousel.min.js"></script> -->

		<script src="assets/site/js/popper.min.js"></script>
		<script src="assets/site/js/bootstrap.min.js"></script>
		<script src="assets/site/js/rangeslider.js"></script>
		<script src="assets/site/js/select2.min.js"></script>
		<script src="assets/site/js/jquery.magnific-popup.min.js"></script>
		<script src="assets/site/js/slick.js"></script>
		<script src="assets/site/js/slider-bg.js"></script>
		<script src="assets/site/js/lightbox.js"></script> 
		<script src="assets/site/js/imagesloaded.js"></script>
		 
		<script src="assets/site/js/custom.js"></script>
		<script src="owlcarousel/owl.carousel.js"></script>
		
		<!-- <script src="{{asset('assets/site/js/cl-switch.js')}}"></script> -->
		

	@yield('custom_js')
		
	
	<script>
		function modal_js()
		{
			$('#signup').modal('hide');
			$('#login').modal({
				show:true
			});

		}
	</script>
	<script>
	$(function(){
		$('#login_btn').on("click",function(event){
			// console.log($('#url').val());
			$('#login_loader').css("display","block");

			event.preventDefault();

			var data_form = {};
			var formData = new FormData(login_form);

			formData.forEach(function(value, key){
				data_form[key] = value;
			});

			
			$.ajax({
				method: "POST",
				dataType: "JSON",
				url: $('#url').val()+"login",
				data: data_form,
				}).done(function( msg ) {
					// console.log(msg);
					const d = new Date();
					d.setTime(d.getTime() + (2*60*60*1000));
					let expires = "expires="+ d.toUTCString();

					document.cookie = "token="+msg.token+";"+ expires +";path=/" + ";SameSite=none" +";Secure"
					document.cookie = "name="+msg.userData.username+";"+ expires +";path=/" + ";SameSite=none" +";Secure"
					document.cookie = "role="+msg.userData.userRole+";"+ expires +";path=/" + ";SameSite=none" +";Secure"
					document.cookie = "verified="+msg.userData.verificationStatus+";"+ expires +";path=/" + ";SameSite=none" +";Secure"

					$('#login_loader').css("display","none");
					window.location.href="{{url('/admin/dashboard')}}";
					
 				}).fail(function(error) {
					// console.log(error);
					$('#login_loader').css("display","none");
					$('#login').modal('hide');
					
					swal({
							title: error.responseJSON.message,
							icon: "error",
						});
				});
		});

		$('#register_form_btn').on("click",function(event){

			$('#register_loader').css("display","block");
			$('#load_text').html("<p style='color:red'><b>Please wait...Signing up....</b></p>");

			event.preventDefault();

			var data_form = {};
			var formData = new FormData(register_form);

			formData.forEach(function(value, key){
				data_form[key] = value;
			});

			// console.log(data_form);

			$.ajax({
				method: "POST",
				dataType: "JSON",
				url: $('#url').val()+"register",
				data: data_form,
				}).done(function( msg ) {
					// console.log(msg);

					if(msg.status == "success")
					{
						$('#load_text').empty();
						$('#load_text').html("<p style='color:green'><b>Signed up successfully... Please wait login in..</b></p>");
					}
					
					$.ajax({
						method: "POST",
						dataType: "JSON",
						url: $('#url').val()+"login",
						data: data_form,
						}).done(function( msg ) {
							// console.log(msg);
							const d = new Date();
							d.setTime(d.getTime() + (2*60*60*1000));
							let expires = "expires="+ d.toUTCString();

							document.cookie = "token="+msg.token+";"+ expires +";path=/" + ";SameSite=none" +";Secure"
							document.cookie = "name="+msg.userData.username+";"+ expires +";path=/" + ";SameSite=none" +";Secure"
							document.cookie = "role="+msg.userData.userRole+";"+ expires +";path=/" + ";SameSite=none" +";Secure"
							document.cookie = "verified="+msg.userData.verificationStatus+";"+ expires +";path=/" + ";SameSite=none" +";Secure"

							$('#load_text').empty();
							$('#register_loader').css("display","none");
							window.location.href="{{url('/admin/dashboard')}}";
							
						}).fail(function(error) {
							// console.log(error);
							$('#load_text').empty();
							$('#register_loader').css("display","none");

							$('#signup').modal('hide');
							
							swal({
									title: error.responseJSON.message,
									icon: "error",
								});
						});
					
 				}).fail(function(error) {
					// console.log(error);
					$('#load_text').empty();
					$('#load_text').html("<p style='color:red'><b>Unable to signup...Please enter above info correctly..</b></p>");
					$('#register_loader').css("display","none");
					
					$('#signup').modal('hide');
					
					swal({
							title: error.responseJSON.message,
							icon: "error",
						});

						
				});
		});
	});

	$(document).ready(function(){
		@if(isset($message))
			swal({
				title: "{{$message}}",
				icon: "error",
			});
		@elseif(session('message'))
		swal({
			title: "{{session('message')}}",
			icon: "error",
		});
		@elseif(session('message2'))
		swal({
			title: "{{session('message2')}}",
			icon: "success",
		});
		@elseif(isset($message2))
		swal({
				title: "{{$message2}}",
				icon: "success",
			});
		@endif
		
	});
	</script>
</body>
</html>
