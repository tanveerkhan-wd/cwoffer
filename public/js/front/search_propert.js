$(function() {
	$.ajaxSetup({
	   headers: {
	     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	   }
	});

	$(document).on('click','.setLoc',function(){
		$(".suggestion").css('display','none');
		var address = $(this).text();
		$("#search_propert").val(address);
		var property_id = $(this).attr('data-id');
		$("input[name='property_id']").val(property_id);
		/*var setHref = base_url+'/buyer-intro?pro_id='+property_id;			
		$(".setLink").attr("href",setHref);*/
	});
	
	$(document).on('keyup','#search_propert',function(){
		var data = $(this).val();
		$.ajax({
		    url: base_url+'/search-property',
		    type: 'POST',
		    dataType:'json',
		    cache: false,              
		    data: {'data':data},
		    success: function(result)
		    {
		    	console.log(result);
		     	$(".suggestion").css('display','none');
		     	$(".suggestion").html('');
		        if(result.status){
		        	var suggest = '';
		     		$.each(result.data,function(key , val){
		     			var loc = '';
		     			if (val.address_type==2) {
		     				loc= val.manual_address;
		     			}else{
		     				loc = val.address;
		     			}
		     			suggest+= '<li class="list-group-item list-group-item-action list-group-item-light setLoc" data-id="'+val.property_id+'">'+loc+'</li>';
		     		});
			     	$(".suggestion").css('display','block');
			     	 $(".suggestion").fadeIn(3000);
		     		if (suggest.length >=1) {
			     		$(".suggestion").html(suggest);
		     		}else{
		     			$(".suggestion").html('<li class="list-group-item no-data-found" style="color:#dd2c45;">No Property Found!</li>');
		     		}
		        }
		    }
		});
	});


});
/*=========  SET REDIRECT URL FOR GET PROPERTY FOR BUYER   ========*/
$("button.serach-propert").click(function () {
	var property_id = $("input[name='property_id']").val();
	$.ajax({
	    url: base_url+'/buyer-intro',
	    type: 'POST',
	    dataType:'json',
	    cache: false,              
	    data: {'property_id':property_id},
	    success: function(result)
	    {	
	    	console.log(result);
	    	if (result.status) {
	    		location.href = base_url+"/buyer-intro/"+result.data.addresee+'-'+result.data.property_id;
	    	}
	    }
	});
});
/*====== END =======*/