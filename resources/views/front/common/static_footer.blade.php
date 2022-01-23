            <footer>
                <div class="container text-center">
                    <div class="link_section">
                        <ul>
                            <li><a href="https://cityworthhomes.com/about-us/" @if(Request::is('about_us')) class="active" @endif>About</a></li>
                            <li><a href="{{url('terms-condition')}}" @if(Request::is('terms-condition')) class="active" @endif>Terms & Condition</a></li>
                            <li><a href="{{url('privacy-policy')}}" @if(Request::is('privacy-policy')) class="active" @endif>Privacy Policy</a></li>
                            <li><a href="https://cityworthhomes.com/contact-cityworth/" @if(Request::is('contact_us')) class="active" @endif>Contact Us</a></li>
                        </ul>
                    </div>
                    <p class="copy">Copyright © {{date('Y')}}, Developed by Technource</p>
                </div>
            </footer>
        </div>

        <script type="text/javascript" src="{{ url('public/js/all.min.js') }}"></script>
        <script type="text/javascript" src="{{url('/public/js/jquery-3.4.1.min.js')}}"></script>
        <script type="text/javascript" src="{{url('/public/js/owl.carousel.js')}}"></script>
        <script type="text/javascript" src="{{url('/public/js/wow.min.js')}}"></script>
        <script type="text/javascript" src="{{url('/public/js/popper.min.js')}}"></script>
        <script type="text/javascript" src="{{url('/public/js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{url('/public/js/front.js')}}"></script>
        {{-- <script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script> --}}
        <script src="{{ url('public/js/toastr.min.js') }}"></script>

        <script src="{{ url('public/js/jquery.validate.js') }}"></script>
        <script src="{{ url('public/js/custom_validation_msg.js') }}"></script> 
        <script type="text/javascript" src="https://rawcdn.githack.com/SochavaAG/example-mycode/master/pens/calculator/plugins/rangeslider/rangeslider.min.js"></script>
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

    </body>