$(function() {
	//DEFAULT VALUE 
	var min_listing = parseInt($("#min_listing").val());
	var max_listing = parseInt($("#max_listing").val());
	var listing_pri = parseInt($("#listing_price").val());
	
    $( "#buyer_offer_slider" ).slider({
      range: "min",
      value: listing_pri,
      min: min_listing,
      max: max_listing,
      slide: function( event, ui ) {
        $( "#buy_offer_val" ).val( "$" + ui.value );
        $( "#buyer_offer" ).val(ui.value);
        cal();
      }
    });
    $( "#buy_offer_val" ).val( "$" + get_buyer_slider_range() );
    $("#buyer_offer").val(get_buyer_slider_range());
	$("#buy_offer_val").change(function() {
		var val = $(this).val();
		val = val.replace('$','');
		val = parseInt(val);
		set_buyer_slider_range(val);
	    $( "#buy_offer_val" ).val( "$" + get_buyer_slider_range() );
    	$("#buyer_offer").val(get_buyer_slider_range());
    	cal();
	});
	//BUYER FUNCTION
	function set_buyer_slider_range(range) {
		var val = $("#buyer_offer_slider").slider("value", range);
	}
	function get_buyer_slider_range() {
		var val = $("#buyer_offer_slider" ).slider( "value" );
		return val;
	}
	//--END

	$( "#down_payment_slider" ).slider({
      range: "min",
      value: 20,
      min: 1,
      max: 100,
      slide: function( event, ui ) {
        $( "#down_pay_percent_count" ).val(ui.value );
        $( "#down_payment" ).val(ui.value);
        cal();
      }
    });
    $( "#down_pay_percent_count" ).val(get_down_pay_slider_range() );
    $("#down_payment").val(get_down_pay_slider_range());
	
	$("#down_pay_percent_count").change(function() {
		var val = $(this).val();
		val = val.replace('$','');
		val = parseInt(val);
		set_down_pay_slider_range(val);
	    $( "#down_pay_percent_count" ).val(get_down_pay_slider_range() );
    	$("#down_payment").val(get_down_pay_slider_range());
    	cal();
	});
	//DOWNPAYMENT FUNCTION
	function set_down_pay_slider_range(range) {
		var val = $("#down_payment_slider").slider("value", range);
	}
	function get_down_pay_slider_range() {
		var val = $("#down_payment_slider" ).slider( "value" );
		return val;
	}
	//--END
	
	$( "#interest_rate_slider" ).slider({
      range: "min",
      value: 3,
      min: 2,
      max: 6,
      step:0.1,
      slide: function( event, ui ) {
        $( "#inter_rate_percent_count" ).val(ui.value );
        $( "#interest_rate" ).val(ui.value);
        cal();
      }
    });
    $( "#inter_rate_percent_count" ).val(get_inter_rate_slider_range() );
    $("#interest_rate").val(get_inter_rate_slider_range());
	
	$("#inter_rate_percent_count").change(function() {
		var val = $(this).val();
		val = parseFloat(val);
		set_inter_rate_slider_range(val);
	    $( "#inter_rate_percent_count" ).val(get_inter_rate_slider_range() );
    	$("#interest_rate").val(get_inter_rate_slider_range());
    	cal();
	});
	//DOWNPAYMENT FUNCTION
	function set_inter_rate_slider_range(range) {
		var val = $("#interest_rate_slider").slider("value", range);
	}
	function get_inter_rate_slider_range() {
		var val = $("#interest_rate_slider" ).slider( "value" );
		return val;
	}
	//--END



	$.ajaxSetup({
	   headers: {
	     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	   }
	});
	//EDIT BUTTON 
	$('.edit_icon_buy_offer_val').click(function(){
		$("#buy_offer_val").addClass("set-active-edit-slider-input");
		$("#buy_offer_val").prop('disabled',false);
		$("#down_pay_percent_count").removeClass("set-active-edit-slider-input");
		$("#down_pay_percent_count").prop('disabled',true);
		$("#inter_rate_percent_count").removeClass("set-active-edit-slider-input");
		$("#inter_rate_percent_count").prop('disabled',true);
	});
	$('.edit_icon_down_pay_percent').click(function(){
		$("#down_pay_percent_count").addClass("set-active-edit-slider-input");
		$("#down_pay_percent_count").prop('disabled',false);
		$("#inter_rate_percent_count").removeClass("set-active-edit-slider-input");
		$("#inter_rate_percent_count").prop('disabled',true);
		$("#buy_offer_val").removeClass("set-active-edit-slider-input");
		$("#buy_offer_val").prop('disabled',true);
	});
	$('.edit_icon_inter_rate_percent').click(function(){
		$("#inter_rate_percent_count").addClass("set-active-edit-slider-input");
		$("#inter_rate_percent_count").prop('disabled',false);
		$("#buy_offer_val").removeClass("set-active-edit-slider-input");
		$("#buy_offer_val").prop('disabled',true);
		$("#down_pay_percent_count").removeClass("set-active-edit-slider-input");
		$("#down_pay_percent_count").prop('disabled',true);

	});
	
	//STEP SUBMISSION
	$(".submit_step1").on('click',function () {
		var name = $("input[name='name']").val();
		var email = $("input[name='email']").val();
		var phone = $("input[name='phone']").val();
		if (name.length <=0) {
			$("input[name='name']").next().css( "display", "block" );
		}
		if (email.length <=0) {
			$("input[name='email']").next().css( "display", "block" );
		}
		if (phone.length <=0) {
			$("input[name='phone']").next().css( "display", "block" );
		}
		if (name.length <=0 || email.length <=0 || phone.length <=0) {
			return false;	
		}
		$('.buyer_step2').removeClass('hide_content');	
		$('.buyer_step1').addClass('hide_content');	
	});

	$(".submit_intro_step2").on('click',function () {
		var checkIsAgent = $("input[name='user_type']:checked").val();
		if (checkIsAgent==2) 
		{
			$("#Offer-tab").click();
    		$(".buyer_agent_box").removeClass('hide_content');
			$(".step_banner").addClass('hide_content');
			$('.buyer_step2').addClass('hide_content');	
		}else{
			$('.buyer_step2').addClass('hide_content');	
			$('.buyer_step3').removeClass('hide_content');	
		}

	});

	$(".resubmit_offer_btn").click(function () {
		$( ".submit_intro_step2" ).click();
		$(".resubmitOffer").addClass('hide_content');
		$(".thankYou").addClass('hide_content');

	})

	$(".submit_intro_step3").click(function(){
		$("#Offer-tab").removeClass('disabled-links');
		var checkIsAgent = $("input[name='user_type']:checked").val();
		var offer_range = $("input[name='offer_range']:checked").val();
		if (checkIsAgent==2) 
		{
			if (offer_range == null) {
				$("input[name='offer_range']").parent().parent().next().css( "display", "block" );
				return false;
			}
			if (offer_range==1) 
	    	{
	    		$("#Offer-tab").click();
	    		$(".buyer_agent_box").removeClass('hide_content');
				$(".step_banner").addClass('hide_content');
	    	}
	    	else
	    	{
	    		$("#trigger-assest-model").click();
	    	}
			

		}
		else{
			if (offer_range == null) {
				$("input[name='offer_range']").parent().parent().next().css( "display", "block" );
				return false;
			}
			var value = $("input[name='offer_range']:checked").val();
	    	if (value==1) 
	    	{
	    		$("#Offer-tab").click();
				$(".show_create_offer").removeClass('hide_content');	
	    		$("#Intro-tab").addClass('active-buyer-tab');
	    	}
	    	else
	    	{
	    		$("#trigger-assest-model").click();
	    	}
		}
	});


	$(".show_create_offer").addClass('hide_content');	
	$(".thankYou").addClass('hide_content');	
	//BACK ARROW
	$(document).on('click','.back_arrow', function () {
		
		if($(".thankYou").hasClass("hide_content")==false || $("#Confirm-tab").hasClass('active')==true)
		{
			var checkIsAgent = $("input[name='user_type']:checked").val();
			if (checkIsAgent==2) 
			{
				$(".submit_intro_step2").click();
			}else{
				$("#Offer-tab").click();
			}
			$(".thankYou").addClass('hide_content');
		}
		else if($(".resubmitOffer").hasClass("hide_content")==false){
			$(".submit_intro_step2").click();
			$(".resubmitOffer").addClass('hide_content');
		}
		else if($(".buyer_agent_box").hasClass("hide_content")==false){
			$("#Intro-tab").click();
			$(".submit_step1").click();
			$("#Offer-tab").removeClass('active-buyer-tab');
			$(".buyer_agent_box").addClass('hide_content');
			$(".step_banner").removeClass('hide_content');
		}
		else if($('.show_create_offer').hasClass("hide_content")==false || $("#Offer-tab").hasClass('active')==true)
		{
			$("#Intro-tab").click();
			$("#Offer-tab").removeClass('active-buyer-tab');
			$('.show_create_offer').addClass('hide_content');		
			$('.buyer_step3').removeClass('hide_content');
			$('.buyer_step1').addClass('hide_content');
			$('.buyer_step2').addClass('hide_content');
		}
		else if($('.buyer_step3').hasClass("hide_content")==false)
		{
			$('.buyer_step2').removeClass('hide_content');	
			$('.buyer_step3').addClass('hide_content');
		}
		else if($('.buyer_step2').hasClass("hide_content")==false)
		{
			$('.buyer_step1').removeClass('hide_content');	
			$('.buyer_step2').addClass('hide_content');
		}
		else if($('.buyer_step1').hasClass("hide_content")==false)
		{
			location.href=base_url;
		}
	});
	$(".close_circle").click(function () {
		location.href=base_url;
	});


	//DIRECT CLICK ON INTRO STEP
	$(document).on('click','#Intro-tab', function () {
		$('.show_create_offer').addClass('hide_content');
		$('.thankYou').addClass('hide_content');
		$('.resubmitOffer').addClass('hide_content');
		$('#Offer-tab').removeClass('active-buyer-tab');
	});
	$(document).on('click','#Offer-tab', function () {
		$('.thankYou').addClass('hide_content');
		$('#Confirm-tab').removeClass('active-buyer-tab');
		$('.resubmitOffer').addClass('hide_content');
	});
	
	$(".submit_offer").on('click',function () {
		$("#Confirm-tab").removeClass('disabled-links');
		if($("input[name='agency_disclose']").prop('checked') == false){
			$(".invalid-feedback").css('display','block');
			return false;
		}else{
			$(".invalid-feedback").css('display','none');
		}
		var iz_checked = false;
		$("input[name='intend_to_pay']").each(function(){
		   if($(this).is(':checked')){
		   	iz_checked = true;
		   }
		});
		if (!iz_checked){
			$(".invalid-feedback-offer-intend-pay").css('display','block');
			return false;
		}else{
			$(".invalid-feedback-offer-intend-pay").css('display','none');
		}
		/*if ($("input[name='intend_to_pay']").prop('checked') == false) {
			$(".invalid-feedback-offer-intend-pay").css('display','block');
			return false;
		}else{
			$(".invalid-feedback-offer-intend-pay").css('display','none');
		}*/
	});

	/*$(".submit_offer").on('click',function () {
		if($("input[name='agency_disclose']").prop('checked') == true){
			$("#Confirm-tab").click();
			$("#Offer-tab").addClass('active-buyer-tab');
			$(".thankYou").removeClass('hide_content');
		}
	});*/

	//BUYER AGENT VALIDATION
	$(".submit_agent_offer").on('click',function () {
		var name = $("input[name='buyer_name']").val();
		var email = $("input[name='buyer_email']").val();
		var phone = $("input[name='buyer_phone']").val();
		var sale_price = $("input[name='sale_price']").val();
		var seller_concessions = $("input[name='seller_concessions']").val();
		var emd = $("input[name='emd']").val();
		
		if (name.length <=0) {
			$("input[name='buyer_name']").next().css( "display", "block" );
		}
		if (email.length <=0) {
			$("input[name='buyer_email']").next().css( "display", "block" );
		}
		if (phone.length <=0) {
			$("input[name='buyer_phone']").next().css( "display", "block" );
		}
		if (sale_price.length <=0) {
			$("input[name='sale_price']").next().css( "display", "block" );
		}
		if (seller_concessions.length <=0) {
			$("input[name='seller_concessions']").next().css( "display", "block" );
		}
		if (emd.length <=0) {
			$("input[name='emd']").next().css( "display", "block" );
		}
		
		if ($('input[name="settlement_date"]:checked').val()==undefined) {
	      $(".invalid_settlement_date").css( "display", "block" );
	      return false;
		}
		
	    var agency_val = $("input[name='agency_disclose1']:checked").val();
	    if (agency_val==undefined || agency_val==null) {
	      $(".invalid_agency_disclose1").css( "display", "block" );
	      return false;	
	    }

		if (name.length <=0 || email.length <=0 || phone.length <=0 || sale_price.length <=0 || seller_concessions.length <=0 || emd.length <=0 ) {
			return false;	
		}

		$("input[name='buyer_name']").next().css( "display", "none" );
		$("input[name='buyer_email']").next().css( "display", "none" );
		$("input[name='buyer_phone']").next().css( "display", "none" );
		$("input[name='sale_price']").next().css( "display", "none" );
		$("input[name='seller_concessions']").next().css( "display", "none" );
		$("input[name='emd']").next().css( "display", "none" );
		$("input[name='due_diligence']").next().css( "display", "none" );
		$(".invalid_settlement_date").css( "display", "none" );
		$(".invalid_agency_disclose1").css( "display", "none" );

	});
	//BUYER AGENT VALIDATION--END
	//BUYER AGENT
	$("input[name='agent_intend_to_pay']").change(function() {
		var intend_to_pay = $("input[name='agent_intend_to_pay']:checked").val();
		if (intend_to_pay==1) {
			$("input[name='finance']").prop('checked',false);
		    $("input[name='finance']").prop("disabled",true);
		    $("input[name='finance']").last().prop('checked',true);
		    $("input[name='finance']").last().prop('disabled',false);
			$(".buyer_loan_term").addClass('hide_content');
		}
		if(intend_to_pay==2){
			//if Loan then
			//$(".loan_term_box").removeClass('hide_content');
			$("input[name='finance']").prop("disabled",false);
		    $("input[name='finance']").last().prop('checked',false);
			$(".buyer_loan_term").removeClass('hide_content');
		}
	});
	//BUYER AGENT--END

	//STORE OFFER 
  	$("form[name='buyer-post']").validate({
  		submitHandler: function(form, event) {
	       	event.preventDefault();
	       	var formData = new FormData($(form)[0]);
	       	showLoader(true);
		    $.ajax({
		          url: base_url+'/addBuyerPost',
		          type: 'POST',
		          processData: false,
		          contentType: false,
		          cache: false,              
		          data: formData,
		          success: function(result)
		          {	
		          	  if(result.status){
		          	  	if (result.is_lead) {
		          	  		location.href=base_url;
		          	  	}
		          	  	if (result.resubmit_offer==true) {
		          	  		var dataIn = result.input_data;
		          	  		var dataAcc = result.acceptance_data;
		          	  		var addDgr = 'class="text-danger font-weight-bold"';
		          	  		var addScs = 'class="text-success font-weight-bold"';
							
							if (dataAcc.sale_priceIs) {sP_Class = addScs;}else{sP_Class = addDgr;}
							if (dataAcc.seller_concessionsIs) {sC_Class = addScs;}else{sC_Class = addDgr;}
							if (dataAcc.settlementIs) {stl_Class = addScs;}else{stl_Class = addDgr;}
							if (dataAcc.emdIs) {emd_Class = addScs;}else{emd_Class = addDgr;}
							if (dataAcc.due_diligenceIs) {dd_Class = addScs;}else{dd_Class = addDgr;}
							if (dataAcc.financeIs) {fin_Class = addScs;}else{fin_Class = addDgr;}
							if (dataAcc.appraisalIs) {app_Class = addScs;}else{app_Class = addDgr;}
							if (dataAcc.inspectionIs) {ins_Class = addScs;}else{ins_Class = addDgr;}
							if (dataAcc.home_saleIs) {hms_Class = addScs;}else{hms_Class = addDgr;}
							var due_del = '';
							if (dataIn.due_diligence!='None') {
								due_del = '<tr><td>Due Diligence</td><td '+dd_Class+'>'+dataIn.due_diligence+'</td><td>'+dataAcc.due_diligence+'</td></tr>';
							}

          	  			    var first_table ='<tr><td>Sale Price</td><td '+sP_Class+'>'+dataIn.sale_price+'</td><td>'+dataAcc.sale_price+'</td></tr><tr><td>Seller Concessions</td><td '+sC_Class+'>'+dataIn.seller_concessions+'</td><td>'+dataAcc.seller_concessions+'</td></tr><tr><td>Settlement Date</td><td '+stl_Class+'>'+dataIn.settlement_dates+'</td><td>'+dataAcc.settlement_date+'</td></tr><tr><td>EMD</td><td  '+emd_Class+'>'+dataIn.emd+'</td><td>'+dataAcc.emd+'</td></tr> '+due_del+' '
		          	  		var second_table ='<tr><td>Financing Contingency</td><td '+fin_Class+'>'+dataIn.finances+'</td><td>'+dataAcc.finance+'</td></tr><tr><td>Appraisal Contingency</td><td '+app_Class+'>'+dataIn.appraisals+'</td><td>'+dataAcc.appraisal+'</td></tr><tr><td>Inspection Contingency</td><td '+ins_Class+'>'+dataIn.inspections+'</td><td>'+dataAcc.inspection+'</td></tr><tr><td>Home Sale Contingency</td><td '+hms_Class+'>'+dataIn.home_sales+'</td><td>'+dataAcc.home_sale+'</td></tr>'

		          	  		$(".first_table").html(first_table);
		          	  		$(".second_table").html(second_table);
		          	  		$(".resubmitOffer").removeClass('hide_content');
		          	  		$("#Confirm-tab").click();
							$("#Offer-tab").addClass('active-buyer-tab');
							$("#Intro-tab").addClass('active-buyer-tab');
							$(".buyer_agent_box").addClass('hide_content');
							$(".step_banner").removeClass('hide_content');
							
		          	  	}
		          	  	if (result.resubmit_offer==false) {
		          	  		$("#Confirm-tab").click();
							$("#Offer-tab").addClass('active-buyer-tab');
							$("#Intro-tab").addClass('active-buyer-tab');
							$(".thankYou").removeClass('hide_content');
							$(".buyer_agent_box").addClass('hide_content');
							$(".step_banner").removeClass('hide_content');
							
		          	  	}
		                
		              }else{
		                
		              }
		              showLoader(false);
		          }
		    });
    	}
  	});

  	//LOAN CALCULATION
	$("input[name='intend_to_pay']").change(function() {
		cal();
	});

	$("input[name='loan_term']").change(function() {
		cal();
	});

	$("select[name='loan_term']").on('change',function() {
		cal();
	});

	function cal_mortgage() {
		var val = $("select[name='loan_term']").val();
		if ($("select[name='loan_term']").val()=='VA' || $("select[name='loan_term']").val()=='FHA') {
			loan_term_perce = 30; 		
		}else{
			loan_term_perce = val;
		}
		var val = loan_term_perce;
		var interest_rate = get_inter_rate_slider_range();
		var monthlyInterest = interest_rate/12;
		var get_offer_prices = get_buyer_slider_range();
		var down_payments = $("input[name='down_payments']").val();
			down_payments = down_payments.replace('$','');
		var total_loan_amount = parseFloat(get_offer_prices)-parseFloat(down_payments);
		

		/*var n = val*12;
		var r = parseFloat(monthlyInterest)/12;
		var p= total_loan_amount;
		
		var a = r+1;
		b = Math.pow(a,n);
		r = r*b;
		var c = b-1;
		var d =r/c;
		var e =p*d;
		var mortagage = parseFloat(e.toFixed(2));
		return mortagage;
		*/
		
		var principal = total_loan_amount; // 2 lakh 50 thousands as principal
		var rate = parseFloat(interest_rate); // 9.25 as Rate of interest per annum
		var time = parseInt(val); // 2 years as Repayment period
		var emi = emi_calculator(principal, rate, time);
		return parseFloat(emi);
	}
	function cal_down_payment(offer_price,percent) {
		var down_pay = offer_price/100*percent;
		return parseFloat(down_pay.toFixed(2));
	}

	function closing_cost(percent) {
		var get_offer_prices =  get_buyer_slider_range();
		var closing_co = get_offer_prices/100*percent;
		return parseFloat(closing_co.toFixed(2));
	}

	function cal() {
		
		var buyer_offer = get_buyer_slider_range();
		var down_payment = get_down_pay_slider_range();
		var interest_rate = get_inter_rate_slider_range();

		//CALCULATE DOWN PAYMENT
		var cal_down_payments = cal_down_payment(buyer_offer,down_payment);
		$("input[name='down_payments']").val('$'+cal_down_payments);

		//CALCULATE mortgage_insurance
		if($("select[name='loan_term']").val()!='VA'){
			var mortgage_insurance_offer_price = buyer_offer-cal_down_payments;
			if (down_payment <=3) {
				mortgage_insurance = 0.00058 * mortgage_insurance_offer_price; 
			}else if(down_payment >=4 && down_payment <=9){
				mortgage_insurance = 0.00044 * mortgage_insurance_offer_price;
			}else if(down_payment >=10 && down_payment <=14){
				mortgage_insurance = 0.00032 * mortgage_insurance_offer_price;
			}else if(down_payment >=15 && down_payment <=19){
				mortgage_insurance = 0.00017 * mortgage_insurance_offer_price;
			}else{
				mortgage_insurance = 0;
			}
		}
		else{
			mortgage_insurance = 0;
		}
		mortgage_insurance = parseFloat(mortgage_insurance.toFixed(2));
		$("input[name='mortgage_insurance']").val('$'+mortgage_insurance);
		//CALCULATE EST CASH TO CLOSE
		var intend_to_pay = $("input[name='intend_to_pay']:checked").val();
		if (intend_to_pay==1) {
			var closing_costs = closing_cost(1);
			var est_cash_cose = buyer_offer+closing_costs;
			$("input[name='est_cash_to_close']").val('$'+parseFloat(est_cash_cose.toFixed(2)));
			$("input[name='closing_cost']").val('$'+closing_costs);
			$(".interest_rate_box").addClass('hide_content');
			$(".down_payment_box").addClass('hide_content');
			$(".loan_term_box").addClass('hide_content');
			$(".mortgage_box").addClass('hide_content');
		}
		if (intend_to_pay==2) {
			var closing_costs = closing_cost(3);
			var est_cash_cose = cal_down_payments+closing_costs;
			$("input[name='est_cash_to_close']").val('$'+parseFloat(est_cash_cose.toFixed(2)));
			$("input[name='closing_cost']").val('$'+closing_costs);
			$(".interest_rate_box").removeClass('hide_content');
			$(".down_payment_box").removeClass('hide_content');
			$(".loan_term_box").removeClass('hide_content');
			$(".mortgage_box").removeClass('hide_content');
		}
		
		//calculate mortgage
		var mortagage = cal_mortgage();
		if (isNaN(mortagage)) {
			mortagage=0;
		}
		mortagage = parseFloat(mortagage.toFixed(2));

		$("input[name='mortgage']").val('$'+mortagage);
		if (intend_to_pay==1) {
			$("input[name='mortgage']").val('$0.00');
			$("input[name='mortgage_insurance']").val('$0.00');
		}
		var insurance = $("input[name='insurance']").val();
		insurance = insurance.replace('$','');
		insurance = parseFloat(insurance);

		var pro_taxes = $("input[name='property_taxes']").val();
		pro_taxes = pro_taxes.replace('$','');
		pro_taxes = parseFloat(pro_taxes);
		
		var other_fee = $("input[name='other_fees']").val();
		other_fee = other_fee.replace('$','');
		other_fee = parseFloat(other_fee);
		
		var hoa = $("input[name='hoa']").val();
		hoa = hoa.replace('$','');
		hoa = parseFloat(hoa);
		
		if (intend_to_pay==1) {
			var estimated_payments = insurance+pro_taxes+other_fee+hoa;
			estimated_payments = parseFloat(estimated_payments.toFixed(2));
			$(".estimated_payment_mo").html('$'+estimated_payments+'/Mo');
			$("input[name='estimated_payment']").val(estimated_payments);

			chart.options.data[0].dataPoints[0].y = insurance;
			chart.options.data[0].dataPoints[1].y = pro_taxes;
			chart.options.data[0].dataPoints[2].y = other_fee;
			chart.options.data[0].dataPoints[3].y = 0;
			chart.options.data[0].dataPoints[4].y = 0;
			chart.options.data[0].dataPoints[5].y = hoa;
			chart.render();
		}else{
			var estimated_payments = insurance+pro_taxes+other_fee+hoa+mortgage_insurance+mortagage;
			estimated_payments = parseFloat(estimated_payments.toFixed(2));
			$(".estimated_payment_mo").html('$'+estimated_payments+'/Mo');
			$("input[name='estimated_payment']").val(estimated_payments);
			
			chart.options.data[0].dataPoints[0].y = insurance;
			chart.options.data[0].dataPoints[1].y = pro_taxes;
			chart.options.data[0].dataPoints[2].y = other_fee;
			chart.options.data[0].dataPoints[3].y = mortagage;
			chart.options.data[0].dataPoints[4].y = mortgage_insurance;
			chart.options.data[0].dataPoints[5].y = hoa;
			chart.render();
		}


		return this;
	}

});

function showLoader($show){
	if($show){
      $('#preloader_new').show();
      $('#preloader_new').css('opacity',1);
    }else{
      $('#preloader_new').hide();
      $('#preloader_new').css('opacity',0);
    }
}

$(function() {
	// BUYER AGEENT SIDE CALCULATION OF EMD AND DUE DELEGENCE
	$("input[name='sale_price']").change(function(){
		var price = parseInt($(this).val());
		var emd = price/100*0.5;
      	var dueDel = price/100*0.25;
		$("input[name='emd']").val(emd);
		if ($("input[name='due_diligence']").length) {
      		$("input[name='due_diligence']").val(dueDel);
		}

	});
});


function emi_calculator(p, r, t) 
{ 
    var emi=0;
    // one month interest 
    r = r / (12 * 100); 
    // one month period 
    t = t * 12;  
    emi = (p * r * Math.pow(1 + r, t)) / (Math.pow(1 + r, t) - 1); 
    return (emi.toFixed(2)); 
}