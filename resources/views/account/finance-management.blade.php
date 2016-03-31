@extends('frontend.layout.layout')
@section('sidebar')
@include('account.layout.sidebar')
@endsection
@section('content')
<div class="col-md-9">
    <h3 class="titel">Quản lý tài chính<a href="javascript:;" class="icon_edit_title filter icon pull-right" onclick="edit_user(this); return">Sửa</a></h3>

    <div>
        <div class="account_balance">
            <h4>Thông tin số dư tài khoản</h4>
            <p class="title_bal">Số dư tài khoản doanh thu</p>
            <p><span class="number_money_bal">0đ</span>
                <a href="javascript:;" title="Chuyển tiền sang tk mua tài liệu" onclick="showTransfers(this)" class="send_bal">Chuyển tiền</a>
                <a href="javascript:;" title="Chuyển tiền sang tk mua tài liệu" onclick="showTransfers(this)" class="send_bal">Rút tiền</a>
            </p>
            <p class="title_bal" title="Số tiền dùng để mua tài liệu trên 123doc">Số dư tài khoản mua tài liệu</p>
            <p><span class="number_money_bal">0đ</span><a href="javascript:;" onclick="popupPayment_open();" class="send_bal">Nạp tiền</a></p>
            </p><p class="title_bal">Số dư thưởng UPLOAD tạm tính tháng 03</p>
            <p><span class="number_money_bal">0đ</span></p>
        </div>


    </div>
    <div class="clearfix"></div>
    <h3 class="titel">Lịch sử biến động số dư</h3>
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
@endsection