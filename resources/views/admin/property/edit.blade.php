@extends('layout.app_with_login')
@section('title','Property')
@section('script', url('public/js/dashboard/properties.js'))
@section('content')	
<!-- Page Content  -->
<div class="section">
    <div class="container-fluid">
        <h2 class="title"><a @if(Auth::check() && Auth::User()->user_type==1) data-slug="seller/properties" href="{{url('/seller/properties')}}" @else data-slug="admin/properties" href="{{url('/admin/properties')}}" @endif><span>{{'Properties Master'}}</span></a>  >  @if(Request::is('admin/properties/relist/*') || Request::is('seller/properties/relist/*')){{'Relist'}} @else {{ 'Edit' }} @endif
        </h2>
        <div class="white_box">
            <div class="theme_tab">
                    
                <form name="add-form">
                    <input type="hidden" name="pkCat" value="{{$aData->property_id}}">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                          
                            <div class="form-group">
                                <label>{{'Transaction Coordinators Name'}}</label>
                                <input type="text" name="tranc_coordinator_name" class="form-control icon_control" value="{{$aData->tranc_coordinator_name}}">
                            </div>

                            <div class="form-group">
                                <label>{{'Realtors Name'}}</label>
                                <input type="text" name="realtors_name" class="form-control icon_control" value="{{$aData->realtors_name}}">
                            </div>

                            <div class="form-group m-0">
                                <label>{{'Property Images'}}</label>
                            </div>
                            <ul class="clearfix media_list mb-2">
                              @foreach($aData->images as $media)
                                  @php
                                  $proImg = $media->image;
                                  @endphp
                                  <li>
                                      <img src="{{ url('public/uploads/'.Config::get('constant.images_dirs.PROPERTY')) }}{{'/'.$media->image}}">
                                      <div  class='post-thumb'>
                                          <div class='inner-post-thumb'>
                                              <a href='javascript:void(0);' class='remove-pic' 
                                              onclick="removegalleryimage('{{$media->p_image_id}}')">
                                                  <i class='fa fa-times' aria-hidden='true'></i>
                                              </a>
                                          </div>
                                      </div>
                                  </li>
                              @endforeach
                              <li class="myupload">
                                  <span><i class="fa fa-plus" aria-hidden="true"></i><input type="file" input-name="media[]" click-type="type2" class="picuploadForAll picupload" multiple></span>
                              </li>
                            </ul>

                            <div class="form-group m-0">
                            <label>{{'Address'}}</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input chk_radio" type="radio" name="address_type" id="add_manually" value="2" @if($aData->address_type==2) checked @endif>
                              <label class="form-check-label">Enter Manually</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input chk_radio" type="radio" name="address_type" id="add_by_google" value="1" @if($aData->address_type==1) checked @endif>
                              <label class="form-check-label">Use Google</label>
                            </div>

                            <div class="from_google_div">
                                @if($aData->address_type=='1')
                                <div class="form-group">
                                    <input type="text" id="address-input" name="address_address" class="form-control map-input" value='{{$aData->address}}'>
                                </div>
                                @endif
                            </div>
                            <div class="from_manual">
                                @if($aData->address_type=='2')
                                <div class="form-group">
                                    <input type="text" id="address-input" name="address_address" class="form-control map-input" placeholder="Search Postal Code" value='{{$aData->address}}'>
                                    <div id="pt_address_validate" class="validation_msg"></div>
                                </div>
                                <div class="form-group">
                                    <input type="text" id="manual_address" name="manual_address" class="form-control" placeholder="Enter Address" value='{{trim($aData->manual_address)}}'>
                                </div>
                                @endif
                            </div>

                            <input type="hidden" name="latitude" id="address-latitude" value="{{$aData->latitude}}" />
                            <input type="hidden" name="longitude" id="address-longitude" value="{{$aData->longitude}}" />
                            <input type="hidden" name="country" id="address-country" value="{{$aData->country}}" />
                            <input type="hidden" name="state" id="address-state" value="{{$aData->state}}" />
                            <input type="hidden" name="city" id="address-city" value="{{$aData->city}}" />
                            <input type="hidden" name="postal_code" id="address-zipcode" value="{{$aData->zipcode}}" />

                            <div id="address-map-container" style="width:100%;height:400px; ">
                                <div style="width: 100%; height: 100%" id="address-map"></div>
                            </div>
                            {{-- <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="address_type" id="add_manually" value="2" @if($aData->address_type==2) checked @endif>
                              <label class="form-check-label">Enter Manually</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="address_type" id="add_by_google" value="1" @if($aData->address_type==1) checked @endif>
                              <label class="form-check-label">Use Google</label>
                            </div>
                            <div class="form-group @if($aData->address_type==1) hide_content @endif manual_address">
                                <input type="text" name="manual_address" id="manual_address" class="form-control icon_control" value="{{$aData->manual_address}}">
                            </div>
                            <div class="form-group @if($aData->address_type==2) hide_content @endif google_address">
                                <input type="text" name="autocomplete" id="autocomplete" class="form-control" placeholder="Select Location" value="{{$aData->address}}">
                            </div>
                            <div class="form-group @if($aData->address_type==2) hide_content @endif show_map">
                              <div id="map" style="width: 100%;height: 200px;"></div>
                            </div> --}}
                            <div class="form-group">
                                <label>{{'Listing Price: $'}}</label>
                                <input type="number" name="listing_price" id="listing_price" class="form-control icon_control" min="0" value="{{$aData->listing_price}}">
                            </div>

                            <div class="form-group">
                                <label>{{'Min Sales Price: $'}}</label>
                                <input type="number" name="min_sales_price" class="form-control icon_control" min="0"  value="{{$aData->min_sales_price}}">
                            </div>

                            <div class="form-group">
                                <label>{{'Seller Concessions: $'}}</label>
                                <input type="number" name="seller_concessions" class="form-control icon_control" min="0"  value="{{$aData->seller_concessions}}">
                            </div>

                            <div class="form-group m-0">
                                <label>{{'Settlement Date:'}}</label>
                            </div>
                            @php
                              $checked_date = $aData->settlement_date ? json_decode($aData->settlement_date):[];
                              $checked_finance = $aData->finance ? json_decode($aData->finance):[];
                              $checked_appraisal = $aData->appraisal ? json_decode($aData->appraisal):[];
                              $checked_inspection = $aData->inspection ? json_decode($aData->inspection):[];
                              $checked_home_sale = $aData->home_sale ? json_decode($aData->home_sale):[];

                              //CHECK DUE DELEGENCE
                              $isNcstate = strtolower($aData->state)=='north carolina' ? true:false;
                            @endphp
                            @foreach($p_duration as $duval)
                            <div class="form-check form-check-inline mb-2 mr-4">
                              <input class="form-check-input" type="checkbox" name="settlement_date[]" value="{{$duval->p_duration_id}}" style="opacity: 1" 
                              
                              @foreach($checked_date as $val)
                                @if($duval->p_duration_id==$val) 
                                  checked
                                @endif 
                              @endforeach
                              >

                              <label class="form-check-label">{{$duval->duration}}</label>
                            </div>
                            @endforeach

                            <div class="form-group">
                                <label>{{'EMD: $'}}</label>
                                <input type="number" name="emd" id="emd" class="form-control icon_control" min="0" value="{{$aData->emd}}">
                            </div>
                            
                            <div class="form-group due_diligence_box @if(!$isNcstate) hide_content @endif">
                                <label>{{'Due Diligence: $'}}</label>
                                <input type="number" name="due_diligence" id="duedelgenc" class="form-control icon_control" min="0" value="{{$aData->due_diligence}}">
                            </div>

                            <div class="duration_box mt-3 ">
                                <div class="form-group m-0">
                                    <label>{{'Financing Contingency:'}}</label>
                                    <div class="float-md-right">
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input fin_con_yes" type="radio" name="fin_cont_en_dis" value="yes" @if(!empty($aData->finance)) checked @endif>
                                          <label class="form-check-label">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input fin_con_no" type="radio" name="fin_cont_en_dis" value="no"  @if(empty($aData->finance)) checked @endif>
                                          <label class="form-check-label">No</label>
                                        </div>
                                    </div>
                                </div>
                                @foreach($p_duration as $duval)
                                <div class="form-check form-check-inline mr-4">
                                  <input class="form-check-input active_disabled" type="checkbox" name="finance[]" value="{{$duval->p_duration_id}}" style="opacity: 1"

                                    @foreach($checked_finance as $val)
                                      @if($duval->p_duration_id==$val) 
                                        checked
                                      @endif
                                    @endforeach

                                  >
                                  <label class="form-check-label">{{$duval->duration}}</label>
                                </div>
                                @endforeach
                            </div>

                            <div class="duration_box mt-3">
                                <div class="form-group m-0">
                                    <label>{{'Appraisal Contingency:'}}</label>
                                    <div class="float-md-right">
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input fin_con_yes" type="radio" name="app_con_en_dis" value="yes" @if(!empty($aData->appraisal)) checked @endif>
                                          <label class="form-check-label">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input fin_con_no" type="radio" name="app_con_en_dis" value="no" @if(empty($aData->appraisal)) checked @endif>
                                          <label class="form-check-label">No</label>
                                        </div>
                                    </div>
                                </div>
                                @foreach($p_duration as $duval)
                                <div class="form-check form-check-inline mr-4">
                                  <input class="form-check-input active_disabled" type="checkbox" name="appraisal[]" value="{{$duval->p_duration_id}}" style="opacity: 1"
                                    @foreach($checked_appraisal as $val)
                                      @if($duval->p_duration_id==$val) 
                                        checked
                                      @endif
                                    @endforeach
                                  >
                                  <label class="form-check-label">{{$duval->duration}}</label>
                                </div>
                                @endforeach
                            </div>

                            <div class="duration_box mt-3">
                                <div class="form-group m-0">
                                    <label>{{'Inspection Contingency:'}}</label>
                                    <div class="float-md-right">
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input fin_con_yes" type="radio" name="insp_con_en_dis" value="yes" @if(!empty($aData->inspection)) checked @endif>
                                          <label class="form-check-label">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input fin_con_no" type="radio" name="insp_con_en_dis" value="no"  @if(empty($aData->inspection)) checked @endif>
                                          <label class="form-check-label">No</label>
                                        </div>
                                    </div>
                                </div>
                                @foreach($p_duration as $duval)
                                <div class="form-check form-check-inline mr-4">
                                  <input class="form-check-input active_disabled" type="checkbox" name="inspection[]" value="{{$duval->p_duration_id}}" style="opacity: 1"
                                    @foreach($checked_inspection as $val)
                                      @if($duval->p_duration_id==$val) 
                                        checked
                                      @endif
                                    @endforeach
                                  >
                                  <label class="form-check-label">{{$duval->duration}}</label>
                                </div>
                                @endforeach
                            </div>

                            <div class="duration_box mt-3">
                                <div class="form-group m-0">
                                    <label>{{'Home Sale Contingency:'}}</label>
                                    <div class="float-md-right">
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input fin_con_yes" type="radio" name="hom_con_en_dis" value="yes" @if(!empty($aData->home_sale)) checked @endif>
                                          <label class="form-check-label">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input fin_con_no" type="radio" name="hom_con_en_dis" value="no"  @if(empty($aData->home_sale)) checked @endif>
                                          <label class="form-check-label">No</label>
                                        </div>
                                    </div>
                                </div>
                                @foreach($p_duration as $duval)
                                <div class="form-check form-check-inline mr-4">
                                  <input class="form-check-input active_disabled" type="checkbox" name="home_sale[]" value="{{$duval->p_duration_id}}" style="opacity: 1"
                                    @foreach($checked_home_sale as $val)
                                      @if($duval->p_duration_id==$val) 
                                        checked
                                      @endif
                                    @endforeach
                                  >
                                  <label class="form-check-label">{{$duval->duration}}</label>
                                </div>
                                @endforeach
                            </div>

                            <div class="form-group mt-3">
                                <label>{{'Insurance: $'}}</label>
                                <input type="number" name="insurance" class="form-control icon_control" min="0" value="{{$aData->insurance}}">
                            </div>

                            <div class="form-group">
                                <label>{{'Property Taxes: $'}}</label>
                                <input type="number" name="property_tax" class="form-control icon_control" min="0" value="{{$aData->property_tax}}">
                            </div>

                            <div class="form-group">
                                <label>{{'Other fees: $'}}</label>
                                <input type="number" name="other_fee" class="form-control icon_control" min="0"  value="{{$aData->other_fee}}">
                            </div>

                            <div class="form-group">
                                <label>{{'HOA: $'}}</label>
                                <input type="text" name="hoa" class="form-control icon_control" value="{{ $aData->hoa ?? ''}}">
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
@php
//SET LAT AND LONG TO MAP
$latitu = empty($aData->latitude) ? 37.9863967 : $aData->latitude;
$longtu = empty($aData->longitude) ? -83.9116557 : $aData->longitude;
@endphp

@endsection
@push('custom-styles')
@endpush
@push('custom-scripts')
<script type="text/javascript" src="{{ url('public/js/dashboard/properties.js') }}"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASWhGWIIFzUQbxXjEw-kN_8y6BgLXgVWM&libraries=places&callback=initialize" async defer></script>

<script src="{{url('public/js/dashboard/mapInput.js')}}"></script>

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
@endpush