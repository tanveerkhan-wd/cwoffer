@extends('layout.app_with_login')
@section('title','View Seller Agents')
@section('script', url('public/js/dashboard/seller_agent_view.js'))
@section('content')	
<!-- Page Content  -->
<div class="section">
    <div class="container-fluid">
        <h2 class="title"><a data-slug="admin/sellerAgents" href="{{url('/admin/sellerAgents')}}"><span>{{'Seller Agents '}}</span></a>  >  {{'Details'}}
        </h2>
        <div class="white_box">
            <div class="theme_tab">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                      <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Details</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" id="properties-tab" data-toggle="tab" href="#properties" role="tab" aria-controls="properties" aria-selected="true">Properties</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" id="offers-tab" data-toggle="tab" href="#offers" role="tab" aria-controls="offers" aria-selected="true">Offers</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" id="leads-tab" data-toggle="tab" href="#leads" role="tab" aria-controls="leads" aria-selected="true">Leads</a>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                          <div class="inner_tab">
                            <form name="edit-app-user-profile-form">
                              <div class="row">
                                  <div class="col-lg-3"></div>
                                  <div class="col-lg-6">
                                    <input type="hidden" name="pkCat" id="pkCat" value="{{$data->user_id ?? ''}}">
                                    <div class="">
                                      <label>{{'Profile Image'}}</label>
                                      <div class="text-center">
                                          <div class="profile_box">
                                              <div class="profile_pic">
                                                  <img id="cat1_img" src="@if(!empty($data->user_photo)) {{ url('public/uploads/'.Config::get('constant.images_dirs.USERS')) }}{{'/'.$data->user_photo}}  @else {{ url('public/images/user.png') }} @endif">
                                                  <input type="hidden" id="img_tmp1" value="{{ url('public/images/user.png') }}">
                                              </div>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label>Name</label>
                                          <input type="text" name="name" class="form-control" value="{{$data->name ?? ''}}" disabled>
                                      </div>
                                        <div class="form-group">
                                          <label>Email</label>
                                          <input type="email" name="email" class="form-control" value="{{$data->email ?? ''}}" disabled>
                                        </div>
                                        <div class="form-group">
                                          <label>Phone</label>
                                          <div class="form-row">
                                            <div class="col-4 col-md-2">
                                              <select name="tel_code" class="form-control" disabled>
                                                <option value="+1" @if($data['tel_code']=='+1') selected @endif>+1</option>
                                                <option value="+91" @if($data['tel_code']=='+91') selected @endif>+91</option>
                                              </select>
                                            </div>
                                            <div class="col-8 col-md-10">
                                              <input type="number" name="mobile_number" id="mobile_number" class="form-control icon_control" value="{{ $data['mobile_number'] ?? '' }}" disabled>
                                            </div>
                                          </div>
                                        </div>

                                    </div>
                                    

                                    <div class="text-center">
                                        <a class="theme_btn red_btn ajax_request no_sidebar_active" data-slug="admin/sellerAgents" href="{{ url('admin/sellerAgents') }}">{{$translations['gn_cancel'] ?? 'Cancel'}}</a>
                                    </div>
                                  </div>
                                  <div class="col-lg-3"></div>
                              </div>
                            </form>
                          </div>
                      </div>
                      
                      <div class="tab-pane fade show" id="properties" role="tabpanel" aria-labelledby="properties-tab">
                          <div class="inner_tab">
                            <div class="section">
                              <div class="container-fluid">
                                <div class="row">
                                  <div class="col-md-4 mb-3">
                                      <input type="text" id="search" class="form-control icon_control search_control" placeholder="{{'Search'}}">
                                  </div>  
                                  
                                
                                  <div class="col-md-3 text-md-right mb-3">
                                      <div class="row">
                                          <div class="col-5 pr-0 m-auto">
                                              <label class="blue_label">Listing Status</label>
                                          </div>
                                          <div class="col-7">
                                              <select class="form-control icon_control dropdown_control " id="filter_listing_status">
                                                  <option value="" selected>Select</option>
                                                  <option value="1">Active</option>
                                                  <option value="5">Inactive</option>
                                                  <option value="2">Under Contract</option>
                                                  <option value="3">Closed</option>
                                                  <option value="4">Contract signed</option>
                                              </select>
                                          </div>
                                      </div>
                                  </div> 
                                  <div class="col-md-3  mb-3">
                                     <div class="row">
                                          <div class="col-5 pr-0 m-auto">
                                              <label class="blue_label">Offer Status</label>
                                          </div>
                                          <div class="col-7">
                                              <select class="form-control icon_control dropdown_control " id="filter_offer_status">
                                                  <option value="" selected>Select</option>
                                                  <option value="1">Accepting</option>
                                                  <option value="4">Pending</option>
                                                  <option value="2">Denied</option>
                                                  <option value="3">Waiting</option>
                                              </select>
                                          </div>
                                      </div>
                                  </div>
                                  
                                  <div class="col-md-2 text-md-right mb-3">
                                      <a class="pro_export_url" href="{{ url('admin/file-export')}}?user={{$data->user_id}}"><button class="theme_btn full_width small_btn">{{'Export as CSV'}}</button></a>    
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-12">
                                      <div class="theme_table">
                                          <div class="table-responsive">
                                              <table id="listing" class="display" style="width:100%">
                                                  <thead>
                                                      <tr>
                                                          <th>{{'Sr. No.'}}</th>
                                                          <th>{{'Created Date'}}</th>
                                                          <th>{{'P_ID'}}</th>
                                                          <th>{{'Address'}}</th>
                                                          <th>{{'Sale Price'}}</th>
                                                          <th>{{'Listing Status'}}</th>
                                                          <th>{{'Offer Status'}}</th>
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
                                          <div class="col-5 pr-0 m-auto m-0">
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
                                          <div class="col-3 m-auto">
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
                                      <input type="hidden" id="seller_id" value="{{$data->user_id}}">
                                      <a class="offer_export_url" href="{{ url('admin/file-export-all-offer')}}?user={{$data->user_id}}"><button class="theme_btn full_width small_btn">{{'Export as CSV'}}</button></a>    
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
                                  <div class="col-md-2 mb-3">
                                     <a href="{{url('admin/file-export-all-lead') }}?user={{$data->user_id}}"><button class="theme_btn full_width small_btn">{{'Export as CSV'}}</button></a>    
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
                                <input type="hidden" id="status_val">
                            </div>
                            <div class="text-center modal_btn ">
                                <button style="display: none;" class="theme_btn show_status_modal full_width small_btn" data-toggle="modal" data-target="#status_prompt">{{'Delete'}}</button>
                                <button type="button" onclick="confirmListStatus()" class="theme_btn">{{'Yes'}}</button>
                                <button type="button" data-dismiss="modal" class="theme_btn red_btn">{{'No'}}</button>
                            </div>
                        </div>
                        <div class="col-lg-1"></div>
                    </div>
            </div>
        </div>
    </div>
