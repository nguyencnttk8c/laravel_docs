@extends('frontend.layout.layout')
@section('sidebar', view('account.layout.sidebar')->with('current', 'up'))
@section('content')
<div class="col-md-9">
    <h2 class="page_titel">Đăng tải tài liệu</h2>

    <div class="uploadtailieu">
        {!! FuncCommon::fileUploadInput() !!}
<!--        <a class="btn btn-primary">Tải lên từ máy tính</a><br/>-->

        <div><span class="noteTCoin">Ghi chú: có thể tải một lần nhiều tài liệu</span></div>
    </div>
    Ghi chú: khi nhấn nút tải thì sẽ ra màn hình upload file và giao diện như dưới:
    <br/>
    <table class="tableuploadtailieu">
        <img src="{{asset('account/images/daidiendownload.jpg')}}"/>
    </table>
</div>
@endsection