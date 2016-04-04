@extends('frontend.layout.layout')
@section('sidebar', view('account.layout.sidebar')->with('current', 'fin'))
@section('content')
<section class="col-md-9" id="content-account">
    <div class="row">
        <div class="col-md-10">
            <h1 class="title">Quản lý tài chính</h1>
        </div>
        <div class="col-md-2">
            <a href="javascript:;" class="icon_edit_title filter icon pull-right" onclick="edit_user(this); return">Sửa</a>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12 account_balance">
            <h4>Thông tin số dư tài khoản</h4>
            <div style="margin-top: 10px">
                <p class="title_bal">Số dư tài khoản doanh thu</p>
                <p>
                    <span class="number_money_bal">0đ</span>
                    <a class="send_bal">Chuyển tiền</a>
                    <a class="send_bal">Rút tiền</a>
                </p>
            </div>
            <div>
                <p class="title_bal" title="Số tiền dùng để mua tài liệu trên 123doc">Số dư tài khoản mua tài liệu</p>
                <p>
                    <span class="number_money_bal">0đ</span>
                    <a class="send_bal">Nạp tiền</a>
                </p>
            </div>
            <div>
                <p class="title_bal">Số dư thưởng UPLOAD tạm tính tháng 03</p>
                <p>
                    <span class="number_money_bal">0đ</span>
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" style="margin-bottom: 15px">
            <h4 class="title">Lịch sử biến động số dư</h4>
        </div>
        <div class="col-md-12">
            <div role="tabpanel" class="theme_tab" style="margin-bottom:10px;">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation"><a href="#history_report" aria-controls="history_report" role="tab" data-toggle="tab">Tài khoản doanh thu</a></li>
                    <li role="presentation" class="active"><a href="#change_password" aria-controls="change_password" role="tab" data-toggle="tab">Tài khoản mua tài liệu</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab_body">
                    <div class="tab-content">
                        <!--Tài khoản-->
                        <!--Lịch sử giao dịch-->
                        <div role="tabpanel" class="tab-pane" id="history_report">
                            <div class="table-responsive">
                                Có tính năng lọc theo mã giao dịch, ngày tháng,loại giao dịch
                            </div>
                        </div>

                        <!--Đổi mật khẩu-->
                        <div role="tabpanel" class="tab-pane" id="change_password">
                            Lịch sử giao dịch mua tài liệu, cũng có tính năng lọc như tab bên
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection