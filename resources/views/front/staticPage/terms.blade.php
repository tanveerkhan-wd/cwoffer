<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('front.common.static_header')
    	<div class="inner_container">
            <header class="fixed-top">
                <div class="container">
                    <div class="logo">
                        <a href="{{url('/')}}"><img src="{{ url('public/uploads/'.Config::get('constant.images_dirs.SETTING').'/'.$homeData->text_value) }}" alt="City Worth Logo" class="wow zoomIn"></a>
                    </div>
                </div>
            </header>
            <div class="static_page">
				<div class="static_banner bg" style="background-image: url(http://54.173.0.233/public/images/ic_banner_shape.PNG);">
					<div class="container">
						<h1 class="wow zoomIn">{{$data->cms_title}}</h1>
					</div>
				</div>
				<div class="static_container">
					<div class="container">
						{{-- <h1 class="title">Header Name</h1>
						
						<h2 class="sub_title">Sub Header Name</h2>
						 --}}
                         {!! $data->cms_description !!}
					</div>
				</div>
			</div>
            @include('front.common.static_footer')
    
</html>


