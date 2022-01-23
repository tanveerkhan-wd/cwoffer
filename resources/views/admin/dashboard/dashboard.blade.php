@extends('layout.app_with_login')
@section('title', 'Dashboard')
@section('content')	
<!-- Page Content  -->
<div class="section">
	<div class="container-fluid">
		<div class="row text-center equal_height">
            @if(Auth::check() && Auth::user()->user_type==0)
            <div class="col-md-3 col-sm-6 col-xs-6 equal_height_container">
                <div class="dash_tile">
                    <a data-slug="admin/sellerAgents" href="{{url('admin/sellerAgents')}}">
                        <div class="dash_tile_top">
                        	<img src="{{ url('public/images/ic_dashoard_color.png') }}" class="tile_img">
               				<img src="{{ url('public/images/ic_dashoard_color.png') }}" class="tile_hover_img">
                        </div>
                        <div class="dash_tile_bottom">
                            <p>Seller Agents</p>
                            <h3>{{$count['seller_agent'] ?? '0'}}</h3>
                        </div>
                    </a>
                </div>
            </div>
            @endif
            <div class="col-md-3 col-sm-6 col-xs-6 equal_height_container">
                <div class="dash_tile">
                    <a @if(Auth::check() && Auth::user()->user_type==1) data-slug="seller/properties" href="{{url('seller/properties')}}" @else data-slug="admin/properties" href="{{url('admin/properties')}}" @endif>
                        <div class="dash_tile_top">
                            <img src="{{ url('public/images/ic_modules_color.png') }}" class="tile_img">
                            <img src="{{ url('public/images/ic_modules_color.png') }}" class="tile_hover_img">
                        </div>
                        <div class="dash_tile_bottom">
                            <p>Total Properties</p>
                            <h3>{{ $count['property'] ?? '0' }}</h3>
                        </div>
                    </a>
                </div>
            </div>
            @if(Auth::check() && Auth::user()->user_type==1)
            <div class="col-md-3 col-sm-6 col-xs-6 equal_height_container">
                <div class="dash_tile">
                    <a data-slug="seller/properties" href="{{url('seller/properties')}}?status=active">
                        <div class="dash_tile_top">
                            <img src="{{ url('public/images/ic_modules_color.png') }}" class="tile_img">
                            <img src="{{ url('public/images/ic_modules_color.png') }}" class="tile_hover_img">
                        </div>
                        <div class="dash_tile_bottom">
                            <p>Active Properties</p>
                            <h3>{{$count['active_property'] ?? '0'}}</h3>
                        </div>
                    </a>
                </div>
            </div>
            @endif
            <div class="col-md-3 col-sm-6 col-xs-6 equal_height_container">
                <div class="dash_tile">
                    <a @if(Auth::check() && Auth::user()->user_type==1) data-slug="seller/offers" href="{{url('seller/offers')}}" @else data-slug="admin/offers" href="{{url('admin/offers')}}" @endif>
                        <div class="dash_tile_top">
                            <img src="{{ url('public/images/ic_dashoard_color.png') }}" class="tile_img">
                            <img src="{{ url('public/images/ic_dashoard_color.png') }}" class="tile_hover_img">
                        </div>
                        <div class="dash_tile_bottom">
                            <p>Total Offers</p>
                            <h3>{{$count['offers'] ?? '0'}}</h3>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6 equal_height_container">
                <div class="dash_tile">
                    <a @if(Auth::check() && Auth::user()->user_type==1) data-slug="seller/offers" href="{{url('seller/offers')}}?pending=true" @else data-slug="admin/offers" href="{{url('admin/offers')}}?pending=true" @endif>
                        <div class="dash_tile_top">
                            <img src="{{ url('public/images/ic_dashoard_color.png') }}" class="tile_img">
                            <img src="{{ url('public/images/ic_dashoard_color.png') }}" class="tile_hover_img">
                        </div>
                        <div class="dash_tile_bottom">
                            <p>Pending Offers</p>
                            <h3>{{$count['pen_offer'] ?? '0'}}</h3>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6 equal_height_container">
                <div class="dash_tile">
                    <a @if(Auth::check() && Auth::user()->user_type==1) data-slug="seller/leads" href="{{url('seller/leads')}}" @else data-slug="admin/leads" href="{{url('admin/leads')}}" @endif>
                        <div class="dash_tile_top">
                            <img src="{{ url('public/images/ic_dashoard_color.png') }}" class="tile_img">
                            <img src="{{ url('public/images/ic_dashoard_color.png') }}" class="tile_hover_img">
                        </div>
                        <div class="dash_tile_bottom">
                            <p>Total Leads</p>
                            <h3>{{$count['leads'] ?? '0'}}</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
	</div>
</div>

@endsection
@push('custom-styles')
   
@endpush
@push('custom-scripts')
@endpush