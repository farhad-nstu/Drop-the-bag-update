@extends('front.master')

@section('title', '| Drop The Bag')

  @section('body')
        <div class="page-header">
		<div class="container">
			<h1 class="entry-title">Partner &#8211; Subscription</h1>				
		</div>
	</div>
	<div id="content" class="site-content">
        <div id="content-inside" class="container right-sidebar">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">	
					<article id="post-23" class="post-23 page type-page status-publish hentry">
						<header class="entry-header">
						</header>

						<div class="entry-content">
							<div data-elementor-type="wp-page" data-elementor-id="23" class="elementor elementor-23" data-elementor-settings="[]">
								<div class="elementor-inner">
									<div class="elementor-section-wrap">
										<section class="elementor-element elementor-element-946f420 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-id="946f420" data-element_type="section">
											<div class="elementor-container elementor-column-gap-default">
												<div class="elementor-row">
													<div class="elementor-element elementor-element-8737e07 elementor-column elementor-col-100 elementor-top-column" data-id="8737e07" data-element_type="column">
														<div class="elementor-column-wrap  elementor-element-populated">
															<div class="elementor-widget-wrap">
																<div class="elementor-element elementor-element-d046215 elementor-widget elementor-widget-text-editor" data-id="d046215" data-element_type="widget" data-widget_type="text-editor.default">
																	<div class="elementor-widget-container">
																		<div class="elementor-text-editor elementor-clearfix">
																			<h4>
																				Einfach Geld verdienen mit &#8220;Drop the Bag&#8221; &#8211; Unverbindlich und ohne Risiko!
																			</h4>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</section>
	<section class="elementor-element elementor-element-7c66fd8 elementor-section-height-min-height elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-items-middle elementor-section elementor-top-section" data-id="7c66fd8" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
		<div class="elementor-container elementor-column-gap-default">
		<div class="elementor-row">
			<div class="elementor-element elementor-element-83c527a elementor-column elementor-col-100 elementor-top-column" data-id="83c527a" data-element_type="column">
			<div class="elementor-column-wrap  elementor-element-populated">
				<div class="elementor-widget-wrap">
					<div class="elementor-element elementor-element-0e3ece5 elementor-widget elementor-widget-text-editor" data-id="0e3ece5" data-element_type="widget" data-widget_type="text-editor.default">
					<div class="elementor-widget-container">
					<div class="elementor-text-editor elementor-clearfix">
					<p>
					
					<form action="{{ route('partner-subscription-insert') }}" method="post">
				    @csrf		
						<div class="card">
						<h5 class="card-header info-color white-text text-center py-4">
						<strong>Sign up for Partners</strong>
						</h5><!--Card content-->
						<div class="card-body px-lg-5 pt-0"><!-- Location -->
						<form action="#!" class="text-center" style="color: #757575;">
					

						<br>
						<div class="md-form mt-0">
													<input type="text" name="location" id="location" class="form-control">
														<label for="location">Name of your Shop/Restaurant/Location</label>
																				</div>
												<br><!-- Anrede -->
												<select class="custom-select custom-select-sm" name="gender" id="anr">
													<option value="" disabled selected>Select your gender</option>
													<option value="Female">Female</option>
													<option value="Male">Male</option>
													<option value="Company">Company</option>
												</select>
												
												<br>
												<br>
												<div class="form-row">
													<div class="col"><!-- First name -->
														<div class="md-form">
															<input type="text" id="vorname" name="first_name" class="form-control">
															<label for="vorname">First name</label>
															
														</div>
													</div>
													<div class="col">
														<div class="md-form">
															<input type="text" id="lname" name="last_name" class="form-control">
															<label for="lname">Last name</label>
															
														</div>
													</div>
												</div>
												<div class="form-row">
													<div class="col">
														<div class="md-form">
															<input type="text" id="firma" name="company_name" class="form-control">
															<label for="firma">Company Name</label>
															
														</div>
													</div>
													<div class="col">
														<div class="md-form">
															<input type="text" id="form" name="company_form" class="form-control">
															<label for="form">Company Form (LTD., Gmbh,&#8230;)</label>
															
														</div>
													</div>
												</div>
												<div class="md-form mt-0">
													<input type="text" id="UID" name="UID" class="form-control">
													<label for="UID">EU Tax Identification Number</label>
													
												</div>
												<div class="form-row">
													<div class="col">
														<div class="md-form">
															<input type="text" id="address" name="address" class="form-control" placeholder="Enter your address">
															<!-- <label for="adresse">Addresse (without Numbers &#8211; just the Name)</label> -->
															
														</div>
													</div>
													<div class="col">
														<div class="md-form">
															<input type="text" id="nr" name="number_of_the_house" class="form-control">
															<label for="nr">Number of the house &#8211; no appartment</label>
															
														</div>
													</div>
												</div>

												<div class="form-row">
													<div class="col">
														<div class="md-form">
															<input type="hidden" id="cityLat" name="lat"  class="form-control" readonly>
															<input type="hidden" name="place_id" id="placeID">
														</div>
													</div>
													<div class="col">
														<div class="md-form">
															<input type="hidden" id="cityLng" name="lng" class="form-control" readonly>
														</div>
													</div>
												</div>

												<div class="form-row">
													<div class="col">
														<div class="md-form">
															<input type="text" id="plz" name="zip_code" class="form-control">
															<label for="plz">ZIP Code</label>
															
														</div>
													</div>
													<div class="col"><!-- Ort -->
														<div class="md-form">
															<input type="text" id="city2" name="town" class="form-control" placeholder="Enter your city">
															
														</div>
													</div>
												</div>
												<br>
												<select class="custom-select custom-select-sm" name="country" id="land">
													<option value="" disabled selected>Select your Country</option>
													<option value="Österreich">Österreich</option>
													<option value="Slowenien">Slowenien</option>
													<option value="Ungarn">Ungarn</option>
													<option value="Deutschland">Deutschland</option>
													<option value="Kroatien">Kroatien</option>
													<option value="Schweiz">Schweiz</option>
													<option value="Liechtenstein">Liechtenstein</option>
													<option value="Italien">Italien</option>
												</select>
												
												<br>
												<br>
												<div class="form-row">
													<div class="col">
														<div class="md-form">
															<input type="email" id="email" name="email" class="form-control">
															<label for="email">E-Mail</label>
															
														</div>
													</div>
													<div class="col"><!-- tel -->
														<div class="md-form">
															<input type="text" id="tel" name="tel" class="form-control">
															<label for="tel">Phone Number</label>
															
														</div>
													</div>
												</div><!-- Website -->
												<div class="md-form mt-0">
													<input type="text" name="web" id="web" class="form-control">
													<label for="web">WebSite</label>
													
												</div><!-- SpamCheck -->
												<div class="md-form mt-0">
													<input type="text" name="spam_check" id="check" class="form-control">
													<label for="check">Spamcheck: 17 + 12 = ?</label>
													
												</div><!-- Sign up button -->
												<button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" name="submitted" value="Sign in">
													Join us
												</button>
						<hr><!-- Terms of service -->
						<p>By clicking<em>Sign up</em> you agree to our		
							<a href="#" target="_blank">terms of service</a></p>
						</form><!-- Form -->
						</div>
					</div>
				</form>	
			
			
		</div>
	</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-element elementor-element-21fc3da elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-id="21fc3da" data-element_type="section">
	<div class="elementor-container elementor-column-gap-default">
		<div class="elementor-row">
			<div class="elementor-element elementor-element-13be4d6 elementor-column elementor-col-100 elementor-top-column" data-id="13be4d6" data-element_type="column">
				<div class="elementor-column-wrap">
					<div class="elementor-widget-wrap"></div>
				</div>
			</div>
		</div>
	</div>
</section>
</div>
</div>
</div>
</div>
</article>	
				</main>
			</div>

                                        
		</div>
	</div>




  @endsection 

  @section('script')

      <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyBzC94pnwIAUI5G3HQKxFCnFBiDiHIIfJk"></script>
<script type="text/javascript">
	$('#nr').click(function () 
	{
	   var address = $("#address").val();
	   var geocoder = new google.maps.Geocoder();
		geocoder.geocode( { 'address': address}, function(results, status) {

		if (status == google.maps.GeocoderStatus.OK) {
			console.log(results[0]);
		    var latitude = results[0].geometry.location.lat();
		    var longitude = results[0].geometry.location.lng();
		   	$("#cityLat").val(latitude);
		   	$("#cityLng").val(longitude);
		   	$("#placeID").val(results[0].place_id);
		  } 
		});
	});	
	

</script>

  @endsection

    