</div>

<div class="theme_modal modal fade" id="status_prompt1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle1" aria-hidden="true">
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
                            <h5 class="modal-title" id="exampleModalCenterTitle1">{{'Change Status'}}</h5>
                            <div class="form-group text-center">
                                <label>{{'Are you sure you want to change status ?'}}</label>
                                <input type="hidden" id="did1">
                                <input type="hidden" id="status_offer">
                            </div>
                            <div class="text-center modal_btn ">
                                <button style="display: none;" class="theme_btn show_offer_status_modal full_width small_btn" data-toggle="modal" data-target="#status_prompt1">{{'Delete'}}</button>
                                <button type="button" onclick="confirmOfferStatus()" class="theme_btn">{{'Yes'}}</button>
                                <button type="button" data-dismiss="modal" class="theme_btn red_btn">{{'No'}}</button>
                            </div>
                        </div>
                        <div class="col-lg-1"></div>
                    </div>
            </div>
        </div>
    </div>
</div>

<div class="theme_modal modal fade" id="status_prompt2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle2" aria-hidden="true">
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
                            <h5 class="modal-title" id="exampleModalCenterTitle2">{{'Change Status'}}</h5>
                            <div class="form-group text-center">
                                <label>{{'Are you sure you want to change status ?'}}</label>
                                <input type="hidden" id="did2">
                            </div>
                            <div class="text-center modal_btn ">
                                <button style="display: none;" class="theme_btn show_cont_status_modal full_width small_btn" data-toggle="modal" data-target="#status_prompt2">{{'Delete'}}</button>
                                <button type="button" onclick="confirmContrStatus()" class="theme_btn">{{'Yes'}}</button>
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
<script type="text/javascript">
    $(function() {
      showLoader(false);
    });
</script>

<script type="text/javascript" src="{{ url('public/js/dashboard/seller_agent_view.js') }}"></script>
@endpush