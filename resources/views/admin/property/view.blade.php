@extends('layout.app_with_login')
@section('title','View Property')
@section('script', url('public/js/dashboard/properties.js'))
@section('content')	
<!-- Page Content  -->
<div class="section">
    <div class="container-fluid">
        <h2 class="title"><a @if(Auth::check() && Auth::User()->user_type==1) data-slug="seller/properties" href="{{url('/seller/properties')}}" @else data-slug="admin/properties" href="{{url('/admin/properties')}}" @endif><span>{{'Properties Master'}}</span></a>  >  {{'View Property'}}
        </h2>
        <input type="hidden" id="pkProId" value="{{$aData->property_id}}">
        <div class="white_box">
            <div class="theme_tab">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="details-tab" data-toggle="tab" href="#details" role="tab" aria-controls="details" aria-selected="true">Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="offers-tab" data-toggle="tab" href="#offers" role="tab" aria-controls="offers" aria-selected="true">Offers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="leads-tab" data-toggle="tab" href="#leads" role="tab" aria-controls="leads" aria-selected="true">Leads</a>
                </li>
              </ul>

              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="details-tab">
                  <div class="inner_tab">
                    <div class="row mb-4">
                      <div class="col-lg-1"></div>
                      <div class="col-lg-10">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                          <div class="carousel-inner">
                            @foreach($aData->images as $key=>$media)
                                @php
                                  $proImg = $media->image;
                                @endphp
                                <div class="carousel-item @if($key==0) active @endif">
                                  <img class="property_img" src="{{ url('public/uploads/'.Config::get('constant.images_dirs.PROPERTY')) }}{{'/'.$media->image}}" alt="First slide">
                                </div>
                              @endforeach
                          </div>
                          @if(count($aData->images) > 1)
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
                      <div class="col-lg-1"></div>
                    </div>
                    <div class="row">
                      <div class="col-lg-1"></div>
                      <div class="col-lg-10">
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                                <label>{{'Transaction Coordinators Name'}}</label>
                                <input type="text" name="tranc_coordinator_name" class="form-control icon_control" value="{{$aData->tranc_coordinator_name}}" disabled>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                                <label>{{'Realtors Name'}}</label>
                                <input type="text" name="realtors_name" class="form-control icon_control" value="{{$aData->realtors_name}}" disabled>
                            </div>
                          </div>

                          <div class="col-lg-6">
                            <label>{{'Address'}}</label>
                            <div class="form-group @if($aData->address_type==1) hide_content @endif manual_address">
                                <input type="text" name="manual_address" id="manual_address" class="form-control icon_control" value="{{$aData->manual_address}} {{$aData->address}}" disabled>
                            </div>
                            <div class="form-group @if($aData->address_type==2) hide_content @endif google_address">
                                <input type="text" name="autocomplete" id="autocomplete" class="form-control" placeholder="Select Location" value="{{$aData->address}}" disabled>
                            </div>
                          </div>

                          <div class="col-lg-6">
                            <div class="form-group">
                                <label>{{'Listing Price: $'}}</label>
                                <input type="number" name="listing_price" id="listing_price" class="form-control icon_control" min="0" value="{{$aData->listing_price}}" disabled>
                            </div>
                          </div>
                          
                          <div class="col-lg-6">
                            <div class="form-group">
                                <label>{{'Min Sales Price: $'}}</label>
                                <input type="number" name="min_sales_price" class="form-control icon_control" min="0"  value="{{$aData->min_sales_price}}" disabled>
                            </div>
                          </div>
                          
                          <div class="col-lg-6">
                            <div class="form-group">
                                <label>{{'Seller Concessions: $'}}</label>
                                <input type="number" name="seller_concessions" class="form-control icon_control" min="0"  value="{{$aData->seller_concessions}}" disabled>
                            </div>
                          </div>
                          @php
                              $checked_settel = [];
                              $checked_finan = [];
                              $checked_appr = [];
                              $checked_inspect = [];
                              $checked_home_s = [];
                              $checked_settel_date = $aData->settlement_date ? json_decode($aData->settlement_date):[];
                              $checked_finance = $aData->finance ? json_decode($aData->finance):[];
                              $checked_appraisal = $aData->appraisal ? json_decode($aData->appraisal):[];
                              $checked_inspection = $aData->inspection ? json_decode($aData->inspection):[];
                              $checked_home_sale = $aData->home_sale ? json_decode($aData->home_sale):[];
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
                                <input type="number" name="emd" id="emd" class="form-control icon_control" min="0" value="{{$aData->emd}}" disabled>
                            </div>
                          </div>
                          @php
                            $isNorthcaro = false;
                            if ($aData->address_type==1) {
                              $address = strtolower($aData->address);
                            }else{
                              $address = strtolower($aData->manual_address);
                            }
                            if (strpos('north carolina', $address)) {
                              $isNorthcaro = true;
                            }
                            if (strtolower($aData->state) == 'north carolina') {
                              $isNorthcaro = true; 
                            }
                          @endphp
                          @if($isNorthcaro)
                          <div class="col-lg-6">
                            <div class="form-group">
                                <label>{{'Due Diligence: $'}}</label>
                                <input type="number" name="due_diligence" id="duedelgenc" class="form-control icon_control" min="0" value="{{$aData->due_diligence}}" disabled>
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
                                <input type="number" name="insurance" class="form-control icon_control" min="0" value="{{$aData->insurance}}" disabled>
                            </div>
                          </div>

                          <div class="col-lg-6">
                            <div class="form-group">
                                <label>{{'Property Taxes: $'}}</label>
                                <input type="number" name="property_tax" class="form-control icon_control" min="0" value="{{$aData->property_tax}}" disabled>
                            </div>
                          </div>

                          <div class="col-lg-6">
                            <div class="form-group">
                                <label>{{'Other fees: $'}}</label>
                                <input type="number" name="other_fee" class="form-control icon_control" min="0"  value="{{$aData->other_fee}}" disabled>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                                <label>{{'HOA: $'}}</label>
                                <input type="number" name="hoa" class="form-control icon_control" min="0"  value="{{$aData->hoa}}" disabled>
                            </div>
                          </div>

                        </div>        
                        </div>
                        <div class="col-lg-1"></div>
                    </div>
                    
                  </div>
                </div>
                
                <div class="tab-pane fade show" id="offers" role="tabpanel" aria-labelledby="offers-tab">
                  <div class="inner_tab">
                      <div class="section">
                              <div class="container-fluid">
                                <div class="row">
                                  <div class="col-md-3 mb-3">
                                      <input type="text" id="offer_search" class="form-control icon_control search_control" placeholder="{{'Search'}}">
                                  </div>  
                                  
                               
                                  <div class="col-md-4 text-md-right mb-3">
                                      <div class="row">
                                          <div class="col-5  pr-0 m-auto m-0">
                                              <label class="blue_label">Contract Received</label>
                                          </div>
                                          <div class="col-7">
                                              <select class="form-control icon_control dropdown_control " id="filter_contarct_received">
                                                  <option value="" selected>Select</option>
                                                  <option value="1">Yes</option>
                                                  <option value="2">No</option>
                                              </select>
                                          </div>
                                      </div>
                                  </div> 
                                  <div class="col-md-3 mb-3">
                                     <div class="row">
                                          <div class="col-3  pr-0 m-auto">
                                              <label class="blue_label">Type</label>
                                          </div>
                                          <div class="col-9">
                                              <select class="form-control icon_control dropdown_control " id="filter_user_type">
                                                  <option value="" selected>Select</option>
                                                  <option value="1">Buyer</option>
                                                  <option value="2">Buyer Agent</option>
                                              </select>
                                          </div>
                                      </div>
                                  </div>
                                  
                                  <div class="col-md-2 text-md-right mb-3">
                                      <input type="hidden" id="seller_id" value="@if(Auth::check() && Auth::User()->user_type==1) {{Auth::User()->user_id}} @endif">
                                      <a class="offer_export_url" href="@if(Auth::check() && Auth::User()->user_type==1){{ url('seller/file-export-all-offer')}}?property={{$aData->property_id}} @else {{ url('admin/file-export-all-offer')}}?property={{$aData->property_id}} @endif"><button class="theme_btn full_width small_btn">{{'Export as CSV'}}</button></a>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-12">
                                      <div class="theme_table">
                                          <div class="table-responsive">
                                              <table id="offer_listing" class="display" style="width:100%">
                                                  <thead>
                                                      <tr>
                                                          <th>{{'Sr. No.'}}</th>
                                                          <th>{{'Created Date'}}</th>
                                                          <th>{{'O_ID'}}</th>
                                                          <th>{{'Transaction Coordinator'}}</th>
                                                          <th>{{'Type | Name'}}</th>
                                                          <th>{{'Email & Phone'}}</th>
                                                          <th>{{'Address'}}</th>
                                                          <th>{{'Offer Sale'}}</th>
                                                          <th>{{'Contract Received'}}</th>
                                                          <th><div class="action">{{'Actions'}}</div></th>
                                                      </tr>
                                                  </thead>
                                              </table>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                              </div>
                            </div>
                            
                  </div>
                </div>

                <div class="tab-pane fade show" id="leads" role="tabpanel" aria-labelledby="leads-tab">
                  <div class="inner_tab">
                      <div class="section">
                              <div class="container-fluid">
                                <div class="row">
                                  <div class="col-md-4 mb-3">
                                      <input type="text" id="lead_search" class="form-control icon_control search_control" placeholder="{{'Search'}}">
                                  </div>  
                                  <div class="col-md-6 text-md-right mb-3">
                                      
                                  </div> 
                                  <div class="col-md-2 col-6 mb-3">
                                     <a href="@if(Auth::check() && Auth::User()->user_type==1){{ url('seller/file-export-all-lead')}}?property={{$aData->property_id}} @else {{ url('admin/file-export-all-lead')}}?property={{$aData->property_id}} @endif"><button class="theme_btn full_width small_btn">{{'Export as CSV'}}</button></a>    
                                  </div>
                                </div>
                              <div class="row">
                                  <div class="col-12">
                                      <div class="theme_table">
                                          <div class="table-responsive">
                                              <table id="lead_listing" class="display" style="width:100%">
                                                  <thead>
                                                      <tr>
                                                          <th>{{'Sr. No.'}}</th>
                                                          <th>{{'Created Date'}}</th>
                                                          <th>{{'L_ID'}}</th>
                                                          <th>{{'Transaction Coordinator'}}</th>
                                                          <th>{{'Name'}}</th>
                                                          <th>{{'Email & Phone'}}</th>
                                                          <th>{{'Address'}}</th>
                                                      </tr>
                                                  </thead>
                                              </table>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                              </div>
                            </div>
                  </div>
                </div>

              </div>
  
            </div>
        </div>
    </div>
</div>

<div class="theme_modal modal fade" id="status_prompt" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                {{-- <img src="{{url('public/images/ic_close_bg.png')}}" class="modal_top_bg">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <img src="{{url('public/images/ic_close_circle_white.png')}}">
                </button> --}}
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10">
                            <h5 class="modal-title" id="exampleModalCenterTitle">{{'Change Status'}}</h5>
                            <div class="form-group text-center">
                                <label>{{'Are you sure you want to change status ?'}}</label>
                                <input type="hidden" id="did">
                                <input type="hidden" id="status_offer">
                                <input type="hidden" id="status_val">
                            </div>
                            <div class="text-center modal_btn ">
                                <button style="display: none;" class="theme_btn show_status_modal full_width small_btn" data-toggle="modal" data-target="#status_prompt">{{'Delete'}}</button>
                                <button type="button" onclick="confirmStatus()" class="theme_btn">{{'Yes'}}</button>
                                <button type="button" data-dismiss="modal" class="theme_btn red_btn">{{'No'}}</button>
                            </div>
                        </div>
                        <div class="col-lg-1"></div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('custom-styles')
@endpush
@push('custom-scripts')
<script type="text/javascript" src="{{ url('public/js/dashboard/properties.js') }}"></script>
@endpush
