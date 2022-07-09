@extends('front.layout.main.main')

@section('custom_css')
	<style>
	@media screen and (max-width:985px)
	{
		#home_header
		{
			display:none !important;
		}
	}
	
	.text1 {
            color: white;
            font-size: 17px;
            font-weight: 700;
            letter-spacing: 8px;
            margin-bottom: 20px;
            background: yellowgreen;
            position: relative;
            animation: text 3s infinite;
        }
  
  
        @keyframes text {
            0% {
                color: black;
                margin-bottom: -40px;
            }
  
            30% {
                letter-spacing: 18px;
                margin-bottom: -40px;
            }
  
            85% {
                letter-spacing: 5px;
                margin-bottom: -40px;
            }
        }
	</style>
@endsection

@section('content')	
    <div id="main-wrapper">
			<div id="home_header" style="width:100%;height:85px;background-color:#008888"></div>
			<!-- ============================ Hero Banner  Start================================== -->
			<div class="home-map fl-wrap" style="padding: 0 0.6rem;">
				<div class="map-container fw-map">
					<div id="map-main"></div>
				</div>				
			</div>
			<!-- ============================ Hero Banner End ================================== -->
			
			<!-- ============================ All Property ================================== -->
			<section class="bg-light">
			
				<div class="container">
					
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="filter_search_opt">
								<a href="javascript:void(0);" onclick="openFilterSearch()">Search Property<i class="ml-2 ti-menu"></i></a>
							</div>
						</div>
					</div>
					
					<div class="row">
						
						<div class="col-lg-7 col-md-7 col-sm-12 list-layout">
							<div class="row">
							
								<div class="col-lg-12 col-md-12">
									<div class="filter-fl">
										<h4>Total Properties Found : <span class="theme-cl">{{count($response["data"])}}</span></h4>
										<!--<div class="btn-group custom-drop">
											<button type="button" class="btn btn-order-by-filt light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												Short By<i class="ti-angle-down"></i>
											</button>
											<div class="dropdown-menu pull-right animated flipInX">
												<a href="#">Price</a>
												<a href="#">BHKs</a>
												<a href="#">Area (sqft)</a>
											</div>
										</div>-->
									</div>
								</div>
								
								@for ($i = 0; $i < count($response["data"]); $i++)
								<!-- Single Property Start -->
								<div class="col-lg-12 col-md-12">
									<div class="property-listing property-1">
											
										<div class="listing-img-wrapper">
											<a href='/property/detail/{{$response["data"][$i]["_id"]}}'>
												<img src='{{$response["data"][$i]["gallery"]["bannerImg"]["imgUrl"]}}' class="img-fluid mx-auto" alt="" />
											</a>
											<span class="property-type">For {{$response["data"][$i]["availability"]}}</span>
										</div>
										
										<div class="listing-content">
										
											<div class="listing-detail-wrapper">
												<div class="listing-short-detail">
													<h4 class="listing-name"><a href='/property/detail/{{$response["data"][$i]["_id"]}}'>{{$response["data"][$i]["title"]}}</a></h4>
													<span class="listing-location"><i class="ti-location-pin"></i>{{$response["data"][$i]["location"]["address"]}} , {{$response["data"][$i]["location"]["city"]}}</span>
												</div>
												<div class="list-author">
													<a href='/property/detail/{{$response["data"][$i]["_id"]}}'><i class="fas fa-user-tie"></i></a>
												</div>
											</div>
										
											<div class="listing-features-info">
												<ul>
													<li><strong><i class="fas fa-building"></i></strong>{{$response["data"][$i]["propertyType"]}}</li>
                                                    <li></li>
													
												</ul>
											</div>
										
											<div class="listing-footer-wrapper">
												<div class="listing-price">
													<h4 class="list-pr"><i class="fas fa-rupee-sign"></i> {{$response["data"][$i]["price"]}} L Onwards</h4>
												</div>
												<div class="listing-detail-btn">

													@if($response["data"][$i]["propertyType"] == "Bank Morgage")
														<a href='javascript:void(0)' class="more-btn">CONTACT NOW</a>
													@else
														<a href='/property/detail/{{$response["data"][$i]["_id"]}}' class="more-btn">More Info</a>
													@endif
													<!-- <a href="#" class="btn btn-sm btn-danger pt-2 pb-2 mb-1">Add to Compare</a> -->
												</div>
											</div>
											
										</div>
										
									</div>
								</div>
								<!-- Single Property End -->
								@endfor
							</div>
							
							<!-- Pagination -->
							<!-- <div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<ul class="pagination p-center">
										<li class="page-item">
										  <a class="page-link" href="#" aria-label="Previous">
											<span class="ti-arrow-left"></span>
											<span class="sr-only">Previous</span>
										  </a>
										</li>
										<li class="page-item active"><a class="page-link" href="#">1</a></li>
										<li class="page-item"><a class="page-link" href="#">2</a></li>
										<li class="page-item"><a class="page-link" href="#">3</a></li>
										<li class="page-item"><a class="page-link" href="#">...</a></li>
										<li class="page-item"><a class="page-link" href="#">18</a></li>
										<li class="page-item">
										  <a class="page-link" href="#" aria-label="Next">
											<span class="ti-arrow-right"></span>
											<span class="sr-only">Next</span>
										  </a>
										</li>
									</ul>
								</div>
							</div> -->
					
						</div>
						
						<!-- property Sidebar -->
							<div class="col-lg-5 col-md-5 col-sm-12 pt-3" style="background-color:white">
							<Center><a href="javascript:void(0)"><span class="text1"><b>SOME TEXT HERE</b></span></a></center>
							<h2 class="mb-3 mt-3 text-center">Featured Properties</h2>

							<div class="container-fluid" style="padding:0">
								<!-- first property-->
								@if($feat_property["status"] != "error")
								<div>
									<div class="card" style="width:100%">
										<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
											<div class="carousel-inner">
												<div class="carousel-item active">
												<img src='{{$feat_property["data"][0]["gallery"]["showcaseImg"][0]["imgUrl"]}}' class="d-block w-100" style="width:100%;height:200px;">
												</div>
												@for ($i = 1; $i < count($feat_property["data"][0]["gallery"]["showcaseImg"]); $i++)
												<div class="carousel-item">
													
													<img src='{{$feat_property["data"][0]["gallery"]["showcaseImg"][$i]["imgUrl"]}}' class="d-block w-100" alt="" style="width:100%;height:200px;">
													
												</div>
												@endfor
											</div>
											<button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev" style="background-color:transparent;border:none">
												<span class="carousel-control-prev-icon" aria-hidden="true"></span>
												<span class="sr-only">Previous</span>
											</button>
											<button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next" style="background-color:transparent;border:none">
												<span class="carousel-control-next-icon" aria-hidden="true"></span>
												<span class="sr-only">Next</span>
											</button>
											</div>
										</div>

										<div class="card-body" style='padding:0'>
											
												<div class="row" style="margin:0;padding:0">
													<div class="col-12 mt-2">
														<h3>{{$feat_property["data"][0]["title"]}}<h3>
														<span style="font-size:15px;font-style: italic;"><i class="ti-location-pin"></i>{{$feat_property["data"][0]["location"]["address"]}}, {{$feat_property["data"][0]["location"]["city"]}}, {{$feat_property["data"][0]["location"]["pincode"]}}<span>
													</div>
													<div class="col-12 mt-2">
														<a style="width:100%" href='/property/detail/{{$feat_property["data"][0]["_id"]}}' class="btn btn-warning">Check Property</a>
													</div>
												</div>
												 
											
											
										</div>
									</div>
								</div>
								@endif
								<div class="sidebar-widgets mt-3">
									
									<div class="sidebar_featured_property">
									@if($feat_property["status"] != "error")
									<div class="row">
									@for ($i = 1; $i < count($feat_property["data"]); $i++)
										
											<div class="col-md-6">
												<div class="sides_list_property" style="display:block">
													<div class="sides_list_property_thumb" style="margin:0.6rem 0;width: 100%;height: auto;">
														<a href='/property/detail/{{$feat_property["data"][$i]["_id"]}}'>	
															<img src='{{$feat_property["data"][$i]["gallery"]["bannerImg"]["imgUrl"]}}' class="img-fluid" style="width:100%" alt="">
														</a>
													</div>
													<div class="sides_list_property_detail">
														<h4><a href='/property/detail/{{$feat_property["data"][$i]["_id"]}}'>{{$feat_property["data"][$i]["title"]}}</a></h4>
														<span><i class="ti-location-pin"></i>{{$feat_property["data"][$i]["location"]["address"]}}, {{$feat_property["data"][$i]["location"]["city"]}}, {{$feat_property["data"][$i]["location"]["pincode"]}}</span>
														<div class="lists_property_price">
															<div class="lists_property_types">
																<div class="property_types_vlix sale">{{$feat_property["data"][$i]["availability"]}}</div>
															</div>
															<div class="lists_property_price_value">
																<h4><i class="fas fa-rupee-sign"></i> {{$feat_property["data"][$i]["price"]}} L</h4>
															</div>
														</div>
													</div>
												</div>
											</div>
										

										
										
									@endfor
									</div>
									@endif
									</div>
									
								</div>
						</div>
						<!-- Sidebar End -->
						
						
						</div>
						
					</div>
				</div>	
			</section>
			<!-- ============================ All Property ================================== -->
			
			
			<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
			

		</div>
		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->
		
		
