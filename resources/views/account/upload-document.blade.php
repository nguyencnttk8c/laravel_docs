<!DOCTYPE HTML>
<html>
<head>
    <title></title>
    <meta name="" content="">
    <link rel="stylesheet"  type="text/css" href="{{asset('account/css/bootstrap.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{asset('account/css/style.css')}}" >
    <script src="{{asset('account/js/jquery-1.9.1.js')}}"></script>
    <script src="{{asset('account/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('account/js/bootstrap-datepicker.js')}}"></script>
</head>
<body>
<header>
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-4">
                <div class="divlogo"><img src="{{asset('account/images/logo.jpg')}}"/></div>
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

                <div><a class="tailen" href="uploadtailieu.html">Tải lên</a></div>
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
                Vui lòng <a href="#" data-toggle="modal" data-target="#signin" class="link-title-info"><span style="color:#f00;"><i class="fa fa-sign-in"></i>Đăng nhập</span></a> để download hoặc <a href="dangky.html">đăng ký</a> tài khoản mới
            </div>
        </div>
    </div>
</header>
<div class="clear-fix"></div>
<div class="container mid_content">
<div class="row">
<div class="col-md-3 col-sx-4"">
<div class="well">
<h3 class="titel">Danh mục tài liệu</h3>
<div class="listcategory" >
<ul class="listParentCate">
<li class="dropdown">
    <a href="#" class="dropdown-toggle" title="Giáo dục đào tạo" data-toggle="dropdown">Giáo dục - Đào tạo</a>
    <ul class="dropdown-menu theme_nav_dropdown">
        <li ><a  href="#">mầm non- cấp 1</a>
            <ul class="">
                <li><a href="#">lớp 3-12 tháng tuổi</a></li>
                <li><a href="#">Lớp 12-24 tháng tuổi </a></li>
                <li><a href="#">Lớp 24-36 tháng tuổi </a></li>
                <li><a href="#">Lớp 4 tuổi</a></li>
                <li><a href="#">Lớp 5 tuổi </a></li>
                <li><a href="#">Lớp 1</a></li>
                <li><a href="#">Lớp 2 </a></li>
                <li><a href="#">Lớp 3 </a></li>
                <li><a href="#">Lớp 4</a></li>
                <li><a href="#">Lớp 5</a></li>
            </ul>
        </li>
        <li><a href="#">Trung học cơ sở</a>
            <ul class="">
                <li><a href="#">Lớp 6</a>
                    <ul class="">
                        <li><a href="#">Toán học</a></li>
                        <li><a href="#">Văn học</a></li>
                        <li><a href="#">Anh văn</a></li>
                        <li><a href="#">Lịch sử</a></li>
                        <li><a href="#">Địa lý</a></li>
                        <li><a href="#">Sinh học</a></li>
                        <li><a href="#">Vật lý</a></li>
                        <li><a href="#">Kiến thức nâng cao</a></li>
                    </ul>
                </li>
                <li><a href="#">Lớp 7 </a>
                    <ul class="">
                        <li><a href="#">Toán học</a></li>
                        <li><a href="#">Văn học</a></li>
                        <li><a href="#">Anh văn</a></li>
                        <li><a href="#">Lịch sử</a></li>
                        <li><a href="#">Địa lý</a></li>
                        <li><a href="#">Sinh học</a></li>
                        <li><a href="#">Vật lý</a></li>
                        <li><a href="#">Kiến thức nâng cao</a></li>
                    </ul>
                </li>
                <li><a href="#">Lớp 8</a>
                    <ul class="">
                        <li><a href="#">Toán học</a></li>
                        <li><a href="#">Văn học</a></li>
                        <li><a href="#">Anh văn</a></li>
                        <li><a href="#">Lịch sử</a></li>
                        <li><a href="#">Địa lý</a></li>
                        <li><a href="#">Sinh học</a></li>
                        <li><a href="#">Vật lý</a></li>
                        <li><a href="#">Kiến thức nâng cao</a></li>
                    </ul>
                </li>
                <li><a href="#">Lớp 9</a>
                    <ul class="">
                        <li><a href="#">Toán học</a></li>
                        <li><a href="#">Văn học</a></li>
                        <li><a href="#">Anh văn</a></li>
                        <li><a href="#">Lịch sử</a></li>
                        <li><a href="#">Địa lý</a></li>
                        <li><a href="#">Sinh học</a></li>
                        <li><a href="#">Vật lý</a></li>
                        <li><a href="#">Kiến thức nâng cao</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="#">Trung học phổ thông</a>
            <ul class="">
                <li><a href="#">Lớp 10</a>
                    <ul class="">
                        <li><a href="#">Toán học</a></li>
                        <li><a href="#">Văn học</a></li>
                        <li><a href="#">Anh văn</a></li>
                        <li><a href="#">Lịch sử</a></li>
                        <li><a href="#">Địa lý</a></li>
                        <li><a href="#">Sinh học</a></li>
                        <li><a href="#">Vật lý</a></li>
                        <li><a href="#">Kiến thức nâng cao</a></li>
                    </ul>
                </li>
                <li><a href="#">Lớp 11</a>
                    <ul class="">
                        <li><a href="#">Toán học</a></li>
                        <li><a href="#">Văn học</a></li>
                        <li><a href="#">Anh văn</a></li>
                        <li><a href="#">Lịch sử</a></li>
                        <li><a href="#">Địa lý</a></li>
                        <li><a href="#">Sinh học</a></li>
                        <li><a href="#">Vật lý</a></li>
                        <li><a href="#">Kiến thức nâng cao</a></li>
                    </ul>
                </li>
                <li><a href="#">Lớp 12</a>
                    <ul class="">
                        <li><a href="#">Toán học</a></li>
                        <li><a href="#">Văn học</a></li>
                        <li><a href="#">Anh văn</a></li>
                        <li><a href="#">Lịch sử</a></li>
                        <li><a href="#">Địa lý</a></li>
                        <li><a href="#">Sinh học</a></li>
                        <li><a href="#">Vật lý</a></li>
                        <li><a href="#">Kiến thức nâng cao</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="#">Ôn thi tốt nghiệp- CĐ-ĐH</a>
            <ul class="">
                <li><a href="#">Toán học</a></li>
                <li><a href="#">Văn học</a></li>
                <li><a href="#">Anh văn</a></li>
                <li><a href="#">Lịch sử</a></li>
                <li><a href="#">Địa lý</a></li>
                <li><a href="#">Sinh học</a></li>
                <li><a href="#">Vật lý</a></li>
                <li><a href="#">Tuyển tập bộ đề thi</a></li>
            </ul>
        </li>
        <li><a href="#">Luận văn báo cáo</a>
            <ul class="">
                <li><a href="#">Thạc sỹ- Cao học</a>
                    <ul class="">
                        <li><a href="#">kinh tế</a></li>
                        <li><a href="#">lý luận chính trị</a></li>
                        <li><a href="#">công nghệ thông tin</a></li>
                        <li><a href="#">kỹ thuật</a></li>
                        <li><a href="#">khoa học xã hội</a></li>
                        <li><a href="#">nông- ngư nghiệp</a></li>
                    </ul>
                </li>
                <li><a href="#">Tốt  nghiệp CĐ- đại học</a>
                    <ul class="">
                        <li><a href="#">kinh tế</a></li>
                        <li><a href="#">lý luận chính trị</a></li>
                        <li><a href="#">công nghệ thông tin</a></li>
                        <li><a href="#">kỹ thuật</a></li>
                        <li><a href="#">khoa học xã hội</a></li>
                        <li><a href="#">nông- ngư nghiệp</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="#">Giao an- Bài giảng</a></li>
    </ul>
