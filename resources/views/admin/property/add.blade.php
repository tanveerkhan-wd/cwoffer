@extends('layout.app_with_login')
@section('title','Add Property')
@section('script', url('public/js/dashboard/properties.js'))
@section('content')	
<!-- Page Content  -->
<div class="section">
    <div class="container-fluid">
        <h2 class="title"><a @if(Auth::check() && Auth::User()->user_type==1) data-slug="seller/properties" href="{{url('/seller/properties')}}" @else data-slug="admin/properties" href="{{url('/admin/properties')}}" @endif><span>{{'Properties Master'}}</span></a>  >  {{'Add New'}}
        </h2>
        <div class="white_box">
            <div class="theme_tab">
                    
                <form name="add-form">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>{{'Transaction Coordinators Name'}}</label>
                                <input type="text" name="tranc_coordinator_name" class="form-control icon_control">
                            </div>

                            <div class="form-group">
                                <label>{{'Realtors Name'}}</label>
                                <input type="text" name="realtors_name" class="form-control icon_control">
                            </div>

                            <div class="form-group m-0">
                                <label>{{'Property Images'}}</label>
                            </div>
                            <ul class="clearfix media_list mb-2">
                                <li class="myupload">
                                    <span><i class="fa fa-plus" aria-hidden="true"></i><input type="file" input-name="media[]" click-type="type2" class="picuploadForAll picupload" multiple></span>
                                </li>
                            </ul>

                            <div class="form-group m-0">
                            <label>{{'Address'}}</label>
                            </div>
                            
                            <div class="form-check form-check-inline">
                              <input class="form-check-input chk_radio" type="radio" name="address_type" id="add_manually" value="2" checked>
                              <label class="form-check-label">Enter Manually</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input chk_radio" type="radio" name="address_type" id="add_by_google" value="1">
                              <label class="form-check-label">Use Google</label>
                            </div>
                            <div class="from_google_div">
                                
                            </div>
                            <div class="from_manual">
                                <div class="form-group">
                                    <input type="text" id="address-input" name="address_address" class="form-control map-input" placeholder="Search Postal Code">
                                </div>
                                <div class="form-group">
                                    <input type="text" id="manual_address" name="manual_address" class="form-control" placeholder="Enter Address">
                                </div>
                            </div>
                            <input type="hidden" name="latitude" id="address-latitude"  />
                            <input type="hidden" name="longitude" id="address-longitude"  />
                            <input type="hidden" name="country" id="address-country"  />
                            <input type="hidden" name="state" id="address-state"  />
                            <input type="hidden" name="city" id="address-city"  />
                            <input type="hidden" name="postal_code" id="address-zipcode"  />

                            <div id="address-map-container" style="width:100%;height:400px; ">
                                <div style="width: 100%; height: 100%" id="address-map"></div>
                            </div>
                            {{-- <div class="form-group manual_address_zipcode">
                                <input type="text" name="zip_code" id="zip_code" class="form-control icon_control" placeholder="Enter Zip Code">
                            </div>
                            <div class="form-group manual_address">
                                <input type="text" name="manual_address" id="manual_address" class="form-control icon_control" placeholder="Enter Manual Address">
                            </div>
                            <div class="form-group hide_content google_address">
                                <input type="text" name="autocomplete" id="autocomplete" class="form-control" placeholder="Enter Location">
                            </div>
                            <div class="form-group">
                              <div id="map" style="width: 100%;height: 200px;"></div>
                            </div> --}}

                            <div class="form-group">
                                <label>{{'Listing Price: $'}}</label>
                                <input type="number" name="listing_price" id="listing_price" class="form-control icon_control" min="0">
                            </div>

                            <div class="form-group">
                                <label>{{'Min Sales Price: $'}}</label>
                                <input type="number" name="min_sales_price" id="min_sales_price" class="form-control icon_control" min="0">
                                <div class="invalid-feedback" id="min_sales_price_validation">Min Sales Price can not be greater then listing price.</div>
                            </div>

                            <div class="form-group">
                                <label>{{'Seller Concessions: $'}}</label>
                                <input type="number" name="seller_concessions" class="form-control icon_control" min="0">
                            </div>

                            <div class="form-group m-0">
                                <label>{{'Settlement Date:'}}</label>
                            </div>
                            @foreach($p_duration as $duval)
                            <div class="form-check form-check-inline mb-2 mr-4">
                              <input class="form-check-input settlement_date" type="checkbox" name="settlement_date[]" value="{{$duval->p_duration_id}}" style="opacity: 1">
                              <label class="form-check-label">{{$duval->duration}}</label>
                            </div>
                            @endforeach
                            <div class="form-group">
                              <div class="invalid-feedback invalid-settlement-date">Settlement Date field is required.</div>
                            </div>

                            <div class="form-group">
                                <label>{{'EMD: $'}}</label>
                                <input type="number" name="emd" id="emd" class="form-control icon_control" min="0">
                            </div>

                            <div class="form-group due_diligence_box hide_content">
                                <label>{{'Due Diligence: $'}}</label>
                                <input type="number" name="due_diligence" id="duedelgenc" class="form-control icon_control" min="0">
                            </div>

                            <div class="duration_box mt-3 ">
                                <div class="form-group m-0">
                                    <label>{{'Financing Contingency:'}}</label>
                                    <div class="float-md-right">
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input fin_con_yes" type="radio" name="fin_cont_en_dis" value="yes">
                                          <label class="form-check-label">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input fin_con_no" type="radio" name="fin_cont_en_dis" value="no">
                                          <label class="form-check-label">No</label>
                                        </div>
                                    </div>
                                </div>
                                @foreach($p_duration as $duval)
                                <div class="form-check form-check-inline mr-4">
                                  <input class="form-check-input active_disabled" type="checkbox" name="finance[]" value="{{$duval->p_duration_id}}" style="opacity: 1">
                                  <label class="form-check-label">{{$duval->duration}}</label>
                                </div>
                                @endforeach
                            </div>

                            <div class="duration_box mt-3">
                                <div class="form-group m-0">
                                    <label>{{'Appraisal Contingency:'}}</label>
                                    <div class="float-md-right">
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input fin_con_yes" type="radio" name="app_con_en_dis" value="yes">
                                          <label class="form-check-label">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input fin_con_no" type="radio" name="app_con_en_dis" value="no">
                                          <label class="form-check-label">No</label>
                                        </div>
                                    </div>
                                </div>
                                @foreach($p_duration as $duval)
                                <div class="form-check form-check-inline mr-4">
                                  <input class="form-check-input active_disabled" type="checkbox" name="appraisal[]" value="{{$duval->p_duration_id}}" style="opacity: 1">
                                  <label class="form-check-label">{{$duval->duration}}</label>
                                </div>
                                @endforeach
                            </div>

                            <div class="duration_box mt-3">
                                <div class="form-group m-0">
                                    <label>{{'Inspection Contingency:'}}</label>
                                    <div class="float-md-right">
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input fin_con_yes" type="radio" name="insp_con_en_dis" value="yes">
                                          <label class="form-check-label">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input fin_con_no" type="radio" name="insp_con_en_dis" value="no">
                                          <label class="form-check-label">No</label>
                                        </div>
                                    </div>
                                </div>
                                @foreach($p_duration as $duval)
                                <div class="form-check form-check-inline mr-4">
                                  <input class="form-check-input active_disabled" type="checkbox" name="inspection[]" value="{{$duval->p_duration_id}}" style="opacity: 1">
                                  <label class="form-check-label">{{$duval->duration}}</label>
                                </div>
                                @endforeach
                            </div>

                            <div class="duration_box mt-3">
                                <div class="form-group m-0">
                                    <label>{{'Home Sale Contingency:'}}</label>
                                    <div class="float-md-right">
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input fin_con_yes" type="radio" name="hom_con_en_dis" value="yes">
                                          <label class="form-check-label">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input fin_con_no" type="radio" name="hom_con_en_dis" value="no">
                                          <label class="form-check-label">No</label>
                                        </div>
                                    </div>
                                </div>
                                @foreach($p_duration as $duval)
                                <div class="form-check form-check-inline mr-4">
                                  <input class="form-check-input active_disabled" type="checkbox" name="home_sale[]" value="{{$duval->p_duration_id}}" style="opacity: 1">
                                  <label class="form-check-label">{{$duval->duration}}</label>
                                </div>
                                @endforeach
                            </div>

                            <div class="form-group mt-3">
                                <label>{{'Insurance: $'}}</label>
                                <input type="number" name="insurance" class="form-control icon_control" min="0">
                            </div>

                            <div class="form-group">
                                <label>{{'Property Taxes: $'}}</label>
                                <input type="number" name="property_tax" class="form-control icon_control" min="0">
                            </div>

                            <div class="form-group">
                                <label>{{'Other fees: $'}}</label>
                                <input type="number" name="other_fee" class="form-control icon_control" min="0">
                            </div>

                            <div class="form-group">
                                <label>{{'HOA: $'}}</label>
                                <input type="text" name="hoa" class="form-control icon_control">
                            </div>
                                                    
                            <div class="text-center modal_btn ">
                                <a class="theme_btn red_btn ajax_request no_sidebar_active" @if(Auth::check() && Auth::User()->user_type==1) data-slug="seller/properties" href="{{url('/seller/properties')}}" @else data-slug="admin/properties" href="{{ url('admin/properties') }}" @endif>{{'Cancel'}}</a>
                                <button type="submit" class="theme_btn">{{'Submit'}}</button>
                            </div>
                        </div>
                        <div class="col-lg-3"></div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>    
