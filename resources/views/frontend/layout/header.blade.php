<?php 
    global $in, $display;

    if (Session::has('error') || strlen($errors->first('useremail')) > 0 || strlen($errors->first('password')) > 0) {
        $modalOpen = 'modal-open';
        $style = 'padding-right: 17px;';
        $in = 'in';
        $display = 'display:block;';
    } else {
        $modalOpen = '';
        $style = '';
        $in = '';
        $display = '';
    }
?>
<!DOCTYPE HTML>
<html>
<head>
<title>
    @if (isset($data['title']))
        {{$data['title']}}
    @endif
</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="{{ URL::asset('common/css/bootstrap.css') }}" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:700,500,400,300">
<link href="{{ URL::asset('frontend/css/style.css') }}" type="text/css" rel="stylesheet">
<link href="{{ URL::asset('account/css/style.css') }}" type="text/css" rel="stylesheet">
<script src="{{ URL::asset('common/js/jquery-1.9.1.js') }}"></script>
<script src="{{ URL::asset('common/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('common/js/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript" src="{{asset('common/js/moment.min.js')}}"></script>

<script type="text/javascript" src="{{asset('common/js/daterangepicker.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('common/css/daterangepicker.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('common/font-awesome/4.2.0/css/font-awesome.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('common/css/styles.css')}}" />
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="{{asset('frontend/js/script.js')}}"></script>

</head>
<body class="{{$modalOpen}}" style="{{$style}}">
	<div class="theme_navigation">
        <div class="container">
            <div id="navbar-main">
                <div class="col-xs-4 block-1">
                    <div class="element">
                        <a href="/"><img class="hidden-xs hidden-sm" src="{{ asset('frontend/images/Logo.png') }}" alt=""></a>
                        <img class="visible-xs visible-sm menu-button" src="{{ asset('frontend/images/mobile-menu-button.png') }}" alt="">
                        <a class="search-button" href="#"><img class="visible-xs visible-sm" src="{{ asset('frontend/images/mobile-search-button.png') }}" alt=""></a>
                    </div>
                    <div class="element">
                        <a href="#"><img class="hidden-xs hidden-sm" src="{{ asset('frontend/images/nap-tien.png') }}" alt=""></a>
                        <a href="#"><img class="hidden-xs hidden-sm" src="{{ asset('frontend/images/upload-logo.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-xs-4 block-2">
                    <div class="searchBox hidden-xs hidden-sm">
                        <input type="text" name="search" placeholder="Tìm kiếm ...">
                        <a href="javascript:void(0)" id="searchButton">
                            <i class="icon icon_search"></i>
                        </a>
                    </div>
                </div>
                <div class="col-xs-4 block-3">
                    <a class="button hidden-xs hidden-sm" href="/dang-nhap/">Đăng nhập</a>
                    <a class="button hidden-xs hidden-sm" href="/dang-ky/">Đăng ký</a>
                    <a class="notificationButton" href="#"><img class="hidden-xs hidden-sm" src="{{ asset('frontend/images/rank.png') }}" alt=""></a>
                    <a class="notificationButton" href="#"><img class="hidden-xs hidden-sm" src="{{ asset('frontend/images/icon-thongbao.png') }}" alt=""></a>
                </div>
            </div>
        </div>
    </div>