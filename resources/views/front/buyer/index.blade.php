	<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('front.common.static_header')

@php 
	$listing_price = isset($proData->listing_price) ? $proData->listing_price: false;
	if ($listing_price) {
		$tenPercente = $listing_price/100*10;
		$minPrice = $listing_price-$tenPercente;
		$maxPrice = $tenPercente+$listing_price;
		$interest_rate = isset($proData->listing_price) ? $proData->listing_price/100*4.5 :'';
		$down_payment = $listing_price/100*20;
		$minSalesPrice = $proData->min_sales_price;
		$closingCost =  $listing_price/100*3;
	}
	$estimate = $proData->insurance+$proData->other_fee+$proData->property_tax+$proData->hoa;
	$property_id = isset($proData->property_id) ? $proData->property_id :'';

	//STRING REPLACE 
	if (isset($setting['intro_1']['line_2'])) {
		$intro_1_line2 = str_replace("{{SELLER_AGENT_NAME}}", $proData->seller->name , $setting['intro_1']['line_2']);
	}
	if (isset($setting['agent']['line_1'])) {
		$agent_line1Val = str_replace("{{SELLER_AGENT_NAME}}", $proData->seller->name , $setting['agent']['line_1']);
	}
	//RESTRICT DUE DELEGENCE
	$north_carolina_is = false;
	if ($proData->address_type==1) {
		//Form Google
		$address = strtolower($proData->address);
		if (strpos($address, 'north carolina') !== false) {
		    $north_carolina_is = true;
		}
	}else{
		$address = strtolower($proData->manual_address);
		if (strpos($address, 'north carolina') !== false) {
		    $north_carolina_is = true;
		}
	}

	
@endphp
<div id="preloader_new" style="opacity: 0; display: none;">
    <div id="status_new">
        <div class="spinner"></div>
    </div>
</div>
<div class="overlay" onclick="closeOverlay()"></div>

