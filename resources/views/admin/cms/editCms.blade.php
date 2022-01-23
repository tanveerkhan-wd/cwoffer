@extends('layout.app_with_login')
@section('title','Edit CMS')
@section('script', url('public/js/dashboard/cms.js'))
@section('content')	
<!-- Page Content  -->
<div class="section">
	<div class="container-fluid">
        <div class="container-fluid">
            <h2 class="title"><a href="{{url('/admin/settings')}}"><span>{{'Settings'}}</span></a> > <a href="{{url('/admin/settings')}}"><span> {{' CMS '}} </span></a> >  {{'Edit'}}</h2>
            <div class="white_box pt-3">
                <div class="theme_tab">
                    <form name="add-cms-form">
                        <div class="row">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6">
                                <input type="hidden" name="pkCat" id="pkCat" value="{{$data->cms_id}}">
                                <div class="form-group">
                                    <label>{{'Title'}}</label>
                                    <input type="text" name="title" class="form-control icon_control" value="{{$data->cms_title}}">
                                </div>
                                <div class="form-group">
                                    <label>{{'Body'}}</label>
                                    <textarea class="form-control icon_control" name="body" id="body" rows="3">{{$data->cms_description}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>{{'SEO Meta Title'}}</label>
                                    <input type="text" name="seo_meta_title" id="seo_meta_title" class="form-control icon_control" value="{{$data->seo_meta_title}}">
                                </div>
                                <div class="form-group">
                                    <label>{{'SEO Meta Description'}}</label>
                                    <textarea class="form-control icon_control" name="seo_meta_description" id="seo_meta_description" rows="3">{{$data->seo_meta_description}}</textarea>
                                </div>
                                <div class="text-center modal_btn ">
                                    <button type="submit" class="theme_btn">{{'Submit'}}</button>
                                    <a class="theme_btn red_btn ajax_request no_sidebar_active" data-slug="admin/settings" href="{{ url('admin/settings') }}">{{'Cancel'}}</a>
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

          
@endsection

@push('custom-scripts')
<script type="text/javascript">
    $(function() {
      showLoader(false);
    });
</script>
<!-- Include this Page JS -->
{{-- <script src="{{ url('public/bower_components/ckeditor/ckeditor.js') }}"></script> --}}
<script src="https://cdn.ckeditor.com/4.15.0/basic/ckeditor.js"></script>

<script type="text/javascript" src="{{ url('public/js/dashboard/cms.js') }}"></script>
@endpush