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
</head>
<body class="{{$modalOpen}}" style="{{$style}}">
<header>
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-sm-4">
				<div class="divlogo"><img src="{{ URL('/') }}/frontend/images/logo.jpg"/></div>
			</div>
			<div class="col-md-5 col-sm-4 col_thongbao">
				<div class="listthongbao">
					<ul class="list-group">
						<li class="list-group-item">
							<a>Hướng dẫn download tài liệu</a>
						</li>
						<li class="list-group-item">
							<a>Hướng dẫn download tài liệu</a>
						</li>
						<li class="list-group-item">
							<a>Hướng dẫn download tài liệu</a>
						</li>
						
					</ul>
				</div>
			</div>
            <div class="col-md-2">
                <div><a class="naptien" href="#">Nạp tiền</a></div>
                
                <div><a class="tailen" href="/upload-tai-lieu">Tải lên</a></div>
            </div>
		</div>
	</div>
	<div class="navbar navbar-default theme_navigation">
            <div class="container">
                <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                 </div>
                <div class="navbar-collapse collapse" id="navbar-main">
                    <ul class="nav navbar-nav">
                    	<li class="active"><a class="active" href="#">Trang chủ</a></li>
                    	<li><a href="#">Tin tức</a></li>
                        <li><a href="#">Diễn đàn</a></li>
                        <li><a href="#">Câu hỏi thường gặp</a></li>
                    </ul>
                    <form class="navbar-form navbar-right" role="search">
                        <div class="form-group">
                          <input type="text" class="form-control" placeholder="Tìm kiếm">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                      </form>
                </div>
            </div>
    </div>
    <div class="navbar-login">
        <div class="container">
            <div class="col-sm-6 pull-right" style="text-align:right;margin-right:8px;">
                @if (\Auth::check())
                <p>Xin chào {{\Auth::user()->name}}</p><a href="{{URL('/')}}/dang-xuat/">Đăng xuất</a>
                @else
                Vui lòng 
                <a href="/dang-nhap/" data-toggle="modal" data-target="#signin" class="link-title-info">
                    <span style="color:#f00;"><i class="fa fa-sign-in"></i>Đăng nhập</span>
                </a> để download hoặc 
                <a href="/dang-ky/">đăng ký</a> tài khoản mới
                @endif
            </div>
        </div>
    </div>
</header>
<div class="clear-fix"></div>