    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ @csrf_token() }}">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{$data->cms_title ?? 'Cw Offer'}}</title>
        <link rel="icon" type="image/x-icon" href="{{url('public/ic_fevicon.png')}}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://rawcdn.githack.com/SochavaAG/example-mycode/master/_common/css/reset.css">
        <link rel="stylesheet" type="text/css" href="https://rawcdn.githack.com/SochavaAG/example-mycode/master/pens/calculator/plugins/rangeslider/rangeslider.css">
        <link rel="stylesheet" type="text/css" href="{{url('/public/css/bootstrap.min.css')}}">
        {{-- <link rel="stylesheet" type="text/css" href="{{url('/public/css/fontawesome.css')}}"> --}}
        <link rel="stylesheet" type="text/css" href="{{url('/public/css/animate.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('/public/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('/public/css/owl.theme.default.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('/public/css/front_css.css')}}">
        <link rel="stylesheet" href="{{ url('public/css/toastr.min.css') }}">
        
        {{-- <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css"> --}}
         <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    </head>
    <body>