</li>
<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Kỹ năng mềm</a>
    <ul class="dropdown-menu theme_nav_dropdown">
        <li><a href="#">Kỹ năng lãnh đạo</a></li>
        <li><a href="#">Kỹ năng quản lý</a></li>
        <li><a href="#">Kỹ năng tư duy- logic</a></li>
        <li><a href="#">Kỹ năng thuyết trình</a></li>
        <li><a href="#">Kỹ năng giao tiếp </a></li>
        <li><a href="#">Kỹ năng phỏng vấn</a></li>
        <li><a href="#">Tâm lý- đời sống </a></li>
    </ul>
</li>
<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Kinh doanh - Tiếp thị</a>
    <ul class="dropdown-menu theme_nav_dropdown">
        <li><a href="#">Quản trị kinh doanh</a></li>
        <li><a href="#">Kế hoạch kinh doanh</a></li>
        <li><a href="#">Thương mại điện tử </a></li>
        <li><a href="#">Tiếp thị-bán hàng</a></li>
        <li><a href="#">PR- truyền thông</a></li>
        <li><a href="#">Internet marketing</a></li>
    </ul>
</li>
<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Kinh tế- Quản lý</a>
    <ul class="dropdown-menu theme_nav_dropdown">
        <li><a href="#">Quản lý nhà nước</a></li>
        <li><a href="#">Tiêu chuẩn- quy chuẩn</a></li>
        <li><a href="#">Quản lý dự án</a></li>
        <li><a href="#">Quy hoạch- Đô thị</a></li>

    </ul>
