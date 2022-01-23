@extends('layout.app_with_login')
@section('title','Offers')
@section('script', url('public/js/dashboard/offer.js'))
@section('content')	
<!-- Page Content  -->
<div class="section">
	<div class="container-fluid">
		<div class="row ">
            <div class="col-12 mb-3">
    			<h2 class="title"> {{'Offers'}}</h2>
            </div>
            
            
        </div>
        <div class="row">
            <div class="col-md-3 mb-3">
                <input type="text" id="search" class="form-control without_border icon_control search_control" placeholder="{{'Search'}}">
            </div>  
            <div class="col-md-4 text-md-right mb-3">
                <div class="row">
                    <div class="col-5 pr-0 m-auto text-center">
                        <label class="blue_label">Contract Received</label>
                    </div>
                    <div class="col-7">
                        <select class="form-control without_border icon_control dropdown_control " id="filter_contarct_received">
                            <option value="" selected>Select</option>
                            <option value="1">Yes</option>
                            <option value="2" @if(request()->has('pending') && request()->get('pending')=='true') selected  @endif>No</option>
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
                        <select class="form-control without_border icon_control dropdown_control " id="filter_user_type">
                            <option value="" selected>Select</option>
                            <option value="1">Buyer</option>
                            <option value="2">Buyer Agent</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mb-3">
                <input type="hidden" id="seller_id" value="@if(Auth::check() && Auth::User()->user_type==1) {{Auth::User()->user_id}} @endif">
                <a class="offer_export_url" href="@if(Auth::check() && Auth::User()->user_type==1){{ url('seller/file-export-all-offer')}}?user={{Auth::User()->user_id}} @else {{url('admin/file-export-all-offer')}} @endif"><button class="theme_btn full_width small_btn">{{'Export as CSV'}}</button></a>
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
                                    <th>{{'O_ID'}}</th>
                                    <th>{{'Seller Agent'}}</th>
                                    <th>{{'Transaction Coordinator'}}</th>
                                    <th>{{'Type | Name'}}</th>
                                    <th>{{'Email & Phone'}}</th>
                                    <th>{{'Address'}}</th>
                                    <th>{{'Offer Sale Price'}}</th>
                                    <th>{{'Contract'}}</th>
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

<script type="text/javascript" src="{{ url('public/js/dashboard/offer.js') }}"></script>
@endpush