@endsection

@section('custom_js')

		<!-- ============================================================== -->
		<!-- All Jquery -->
		<!-- ============================================================== -->
		<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
  integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
  crossorigin=""></script>

		
		
		<script>
			function openFilterSearch() {
				document.getElementById("filter_search").style.display = "block";
			}
			function closeFilterSearch() {
				document.getElementById("filter_search").style.display = "none";
			}
		</script>
		
		<script type="text/javascript">
			var map = L.map('map-main').setView([28.53, 77.39], 10);

			L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
			    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
			}).addTo(map);
			var length = @php echo count($response["data"])  @endphp;
			// console.log(length);
			var latitde = '';
			var longitude = '';
			var title = '';
			var price = '';
			var id = '';
			@for ($i = 0; $i < count($response["data"]); $i++)
				latitude = {{$response["data"][$i]["location"]["mapCoordinates"]["latitude"]}};
				longitude = {{$response["data"][$i]["location"]["mapCoordinates"]["longitude"]}};
				title = "{{$response["data"][$i]["title"]}}";
				price = {{$response["data"][$i]["price"]}};
				id = "{{$response["data"][$i]["_id"]}}";

				// console.log(latitude,longitude);
				L.marker([latitude, longitude]).addTo(map)
				.bindPopup(`<b>${title}</b></br>PRICE: <i class="fas fa-rupee-sign"></i> ${price}<br><a href="/property/detail/${id}">READ MORE</a>`);
			@endfor
			
            // for ($i = 0; $i < data.length; $i++)
            // {
			// 	console.log(data);
            //     // L.marker([28.53, 77.39]).addTo(map)
			//     // .bindPopup('<b>PROPERTY 1</b></br>PRICE: <i class="fas fa-rupee-sign"></i> '+20+'<br><a href="">READ MORE</a>');
            // }
			

			//   L.marker([28.53, 77.39],{draggable:true}).addTo(map).on("moveend",function(){console.log(this.getLatLng())});

		</script>
@endsection