</li>
<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Tài chính- Ngân hàng</a>
    <ul class="dropdown-menu theme_nav_dropdown">
        <li><a href="#">Ngân hàng - Tin dụng</a></li>
        <li><a href="#">Kế toán- Kiểm toán</a></li>
        <li><a href="#">Tài chính doanh nghiệp</a></li>
        <li><a href="#">Đầu tư bất động sản</a></li>
        <li><a href="#">Bảo hiểm </a></li>
        <li><a href="#">Qũy đầu tư</a></li>
    </ul>
</li>
<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Biểu mẫu- Văn bản</a>
    <ul class="dropdown-menu theme_nav_dropdown">
        <li><a href="#">Biểu mẫu</a></li>
        <li><a href="#">Đơn từ</a></li>
        <li><a href="#">Thủ tục hành chính</a></li>
        <li><a href="#">Hợp đồng</a></li>
        <li><a href="#">Văn bản pháp luật</a>
            <ul class="">
                <li><a href="#">Luật dân sự</a></li>
                <li><a href="#">luật hình sự</a></li>
                <li><a href="#">luật kinh doanh</a></li>
                <li><a href="#">Luật hôn nhân và gia đình</a></li>
            </ul>
        </li>

    </ul>
</li>
<li class="dropdown">
    <a href="#">Kỹ thuật- Công nghệ </a>

</li>
<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Ngoại ngữ</a>
    <ul class="dropdown-menu theme_nav_dropdown">
        <li><a href="#">Tiếng anh</a>
            <ul class="">
                <li><a href="#">Giao tiếp </a></li>
                <li><a href="#">Luyện thi</a></li>
                <li><a href="#">Luyện thi toiec</a></li>
                <li><a href="#">Luyện thi toefl</a></li>
            </ul>
        </li>
        <li><a href="#">Tiếng trung</a>
            <ul class="">
                <li><a href="#">Giao tiếp </a></li>
                <li><a href="#">Luyện thi</a></li>

            </ul>
        </li>
        <li><a href="#">Tiếng Hàn</a>
            <ul class="">
                <li><a href="#">Giao tiếp </a></li>
                <li><a href="#">Luyện thi</a></li>

            </ul>
        </li>
        <li><a href="#">Tiếng Nhật</a>

            <ul class="">
                <li><a href="#">Giao tiếp </a></li>
                <li><a href="#">Luyện thi</a></li>

            </ul>

        </li>
    </ul>
</li>
<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Khoa học - tự nhiên</a>
    <ul class="dropdown-menu theme_nav_dropdown">
        <li><a href="#">Thế giới động vật</a></li>
        <li><a href="#">Khí tượng hải văn</a></li>
        <li><a href="#">Không gian vũ trụ</a></li>
        <li><a href="#">Sinh vật học </a></li>
    </ul>
</li>
<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Y tế - Sức khỏe</a>
    <ul class="dropdown-menu theme_nav_dropdown">
        <li><a href="#">Chăm sóc sức khỏe gia đình</a></li>
        <li><a href="#">demo</a></li>
        <li><a href="#">demo</a></li>
        <li><a href="#">demo</a></li>
    </ul>
</li>
<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Nông- Lâm- Ngư nghiệp</a>
    <ul class="dropdown-menu theme_nav_dropdown">
        <li><a href="#">Phong tục tập quán- Tâm linh</a></li>
        <li><a href="#">Nét văn hóa truyền thống</a></li>
        <li><a href="#">Danh nam thắng cảnh</a></li>
    </ul>
