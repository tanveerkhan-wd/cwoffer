@php
  use App\Models\Setting;
  $general_setting =Setting::where('text_key','general_setting_admin_logo')->first();
    if($general_setting->text_key=='general_setting_admin_logo'){
        $setting['admin_logo'] = $general_setting->text_value ? $general_setting->text_value : '';
    }
@endphp
<nav id="sidebar" class="">
    <div class="sidebar-header">
        <a href="{{route('adminDashboard')}}">
          <img src="@if(!empty($setting['admin_logo'])) {{ url('public/uploads/'.Config::get('constant.images_dirs.SETTING').'/'.$setting['admin_logo']) }} @else {{url('public/images/CityWorth_Homes_with_nmls.png')}} @endif" style="height: 45px;width: auto;" alt="CW Offer Logo">
        </a>
    </div>

    <ul class="list-unstyled components">
        <li class="{{ (request()->is('admin/dashboard')) || (request()->is('admin/profile')) ? 'active' : '' }}">
            <a href="{{route('adminDashboard')}}">
               <img src="{{ url('public/images/ic_dashoard.png') }}" class="color">
               <img src="{{ url('public/images/ic_dashoard_color.png') }}" class="selected">
                {{'Dashboard'}}
            </a>
        </li>

        <li class="{{ (request()->is('admin/sellerAgents')) || (request()->is('admin/addSellerAgent')) || (request()->is('admin/editSellerAgent/*')) || (request()->is('admin/viewSellerAgent/*')) ? 'active' : '' }}">
            <a data-slug="admin/sellerAgents" href="{{url('/admin/sellerAgents')}}">
               <img src="{{ url('public/images/ic_users.png') }}" class="color">
               <img src="{{ url('public/images/ic_users_color.png') }}" class="selected">
                {{'Seller Agents'}}
            </a>
        </li>

        <li class="{{ (request()->is('admin/properties')) || (request()->is('admin/subAdmin')) || (request()->is('admin/subAdmin/*')) || (request()->is('admin/editSubAdmin/*')) || (request()->is('admin/viewSubAdmin/*')) ? 'active' : '' }}">
            <a  data-slug="admin/properties" href="{{url('admin/properties')}}">
               <img src="{{ url('public/images/ic_profile.png') }}" class="color">
               <img src="{{ url('public/images/ic_profile_color.png') }}" class="selected">
                {{'Properties'}}
            </a>
        </li>

        <li class="{{ (request()->is('admin/offers')) ? 'active' : '' }}">
            <a data-slug="admin/offers" href="{{url('admin/offers')}}">
               <img src="{{ url('public/images/ic_menu.png') }}" class="color">
               <img src="{{ url('public/images/ic_menu_color.png') }}" class="selected">
                {{'Offers'}}
            </a>
        </li>

        <li class="{{ (request()->is('admin/leads')) ? 'active' : '' }}">
            <a data-slug="admin/leads" href="{{url('admin/leads')}}">
               <img src="{{ url('public/images/ic_lock.png') }}" class="color">
               <img src="{{ url('public/images/ic_lock_color.png') }}" class="selected">
                {{'Leads'}}
            </a>
        </li>

        <li class="{{ (request()->is('admin/emailSmsTemplates')) || (request()->is('admin/emailSmsTemplates/edit/*')) ? 'active' : '' }}">
            <a href="{{url('/admin/emailSmsTemplates')}}">
               <img src="{{ url('public/images/ic_test-results.png') }}" class="color">
               <img src="{{ url('public/images/ic_test-results_color.png') }}" class="selected">
                {{'Email Sms Templates'}}
            </a>
        </li>

        <li class="{{ (request()->is('admin/settings')) || (request()->is('admin/setting/cms/edit/1')) ? 'active' : '' }}">
            <a href="{{url('/admin/settings')}}">
               <img src="{{ url('public/images/ic_ebook.png') }}" class="color">
               <img src="{{ url('public/images/ic_ebook_color.png') }}" class="selected">
                {{'Settings'}}
            </a>
        </li>
    </ul>

   
</nav>