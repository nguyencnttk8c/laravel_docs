@extends('frontend.layout.layout')
@section('sidebar', view('account.layout.sidebar')->with('current', 'per'))
@section('content')
<section class="col-md-9" id="content-account">
    <div class="row">
        <div class="col-md-10">
            <h1 class="title">Cập nhật thông tin cá nhân</h1>
        </div>
        <div class="col-md-2">
            <button id="edit-button">Sửa</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form id="edit-user" role="form" method="post" action="">
                {!! csrf_field() !!}
                <div class="edit-group display-name">
                    <div class="row">
                        <div class="col-md-12 title">
                            <span class="text-uppercase">Tên hiển thị</span>
                        </div>
                    </div>
                    <div class="row edit">
                        <div class="col-md-12">
                            <input type="text" class="form-control edit-field" id="name" name="name" required value="">
                            <span class="show-field" id="show-name">{{$user->name}}</span>
                        </div>
                    </div>
                </div>
                <div class="edit-group user-detail">
                    <div class="row">
                        <div class="col-md-12 title">
                            <span class="text-uppercase">Thông tin</span>
                        </div>
                    </div>
                    <div class="row edit">
                        <div class="col-md-6 subtitle">
                            <span>Ngày Sinh</span>
                        </div>
                        <div class="col-md-6">
                            <input type="date" class="form-control edit-field" id="birth_day" name="birth_day" required value="">
                            <span class="show-field" id="show-birth_day">{{$user->birth_day->format('d/m/Y')}}</span>
                        </div>
                    </div>
                    <div class="row edit">
                        <div class="col-md-6 subtitle">
                            <span>Giới Tính</span>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control edit-field" id="gender" name="gender" required value="">
                            <span class="show-field" id="show-gender">{{($user->gender == 'nam') ? 'Nam' : (($user->gender == 'nu') ? 'Nữ' : '')}}</span>
                        </div>
                    </div>
                    <div class="row edit">
                        <div class="col-md-6 subtitle">
                            <span>Địa Chỉ</span>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control edit-field" id="address" name="address" value="">
                            <span class="show-field" id="show-address">{{$user->address}}</span>
                        </div>
                    </div>
                </div>
                <div class="edit-group edit-pass">
                    <div class="row">
                        <div class="col-md-12 title">
                            <span class="text-uppercase">Mật khẩu</span>
                        </div>
                    </div>
                    <div class="row edit">
                        <div class="col-md-6 subtitle">
                            <span>Mật khẩu</span>
                        </div>
                        <div class="col-md-6">
                            <input type="password" class="form-control edit-field" id="password" name="password" value="">
                            <span id="show-password" class="show-field">********</span>
                        </div>
                    </div>
                </div>

                <div class="edit-group bankInfo">
                    <div class="row">
                        <div class="col-md-12 title">
                            <span class="text-uppercase">Thông Tin Tài Khoản Rút Tiền</span>
                        </div>
                    </div>
                    <div class="row edit">
                        <div class="col-md-6 subtitle">
                            <span>Tên tài khoản</span>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control edit-field" id="bank_account" name="bank_account" value="">
                            <span class="show-field" id="show-bank_account">{{$user->bank_account}}</span>
                        </div>
                    </div>
                    <div class="row edit">
                        <div class="col-md-6 subtitle">
                            <span>Số tài khoản</span>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control edit-field" id="bank_number" name="bank_number" value="">
                            <span class="show-field" id="show-bank_number">{{$user->bank_number}}</span>
                        </div>
                    </div>
                    <div class="row edit">
                        <div class="col-md-6 subtitle">
                            <span>Tên ngân hàng</span>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control edit-field" id="bank_name" name="bank_name" value="">
                            <span class="show-field" id="show-bank_name">{{$user->bank_name}}</span>
                        </div>
                    </div>
                </div>
                <div class="edit-group">
                    <div class="row">
                        <div class="col-md-12 title">
                            <a class="text-uppercase" href="#">Điều khoản sự dụng</a>
                        </div>
                    </div>
                </div>
                <div class="edit-group">
                    <div class="row">
                        <div class="col-md-12 title">
                            <a class="text-uppercase" href="#">Chính sách bảo mật</a>
                        </div>
                    </div>
                </div>
                <div class="edit-group">
                    <div class="row">
                        <div class="col-md-12 title">
                            <a class="text-uppercase" href="#">Thông tin nhà phát triển</a>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-default edit-field">Lưu</button>
            </form>
        </div>
    </div>
</section>
<script type="text/javascript">
    $("#edit-button").click(function(){
        $(".show-field").each(function(){
            var this_id = $(this).attr('id');
            var this_text = $(this).text();
            var edit_id = this_id.split('-')[1];
            $(this).hide();
            if (edit_id == 'birth_day') {
                $("#"+edit_id).val("{{$user->birth_day->format('Y-m-d')}}").show();
            } else {
                $("#"+edit_id).val(this_text).show();
            }

            $("#password").val('').show();
            $('button.edit-field').show();
        });
    });
</script>
@endsection