</li>
<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Góc truyện </a>
    <ul class="dropdown-menu theme_nav_dropdown">
        <li><a href="#">Truyện tranh</a></li>
        <li><a href="#">Truyện trinh thám</a></li>
        <li><a href="#">Truyện ngôn  tình</a></li>
        <li><a href="#">Truyện cười </a></li>
    </ul>
</li>
<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Chuyên mục nội trợ- Làm đẹp</a>
    <ul class="dropdown-menu theme_nav_dropdown">
        <li><a href="#">Dạy nấu ăn ngon</a></li>
        <li><a href="#">Cách dưỡng da, tóc</a></li>
        <li><a href="#">Giảm cân</a></li>
    </ul>
</li>

</ul>
</div>
</div>
<div class="clear-fix" style="height:10px;"></div>
<img src="{{asset('account/images/hoatdongganday.jpg')}}" />
</div>
<div class="col-md-9">
    <h2 class="page_titel">Đăng tải tài liệu</h2>
    <div class="uploadtailieu">
        {!! FuncCommon::fileUploadInput() !!}
<!--        <a class="btn btn-primary">Tải lên từ máy tính</a><br />-->

        <div> <span class="noteTCoin">Ghi chú: có thể tải một lần nhiều tài liệu</span></div>
    </div>

    Ghi chú: khi nhấn nút tải thì sẽ ra màn hình upload file và giao diện như dưới:
    <br />
    <table class="tableuploadtailieu">
        <img src="{{asset('account/images/daidiendownload.jpg')}}"/>
    </table>
</div>
</div>
<div class="container>
    <div class="row">
<div class="listtailieu">
<div class="site-title"><h3 class="title">Tài liệu chung</h3></div>
<div class="row">
<div class="col-md-3">
    <h4 class="title-2">Giáo Dục - Đào Tạo</h4>
    <div class="total_doc_item_common">
        <div class="item_common">
            <a href="/document/418400-bang-cong-thuc-tich-phan-dao-ham-mu-logarit.htm" target="_blank" title="Bảng công thức tích phân - đạo hàm - Mũ - logarit">
                <i class="icon i_type_doc i_type_doc2"></i>
                Bảng công thức tích phân - đạo hàm...   </a>
            <ul class="doc_tk_cnt">
                <li>
                    <i class="icon_doc"></i>2       </li>
                <li>
                    <i class="icon_view"></i>196,073       </li>
                <li>
                    <i class="icon_down"></i>6,431       </li>
            </ul>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="item_common">
            <a href="/document/1117032-nhan-vat-ngo-tu-van-trong-chuyen-chuc-phan-su-den-tan-vien-ppt.htm" target="_blank" title="Nhân vật Ngô Tử Văn trong Chuyện chức phán sự đền Tản Viên ppt">
                <i class="icon i_type_doc i_type_doc2"></i>
                Nhân vật Ngô Tử Văn trong Chuyện...   </a>
            <ul class="doc_tk_cnt">
                <li>
                    <i class="icon_doc"></i>4       </li>
                <li>
                    <i class="icon_view"></i>108,588       </li>
                <li>
                    <i class="icon_down"></i>978       </li>
            </ul>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="item_common">
            <a href="/document/745149-64-tinh-huong-su-pham-thuong-gap-nhat-va-cach-giai-quyet-doi-voi-giao-vien.htm" target="_blank" title="64 tình huống sư phạm thường gặp nhất và cách giải quyết đối với giáo viên">
                <i class="icon i_type_doc i_type_doc1"></i>
                64 tình huống sư phạm thường gặp n...   </a>
            <ul class="doc_tk_cnt">
                <li>
                    <i class="icon_doc"></i>62       </li>
                <li>
                    <i class="icon_view"></i>102,001       </li>
                <li>
                    <i class="icon_down"></i>1,202       </li>
            </ul>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="item_common">
            <a href="/document/1076167-tai-lieu-phan-tich-tam-trang-nguoi-chinh-phu-trong-doan-tinh-canh-le-loi-cua-nguoi-chinh-phu-ngam-pptx.htm" target="_blank" title="Tài liệu Phân tích tâm trạng người chinh phụ trong đoạn ''''''''Tình cảnh lẻ loi của người chinh phụ ngâm " pptx"="">
            <i class="icon i_type_doc i_type_doc2"></i>
            Tài liệu Phân tích tâm trạng người ch...   </a>
            <ul class="doc_tk_cnt">
                <li>
                    <i class="icon_doc"></i>7       </li>
                <li>
                    <i class="icon_view"></i>88,889       </li>
                <li>
                    <i class="icon_down"></i>484       </li>
            </ul>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="item_common">
            <a href="/document/1962601-giao-an-dia-ly-12-bai-38-thuc-hanh-so-sanh-ve-cay-cong-nghiep-lau-nam-va-chan-nuoi-gia-suc-lon-giua-vung-tay-nguyen-voi-trung-du-va-mien-nui-bac-bo-po.htm" target="_blank" title="Giáo án địa lý 12 - Bài 38: thực hành So sánh về cây công nghiệp lâu năm và chăn nuôi gia súc lớn giữa vùng tây nguyên với trung du và miền núi bắc bộ potx">
                <i class="icon i_type_doc i_type_doc2"></i>
                Giáo án địa lý 12 - Bài 38: thực hà...</a>
            <ul class="doc_tk_cnt">
                <li>
                    <i class="icon_doc"></i>14       </li>
                <li>
                    <i class="icon_view"></i>83,863       </li>
                <li>
                    <i class="icon_down"></i>495       </li>
            </ul>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="item_common">
            <a href="/document/1334101-de-thi-gsat-samsung-moi.htm" target="_blank" title="Đề thi Gsat SamSung mới">
                <i class="icon i_type_doc i_type_doc2"></i>
                Đề thi Gsat SamSung mới   </a>
            <ul class="doc_tk_cnt">
                <li>
                    <i class="icon_doc"></i>23       </li>
                <li>
                    <i class="icon_view"></i>72,261       </li>
                <li>
                    <i class="icon_down"></i>3,005       </li>
            </ul>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>