@endsection
@push('custom-scripts')
<script type="text/javascript" src="{{ url('public/js/dashboard/properties.js') }}"></script>
{{-- <script src="https://maps.google.com/maps/api/js?key=AIzaSyDuhYt1SVW_gGUlxpuNUhkhfV8vImNZaIQ&libraries=places&callback=initAutocomplete" type="text/javascript"></script> --}}
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASWhGWIIFzUQbxXjEw-kN_8y6BgLXgVWM&libraries=places&callback=initialize" async defer></script>
<script src="{{url('/public/js/dashboard/mapInput.js')}}"></script>
<script>
$(document).on('click', '.chk_radio', function() {
    var chk_val = $('input[name="address_type"]:checked').val();
    if (chk_val == 1) {
        $('.from_google_div').html('<div class="form-group"><input type="text" id="address-input" name="address_address" class="form-control map-input"><div id="pt_address_validate" class="validation_msg"></div></div>');
        $('.from_manual').html('');
        initialize();
    } else {
        $('.from_manual').html('<div class="form-group"><input type="text" id="address-input" name="address_address" class="form-control map-input" placeholder="Search Postal Code"><div id="pt_address_validate" class="validation_msg"></div></div><div class="form-group"><input type="text" id="manual_address" name="manual_address" class="form-control" placeholder="Enter Address"></div>');
        $('.from_google_div').html('');
        initialize();
    }
});
</script>
{{-- <script>
   $(document).ready(function() {
        $("#lat_area").addClass("d-none");
        $("#long_area").addClass("d-none");
   });
   var lati = 37.9863967;
   var lngo = -83.9116557;
   initMap(lati,lngo);
   google.maps.event.addDomListener(window, 'load', initialize);

   function initialize() {
       var input = document.getElementById('autocomplete');
       var autocomplete = new google.maps.places.Autocomplete(input);
       autocomplete.addListener('place_changed', function() {
           var place = autocomplete.getPlace();
           $('#latitude').val(place.geometry['location'].lat());
           $('#longitude').val(place.geometry['location'].lng());
           var adrres = [];
           var full_address = place.address_components;

           lati = place.geometry['location'].lat();
           lngo = place.geometry['location'].lng();

           $(full_address).each(function( index, data ) {
              $(data.types).each(function( i, d ) {
                  if (d=="postal_code") {
                    adrres['postal_code'] = data.long_name;
                  }
                  if (d=="country") {
                    adrres['country'] = data.long_name; 
                  }
                  if (d=="administrative_area_level_1") {
                    adrres['state'] = data.long_name; 
                  }
                  if (d=="administrative_area_level_2") {
                    adrres['city'] = data.long_name; 
                  }else if(d=="locality"){
                    adrres['city'] = data.long_name; 
                  }
              });
           });
           $("#country").val(adrres['country']);
           $("#state").val(adrres['state']);
           $("#city").val(adrres['city']);
           $("#postal_code").val(adrres['postal_code']);
        //  show lat and long 
           $("#lat_area").removeClass("d-none");
           $("#long_area").removeClass("d-none");
          initMap(lati,lngo);
          $(".show_map").removeClass('hide_content');
       });
   }
   // Initialize and add the map
  function initMap(lati,long) {
    // The location of Uluru
    const uluru = { lat: lati, lng: long };
    // The map, centered at Uluru
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 10,
      center: uluru,
    });
    // The marker, positioned at Uluru
    const marker = new google.maps.Marker({
      position: uluru,
      map: map,
    });
  }
</script> --}}
@endpush