<div class="buyer_info_page">
	<input type="hidden" id="min_listing" value="{{$minPrice}}">
	<input type="hidden" id="max_listing" value="{{$maxPrice}}">
	<input type="hidden" id="listing_price" value="{{$listing_price ?? ''}}">
	<div class="top_back_bar">
		<div class="container">
			<div class="row">
				<div class="col-6 text-left">
					<img src="{{url('/public/images/ic_back_arrow.png')}}" class="back_arrow">
				</div>
				<div class="col-6 text-right">
					<img src="{{url('/public/images/ic_close.png')}}" class="close_circle">
				</div>
			</div>
		</div>
	</div>
	<div class="step_banner">
		<div class="container">
			<ul class="nav nav-tabs step_banner_tabs" id="myTab" role="tablist">
			  	<li class="nav-item">
			    	<a class="nav-link active" id="Intro-tab" data-toggle="tab" href="#Intro" role="tab" aria-controls="Intro" aria-selected="true">Intro</a>
			  	</li>
			  	<li class="nav-item">
			    	<a class="nav-link disabled-links" id="Offer-tab" data-toggle="tab" href="#Offer" role="tab" aria-controls="Offer" aria-selected="false">Offer</a>
			  	</li>
			  	<li class="nav-item">
			    	<a class="nav-link disabled-links" id="Confirm-tab" data-toggle="tab" href="#Confirm" role="tab" aria-controls="Confirm" aria-selected="false">Confirm</a>
			  	</li>
			</ul>
		</div>
	</div>
	<div class="step_container">
		<div class="container">
			<div class="tab-content" id="myTabContent">
			   	<div class="tab-pane fade show active" id="Intro" role="tabpanel" aria-labelledby="Intro-tab">
			   		<div class="row flex-lg-row-reverse">
			   			<div class="col-lg-6">
			   				<div class="owl-carousel owl-theme info_slider">
			                   @foreach($proImage as $image)
			                   <div class="item wow slideInRight">
			                        <div class="info_box">
			                        	<div class="info_img_box bg" style="background-image: url('{{'/public/uploads/'.Config::get('constant.images_dirs.PROPERTY')}}/{{$image->image}}');">

			                        	</div>
			                        </div>         
			                    </div>
			                    @endforeach
			                </div>
			                <div class="info_box">
	                            <p class="info_add">
	                            	@if($proData->address_type==1))
	                            		{{ $proData->address }}
	                            	@elseif($proData->address_type==2)
	                            		{{ $proData->manual_address }} {{ $proData->address }}
	                            	@endif
	                            </p>
                        	</div>
			   			</div>
			   			<div class="col-lg-6">
				   			<form name="buyer-post" id="buyer_post">
								<input type="hidden" name="property_id" value="{{$property_id ?? ''}}">
				   				<div class="text-center">
					   				<div class="buyer_img">
					   					<img src="@if($proData->seller->user_photo) {{ url('public/uploads/'.Config::get('constant.images_dirs.USERS') ) }}/{{$proData->seller->user_photo}} @else {{url('/public/images/ic_buyer.png')}} @endif">
					   				</div>
					   			</div>
				   				<div class="buyer_step1">
					   				
					   				<h2 class="buyer_name"> {{$proData->seller->name ?? 'Seller Agent'}}</h2>
					   				<p class="buyer_intro">{{ $intro_1_line2 ?? ''}}</p>

									<div class="form-group">
										<label for="formGroupExampleInput">Name</label>
										<input type="text" class="form-control" name="name" placeholder="Enter your name">
										<div class="invalid-feedback">Name field is required.</div>
									</div>
								  	<div class="form-group">
								    	<label for="formGroupExampleInput2">Email</label>
								    	<input type="email" name="email" class="form-control" placeholder="Enter your email">
										<div class="invalid-feedback">Email field is required.</div>
								  	</div>
								  	<div class="form-group">
                                      <label>Phone</label>
                                      <div class="form-row">
                                        <div class="col-4 col-md-2">
                                          <select name="phone_code" class="form-control">
                                            <option value="+1">+1</option>
                                            <option value="+91">+91</option>
                                          </select>
                                        </div>
                                        <div class="col-8 col-md-10">
                                         	<input type="number" class="form-control" name="phone" placeholder="Enter your number">
								    		<div class="invalid-feedback">Phone field is required.</div>
                                        </div>
                                      </div>
                                    </div>
				   					
				   					<div class="text-center">
				   						<button class="theme_btn auth_btn submit_step1" type="button">Submit</button>
				   					</div>
					   			</div>

					   			<div class="buyer_step2 hide_content">
					   				<h2 class="buyer_name"> {{$proData->seller->name ?? 'Seller Agent'}}</h2>
					   				<h2 class="buyer_name">{{ $setting['intro_2']['line_1'] ?? ''}}</h2>
					   				<p class="buyer_intro">{{ $setting['intro_2']['line_2'] ?? ''}}</p>

				   					<div class="radio_user_box_container">
					   					<div class="radio_user_box">
					   						<input class="form-check-input" type="radio" name="user_type" value="2" checked>
					   						<div class="user_box">
					   							<img src="{{url('public/images/ic_agent.png')}}">
					   						</div>
					   						<label class="form-check-label" for="user_type">Agent</label>
					   					</div>
					   					<div class="radio_user_box">
					   						<input class="form-check-input" type="radio" name="user_type" value="1">
					   						<div class="user_box">
					   							<img src="{{url('public/images/ic_buyer.png')}}">
					   						</div>
					   						<label class="form-check-label" for="user_type2">Buyer</label>
					   					</div>
					   				</div>
					   				<div class="text-center">
				   						<button class="theme_btn auth_btn submit_intro_step2" type="button">Continue</button>
				   					</div>
					   			</div>

					   			<div class="buyer_step3 hide_content">
					   				<h2 class="buyer_name">{{ $setting['intro_offer_range']['line_1'] ?? 'Do you already have an offer range in mind?'}}</h2>
					   				<p class="buyer_intro">{{ $setting['intro_offer_range']['line_2'] ?? 'I can quickly look up how much similar listings have sold for in the area to give you an idea of a good  offer amount.'}}</p>

					   				<div class="text-center">
						   				<div class="radio_user_box_container">
						   					<div class="radio_user_box">
						   						<input class="form-check-input" type="radio" name="offer_range" value="1">
						   						<div class="user_box">
						   							<img src="{{url('public/images/ic_thumbs_up.PNG')}}" class="deselect">
						   							<img src="{{url('public/images/ic_thumbs_up_select.PNG')}}" class="select">
						   						</div>
						   						<label class="form-check-label grey" for="user_type" >{{ $setting['intro_offer_range']['option_1'] ?? 'Yes, I have Something in mind'}}</label>
						   					</div>
						   					<div class="radio_user_box">
						   						<input class="form-check-input" type="radio" name="offer_range" value="2">
						   						<div class="user_box">
						   							<img src="{{url('public/images/ic_thumbs_Down.PNG')}}" class="deselect">
						   							<img src="{{url('public/images/ic_thumbs_down_select.PNG')}}" class="select">
						   						</div>
						   						<label class="form-check-label grey" for="user_type2" >{{ $setting['intro_offer_range']['option_2'] ?? 'No, Please assist me'}}</label>
						   					</div>
						   				</div>
						   					<div class="invalid-feedback"> Field is required.</div>
						   				<br>
					   				
				   						<!-- <button class="theme_btn auth_btn" type="button" data-toggle="modal" data-target="#thank_you">Continue</button> -->
				   						<button id="trigger-assest-model" class="hide_content" data-toggle="modal" data-target="#thank_you" type="button"></button>

				   						<button class="theme_btn auth_btn submit_intro_step3" type="button"> Continue</button>
				   					</div>

				   					<!-- Modal -->
									<div class="theme_modal small_modal modal fade" id="thank_you" tabindex="-1" role="dialog" aria-labelledby="thank_youCenterTitle" aria-hidden="true">
									  	<div class="modal-dialog modal-dialog-centered" role="document">
									    	<div class="modal-content">
										      	<div class="modal-header">
										        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          		<img src="{{url('public/images/ic_close.png')}}">
										        	</button>
										      	</div>
										      	<div class="modal-body">
										        	<p>{{ $setting['assist_me']['text'] ?? 'Thank you for choose our assist, your information has been sent to our agent and you have also  received email and sms for the same , now our agent will contact you soon and assist you.'}}</p>
										        	<button type="submit" class="theme_btn auth_btn modal_btn">{{ $setting['assist_me']['button_text'] ?? 'Ok'}}</button>
										      	</div>
										   </div>
										</div>
									</div>
									<!-- End modal -->
								</div>
					   		

			   			</div>
			   		</div>
			   	</div>
			  	<div class="tab-pane fade" id="Offer" role="tabpanel" aria-labelledby="Offer-tab">
			  		<div class="show_create_offer">
			  			<div class="row">
			  				
			  				<div class="col-lg-7">
			  					<div class="grey_box">
									<div class="range_slider_section">

										<div class="form-group">
									   	 	<label for="formGroupExampleInput" class="grey">Your Offer 
									   	 		<span>
									   	 			<input type="text" id="buy_offer_val" class="form-control val_data edit_val" value="${{$listing_price??''}}" disabled>
									   	 			<a><img src="{{url('public/images/ic_edit.png')}}" class="edit_icon edit_icon_buy_offer_val"></a>
									   	 		</span>
									   	 	</label>
									    	<div class="slidecontainer">
									    		<div id="buyer_offer_slider"></div>
											  	<input type="hidden" {{-- min="{{$minSalesPrice}}" max="{{$maxPrice}}" --}} value="{{$listing_price}}" id="buyer_offer" name="buyer_offer">
											</div>
									  	</div>
									  	<div class="form-group down_payment_box">
									    	<label for="formGroupExampleInput2" class="grey">Down Payment
									    		<span>
									    			<span>
									    				<input type="text" id="down_pay_percent_count" class="form-control val_data edit_val" value="20" disabled>
									    				<span>%</span>
									    				<a><img src="{{url('public/images/ic_edit.png')}}" class="edit_icon_down_pay_percent"></a>
									    			</span>
									    		</span>
									    	</label>
									    	<div class="slidecontainer">
									    		<div id="down_payment_slider"></div>
											  	<input type="hidden" id="down_payment" name="down_payment">
											</div>
									  	</div>
										<div class="form-group interest_rate_box">
											<label for="formGroupExampleInput2" class="grey">Interest Rate
												<span>
													<span>
														<input type="text" id="inter_rate_percent_count" class="form-control val_data edit_val" value="4.5" disabled>
														<span>%</span>
														<a><img src="{{url('public/images/ic_edit.png')}}" class="edit_icon_inter_rate_percent"></a>
													</span>
												</span>
											</label>
									    	<div class="slidecontainer">
									    		<div id="interest_rate_slider"></div>
											  	<input type="hidden" id="interest_rate" name="interest_rate">
											</div>
									  	</div>
									</div>
									<div class="radio_group">
										<div class="form-group">
									  		<label class="grey">How do you intend to pay?</label><br>
									  		<div class="custom-form-check custom_radio_div ">
											    <input class="custom-form-check-input" type="radio" name="intend_to_pay" id="Cash" value="1">
											    <label class="custom_radio"></label>
											    <label class="custom-form-check-label" for="Cash">Cash</label>
											</div>
											<div class="custom-form-check custom_radio_div">
											    <input class="custom-form-check-input" type="radio" name="intend_to_pay" id="Loan" value="2">
											    <label class="custom_radio"></label>
											    <label class="custom-form-check-label" for="Loan">Loan</label>
											</div>
									  	</div>
										<div class="invalid-feedback invalid-feedback-offer-intend-pay">Intend to pay field is required.</div>
								  	</div>
								  	<div class="radio_group loan_term_box hide_content">
										<label class="grey">Loan Term</label><br>
									  	<select class="form-control without_border icon_control dropdown_control " name="loan_term">
				                            <option value="15">15 Year Fixed</option>
				                            <option value="20">20 Year Fixed</option>
				                            <option value="30">30 Year Fixed</option>
				                            <option value="FHA">30 Year Fixed FHA</option>
				                            <option value="VA">30 Year VA</option>
				                        </select>
								  	</div>
								</div>

								<div class="grey_box">
									<div class="form-group down_payment_box">
								   	 	<label for="formGroupExampleInput" class="grey">Down Payment</label>
								    	<input type="text" class="form-control val_data" name="down_payments" value="${{$down_payment}}" readonly>
								  	</div>
								  	<div class="form-group">
								   	 	<label for="formGroupExampleInput" class="grey">Est. Cash to Close</label>
								    	<input type="text" class="form-control val_data" name="est_cash_to_close" readonly>
								  	</div>
								  	<div class="form-group">
								    	<label for="formGroupExampleInput2" class="grey">Closing Cost </label>
								    	<input type="text" class="form-control val_data" value="${{$closingCost??''}}" name="closing_cost" readonly>
								  	</div>
								</div>
			  				</div>
			  				<div class="col-lg-5">
			  					<div class="chart_div">
			  						<div id="chartContainer" style="height: 400px; width: 100%;"></div>
			  						<div class="chart_title">
			  							<label><span class="estimated_payment_mo">${{$estimate}}/Month</span></label><br>
			  							<label class="grey">Estimated Payment</label>
			  							<input type="hidden" class="form-control val_data" name="estimated_payment">
			  						</div>
			  						<div class="chart_detail">
			  							<div class="chart_detail_inner">
			  								<div class="chart_label">
			  									<div class="color Insurance_color"></div>
			  									<label for="formGroupExampleInput" class="grey">Home Insurance</label>
			  								</div>
			  								<div class="chart_val">
			  									<input type="text" class="form-control val_data" name="insurance" value="${{$proData->insurance ??''}}" readonly>
			  								</div>
			  							</div>
			  							<div class="chart_detail_inner">
			  								<div class="chart_label">
			  									<div class="color protax_color"></div>
			  									<label for="formGroupExampleInput2" class="grey">Pro. Taxes</label>
			  								</div>
			  								<div class="chart_val">
			  									<input type="text" class="form-control val_data" name="property_taxes" value="${{$proData->property_tax ??''}}" readonly> 
			  								</div>
			  							</div>
			  							<div class="chart_detail_inner">
			  								<div class="chart_label">
			  									<div class="color otherfee_color"></div>
			  									<label for="formGroupExampleInput2" class="grey">Other Fees</label>
			  								</div>
			  								<div class="chart_val">
			  									<input type="text" class="form-control val_data" name="other_fees" value="${{$proData->other_fee ??''}}" readonly>
			  								</div>
			  							</div>
			  							<div class="chart_detail_inner">
			  								<div class="chart_label">
			  									<div class="color Mortgage_color"></div>
			  									<label for="formGroupExampleInput2" class="grey">Principal & Interest</label>
			  								</div>
			  								<div class="chart_val">
			  									<input type="text" class="form-control val_data" name="mortgage" readonly>
			  								</div>
			  							</div>
			  							<div class="chart_detail_inner">
			  								<div class="chart_label">
			  									<div class="color mortgage_insurance_color"></div>
			  									<label for="formGroupExampleInput2" class="grey">Mortgage Insurance</label>
			  								</div>
			  								<div class="chart_val">
			  									<input type="text" class="form-control val_data" name="mortgage_insurance" readonly>
			  								</div>
			  							</div>

			  							<div class="chart_detail_inner">
			  								<div class="chart_label">
			  									<div class="color hoa_color"></div>
			  									<label for="formGroupExampleInput2" class="grey">HOA</label>
			  								</div>
			  								<div class="chart_val">
			  									<input type="text" class="form-control val_data" name="hoa" value="${{$proData->hoa ?? 0}}" readonly>
			  								</div>
			  							</div>
			  						</div>
			  					</div>
			  				</div>
			  			</div>
			  			<div class="row">
			  				<div class="col-12">
			  					<div class="form-group custom-form-check">
								    <input type="checkbox" name="agency_disclose" class="custom-form-check-input" id="exampleCheck1">
								    <label class="custom_checkbox"></label>
								    <label class="custom-form-check-label label-text" for="exampleCheck1">I have read and agree to the terms of the <a href="#" data-toggle="modal" data-target="#buyer_disclose_model">Agency Disclosure</a><div class="invalid-feedback">Please select Agency Disclosure to proceed.</div></label>
								</div>
								<div class="text-center">
									<button class="theme_btn auth_btn submit_offer">Submit My Offer</button>
								</div>
			  				</div>
			  			</div>
					</div>
				  	
				  	<!--  ========== BUYER AGENT POPUP ============== -->
					<div class="buyer_agent_box hide_content">
						<div class="row">
							<div class="col-12">
								<div class="text-center">
					   				<div class="buyer_img">
					   					<img src="@if($proData->seller->user_photo) {{ url('public/uploads/'.Config::get('constant.images_dirs.USERS') ) }}/{{$proData->seller->user_photo}} @else {{url('/public/images/ic_buyer.png')}} @endif">
					   				</div>
					   			</div>
					   			<div class="buyer_agent_det">
						   			<h2 class="buyer_name"> {{ $agent_line1Val ?? ''}}</h2>
								   	<p class="buyer_intro"> {{ $setting['agent']['line_2'] ?? ''}} </p>
								   	<div class="contact_detail">
								   		<div class="buyer_intro"><div class="contact_icon"><a href="tel:{{$proData->seller->mobile_number ?? ''}}"><img class="" src="{{url('/public/images/ic_phone.png')}}"></a></div>{{ $proData->seller->mobile_number ?? ''}}</div>
								   		<div class="buyer_intro"><div class="contact_icon"><a href="mailto:{{$proData->seller->email ?? ''}}"><img class="" src="{{url('/public/images/ic_mail.png')}}"></a></div>{{ $proData->seller->email ?? ''}}</div>
								   	</div>
					   			</div>
							</div>
							<div class="col-12">
								<div class="grey_table_view">
									<div class="grey_table_header">
										Buyer Information
									</div>
									<div class="grey_table_body">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="formGroupExampleInput">Name</label>
													<input type="text" class="form-control" name="buyer_name" placeholder="Buyer Name">
													<div class="invalid-feedback">Name field is required.</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
											    	<label for="formGroupExampleInput2">Email</label>
											    	<input type="email" name="buyer_email" class="form-control" placeholder="Buyer email">
													<div class="invalid-feedback">Email field is required.</div>
											  	</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
											    	<label for="formGroupExampleInput2">Phone</label>
											    	<div class="form-row">
				                                        <div class="col-4 col-md-2">
				                                          <select name="buyer_ph_code" class="form-control">
				                                            <option value="+1">+1</option>
				                                            <option value="+91">+91</option>
				                                          </select>
				                                        </div>
				                                        <div class="col-8 col-md-10">
				                                         	<input type="number" class="form-control" name="buyer_phone" placeholder="Buyer phone">
															<div class="invalid-feedback">Phone field is required.</div>
				                                        </div>
				                                    </div>
											  	</div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="grey_table_view">
									<div class="grey_table_header">
										Offer Terms
									</div>
									<div class="grey_table_body">
										<div class="row">
											
											<div class="form-group col-md-6">
										  		<label>How does your buyer intend to pay?</label><br>
										  		<div class="custom-form-check custom_radio_div ">
												    <input class="custom-form-check-input" type="radio" name="agent_intend_to_pay" id="Cash" value="1">
												    <label class="custom_radio"></label>
												    <label class="custom-form-check-label" for="Cash">Cash</label>
												</div>
												<div class="custom-form-check custom_radio_div">
												    <input class="custom-form-check-input" type="radio" name="agent_intend_to_pay" id="Loan" value="2">
												    <label class="custom_radio"></label>
												    <label class="custom-form-check-label" for="Loan">Loan</label>
												</div>
										  	</div>
											
											<div class="form-group hide_content buyer_loan_term col-md-6">
										  		<label>Has your buyer been pre-approved?</label><br>
										  		<div class="custom-form-check custom_radio_div ">
												    <input class="custom-form-check-input" type="radio" name="buyer_pre_approved" id="v30" value="YES">
												    <label class="custom_radio"></label>
												    <label class="custom-form-check-label" for="v30">Yes</label>
												</div>
												<div class="custom-form-check custom_radio_div ">
												    <input class="custom-form-check-input" type="radio" name="buyer_pre_approved" id="v15" value="NO">
												    <label class="custom_radio"></label>
												    <label class="custom-form-check-label" for="v15">No</label>
												</div>
										  	</div>
											<div class="form-group col-md-6">
												<label for="formGroupExampleInput">Offer Price ($)</label>
												<input type="number" min=0 step=0.01 class="form-control" name="sale_price" value="">
												<div class="invalid-feedback">Sale Price field is required.</div>
											</div>
											<div class="form-group col-md-6">
										    	<label for="formGroupExampleInput2">Seller Concessions ($)</label>
										    	<input type="number" min=0 step=0.01 name="seller_concessions" class="form-control" value="">
												<div class="invalid-feedback">Seller Concessions field is required.</div>
										  	</div>
										  	<div class="form-group col-md-6">
										    	<label for="formGroupExampleInput2">EMD ($)</label>
										    	<input type="number" min=0 step=0.01 class="form-control" name="emd" value="{{$proData->emd ?? ''}}">
										    	<div class="invalid-feedback">EMD field is required.</div>
										  	</div>
										  	@if($north_carolina_is)
										  	<div class="form-group col-md-6">
										    	<label for="formGroupExampleInput2">Due Diligence ($)</label>
										    	<input type="number" min=0 step=0.01 class="form-control" name="due_diligence" value="{{$proData->due_diligence ?? ''}}">
										    	<div class="invalid-feedback">Due Diligence field is required.</div>
										  	</div>
										  	@endif
										  	<div class="col-md-6">
										  		<div class="form-group m-0">
						                            <!-- <label>{{'Settlement Date:'}}</label> -->
						                            <label>Settlement Date (days):</label>
						                        </div>
											  	@foreach($p_duration as $duval)
											  	<div class="custom-form-check custom_radio_div ">
												    <input class="custom-form-check-input settlement_date" type="radio" name="settlement_date" value="{{$duval->p_duration_id}}">
												    <label class="custom_radio"></label>
												    <label class="custom-form-check-label">{{$duval->duration}}</label>
												</div>
						                        @endforeach
						                        <div class="invalid-feedback invalid_settlement_date">Settlement Date field is required.</div>
										  	</div>
										</div>
									</div>
								</div>
								
							  	<div class="grey_table_view">
									<div class="grey_table_header">
										Contract Contingencies
									</div>
									<div class="grey_table_body">
										<div class="row">
											<div class="col-md-6">
												<div class="duration_box mb-3 ">
						                            <div class="form-group m-0">
						                                <!-- <label>{{'Financing Contingency:'}}</label> -->
						                                <label>Financing Contingency (days):</label>
						                            </div>
						                            <div class="show_finance_not_avil text-danger d-none font-size-14">
						                            	*Financing Contingency is not requred!
						                            </div>

						                            @if($proData->finance)
						                            	@foreach($p_duration as $duval)
						                            	<div class="custom-form-check custom_radio_div ">
														    <input class="custom-form-check-input" type="radio" name="finance" value="{{$duval->p_duration_id}}">
														    <label class="custom_radio"></label>
														    <label class="custom-form-check-label">{{$duval->duration}}</label>
														</div>
							                            @endforeach
						                            @endif
						                        </div>
											</div>
											<div class="col-md-6">
												<div class="duration_box mb-3">
						                            <div class="form-group m-0">
						                                <!-- <label>{{'Appraisal Contingency:'}}</label> -->
						                                <label>Appraisal Contingency (days):</label>
						                            </div>
						                            @if($proData->appraisal)
							                            @foreach($p_duration as $duval)
							                            <div class="custom-form-check custom_radio_div ">
														    <input class="custom-form-check-input" type="radio" name="appraisal" value="{{$duval->p_duration_id}}">
														    <label class="custom_radio"></label>
														    <label class="custom-form-check-label">{{$duval->duration}}</label>
														</div>
							                            @endforeach
							                        @endif
						                        </div>
											</div>
											<div class="col-md-6">
												<div class="duration_box mb-3">
						                            <div class="form-group m-0">
						                                <!-- <label>{{'Inspection Contingency:'}}</label> -->
						                                <label>Inspection Contingency (days):</label>
						                            </div>
						                            @if($proData->inspection)
							                            @foreach($p_duration as $duval)
							                            <div class="custom-form-check custom_radio_div ">
														    <input class="custom-form-check-input" type="radio" name="inspection" value="{{$duval->p_duration_id}}">
														    <label class="custom_radio"></label>
														    <label class="custom-form-check-label">{{$duval->duration}}</label>
														</div>
							                           
							                            @endforeach
							                        @else
							                        	<div class="text-danger font-size-14">
							                            	Inspection Contingency is not requred!
							                            </div>
						                            @endif
						                        </div>
											</div>
											<div class="col-md-6">
												<div class="duration_box mb-3">
						                            <div class="form-group m-0">
						                                <!-- <label>{{'Home Sale Contingency:'}}</label> -->
						                                <label>Home Sale  Contingency (days):</label>
						                            </div>
						                            @if($proData->home_sale)
							                            @foreach($p_duration as $duval)
							                            <div class="custom-form-check custom_radio_div ">
														    <input class="custom-form-check-input" type="radio" name="home_sale" value="{{$duval->p_duration_id}}">
														    <label class="custom_radio"></label>
														    <label class="custom-form-check-label">{{$duval->duration}}</label>
														</div>
							                            @endforeach
						                            @endif
						                        </div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
						                        	<label class="form-label">Additional Note:</label>
						                        	<textarea class="form-control" rows="3" name="additional_note" placeholder="Type here..."></textarea>
						                        </div>
											</div>
										</div>
									</div>
								</div>
								
								
			  					<div class="form-group custom-form-check w-100">
								    <input type="checkbox" name="agency_disclose1" class="custom-form-check-input" id="exampleCheck1">
								    <label class="custom_checkbox"></label>
								    <label class="custom-form-check-label label-text" for="exampleCheck1">I have read and agree to the terms of the <a href="#" data-toggle="modal" data-target="#agent_disclose_model">Agency Disclosure</a><div class="invalid-feedback invalid_agency_disclose1">Please select Agency Disclosure to proceed.</div></label>
								</div>
								<div class="text-center">
									<button class="theme_btn auth_btn submit_agent_offer" type="submit">{{$setting['agent']['button_text'] ?? 'Submit My Offer'}}</button>
								</div>
			  				</div>
			  			</div>	
					</div>	  	
				  	<!--  ========== BUYER AGENT POPUP --END ============== -->
			  	</div>
 
			  	<div class="tab-pane fade" id="Confirm" role="tabpanel" aria-labelledby="Confirm-tab">
			  		<div class="thankYou">
			  			<img src="{{url('/public/images/ic_verify.png')}}" class="wow zoomIn">
			  			<h1>{{$setting['offer_approved']['line_1'] ?? 'Thank You'}}</h1>
			  			<p>{{$setting['offer_approved']['line_2'] ?? 'Your offer has been Pre - approved!'}}</p>
			  			<a href="{{url('/')}}"><button type="button" class="theme_btn auth_btn wow zoomIn">{{$setting['offer_approved']['button_text'] ?? 'Submit New Offer'}}</button></a><br>
			  			<a href="{{url('/')}}" class="back-link"><img src="{{url('/public/images/ic_back_blue.png')}}"> Back to home</a>
			  		</div>
			  		<div class="resubmitOffer hide_content">
			  			<h2 class="buyer_name mb-5">{{ $setting['offer_NA']['line'] ?? 'Sorry, Your offer has not approved!'}}</h2>
			  			<div class="table-responsive theme_table mb-4">
				  			<table class="table table-bordered text-center ">
								<thead>
								    <tr>
								      <th scope="col" width="33%">Contract Terms</th>
								      <th scope="col" width="33%">Entered Value</th>
								      <th scope="col" width="33%">Acceptance Value</th>
								    </tr>
								</thead>
								<tbody class="first_table">
								    
								</tbody>
							</table>
						</div>
						<div class="table-responsive theme_table mb-4">
				  			<table class="table table-bordered text-center ">
								<thead>
								    <tr>
								      <th scope="col" width="33%">Contract Contingencies</th>
								      <th scope="col" width="33%">Entered Value</th>
								      <th scope="col" width="33%">Acceptance Value</th>
								    </tr>
								</thead>
								<tbody class="second_table">
									
								</tbody>
							</table>
						</div>
						<div class="text-center">
							<button class="theme_btn auth_btn resubmit_offer_btn" type="button">{{ $setting['offer_NA']['btn_txt'] ?? 'Resubmit Offer' }}</button>
						</div>
			  		</div>
			  	</div>
			</div>
			
			</form>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="theme_modal small_modal modal fade" id="buyer_disclose_model" tabindex="-1" role="dialog" aria-labelledby="thank_youCenterTitle" aria-hidden="true">
  	<div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 75%;margin: 1.75rem auto;">
    	<div class="modal-content">
	      	<div class="modal-header">
	      		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<img src="{{url('/public/images/ic_close.png')}}">
	        	</button>
	      	</div>
	      	<div class="modal-body">
	      		<h2 class="buyer_name">{{ $disclose['buyer']->cms_title ?? ''}}</h2>
	        	<p>{!! $disclose['buyer']->cms_description !!}</p>
	      	</div>
	   </div>
	</div>