</div>
<div class="col-md-3">
    <h4 class="title-2">Giáo dục đào tạo</h4>
    <div class="total_doc_item_common">
        <div class="item_common">
            <a href="/document/418400-bang-cong-thuc-tich-phan-dao-ham-mu-logarit.htm" target="_blank" title="Bảng công thức tích phân - đạo hàm - Mũ - logarit">
                <i class="icon i_type_doc i_type_doc2"></i>
                Bảng công thức tích phân - đạo hàm...   </a>
            <ul class="doc_tk_cnt">
                <li>
                    <i class="icon_doc"></i>2       </li>
                <li>
                    <i class="icon_view"></i>196,073       </li>
                <li>
                    <i class="icon_down"></i>6,431       </li>
            </ul>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="item_common">
            <a href="/document/1117032-nhan-vat-ngo-tu-van-trong-chuyen-chuc-phan-su-den-tan-vien-ppt.htm" target="_blank" title="Nhân vật Ngô Tử Văn trong Chuyện chức phán sự đền Tản Viên ppt">
                <i class="icon i_type_doc i_type_doc2"></i>
                Nhân vật Ngô Tử Văn trong Chuyện...   </a>
            <ul class="doc_tk_cnt">
                <li>
                    <i class="icon_doc"></i>4       </li>
                <li>
                    <i class="icon_view"></i>108,588       </li>
                <li>
                    <i class="icon_down"></i>978       </li>
            </ul>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="item_common">
            <a href="/document/745149-64-tinh-huong-su-pham-thuong-gap-nhat-va-cach-giai-quyet-doi-voi-giao-vien.htm" target="_blank" title="64 tình huống sư phạm thường gặp nhất và cách giải quyết đối với giáo viên">
                <i class="icon i_type_doc i_type_doc1"></i>
                64 tình huống sư phạm thường gặp n...   </a>
            <ul class="doc_tk_cnt">
                <li>
                    <i class="icon_doc"></i>62       </li>
                <li>
                    <i class="icon_view"></i>102,001       </li>
                <li>
                    <i class="icon_down"></i>1,202       </li>
            </ul>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="item_common">
            <a href="/document/1076167-tai-lieu-phan-tich-tam-trang-nguoi-chinh-phu-trong-doan-tinh-canh-le-loi-cua-nguoi-chinh-phu-ngam-pptx.htm" target="_blank" title="Tài liệu Phân tích tâm trạng người chinh phụ trong đoạn ''''''''Tình cảnh lẻ loi của người chinh phụ ngâm " pptx"="">
            <i class="icon i_type_doc i_type_doc2"></i>
            Tài liệu Phân tích tâm trạng người ch...   </a>
            <ul class="doc_tk_cnt">
                <li>
                    <i class="icon_doc"></i>7       </li>
                <li>
                    <i class="icon_view"></i>88,889       </li>
                <li>
                    <i class="icon_down"></i>484       </li>
            </ul>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="item_common">
            <a href="/document/1962601-giao-an-dia-ly-12-bai-38-thuc-hanh-so-sanh-ve-cay-cong-nghiep-lau-nam-va-chan-nuoi-gia-suc-lon-giua-vung-tay-nguyen-voi-trung-du-va-mien-nui-bac-bo-po.htm" target="_blank" title="Giáo án địa lý 12 - Bài 38: thực hành So sánh về cây công nghiệp lâu năm và chăn nuôi gia súc lớn giữa vùng tây nguyên với trung du và miền núi bắc bộ potx">
                <i class="icon i_type_doc i_type_doc2"></i>
                Giáo án địa lý 12 - Bài 38: thực hà...</a>
            <ul class="doc_tk_cnt">
                <li>
                    <i class="icon_doc"></i>14       </li>
                <li>
                    <i class="icon_view"></i>83,863       </li>
                <li>
                    <i class="icon_down"></i>495       </li>
            </ul>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="item_common">
            <a href="/document/1334101-de-thi-gsat-samsung-moi.htm" target="_blank" title="Đề thi Gsat SamSung mới">
                <i class="icon i_type_doc i_type_doc2"></i>
                Đề thi Gsat SamSung mới   </a>
            <ul class="doc_tk_cnt">
                <li>
                    <i class="icon_doc"></i>23       </li>
                <li>
                    <i class="icon_view"></i>72,261       </li>
                <li>
                    <i class="icon_down"></i>3,005       </li>
            </ul>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>

