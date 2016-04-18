<!DOCTYPE html>
<head>
    <title>Giới thiệu - 123doc</title>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
    <meta http-equiv="content-style-type" content="text/css" />
    <link rel="stylesheet" type="text/css" href="http://static.store123doc.com:81/static_v2/web_v2//common/css/index.min.css?v=1002"/>
    <link rel="stylesheet" type="text/css" href="http://static.store123doc.com:81/static_v2/web_v2//common/css/style.min.css?v=1002"/>
    <link type="image/x-icon" rel="shortcut icon" href="http://media.store123doc.com:8080/images/layout/favicon.ico"/>
    <script type="text/javascript" src="http://static.store123doc.com:81/static_v2/web_v2//common/js/jquery-1.10.2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://static.store123doc.com:81/static_v2/web_v2/global/css/search.css"/>
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
    <link rel="stylesheet" type="text/css" href="http://static.store123doc.com:81/static_v2/web_v2/global/css/search.css"/>
</head>
<body>
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
    </header>