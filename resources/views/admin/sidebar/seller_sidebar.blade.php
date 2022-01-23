@php
  use App\Models\Setting;
  $general_setting =Setting::where('text_key','general_setting_admin_logo')->first();
    if($general_setting->text_key=='general_setting_admin_logo'){
        $setting['admin_logo'] = $general_setting->text_value ? $general_setting->text_value : '';
    }
@endphp
<nav id="sidebar" class="">
    <div class="sidebar-header">
        <a href="{{route('sellerDashboard')}}">
          <img src="@if(!empty($setting['admin_logo'])) {{ url('public/uploads/'.Config::get('constant.images_dirs.SETTING').'/'.$setting['admin_logo']) }} @else {{url('public/images/CityWorth_Homes_with_nmls.png')}} @endif" style="height: 45px;width: auto;" alt="CW Offer Logo">
        </a>
    </div>

    <ul class="list-unstyled components">
        <li class="{{ (request()->is('seller/dashboard')) || (request()->is('seller/profile')) ? 'active' : '' }}">
            <a href="{{route('sellerDashboard')}}">
               <img src="{{ url('public/images/ic_dashoard.png') }}" class="color">
               <img src="{{ url('public/images/ic_dashoard_color.png') }}" class="selected">
                {{'Dashboard'}}
            </a>
        </li>

        <li class="{{ (request()->is('seller/properties')) || (request()->is('seller/properties/add')) || (request()->is('seller/properties/edit/*')) || (request()->is('seller/properties/view/*')) || (request()->is('seller/properties/relist/*')) ? 'active' : '' }}">
            <a href="{{url('seller/properties')}}">
               <img src="{{ url('public/images/ic_profile.png') }}" class="color">
               <img src="{{ url('public/images/ic_profile_color.png') }}" class="selected">
                {{'Properties'}}
            </a>
        </li>

        <li class="{{ (request()->is('seller/offers')) || (request()->is('seller/offers/view/*')) ? 'active' : '' }}">
            <a data-slug="seller/offers" href="{{url('seller/offers')}}">
               <img src="{{ url('public/images/ic_menu.png') }}" class="color">
               <img src="{{ url('public/images/ic_menu_color.png') }}" class="selected">
                {{'Offers'}}
            </a>
        </li>

        <li class="{{ (request()->is('seller/leads')) ? 'active' : '' }}">
            <a data-slug="seller/leads" href="{{url('seller/leads')}}">
               <img src="{{ url('public/images/ic_lock.png') }}" class="color">
               <img src="{{ url('public/images/ic_lock_color.png') }}" class="selected">
                {{'Leads'}}
            </a>
        </li>

    </ul>

   
</nav>