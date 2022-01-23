@extends('layout.app_with_login')
@section('title','Properties')
@section('script', url('public/js/dashboard/admin_properties.js'))
@section('content')	
<!-- Page Content  -->
<div class="section">
	<div class="container-fluid">
		<div class="row ">
            <div class="col-12 mb-3">
    			<h2 class="title"> {{'Properties'}}</h2>
            </div>
            
            
        </div>
        <div class="row">
            <div class="col-md-3 mb-3">
                <input type="text" id="search" class="form-control without_border icon_control search_control" placeholder="{{'Search'}}">
            </div>  
            <div class="col-md-4 text-md-right mb-3">
                <div class="row">
                    <div class="col-5 pr-0 m-auto">
                        <label class="blue_label">Listing Status</label>
                    </div>
                    <div class="col-7">
                        <select class="form-control without_border icon_control dropdown_control " id="filter_listing_status">
                            <option value="" selected>Select</option>
                            <option value="1">Active</option>
                            <option value="5">Inactive</option>
                            <option value="2">Under Contract</option>
                            <option value="3">Closed</option>
                            <option value="4">Contract Signed</option>
                        </select>
                    </div>
                </div>
            </div> 
            <div class="col-md-3 mb-3">
               <div class="row">
                    <div class="col-5 pr-0 m-auto">
                        <label class="blue_label">Offer Status</label>
                    </div>
                    <div class="col-7">
                        <select class="form-control without_border icon_control dropdown_control " id="filter_offer_status">
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
                <a class="offer_export_url" href="{{ route('file-export') }}"><button class="theme_btn full_width small_btn">{{'Export as CSV'}}</button></a>    
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
                                    <th>{{'Seller Agent'}}</th>
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

<div class="theme_modal modal fade" id="delete_prompt" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <img src="{{url('public/images/ic_close_bg.png')}}" class="modal_top_bg">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <img src="{{url('public/images/ic_close_circle_white.png')}}">
                </button>
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10">
                            <h5 class="modal-title" id="exampleModalCenterTitle">{{'Delete'}}</h5>
                            <div class="form-group text-center">
                                <label>{{$translations['gn_delete_prompt'] ?? 'Are you sure you want to delete ?'}}</label>
                                <input type="hidden" id="did">
                            </div>
                            <div class="text-center modal_btn ">
                                <button style="display: none;" class="theme_btn show_delete_modal full_width small_btn" data-toggle="modal" data-target="#delete_prompt">{{$translations['gn_delete'] ?? 'Delete'}}</button>
                                <button type="button" onclick="confirmDelete()" class="theme_btn">{{$translations['gn_yes'] ?? 'Yes'}}</button>
                                <button type="button" data-dismiss="modal" class="theme_btn red_btn">{{$translations['gn_no'] ?? 'No'}}</button>
                            </div>
                        </div>
                        <div class="col-lg-1"></div>
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

@push('custom-scripts')
<script type="text/javascript">
    $(function() {
      showLoader(false);
    });
</script>

<script type="text/javascript" src="{{ url('public/js/dashboard/admin_properties.js') }}"></script>
@endpush