</div>
<!-- End modal -->
<!-- Modal -->
<div class="theme_modal small_modal modal fade" id="agent_disclose_model" tabindex="-1" role="dialog" aria-labelledby="thank_youCenterTitle" aria-hidden="true">
  	<div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 75%;margin: 1.75rem auto;">
    	<div class="modal-content">
	      	<div class="modal-header">
	      		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<img src="{{url('public/images/ic_close.png')}}">
	        	</button>
	      	</div>
	      	<div class="modal-body">
	      		<h2 class="buyer_name">{{ $disclose['agent']->cms_title ?? ''}}</h2>
	        	<p>{!! $disclose['agent']->cms_description !!}</p>
	      	</div>
	   </div>
	</div>
</div>
<!-- End modal -->

@include('front.common.static_footer')
<script>
var chart = '';
$(document).ready(function(){
	CanvasJS.addColorSet("greenShades",
    [
        "#3fc478",
        "#b3d675",
        "#92a0e5",
        "#7bcdf3",
        "#c76969",               
        "#d9d9d9"               
    ]);

	chart = new CanvasJS.Chart("chartContainer", {
		animationEnabled: true,
		colorSet: "greenShades",

		title:{
			horizontalAlign: "left",
			margin: 30
		},
		data: [{
			type: "doughnut",
			startAngle: 240,
			innerRadius: "55%",
			indexLabelFontSize: 17,
			radius: "80%",
			indexLabel: "{y}",
			indexLabelPlacement: "inside",
			indexLabelFormatter: function(e) {
		      if (e.dataPoint.y === 0)
		        return "";
		      else
		        return e.dataPoint.y;
		    },
			//indexLabel: "{}",
			toolTipContent: "<b>{label}:</b> {y}",
			dataPoints: [
				{ y: {{$proData->insurance ?? 0}}, label: "Home Insurance" },
				{ y: {{$proData->property_tax ?? 0}}, label: "Pro. Taxes" },
				{ y: {{$proData->other_fee ?? 0}}, label: "Other Fees" },
				{ y: 0, label: "Principal & Interest"},
				{ y: 0, label: "Mortgage Insurance"},
				{ y: {{$proData->hoa ?? 0}}, label: "HOA"}
			]
		}]
	});
	chart.render();
});
$(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});
</script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript" src="{{url('/public/js/front/buyer.js')}}"></script>
</html>