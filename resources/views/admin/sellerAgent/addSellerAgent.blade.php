@extends('layout.app_with_login')
@section('title','Add Seller Agent')
@section('script', url('public/js/dashboard/seller_agent.js'))
@section('content')	
<!-- Page Content  -->
<div class="section">
    <div class="container-fluid">
        <h2 class="title"><a data-slug="admin/sellerAgents" href="{{url('/admin/sellerAgents')}}"><span>{{'Seller Agent '}}</span></a>  >  {{'Add New'}}
        </h2>
        <div class="white_box">
            <div class="theme_tab">
                <form name="add-sub-admin-form">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <div class="text-center">
                                <div class="profile_box">
                                    <div class="profile_pic">
                                        <img id="img_tmp" src="{{ url('public/images/user.png') }}">
                                        <input type="hidden" id="img_tmp" value="{{ url('public/images/user.png') }}">
                                    </div>
                                    <div class="edit_pencile">
                                        <img src="{{ url('public/images/ic_pen.png') }}">
                                        <input type="file" id="upload_profile" name="user_img" accept="image/jpeg,image/png">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>{{'Name'}}</label>
                                <input type="text" name="name" id="name" class="form-control icon_control">
                            </div>
                            <div class="form-group">
                                <label>{{'Email'}}</label>
                                <input type="email" name="email" id="email" class="form-control icon_control">
                            </div>
                            <div class="form-group">
                                <label>{{'Phone'}}</label>
                                <div class="form-row">
                                    <div class="col-4 col-md-2">
                                      <select name="tel_code" class="form-control">
                                        <option value="+1">+1</option>
                                        <option value="+91">+91</option>
                                      </select>
                                    </div>
                                    <div class="col-8 col-md-10">
                                        <input type="number" name="mobile_number" id="mobile_number" class="form-control icon_control">
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="col-lg-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center modal_btn pt-3">
                                <a class="theme_btn red_btn ajax_request no_sidebar_active" data-slug="admin/sellerAgents" href="{{ url('admin/sellerAgents') }}">{{'Cancel'}}</a>
                                <button type="submit" class="theme_btn">{{'Save'}}</button>
                            </div>
                        </div>
                    </div>
                </form>
                
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

<script type="text/javascript" src="{{ url('public/js/dashboard/seller_agent.js') }}"></script>
@endpush