</div>
<div class="col-md-3">
    <h4 class="title-2">Sách khoa học</h4>
    <div class="total_doc_item_common">
        <div class="item_common">
            <a href="/document/418400-bang-cong-thuc-tich-phan-dao-ham-mu-logarit.htm" target="_blank" title="Bảng công thức tích phân - đạo hàm - Mũ - logarit">
                <i class="icon i_type_doc i_type_doc2"></i>
                Bảng công thức tích phân - đạo hàm...   </a>
            <ul class="doc_tk_cnt">
                <li>
                    <i class="icon_doc"></i>2       </li>
                <li>
                    <i class="icon_view"></i>196,073       </li>
                <li>
                    <i class="icon_down"></i>6,431       </li>
            </ul>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="item_common">
            <a href="/document/1117032-nhan-vat-ngo-tu-van-trong-chuyen-chuc-phan-su-den-tan-vien-ppt.htm" target="_blank" title="Nhân vật Ngô Tử Văn trong Chuyện chức phán sự đền Tản Viên ppt">
                <i class="icon i_type_doc i_type_doc2"></i>
                Nhân vật Ngô Tử Văn trong Chuyện...   </a>
            <ul class="doc_tk_cnt">
                <li>
                    <i class="icon_doc"></i>4       </li>
                <li>
                    <i class="icon_view"></i>108,588       </li>
                <li>
                    <i class="icon_down"></i>978       </li>
            </ul>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="item_common">
            <a href="/document/745149-64-tinh-huong-su-pham-thuong-gap-nhat-va-cach-giai-quyet-doi-voi-giao-vien.htm" target="_blank" title="64 tình huống sư phạm thường gặp nhất và cách giải quyết đối với giáo viên">
                <i class="icon i_type_doc i_type_doc1"></i>
                64 tình huống sư phạm thường gặp n...   </a>
            <ul class="doc_tk_cnt">
                <li>
                    <i class="icon_doc"></i>62       </li>
                <li>
                    <i class="icon_view"></i>102,001       </li>
                <li>
                    <i class="icon_down"></i>1,202       </li>
            </ul>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="item_common">
            <a href="/document/1076167-tai-lieu-phan-tich-tam-trang-nguoi-chinh-phu-trong-doan-tinh-canh-le-loi-cua-nguoi-chinh-phu-ngam-pptx.htm" target="_blank" title="Tài liệu Phân tích tâm trạng người chinh phụ trong đoạn ''''''''Tình cảnh lẻ loi của người chinh phụ ngâm " pptx"="">
            <i class="icon i_type_doc i_type_doc2"></i>
            Tài liệu Phân tích tâm trạng người ch...   </a>
            <ul class="doc_tk_cnt">
                <li>
                    <i class="icon_doc"></i>7       </li>
                <li>
                    <i class="icon_view"></i>88,889       </li>
                <li>
                    <i class="icon_down"></i>484       </li>
            </ul>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="item_common">
            <a href="/document/1962601-giao-an-dia-ly-12-bai-38-thuc-hanh-so-sanh-ve-cay-cong-nghiep-lau-nam-va-chan-nuoi-gia-suc-lon-giua-vung-tay-nguyen-voi-trung-du-va-mien-nui-bac-bo-po.htm" target="_blank" title="Giáo án địa lý 12 - Bài 38: thực hành So sánh về cây công nghiệp lâu năm và chăn nuôi gia súc lớn giữa vùng tây nguyên với trung du và miền núi bắc bộ potx">
                <i class="icon i_type_doc i_type_doc2"></i>
                Giáo án địa lý 12 - Bài 38: thực hà...</a>
            <ul class="doc_tk_cnt">
                <li>
                    <i class="icon_doc"></i>14       </li>
                <li>
                    <i class="icon_view"></i>83,863       </li>
                <li>
                    <i class="icon_down"></i>495       </li>
            </ul>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="item_common">
            <a href="/document/1334101-de-thi-gsat-samsung-moi.htm" target="_blank" title="Đề thi Gsat SamSung mới">
                <i class="icon i_type_doc i_type_doc2"></i>
                Đề thi Gsat SamSung mới   </a>
            <ul class="doc_tk_cnt">
                <li>
                    <i class="icon_doc"></i>23       </li>
                <li>
                    <i class="icon_view"></i>72,261       </li>
                <li>
                    <i class="icon_down"></i>3,005       </li>
            </ul>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>

