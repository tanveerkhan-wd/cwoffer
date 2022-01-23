@extends('layout.app_with_login')
@section('title','View Offer')
@section('script', url('public/js/dashboard/offer.js'))
@section('content')	
<!-- Page Content  -->
<div class="section">
    <div class="container-fluid">
        <h2 class="title"><a  @if(Auth::check() && Auth::User()->user_type==1) data-slug="seller/offers" href="{{url('/seller/offers')}}" @else data-slug="admin/offers" href="{{url('/admin/offers')}}" @endif><span>{{'Offers'}}</span></a>  >  {{'View'}}
        </h2>
        <input type="hidden" id="pkProId" value="{{$aData->property_id}}">
        <div class="white_box">
            <div class="theme_tab">
              @if(Auth::User()->user_type ==0)
              <div class="row mb-2 pl-2 pt-4">
                <div class="col-12">
                  <h3 class="title">Seller Agent Details</h3>
                </div>
                <div class="row mb-2 p-4">
                  <div class="col-lg-2">
                    <div class="profile_box">
                      <div class="profile_pic" style="height: 99px;width: 99px;">
                            <img id="img_tmp" src="@if(isset($aData->property_det->seller) && !empty($aData->property_det->seller->user_photo)) {{url('public/uploads/'.Config::get('constant.images_dirs.USERS') )}}/{{$aData->property_det->seller->user_photo}} @else {{ url('public/images/user.png') }}@endif">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3">                       
                      <div class="form-group">
                          <label>{{'Name'}}</label>
                          <input type="text" value="{{$aData->property_det->seller->name ?? 'NA'}}" class="without_border form-control icon_control" disabled="">
                      </div>
                  </div>
                  <div class="col-lg-3">                       
                      <div class="form-group">
                          <label>{{'Email'}}</label>
                          <input type="text"  value="{{$aData->property_det->seller->email ?? ''}}" class="form-control without_border icon_control" disabled="">
                      </div>
                  </div>
                  <div class="col-lg-4">                       
                      <div class="form-group">
                          <label>{{'Phone'}}</label>
                          <input type="text"  value="{{$aData->property_det->seller->mobile_number ?? ''}}" class="form-control without_border icon_control" disabled="">
                      </div>
                  </div>
                </div>
              </div>
              @endif
              <div class="container-fluid">
                <div class="row mt-3 mb-4">
                  <div class="col-12">
                    <h3 class="title pl-2">Property Details</h3>
                  </div>
                  <div class="col-lg-12 p-4">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                      <div class="carousel-inner">
                        @foreach($images as $key=>$media)
                            <div class="carousel-item @if($key==0) active @endif">
                              <img class="property_img" src="{{ url('public/uploads/'.Config::get('constant.images_dirs.PROPERTY')) }}{{'/'.$media->image}}" alt="First slide">
                            </div>
                          @endforeach
                      </div>
                      @if(count($images) > 1)
                      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                      @endif
                    </div>  
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-1"></div>
                  <div class="col-lg-10">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'Transaction Coordinators Name'}}</label>
                            <input type="text" name="tranc_coordinator_name" class="form-control icon_control" value="{{$aData->property_det->tranc_coordinator_name}}" disabled>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'Realtors Name'}}</label>
                            <input type="text" name="realtors_name" class="form-control icon_control" value="{{$aData->property_det->realtors_name}}" disabled>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <label>{{'Address'}}</label>
                        <div class="form-group @if($aData->property_det->address_type==1) hide_content @endif manual_address">
                            <input type="text" name="manual_address" id="manual_address" class="form-control icon_control" value="{{$aData->property_det->manual_address}} {{$aData->property_det->address}}" disabled>
                        </div>
                        <div class="form-group @if($aData->property_det->address_type==2) hide_content @endif google_address">
                            <input type="text" name="autocomplete" id="autocomplete" class="form-control" placeholder="Select Location" value="{{$aData->property_det->address}}" disabled>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'Listing Price: $'}}</label>
                            <input type="number" name="listing_price" id="listing_price" class="form-control icon_control" min="0" value="{{$aData->property_det->listing_price}}" disabled>
                        </div>
                      </div>
                      
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'Min Sales Price: $'}}</label>
                            <input type="number" name="min_sales_price" class="form-control icon_control" min="0"  value="{{$aData->property_det->min_sales_price}}" disabled>
                        </div>
                      </div>
                      
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'Seller Concessions: $'}}</label>
                            <input type="number" name="seller_concessions" class="form-control icon_control" min="0"  value="{{$aData->property_det->seller_concessions}}" disabled>
                        </div>
                      </div>
                      @php
                          $intend_pay = $aData->intend_to_pay==1 ? 'Cash' :'Loan';
                          $user_type = $aData->user_type==1?'Buyer':'Buyer Agent';

                          $checked_settel = [];
                          $checked_finan = [];
                          $checked_appr = [];
                          $checked_inspect = [];
                          $checked_home_s = [];
                          $checked_settel_date = $aData->property_det->settlement_date ? json_decode($aData->property_det->settlement_date):[];
                          $checked_finance = $aData->property_det->finance ? json_decode($aData->property_det->finance):[];
                          $checked_appraisal = $aData->property_det->appraisal ? json_decode($aData->property_det->appraisal):[];
                          $checked_inspection = $aData->property_det->inspection ? json_decode($aData->property_det->inspection):[];
                          $checked_home_sale = $aData->property_det->home_sale ? json_decode($aData->property_det->home_sale):[];
                          foreach($p_duration as $duval){
                            //SETTELMENT DATE 
                            foreach($checked_settel_date as $val){
                              if($duval->p_duration_id==$val){
                                $checked_settel[] = $duval->duration;
                              }
                            }
                            //FINANCING DATE 
                            foreach($checked_finance as $val){
                              if($duval->p_duration_id==$val){
                                $checked_finan[] = $duval->duration;
                              }
                            }
                            //APPRAISAL DATE 
                            foreach($checked_appraisal as $val){
                              if($duval->p_duration_id==$val){
                                $checked_appr[] = $duval->duration;
                              }
                            }
                            //APPRAISAL DATE 
                            foreach($checked_inspection as $val){
                              if($duval->p_duration_id==$val){
                                $checked_inspect[] = $duval->duration;
                              }
                            }
                            //HOME SALE 
                            foreach($checked_home_sale as $val){
                              if($duval->p_duration_id==$val){
                                $checked_home_s[] = $duval->duration;
                              }
                            }
                          }
                          
                          //DATA FOR AGENT
                          if ($aData->user_type==2) {
                            $agentSettel = '';
                            $agentFinan = '';
                            $agentAppr = '';
                            $agentInspect = '';
                            $agentHomeSale = '';

                            $agent_settle_date = $aData->settlement_date ? $aData->settlement_date:false;
                            $agent_financ = $aData->finance ? $aData->finance:false;
                            $agent_appraisel = $aData->appraisal ? $aData->appraisal:false;
                            $agent_inspection = $aData->inspection ? $aData->inspection:false;
                            $agent_home_sale = $aData->home_sale ? $aData->home_sale:false;
                            
                            foreach($p_duration as $duval){
                              //SETTELMENT DATE 
                              if($duval->p_duration_id==$agent_settle_date){
                                $agentSettel = $duval->duration;
                              }
                              //FINANCING DATE 
                              if($duval->p_duration_id==$agent_financ){
                                $agentFinan = $duval->duration;
                              }
                              //APPRAISAL DATE 
                              if($duval->p_duration_id==$agent_appraisel){
                                $agentAppr = $duval->duration;
                              }
                              //APPRAISAL DATE 
                              if($duval->p_duration_id==$agent_inspection){
                                $agentInspect = $duval->duration;
                              }
                              //HOME SALE 
                              if($duval->p_duration_id==$agent_home_sale){
                                $agentHomeSale = $duval->duration;
                              }

                            }//--END FOR EACH
                            
                            //SET COLOR IF OFFER DOES NOT MATCH
                            $not_match_settle_date = true;     
                            foreach ($checked_settel as $value) {
                              if ($value==$agentSettel) {
                                $not_match_settle_date = false;     
                              } 
                            }
                            $not_match_finan = true;     
                            foreach ($checked_finan as $value) {
                              if ($value==$agentFinan) {
                                $not_match_finan = false;     
                              } 
                            }
                            $not_match_apprai = true;     
                            foreach ($checked_appr as $value) {
                              if ($value== $agentAppr) {
                                $not_match_apprai = false;     
                              } 
                            }
                            $not_match_inspec = true;     
                            foreach ($checked_inspect as $value) {
                              if ($value==$agentInspect) {
                                $not_match_inspec = false;     
                              } 
                            }

                            $not_match_home_sale = true;     
                            foreach ($checked_home_s as $value) {
                              if ($value==$agentHomeSale) {
                                $not_match_home_sale = false;     
                              } 
                            }
                            
                            //SET COLOR IF OFFER DOES NOT MATCH --END

                            $agentSettel = $agentSettel;
                            $agentFinan = $agentFinan;
                            $agentAppr = $agentAppr;
                            $agentInspect = $agentInspect;
                            $agentHomeSale = $agentHomeSale;
                          }

                          //FINAL RESULT
                          $checked_settel_date = implode(",", $checked_settel);
                          $checked_finance = implode(",", $checked_finan);
                          $checked_appraisal = implode(",", $checked_appr);
                          $checked_inspection = implode(",", $checked_inspect);
                          $checked_home_sale = implode(",", $checked_home_s);

                      @endphp
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'Settlement Date:'}}</label>
                            <input type="text" name="seller_concessions" class="form-control icon_control" min="0"  value="{{$checked_settel_date}}" disabled>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'EMD: $'}}</label>
                            <input type="number" name="emd" id="emd" class="form-control icon_control" min="0" value="{{$aData->property_det->emd}}" disabled>
                        </div>
                      </div>
                      @php
                        $isNorthcaro = false;
                        if ($aData->property_det->address_type==1) {
                          $address = strtolower($aData->property_det->address);
                        }else{
                          $address = strtolower($aData->property_det->manual_address);
                        }
                        if (strpos('north carolina', $address)) {
                          $isNorthcaro = true;
                        }
                        if (strtolower($aData->property_det->state) == 'north carolina') {
                          $isNorthcaro = true; 
                        }
                      @endphp
                      @if($isNorthcaro)
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'Due Diligence: $'}}</label>
                            <input type="number" name="due_diligence" id="duedelgenc" class="form-control icon_control" min="0" value="{{$aData->property_det->due_diligence}}" disabled>
                        </div>
                      </div>
                      @endif
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'Financing'}}</label>
                            <input type="text" name="due_diligence" id="duedelgenc" class="form-control icon_control" min="0" value="{{$checked_finance}}" disabled>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'Appraisal'}}</label>
                            <input type="text" name="due_diligence" id="duedelgenc" class="form-control icon_control" min="0" value="{{$checked_appraisal}}" disabled>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'Inspection'}}</label>
                            <input type="text" name="due_diligence" id="duedelgenc" class="form-control icon_control" min="0" value="{{$checked_inspection}}" disabled>
                        </div>
                      </div>
                        
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'Home Sale Contingency'}}</label>
                            <input type="text" name="due_diligence" id="duedelgenc" class="form-control icon_control" min="0" value="{{$checked_home_sale}}" disabled>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group mt-3">
                            <label>{{'Insurance: $'}}</label>
                            <input type="number" name="insurance" class="form-control icon_control" min="0" value="{{$aData->property_det->insurance}}" disabled>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'Property Taxes: $'}}</label>
                            <input type="number" name="property_tax" class="form-control icon_control" min="0" value="{{$aData->property_det->property_tax}}" disabled>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'Other fees: $'}}</label>
                            <input type="number" name="other_fee" class="form-control icon_control" min="0"  value="{{$aData->property_det->other_fee}}" disabled>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'HOA: $'}}</label>
                            <input type="number" name="hoa" class="form-control icon_control" min="0"  value="{{$aData->property_det->hoa}}" disabled>
                        </div>
                      </div>
                    </div>        
                    </div>
                    <div class="col-lg-1"></div>
                </div>
                <div class="row mt-2">
                  <div class="col-1">
                  </div>
                  <div class="col-11">
                    <h3 class="title">Offer Details</h3>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-1"></div>
                  <div class="col-lg-10">

                      @php
                        $intend_pay = $aData->intend_to_pay==1 ? 'Cash' :'Loan';
                        $user_type = $aData->user_type==1?'Buyer':'Buyer Agent';
                      @endphp
                    <!-- ======== BUYER DETAIL -->  
                    @if($aData->user_type==1)
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'Buyer Name'}}</label>
                            <input type="text" class="form-control icon_control" value="{{$aData->name}}" disabled>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'Buyer Email'}}</label>
                            <input type="text" class="form-control icon_control" value="{{$aData->email}}" disabled>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'Buyer Phone'}}</label>
                            <input type="text" class="form-control icon_control" value="{{$aData->phone}}" disabled>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'User Type'}}</label>
                            <input type="text" class="form-control icon_control" value="{{$user_type ?? ''}}" disabled>
                        </div>
                      </div>
                    </div>
                    @endif
                    <!-- ======== BUYER DETAIL END -->  

                    <!-- ======== BUYER AGENT DETAIL-->
                    @if($aData->user_type==2)
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'Name'}}</label>
                            <input type="text" class="form-control icon_control" value="{{$aData->name}}" disabled>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'Email'}}</label>
                            <input type="text" class="form-control icon_control" value="{{$aData->email}}" disabled>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'Phone'}}</label>
                            <input type="text" class="form-control icon_control" value="{{$aData->phone}}" disabled>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'User Type'}}</label>
                            <input type="text" class="form-control icon_control" value="{{$user_type ?? ''}}" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="row mt-4">
                      <div class="col-12">
                      <h5>Buyer Details</h5>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'Buyer Name'}}</label>
                            <input type="text" class="form-control icon_control" value="{{$aData->buyer_name}}" disabled>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'Buyer Email'}}</label>
                            <input type="text" class="form-control icon_control" value="{{$aData->buyer_email}}" disabled>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'Buyer Phone'}}</label>
                            <input type="text" class="form-control icon_control" value="{{$aData->buyer_phone}}" disabled>
                        </div>
                      </div>
                      @if($aData->intend_to_pay==1)
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'Intend to Pay'}}</label>
                            <input type="text" class="form-control icon_control" value="Cash" disabled>
                        </div>
                      </div>
                      @else
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'Intend to Pay'}}</label>
                            <input type="text" class="form-control icon_control" value="Loan" disabled>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'Is Pre Approved ?'}}</label>
                            <input type="text" class="form-control icon_control" value="@if($aData->pre_approved==1) Yes @else No @endif" disabled>
                        </div>
                      </div>
                      @endif

                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'HOA: $'}}</label>
                            <input type="text" class="form-control icon_control" value="{{$aData->property_det->hoa}}" disabled>
                        </div>
                      </div>

                    </div>

                    <!-- ======== CONTRACT TERMS ======== -->
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                            <h5>{{'Contract Terms'}}</h5>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                            <h5>{{'Contract Contingency'}}</h5>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'Sale Price'}}</label>
                            <input type="text" class="form-control icon_control @if($aData->sale_price != $aData->property_det->listing_price) text-white bg-not-match @endif" value="{{$aData->sale_price}}" disabled>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'Financing Contingency'}}</label>
                            <input type="text" class="form-control icon_control @if(isset($not_match_finan) && $not_match_finan) text-white bg-not-match @endif" value="{{ $agentFinan ?? '' }}" disabled>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'Seller Concessions'}}</label>
                            <input type="text" class="form-control icon_control" value="{{$aData->seller_concessions ?? ''}}" disabled>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'Appraisal Contingency'}}</label>
                            <input type="text" class="form-control icon_control @if(isset($not_match_apprai) && $not_match_apprai) text-white bg-not-match @endif" value="{{ $agentAppr ?? '' }}" disabled>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'Settlement Date'}}</label>
                            <input type="text" class="form-control icon_control" value="{{$agentSettel ?? ''}}" disabled>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'Inspection Contingency'}}</label>
                            <input type="text" class="form-control icon_control @if(isset($not_match_inspec) && $not_match_inspec) text-white bg-not-match @endif" value="{{ $agentInspect ?? '' }}" disabled>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'EMD'}}$</label>
                            <input type="text" class="form-control icon_control" value="{{$aData->emd}}" disabled>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'Home Sale Contingency'}}</label>
                            <input type="text" class="form-control icon_control @if(isset($not_match_home_sale) && $not_match_home_sale) text-white bg-not-match @endif" value="{{ $agentHomeSale ?? '' }}" disabled>
                        </div>
                      </div>
                      @if($isNorthcaro)
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'Due Deligence'}}</label>
                            <input type="text" class="form-control icon_control" value="{{$aData->due_diligence}}" disabled>
                        </div>
                      </div>
                      @endif
                      
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'Additional Note'}}</label>
                            <textarea class="form-control icon_control" rows="3" readonly="">{{ $aData->additional_note }}</textarea>
                        </div>
                      </div>
                    </div>
                    <!-- ======== CONTRACT CONTIGENCY ======== -->
                    @endif
                    
                    <!-- ======== BUYER DETAIL FROM AGENT SIDE END-->
                    @if($aData->user_type==1)
                    <div class="row">
                      <div class="col-lg-6 mt-4">
                        <div class="form-group">
                            <label>{{'Your Offer: $'}}</label>
                            <input type="number" class="form-control icon_control @if($aData->buyer_offer != $aData->property_det->listing_price) text-white bg-not-match @endif" min="0" value="{{$aData->buyer_offer}}" disabled>
                        </div>
                      </div>
                      <div class="col-lg-6 mt-4">
                        <div class="form-group">
                            <label>{{'Intend To Pay:'}}</label>
                            <input type="text" class="form-control icon_control" min="0" value="{{$intend_pay ?? ''}}" disabled>
                        </div>
                      </div>
                      
                      @if($intend_pay=='Loan')
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'Down Payment: %'}}</label>
                            <input type="text" class="form-control icon_control" min="0"  value="{{$aData->down_payment}}%" disabled>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'Loan Term:'}}</label>
                            <input type="text" class="form-control icon_control" min="0"  value="@if($aData->loan_term=='FHA')30 Year Fixed FHA @elseif($aData->loan_term=='VA') 30 Year VA @else {{$aData->loan_term}} Year Fixed @endif " disabled>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'Interest Rate: %'}}</label>
                            <input type="text"  class="form-control icon_control" min="0"  value="{{$aData->interest_rate}}%" disabled>
                        </div>
                      </div>
                      
                      @endif
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'HOA: $'}}</label>
                            <input type="text" class="form-control icon_control" min="0"  value="{{$aData->hoa}}" disabled>
                        </div>
                      </div>
                    </div>

                    <div class="row">

                      <div class="col-lg-6 mt-4">
                        <div class="form-group">
                            <label>{{'Est. Cash to Close: $'}}</label>
                            <input type="number" name="insurance" class="form-control icon_control" min="0" value="{{$aData->est_cash_to_close}}" disabled>
                        </div>
                      </div>

                      <div class="col-lg-6 mt-4">
                        <div class="form-group">
                            <label>{{'Closing Cost: $'}}</label>
                            <input type="number" name="property_tax" class="form-control icon_control" min="0" value="{{$aData->closing_cost}}" disabled>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-lg-6 mt-4">
                        <div class="form-group">
                            <label>{{'Insurance: $'}}</label>
                            <input type="number" name="insurance" class="form-control icon_control" min="0" value="{{$aData->insurance}}" disabled>
                        </div>
                      </div>

                      <div class="col-lg-6 mt-4">
                        <div class="form-group">
                            <label>{{'Property Taxes: $'}}</label>
                            <input type="number" name="property_tax" class="form-control icon_control" min="0" value="{{$aData->property_taxes}}" disabled>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'Other fees: $'}}</label>
                            <input type="number" name="other_fee" class="form-control icon_control" min="0"  value="{{$aData->other_fees}}" disabled>
                        </div>
                      </div>
                      @if($intend_pay=='Loan')
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'Mortgage: $'}}</label>
                            <input type="number" name="other_fee" class="form-control icon_control" min="0"  value="{{$aData->mortgage_insurance}}" disabled>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{'Principal & Interest: $'}}</label>
                            <input type="text"  class="form-control icon_control" min="0"  value="{{$aData->mortgage}}%" disabled>
                        </div>
                      </div>
                      @endif
                    </div>

                    @endif
                  </div>
                  <div class="col-lg-1"></div>
                </div>
              </div>
              @if($aData->user_type==1)
              <div class="row">
                <div class="col-lg-6">
                  <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                </div>
                <div class="col-lg-6">
                  <div class="text-center mt-5">
                      <h3 class="title">${{number_format((float)$aData->estimated_payment, 2, '.', '')}}/Mo</h3>
                      <h4>{{'Estimated Payment'}}</h4>
                  </div>
                </div>
              </div>
              @endif
            </div>
        </div>
    </div>
</div>   
@php
  if($intend_pay=='Loan'){
    $mortgage = number_format((float)$aData->mortgage, 2, '.', '');
  }else{
    $mortgage = 0;
  }
@endphp
@endsection
@push('custom-scripts')
<script>
var chart = '';
$(document).ready(function(){
  chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    title:{
      horizontalAlign: "left"
    },
    data: [{
      type: "doughnut",
      startAngle: 40,
      //innerRadius: 60,
      //indexLabelFontSize: 17,
      //indexLabel: "{label} - #percent%",
      indexLabelPlacement: "inside",
      indexLabel: "{y}",
      toolTipContent: "<b>{label}:</b> {y}",
      dataPoints: [
        { y: {{$aData->insurance}}, label: "Insurance" },
        { y: {{$aData->property_taxes}}, label: "Pro. Taxes" },
        { y: {{$aData->other_fees}}, label: "Other Fees" },
        { y: {{$mortgage}}, label: "Principal & Interest"},
        { y: {{$aData->hoa}}, label: "HOA"},
        { y: {{$aData->mortgage_insurance}}, label: "Mortgage"}
      ]
    }]
  });
  chart.render();
});
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript" src="{{ url('public/js/dashboard/offer.js') }}"></script>
@endpush