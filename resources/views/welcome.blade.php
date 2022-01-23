<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="icon" type="image/x-icon" href="{{url('public/ic_fevicon.png')}}">
        <title>{{$setting['seo_data']['title']}}</title>
        <meta name="csrf-token" content="{{ @csrf_token() }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:title" content="{{$setting['seo_data']['title']}}">
        <meta name="description" content="{{$setting['seo_data']['desc']}}">
        <meta property="og:description" content="{{$setting['seo_data']['desc']}}">
        <meta property="og:image" content="{{url('public/uploads/'.Config::get('constant.images_dirs.SETTING'))}}/{{$setting['seo_data']['banner_image'] ?? ''}}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{url('/public/css/bootstrap.min.css')}}">
        {{-- <link rel="stylesheet" type="text/css" href="{{url('/public/css/fontawesome.css')}}"> --}}
        <link rel="stylesheet" type="text/css" href="{{url('/public/css/animate.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('/public/css/front_css.css')}}">

    </head>
    <body>
        <div class="inner_container">
            <header class="fixed-top">
                <div class="container">
                    <div class="logo">
                        <img src="{{ url('public/uploads/'.Config::get('constant.images_dirs.SETTING'))}}/{{$setting['logo_image'] ?? ''}}" alt="City Worth Logo" class="wow zoomIn">
                    </div>
                </div>
            </header>
            <div class="home_section">
                <div class="banner_section">
                    <div class="container ">
                        <div class="right_shape_design">
                            <div class="row flex-md-row-reverse align-items-center">
                                <div class="col-md-5">
                                    <div class="banner_image">
                                        <img src="{{ url('public/uploads/'.Config::get('constant.images_dirs.SETTING'))}}/{{$setting['banner_image'] ?? ''}}" class="wow zoomIn">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <input type="hidden" name="property_id">
                                    <div class="banner_content">
                                        <h1>{{$setting['tagline_1'] ?? ''}}</h1>
                                        <p>{{$setting['tagline_2'] ?? ''}}</p>
                                        <div class="suggestion_list">
                                            <div class="search_box input-group wow slideInLeft">
                                                <button disabled><img src="{{url('/public/images/ic_search.PNG')}}"></button>
                                                <input type="text" name="search_propert" id="search_propert" class="form-control">
                                                
                                            </div>
                                            <ul class="list-group suggestion">
                                                    
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <button class="theme_btn wow zoomIn serach-propert">{{$setting['button_text'] ?? 'Get Started'}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer>
                <div class="container text-center">
                    <div class="link_section">
                        <ul>
                            <li><a href="https://cityworthhomes.com/about-us/">About</a></li>
                            <li><a href="{{url('terms-condition')}}">Terms & Condition</a></li>
                            <li><a href="{{url('privacy-policy')}}">Privacy Policy</a></li>
                            <li><a href="https://cityworthhomes.com/contact-cityworth/">Contact Us</a></li>
                        </ul>
                    </div>
                    <p class="copy">Copyright © {{date('Y')}}, Developed by Technource</p>
                </div>
            </footer>
        </div>

        {{-- <script type="text/javascript" src="{{url('/public/js/all.js')}}"></script> --}}
        <script type="text/javascript" src="{{url('/public/js/jquery-3.4.1.min.js')}}"></script>
        <script type="text/javascript" src="{{url('/public/js/wow.min.js')}}"></script>
        <script type="text/javascript" src="{{url('/public/js/popper.min.js')}}"></script>
        <script type="text/javascript" src="{{url('/public/js/bootstrap.min.js')}}"></script>
        <script type="text/javascript">
            var base_url = '{{url('/')}}';
            wow = new WOW({
                animateClass: 'animated',
                offset:       100,
                callback:     function(box) {
                  console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
                }
            });
            wow.init();

            $(window).scroll(function() {
                if ($(document).scrollTop() > 85) {
                     $("header.fixed-top").addClass("top-nav-collapse");
                }
                else {
                    $("header.fixed-top").removeClass("top-nav-collapse");
                }
            });
        </script>
        <script type="text/javascript" src="{{url('/public/js/front/search_propert.js')}}"></script>
    </body>
</html>