</div>
<div class="col-md-3">
    <h4 class="title-2">Ngoại ngữ</h4>
    <div class="total_doc_item_common">
        <div class="item_common">
            <a href="/document/418400-bang-cong-thuc-tich-phan-dao-ham-mu-logarit.htm" target="_blank" title="Bảng công thức tích phân - đạo hàm - Mũ - logarit">
                <i class="icon i_type_doc i_type_doc2"></i>
                Bảng công thức tích phân - đạo hàm...   </a>
            <ul class="doc_tk_cnt">
                <li>
                    <i class="icon_doc"></i>2       </li>
                <li>
                    <i class="icon_view"></i>196,073       </li>
                <li>
                    <i class="icon_down"></i>6,431       </li>
            </ul>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="item_common">
            <a href="/document/1117032-nhan-vat-ngo-tu-van-trong-chuyen-chuc-phan-su-den-tan-vien-ppt.htm" target="_blank" title="Nhân vật Ngô Tử Văn trong Chuyện chức phán sự đền Tản Viên ppt">
                <i class="icon i_type_doc i_type_doc2"></i>
                Nhân vật Ngô Tử Văn trong Chuyện...   </a>
            <ul class="doc_tk_cnt">
                <li>
                    <i class="icon_doc"></i>4       </li>
                <li>
                    <i class="icon_view"></i>108,588       </li>
                <li>
                    <i class="icon_down"></i>978       </li>
            </ul>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="item_common">
            <a href="/document/745149-64-tinh-huong-su-pham-thuong-gap-nhat-va-cach-giai-quyet-doi-voi-giao-vien.htm" target="_blank" title="64 tình huống sư phạm thường gặp nhất và cách giải quyết đối với giáo viên">
                <i class="icon i_type_doc i_type_doc1"></i>
                64 tình huống sư phạm thường gặp n...   </a>
            <ul class="doc_tk_cnt">
                <li>
                    <i class="icon_doc"></i>62       </li>
                <li>
                    <i class="icon_view"></i>102,001       </li>
                <li>
                    <i class="icon_down"></i>1,202       </li>
            </ul>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="item_common">
            <a href="/document/1076167-tai-lieu-phan-tich-tam-trang-nguoi-chinh-phu-trong-doan-tinh-canh-le-loi-cua-nguoi-chinh-phu-ngam-pptx.htm" target="_blank" title="Tài liệu Phân tích tâm trạng người chinh phụ trong đoạn ''''''''Tình cảnh lẻ loi của người chinh phụ ngâm " pptx"="">
            <i class="icon i_type_doc i_type_doc2"></i>
            Tài liệu Phân tích tâm trạng người ch...   </a>
            <ul class="doc_tk_cnt">
                <li>
                    <i class="icon_doc"></i>7       </li>
                <li>
                    <i class="icon_view"></i>88,889       </li>
                <li>
                    <i class="icon_down"></i>484       </li>
            </ul>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="item_common">
            <a href="/document/1962601-giao-an-dia-ly-12-bai-38-thuc-hanh-so-sanh-ve-cay-cong-nghiep-lau-nam-va-chan-nuoi-gia-suc-lon-giua-vung-tay-nguyen-voi-trung-du-va-mien-nui-bac-bo-po.htm" target="_blank" title="Giáo án địa lý 12 - Bài 38: thực hành So sánh về cây công nghiệp lâu năm và chăn nuôi gia súc lớn giữa vùng tây nguyên với trung du và miền núi bắc bộ potx">
                <i class="icon i_type_doc i_type_doc2"></i>
                Giáo án địa lý 12 - Bài 38: thực hà...</a>
            <ul class="doc_tk_cnt">
                <li>
                    <i class="icon_doc"></i>14       </li>
                <li>
                    <i class="icon_view"></i>83,863       </li>
                <li>
                    <i class="icon_down"></i>495       </li>
            </ul>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="item_common">
            <a href="/document/1334101-de-thi-gsat-samsung-moi.htm" target="_blank" title="Đề thi Gsat SamSung mới">
                <i class="icon i_type_doc i_type_doc2"></i>
                Đề thi Gsat SamSung mới   </a>
            <ul class="doc_tk_cnt">
                <li>
                    <i class="icon_doc"></i>23       </li>
                <li>
                    <i class="icon_view"></i>72,261       </li>
                <li>
                    <i class="icon_down"></i>3,005       </li>
            </ul>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>

