@extends('frontend.static_layout.layout')
@section('sidebar', view('frontend.static_layout.sidebar'))
@section('content')
    <div class="search_bottom_right" id="sta_right">
        <h2>Giới thiệu</h2>
        <div class="list_item" id="list_item">
            <div class="item">
                <h2>
                    <a href="/statics-detail/1-gioi-thieu-ve-123doc-org.htm" target="_blank" title="Giới thiệu về 123doc.org">Giới thiệu về 123doc.org</a>
                </h2>
                <ul class="doc_tk_cnt">
                    <li><i class="icon_watch"></i>19/08/2015</li>
                </ul>
                <div></div>
            </div>
            <div class="item">
                <h2>
                    <a href="/statics-detail/2-dieu-khoan-su-dung.htm" target="_blank" title="Điều khoản sử dụng">Điều khoản sử dụng</a>
                </h2>
                <ul class="doc_tk_cnt">
                    <li><i class="icon_watch"></i>20/08/2015</li>
                </ul>
                <div></div>
            </div>
            <div class="item">
                <h2>
                    <a href="/statics-detail/3-cau-hoi-thuong-gap.htm" target="_blank" title="Câu hỏi thường gặp">Câu hỏi thường gặp</a>
                </h2>
                <ul class="doc_tk_cnt">
                    <li><i class="icon_watch"></i>20/08/2015</li>
                </ul>
                <div></div>
            </div>
            <div class="item">
                <h2>
                    <a href="/statics-detail/896-chinh-sach-bao-mat-thong-tin.htm" target="_blank" title="Chính sách bảo mật thông tin ">Chính sách bảo mật thông tin </a>
                </h2>
                <ul class="doc_tk_cnt">
                    <li><i class="icon_watch"></i>20/08/2015</li>
                </ul>
                <div></div>
            </div>
        </div>
    </div>
@endsection