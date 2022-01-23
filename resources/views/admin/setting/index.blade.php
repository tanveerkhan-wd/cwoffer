@extends('layout.app_with_login')
@section('title','Settings')
@section('script', url('public/js/dashboard/settings.js'))
@section('content')
 <!-- Page Content  -->
<div class="section">
  <div class="container-fluid">
    <h5 class="title">{{'Settings'}} > {{'CMS'}}</h5>
        <div class="white_box">
            <div class="theme_tab">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                      <a class="nav-link active" id="cms-tab" data-toggle="tab" href="#cms" role="tab" aria-controls="cms" aria-selected="true">CMS</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" id="texts-tab" data-toggle="tab" href="#texts" role="tab" aria-controls="texts" aria-selected="true">Texts</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" id="general-setting-tab" data-toggle="tab" href="#general-setting" role="tab" aria-controls="general-setting" aria-selected="true">General Setting</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" id="seo-setting-tab" data-toggle="tab" href="#seo-setting" role="tab" aria-controls="seo-setting" aria-selected="true">SEO Settings</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" id="smtp-details-tab" data-toggle="tab" href="#smtp-details" role="tab" aria-controls="smtp-details" aria-selected="true">SMTP Details</a>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="cms" role="tabpanel" aria-labelledby="cms-tab">
                          <div class="inner_tab">
                            
                            <div class="section">
                              <div class="container-fluid">
                                <input type="hidden" id="get_user_id" value="{{$data->user_id ?? ''}}">
                                <div class="row ">
                                    
                                    <div class="col-md-4 mb-3">
                                        <input type="text" id="search_cms" class="form-control icon_control search_control" placeholder="{{'Search'}}">
                                    </div> 
                                    <div class="col-md-3 text-md-right mb-3">
                                        
                                    </div> 
                                    <div class="col-md-5 text-md-right mb-3">
                                        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="theme_table">
                                            <div class="table-responsive">
                                                <table id="cms_listing" class="display" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>{{'Sr. No.'}}</th>
                                                            <th>{{'Name'}}</th>
                                                            <th>{{'Body'}}</th>
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
                      
                      <div class="tab-pane fade show" id="texts" role="tabpanel" aria-labelledby="texts-tab">
                          <div class="inner_tab">
                              <div id="accordion">
                              
                                <div class="card mb-2">
                                  <div class="card-header p-2" id="heading1">
                                    <h5 class="mb-0">
                                      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                        Home
                                      </button>
                                    </h5>
                                  </div>
                                  <div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#accordion">
                                    <div class="card-body p-0">
                                      <form name="home-form">
                                        <div class="row">
                                            <div class="col-lg-3"></div>
                                              <div class="col-lg-6">
                                                <div class="">
                                                  
                                                  <label>{{'Banner Image'}}</label>
                                                  <div class="text-center">
                                                    <div class="profile_box">
                                                        <div class="square_pic">
                                                            <img id="about_img" src="@if(!empty($setting['home']['banner_image'])) {{ url('public/uploads/'.Config::get('constant.images_dirs.SETTING').'/'.$setting['home']['banner_image']) }} @else {{ url('public/images/user.png') }} @endif">
                                                            <input type="hidden" id="about_img_tmp" value="{{ url('public/images/user.png') }}">
                                                        </div>
                                                        <div  class="upload_pic_link">
                                                            <a href="javascript:void(0)">
                                                            {{'Upload Image'}}<input type="file" id="ab_upload_profile" name="home_banner_image" accept="image/jpeg,image/png"></a>
                                                        </div>
                                                    </div>
                                                  </div>

                                                  <div class="form-group">
                                                    <label>{{'Tagline 1'}} *</label>
                                                    <input type="text" name="home_tagline_1" class="form-control icon_control" value="{{$setting['home']['tagline_1'] ?? ''}}">
                                                  </div>
                                                  <div class="form-group">
                                                      <label>{{'Tagline 2'}}</label>
                                                      <input type="text" class="form-control icon_control" name="home_tagline_2" value="{{$setting['home']['tagline_2'] ?? ''}}">
                                                  </div>

                                                  <div class="form-group">
                                                      <label>{{'Button'}}</label>
                                                      <input type="text" class="form-control icon_control" name="home_button" value="{{$setting['home']['button_text']}}">
                                                  </div>

                                                </div>
                                                <div class="text-center">
                                                    <a class="theme_btn red_btn no_sidebar_active" href="{{ url('admin/settings') }}">{{'Cancel'}}</a>
                                                    <button class="theme_btn">Save</button>
                                                </div>
                                              </div>
                                            <div class="col-lg-3"></div>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>

                                <div class="card mb-2">
                                  <div class="card-header p-2" id="heading2">
                                    <h5 class="mb-0">
                                      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                        Intro - 1
                                      </button>
                                    </h5>
                                  </div>
                                  <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordion">
                                    <div class="card-body p-0">

                                      <form name="intro-one-form">
                                        <div class="row">
                                            <div class="col-lg-3"></div>
                                              <div class="col-lg-6">
                                                <div class="">
                                                  {{-- <div class="form-group">
                                                    <label>{{'Line 1'}}</label>
                                                    <input type="text" name="intro_one_line_1" class="form-control icon_control" value="{{$setting['intro_1']['line_1'] ?? ''}}">
                                                  </div> --}}
                                                  <div class="form-group">
                                                      <label>{{'Line 2'}}</label>
                                                      <textarea rows="3" class="form-control icon_control" name="intro_one_line_2">{{$setting['intro_1']['line_2'] ?? ''}}</textarea>
                                                  </div>
                                                  <p class="text-center m-0 p-0"><strong>Note*</strong> Please Don't remove<strong> SELLER_AGENT_NAME </strong></p>
                                                </div>
                                                <div class="text-center">
                                                    <a class="theme_btn red_btn no_sidebar_active" href="{{ url('admin/settings') }}">{{'Cancel'}}</a>
                                                    <button class="theme_btn">Save</button>
                                                </div>
                                              </div>
                                            <div class="col-lg-3"></div>
                                        </div>
                                      </form>

                                    </div>
                                  </div>
                                </div>
                                
                                <div class="card mb-2">
                                  <div class="card-header p-2" id="heading3">
                                    <h5 class="mb-0">
                                      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                        Intro - 2
                                      </button>
                                    </h5>
                                  </div>
                                  <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordion">
                                    <div class="card-body p-0">
                                      
                                      <form name="intro-two-form">
                                        <div class="row">
                                            <div class="col-lg-3"></div>
                                              <div class="col-lg-6">
                                                <div class="">
                                                  <div class="form-group">
                                                    <label>{{'Line 1'}}</label>
                                                    <input type="text" name="intro_two_line_1" class="form-control icon_control" value="{{$setting['intro_2']['line_1'] ?? ''}}">
                                                  </div>
                                                  <div class="form-group">
                                                      <label>{{'Line 2'}}</label>
                                                      <input type="text" class="form-control icon_control" name="intro_two_line_2" value="{{$setting['intro_2']['line_2'] ?? ''}}">
                                                  </div>

                                                </div>
                                                <div class="text-center">
                                                    <a class="theme_btn red_btn no_sidebar_active" href="{{ url('admin/settings') }}">{{'Cancel'}}</a>
                                                    <button class="theme_btn">Save</button>
                                                </div>
                                              </div>
                                            <div class="col-lg-3"></div>
                                        </div>
                                      </form>

                                    </div>
                                  </div>
                                </div>

                                <div class="card mb-2">
                                  <div class="card-header p-2" id="heading4">
                                    <h5 class="mb-0">
                                      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                        Intro - 3
                                      </button>
                                    </h5>
                                  </div>
                                  <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordion">
                                    <div class="card-body p-0">
                                      
                                      <form name="intro-offer-range-form">
                                        <div class="row">
                                            <div class="col-lg-3"></div>
                                              <div class="col-lg-6">
                                                <div class="">
                                                  <div class="form-group">
                                                    <label>{{'Line 1'}}</label>
                                                    <input type="text" name="intro_offer_line_1" class="form-control icon_control" value="{{$setting['intro_offer_range']['line_1'] ?? ''}}">
                                                  </div>
                                                  <div class="form-group">
                                                      <label>{{'Line 2'}}</label>
                                                      <input type="text" class="form-control icon_control" name="intro_offer_line_2" value="{{$setting['intro_offer_range']['line_2'] ?? ''}}">
                                                  </div>
                                                  <div class="form-group">
                                                      <label>{{'Option 1'}}</label>
                                                      <input type="text" class="form-control icon_control" name="intro_offer_option_1" value="{{$setting['intro_offer_range']['option_1'] ?? ''}}">
                                                  </div>
                                                  <div class="form-group">
                                                      <label>{{'Option 2'}}</label>
                                                      <input type="text" class="form-control icon_control" name="intro_offer_option_2" value="{{$setting['intro_offer_range']['option_2'] ?? ''}}">
                                                  </div>

                                                </div>
                                                <div class="text-center">
                                                    <a class="theme_btn red_btn no_sidebar_active" href="{{ url('admin/settings') }}">{{'Cancel'}}</a>
                                                    <button class="theme_btn">Save</button>
                                                </div>
                                              </div>
                                            <div class="col-lg-3"></div>
                                        </div>
                                      </form>

                                    </div>
                                  </div>
                                </div>

                                <div class="card mb-2">
                                  <div class="card-header p-2" id="heading5">
                                    <h5 class="mb-0">
                                      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                        Assist Me Pop-up
                                      </button>
                                    </h5>
                                  </div>
                                  <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordion">
                                    <div class="card-body p-0">
                                      
                                      <form name="assist-me-form">
                                        <div class="row">
                                            <div class="col-lg-3"></div>
                                              <div class="col-lg-6">
                                                <div class="">
                                                  <div class="form-group">
                                                    <label>{{'Text'}}</label>
                                                    <textarea rows="3" name="assist_text" class="form-control icon_control">{{$setting['assist_me']['text'] ?? ''}}</textarea>
                                                  </div>
                                                  <div class="form-group">
                                                      <label>{{'Button Text'}}</label>
                                                      <input type="text" class="form-control icon_control" name="assist_button_text" value="{{$setting['assist_me']['button_text'] ?? ''}}">
                                                  </div>

                                                </div>
                                                <div class="text-center">
                                                    <a class="theme_btn red_btn no_sidebar_active" href="{{ url('admin/settings') }}">{{'Cancel'}}</a>
                                                    <button class="theme_btn">Save</button>
                                                </div>
                                              </div>
                                            <div class="col-lg-3"></div>
                                        </div>
                                      </form>

                                    </div>
                                  </div>
                                </div>

                                <div class="card mb-2">
                                  <div class="card-header p-2" id="heading6">
                                    <h5 class="mb-0">
                                      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                                        Thank You Page
                                      </button>
                                    </h5>
                                  </div>
                                  <div id="collapse6" class="collapse" aria-labelledby="heading6" data-parent="#accordion">
                                    <div class="card-body p-0">
                                      
                                      <form name="offer-approved-form">
                                        <div class="row">
                                            <div class="col-lg-3"></div>
                                              <div class="col-lg-6">
                                                <div class="">
                                                  <div class="form-group">
                                                    <label>{{'Line 1'}}</label>
                                                    <input type="text" name="offer_app_line_1" class="form-control icon_control" value="{{$setting['offer_approved']['line_1'] ?? ''}}">
                                                  </div>
                                                  <div class="form-group">
                                                    <label>{{'Line 2'}}</label>
                                                    <input type="text" name="offer_app_line_2" class="form-control icon_control" value="{{$setting['offer_approved']['line_2'] ?? ''}}">
                                                  </div>
                                                  <div class="form-group">
                                                      <label>{{'Button Text'}}</label>
                                                      <input type="text" class="form-control icon_control" name="offer_app_btn_txt" value="{{$setting['offer_approved']['button_text'] ?? ''}}">
                                                  </div>

                                                </div>
                                                <div class="text-center">
                                                    <a class="theme_btn red_btn no_sidebar_active" href="{{ url('admin/settings') }}">{{'Cancel'}}</a>
                                                    <button class="theme_btn">Save</button>
                                                </div>
                                              </div>
                                            <div class="col-lg-3"></div>
                                        </div>
                                      </form>

                                    </div>
                                  </div>
                                </div>

                                <div class="card mb-2">
                                  <div class="card-header p-2" id="heading7">
                                    <h5 class="mb-0">
                                      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                                        Buyer Agent Offer
                                      </button>
                                    </h5>
                                  </div>
                                  <div id="collapse7" class="collapse" aria-labelledby="heading7" data-parent="#accordion">
                                    <div class="card-body p-0">
                                                                            
                                      <form name="agent-form">
                                        <div class="row">
                                            <div class="col-lg-3"></div>
                                              <div class="col-lg-6">
                                                <div class="">
                                                  <div class="form-group">
                                                    <label>{{'Line 1'}}</label>
                                                    <input type="text" name="agent_line_1" class="form-control icon_control" value="{{$setting['text_agent']['line_1'] ?? ''}}">
                                                  </div>
                                                  <div class="form-group">
                                                    <label>{{'Line 2'}}</label>
                                                    <textarea rows="4" name="agent_line_2" class="form-control icon_control">{{$setting['text_agent']['line_2'] ?? ''}}</textarea>
                                                  </div>
                                                  {{-- <div class="form-group">
                                                    <label>{{'Line 3'}}</label>
                                                    <input type="text" name="agent_line_3" class="form-control icon_control" value="{{$setting['text_agent']['line_3'] ?? ''}}">
                                                  </div>
                                                  <div class="form-group">
                                                    <label>{{'Sub Title 1'}}</label>
                                                    <input type="text" name="agent_title_1" class="form-control icon_control" value="{{$setting['text_agent']['title_1'] ?? ''}}">
                                                  </div>
                                                  <div class="form-group">
                                                    <label>{{'Sub Title 2'}}</label>
                                                    <input type="text" name="agent_title_2" class="form-control icon_control" value="{{$setting['text_agent']['title_2'] ?? ''}}">
                                                  </div>
                                                  <div class="form-group">
                                                    <label>{{'Sub Title 3'}}</label>
                                                    <input type="text" name="agent_title_3" class="form-control icon_control" value="{{$setting['text_agent']['title_3'] ?? ''}}">
                                                  </div> --}}
                                                  <div class="form-group">
                                                      <label>{{'Button Text'}}</label>
                                                      <input type="text" class="form-control icon_control" name="agent_btn_txt" value="{{$setting['text_agent']['button_text'] ?? ''}}">
                                                  </div>
                                                  <p class="text-center m-0 p-0"><strong>Note*</strong> Please Don't remove<strong> SELLER_AGENT_NAME </strong></p>
                                                </div>
                                                <div class="text-center">
                                                    <a class="theme_btn red_btn no_sidebar_active" href="{{ url('admin/settings') }}">{{'Cancel'}}</a>
                                                    <button class="theme_btn">Save</button>
                                                </div>
                                              </div>
                                            <div class="col-lg-3"></div>
                                        </div>
                                      </form>

                                    </div>
                                  </div>
                                </div>

                                <div class="card mb-2">
                                  <div class="card-header p-2" id="heading8">
                                    <h5 class="mb-0">
                                      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                                        Buyer Agent Offer Not Approved
                                      </button>
                                    </h5>
                                  </div>
                                  <div id="collapse8" class="collapse" aria-labelledby="heading8" data-parent="#accordion">
                                    <div class="card-body p-0">
                                      
                                      <form name="offer-not-approved-form">
                                        <div class="row">
                                            <div class="col-lg-3"></div>
                                              <div class="col-lg-6">
                                                <div class="">
                                                  <div class="form-group">
                                                    <label>{{'Line 1'}}</label>
                                                    <input type="text" name="agent_not_approved_text" class="form-control icon_control" value="{{$setting['offer_not_approved']['line'] ?? ''}}">
                                                  </div>
                                                  <div class="form-group">
                                                      <label>{{'Button Text'}}</label>
                                                      <input type="text" class="form-control icon_control" name="agent_not_approved_btn" value="{{$setting['offer_not_approved']['button_text'] ?? ''}}">
                                                  </div>

                                                </div>
                                                <div class="text-center">
                                                    <a class="theme_btn red_btn no_sidebar_active" href="{{ url('admin/settings') }}">{{'Cancel'}}</a>
                                                    <button class="theme_btn">Save</button>
                                                </div>
                                              </div>
                                            <div class="col-lg-3"></div>
                                        </div>
                                      </form>

                                    </div>
                                  </div>
                                </div>

                              </div>
                          </div>
                      </div>

                      <div class="tab-pane fade show" id="general-setting" role="tabpanel" aria-labelledby="general-setting-tab">
                          <div class="inner_tab">
                              <form name="general-form">
                              <div class="row">
                                  <div class="col-lg-3"></div>
                                    <div class="col-lg-6">
                                      <div class="">
                                      <label>{{'Home Logo'}}</label>
                                      <div class="text-center">
                                        <div class="profile_box">
                                            <div class="square_pic">
                                                <img id="home_img" src="@if(!empty($setting['general_setting']['home_logo'])) {{ url('public/uploads/'.Config::get('constant.images_dirs.SETTING').'/'.$setting['general_setting']['home_logo']) }} @else {{ url('public/images/user.png') }} @endif">
                                                <input type="hidden" id="home_img_tmp" value="{{ url('public/images/user.png') }}">
                                            </div>
                                            <div  class="upload_pic_link">
                                                <a href="javascript:void(0)">
                                                {{'Upload Image'}}<input type="file" id="home_upload_profile" name="home_logo" accept="image/jpeg,image/png"></a>
                                            </div>
                                        </div>
                                      </div>

                                      <label>{{'Admin Logo'}}</label>
                                      <div class="text-center">
                                        <div class="profile_box">
                                            <div class="square_pic">
                                                <img id="img" src="@if(!empty($setting['general_setting']['admin_logo'])) {{ url('public/uploads/'.Config::get('constant.images_dirs.SETTING').'/'.$setting['general_setting']['admin_logo']) }} @else {{ url('public/images/user.png') }} @endif">
                                                <input type="hidden" id="img_tmp" value="{{ url('public/images/user.png') }}">
                                            </div>
                                            <div  class="upload_pic_link">
                                                <a href="javascript:void(0)">
                                                {{'Upload Image'}}<input type="file" id="upload_profile" name="admin_logo" accept="image/jpeg,image/png"></a>
                                            </div>
                                        </div>
                                      </div>

                                      <label>{{'Email Logo'}}</label>
                                      <div class="text-center">
                                        <div class="profile_box">
                                            <div class="square_pic">
                                                <img id="email_img" src="@if(!empty($setting['general_setting']['email_logo'])) {{ url('public/uploads/'.Config::get('constant.images_dirs.SETTING').'/'.$setting['general_setting']['email_logo']) }} @else {{ url('public/images/user.png') }} @endif">
                                                <input type="hidden" id="email_img_tmp" value="{{ url('public/images/user.png') }}">
                                            </div>
                                            <div  class="upload_pic_link">
                                                <a href="javascript:void(0)">
                                                {{'Upload Image'}}<input type="file" id="email_upload_profile" name="email_logo" accept="image/jpeg,image/png"></a>
                                            </div>
                                        </div>
                                      </div>

                                      <label>{{'Login Page Logo'}}</label>
                                      <div class="text-center">
                                        <div class="profile_box">
                                            <div class="square_pic">
                                                <img id="login_img" src="@if(!empty($setting['general_setting']['login_logo'])) {{ url('public/uploads/'.Config::get('constant.images_dirs.SETTING').'/'.$setting['general_setting']['login_logo']) }} @else {{ url('public/images/user.png') }} @endif">
                                                <input type="hidden" id="login_img_tmp" value="{{ url('public/images/user.png') }}">
                                            </div>
                                            <div  class="upload_pic_link">
                                                <a href="javascript:void(0)">
                                                {{'Upload Image'}}<input type="file" id="login_upload_profile" name="login_logo" accept="image/jpeg,image/png"></a>
                                            </div>
                                        </div>
                                      </div>
                                        
                                      </div>
                                      <div class="text-center">
                                          <a class="theme_btn red_btn no_sidebar_active" href="{{ url('admin/settings') }}">{{'Cancel'}}
                                          </a><button class="theme_btn">Save</button>
                                      </div>
                                    </div>
                                  <div class="col-lg-3"></div>
                              </div>
                              </form>
                          </div>
                      </div>

                      <div class="tab-pane fade show" id="seo-setting" role="tabpanel" aria-labelledby="seo-setting-tab">
                          <div class="inner_tab">
                              <form name="seo-form">
                              <div class="row">
                                  <div class="col-lg-3"></div>
                                    <div class="col-lg-6">
                                      <div class="">
                                        <label>{{'Image'}}</label>
                                        <div class="text-center">
                                          <div class="profile_box">
                                              <div class="square_pic">
                                                  <img id="seo_img" src="@if(!empty($setting['seo_data']['banner_image'])) {{ url('public/uploads/'.Config::get('constant.images_dirs.SETTING').'/'.$setting['seo_data']['banner_image']) }} @else {{ url('public/images/user.png') }} @endif">
                                                  <input type="hidden" id="seo_img_tmp" value="{{ url('public/images/user.png') }}">
                                              </div>
                                              <div  class="upload_pic_link">
                                                  <a href="javascript:void(0)">
                                                  {{'Upload Image'}}<input type="file" id="seo_upload_profile" name="seo_banner_image" accept="image/jpeg,image/png"></a>
                                              </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label>{{'Title'}} *</label>
                                          <input type="text" id="seo_title" name="seo_title" class="form-control icon_control" value="{{$setting['seo_data']['title'] ?? ''}}">
                                        </div>
                                        <div class="form-group">
                                            <label>{{'Description'}}</label>
                                            <textarea class="form-control icon_control" name="seo_description" id="seo_description" rows="3">{{$setting['seo_data']['desc'] ?? ''}}</textarea>
                                        </div>

                                      </div>
                                      <div class="text-center">
                                          <a class="theme_btn red_btn no_sidebar_active" href="{{ url('admin/settings') }}">{{'Cancel'}}
                                          </a><button class="theme_btn">Save</button>
                                      </div>
                                    </div>
                                  <div class="col-lg-3"></div>
                              </div>
                              </form>
                          </div>
                      </div>

                      <div class="tab-pane fade show" id="smtp-details" role="tabpanel" aria-labelledby="smtp-details-tab">
                          <div class="inner_tab">
                              <form name="smtp-form">
                              <div class="row">
                                  <div class="col-lg-3"></div>
                                    <div class="col-lg-6">
                                      <div class="">
                                        
                                        <div class="form-group">
                                          <label>{{'Mailer'}} *</label>
                                          <input type="text" id="mailer" name="mailer" class="form-control icon_control" placeholder="For e.g: smtp" value="{{$setting['smtp']['mailer'] ?? ''}}">
                                        </div>
                                        <div class="form-group">
                                          <label>{{'Host'}} *</label>
                                          <input type="text" id="host" name="host" class="form-control icon_control" placeholder="For e.g: smtp.gmail.com" value="{{$setting['smtp']['host'] ?? ''}}">
                                        </div>
                                        <div class="form-group">
                                          <label>{{'Port'}} *</label>
                                          <input type="text" id="port" name="port" class="form-control icon_control" placeholder="For e.g: 587" value="{{$setting['smtp']['port'] ?? ''}}">
                                        </div>
                                        <div class="form-group">
                                          <label>{{'Email'}} *</label>
                                          <input type="text" id="email" name="email" class="form-control icon_control" value="{{$setting['smtp']['email'] ?? ''}}">
                                        </div>
                                        <div class="form-group">
                                          <label>{{'Password'}} *</label>
                                          <input type="text" id="password" name="password" class="form-control icon_control" value="{{$setting['smtp']['password'] ?? ''}}">
                                        </div>
                                        <div class="form-group">
                                          <label>{{'Encription'}} *</label>
                                          <input type="text" id="encript" name="encript" class="form-control icon_control" placeholder="For e.g: tls" value="{{$setting['smtp']['enc'] ?? ''}}">
                                        </div>

                                      </div>
                                      <div class="text-center">
                                          <a class="theme_btn red_btn no_sidebar_active" href="{{ url('admin/settings') }}">{{'Cancel'}}
                                          </a><button class="theme_btn">Save</button>
                                      </div>
                                    </div>
                                  <div class="col-lg-3"></div>
                              </div>
                              </form>
                          </div>
                      </div>

                </div>

            </div>
        </div>
      </div>
  </div>
          
   @if ($errors->any())
        <div class="alert alert-danger">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (\Session::has('success'))
        <div class="alert alert-success">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif

    @php                                     
      $_REQUEST['data'] = (isset($_REQUEST['data']) && !empty($_REQUEST['data']))?$_REQUEST['data']:'profile';
    @endphp

<!-- End Content Body -->
@endsection
@push('custom-styles')
@endpush
@push('datatable-scripts')
<!-- Include this Page JS -->
<script src="{{ url('public/bower_components/ckeditor/ckeditor.js') }}"></script>

<script type="text/javascript" src="{{ url('public/js/dashboard/settings.js') }}"></script>
@endpush