</div>
</div>
</div>
</div>
</div>
</div>
<footer>
    <div class="container">
        <div class="row row_footer">
            <div class="col-md-4">
                <h3>Hỗ trợ Online</h3>
                <div>
                    Email: banthe247@gmail.com<br />
                    Hotline: 0913081236<br />
                </div>
            </div>
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
                <h3>Điều khoản sử dụng</h3>
                <div>
                    <ul>
                        <li>
                            <a href="#">Quy định chung</a>
                        </li>
                        <li>
                            <a href="#">Quy trình xử lý khiếu nại</a>
                        </li>
                        <li>
                            <a href="#">Quy trình thanh toán</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--login-->
<div class="modal fade" id="signin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-times"></i></span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-sign-in"></i> Đăng nhập</h4>
            </div>
            <form id="sign_in" role="form" action="/user" method="POST">
                <div class="panel-body">
                    <div class="alert alert-danger" id="divnotify">
                        <i class="fa fa-info-circle fa-lg"></i>
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="ctrlusername"> Tên đăng nhập </label>
                        <input type="text" name="ctrlusername" id="ctrlusername" class="form-control" placeholder="Tên đăng nhập" tabindex="1" autocorrect="off" spellcheck="false" autocapitalize="off" autofocus="autofocus" />
                    </div>
                    <div class="form-group">
                        <label for="ctrlpass">Mật khẩu</label>
                        <input type="password" name="ctrlpass" id="ctrlpass" class="form-control" autocomplete="off" placeholder="Mật khẩu" tabindex="2" />
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" id="ctrlloginbtn" tabindex="3"><i class="fa fa-sign-in"></i> Đăng nhập</button>
                        <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#forgotyourpassword">Quên mật khẩu?</a>

                    </div>
                    <div class="form-group">
                        <a href="#" class="fa-google-plus-square">Đăng nhập bằng google</a>
                        <a href="#" class="fa-facebook-square">Đăng nhập bằng facebook</a>
                    </div>
                </div>
                <div class="panel-footer">
                    <a class="pull-right" href="/user/register"><i class="fa fa-share-square-o"></i> Bạn chưa có tài khoản? Đăng ký ngay</a>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>


