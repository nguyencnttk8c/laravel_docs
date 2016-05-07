@extends('frontend.layout.layout')
@section('sidebar', view('account.layout.sidebar')->with('current', 'per'))
@section('content')
<section class="col-md-9 col-ms-9 col-xs-9 update-info" id="content-account">
    <form id="edit-user" role="form" method="post" action="">
        {!! csrf_field() !!}
        <div class="table">
            <div class="row">
                <h2 class="subtitle pull-left">Thông tin cá nhân</h2>
                <button class="pull-right edit" data-target=".info" type="button"><i class="fa fa-pencil" aria-hidden="true"></i> Chỉnh sửa</button>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="table-row">
                        <div class="table-cell bold align-right col-md-4 col-sm-4 col-xs-6">
                            ID
                        </div>
                        <div class="table-cell align-left col-md-8 col-sm-8 col-xs-6">
                            <input class="info" type="text" name="user[id_card]" value="{{$user->id_card}}" readonly>
                        </div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell bold align-right col-md-4 col-sm-4 col-xs-6">
                            Tên hiển thị
                        </div>
                        <div class="table-cell align-left col-md-8 col-sm-8 col-xs-6">
                            <input class="info" type="text" name="user[name]" value="{{$user->name}}" readonly>
                        </div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell bold align-right col-md-4 col-sm-4 col-xs-6">
                            Ngày sinh
                        </div>
                        <div class="table-cell align-left col-md-8 col-sm-8 col-xs-6">
                            <input class="info" type="date" name="user[birth_day]" value="{{\Carbon\Carbon::parse($user->birth_day)->format('Y-m-d')}}" readonly>
                        </div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell bold align-right col-md-4 col-sm-4 col-xs-6">
                            Giới tính
                        </div>
                        <div class="table-cell align-left col-md-8 col-sm-8 col-xs-6">
                            <input class="info" type="text" name="user[gender]" value="{{$user->gender}}" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="table-row">
                        <div class="table-cell bold align-right col-md-4 col-sm-4 col-xs-6">
                            Địa chỉ
                        </div>
                        <div class="table-cell align-left col-md-8 col-sm-8 col-xs-6">
                            <input class="info" type="text" name="user[address]" value="{{$user->address}}" readonly>
                        </div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell bold align-right col-md-4 col-sm-4 col-xs-6">
                            Số điện thoại
                        </div>
                        <div class="table-cell align-left col-md-8 col-sm-8 col-xs-6">
                            <input class="info"  type="text" name="user[phone]" value="{{$user->phone}}" readonly>
                        </div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell bold align-right col-md-4 col-sm-4 col-xs-6">
                            Email
                        </div>
                        <div class="table-cell align-left col-md-8 col-sm-8 col-xs-6">
                            <input class="info" name="user[email]" type="email" value="{{$user->email}}" readonly>
                        </div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell bold align-right col-md-4 col-sm-4 col-xs-6">
                            Mật khẩu
                        </div>
                        <div class="table-cell align-left col-md-8 col-sm-8 col-xs-6">
                            <input class="info" name="user[password]" type="password" value="" placeholder="********" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="table">
            <div class="row">
                <h2 class="subtitle pull-left">Thông tin ngân hàng</h2>
                <button class="pull-right edit" type="button" data-target=".bank-info"><i class="fa fa-pencil" aria-hidden="true"></i> Chỉnh sửa</button>
            </div>
            <div class="clearfix"></div>
            @if (isset($user_bank) && !empty($user_bank))
                @foreach ($user_bank as $bank)
                    <div class="row">
                        <div class="table-row">
                            <div class="table-cell bold align-right col-md-4 col-sm-4 col-xs-6">
                                Số tài khoản
                            </div>
                            <div class="table-cell align-left col-md-8 col-sm-8 col-xs-6">
                                <input class="bank-info" type="text" name="bank[{{$bank->id}}][bank_id]" value="{{$bank->bank_id}}" readonly>
                            </div>
                        </div>
                        <div class="table-row">
                            <div class="table-cell bold align-right col-md-4 col-sm-4 col-xs-6">
                                Chủ tài khoản
                            </div>
                            <div class="table-cell align-left col-md-8 col-sm-8 col-xs-6">
                                <input class="bank-info" type="text" name="bank[{{$bank->id}}][acc_name]" value="{{$bank->acc_name}}" readonly>
                            </div>
                        </div>
                        <div class="table-row">
                            <div class="table-cell bold align-right col-md-4 col-sm-4 col-xs-6">
                                Tên ngân hàng
                            </div>
                            <div class="table-cell align-left col-md-8 col-sm-8 col-xs-6">
                                <input class="bank-info" type="text" name="bank[{{$bank->id}}][bank_name]" value="{{$bank->bank_name}}" readonly>
                            </div>
                        </div>
                        <div class="table-row">
                            <div class="table-cell bold align-right col-md-4 col-sm-8 col-xs-6">
                                Chi nhánh
                            </div>
                            <div class="table-cell align-left col-md-8 col-sm-8 col-xs-6">
                                <input class="bank-info" type="text" name="bank[{{$bank->id}}][bank_brand]" value="{{$bank->bank_brand}}" readonly>
                            </div>
                        </div>
                    </div>
                    <hr class="clearfix">
                @endforeach
            @endif
            <div class="add-new-bank" style="display: none">
                <div class="row">
                    <div class="table-row">
                        <div class="table-cell bold align-right col-md-4 col-sm-4 col-xs-6">
                            Số tài khoản
                        </div>
                        <div class="table-cell align-left col-md-8 col-sm-8 col-xs-6">
                            <input class="bank-info edit-field" type="text" name="bank[new][bank_id]" value="">
                        </div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell bold align-right col-md-4 col-sm-4 col-xs-6">
                            Chủ tài khoản
                        </div>
                        <div class="table-cell align-left col-md-8 col-sm-8 col-xs-6">
                            <input class="bank-info edit-field" type="text" name="bank[new][acc_name]" value="" >
                        </div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell bold align-right col-md-4 col-sm-4 col-xs-6">
                            Tên ngân hàng
                        </div>
                        <div class="table-cell align-left col-md-8 col-sm-8 col-xs-6">
                            <input class="bank-info edit-field" type="text" name="bank[new][bank_name]" value="">
                        </div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell bold align-right col-md-4 col-sm-8 col-xs-6">
                            Chi nhánh
                        </div>
                        <div class="table-cell align-left col-md-8 col-sm-8 col-xs-6">
                            <input class="bank-info edit-field" type="text" name="bank[new][bank_brand]" value="" >
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row" style="text-align: center">
            <input type="button" class="add-bank" data-target=".add-new-bank" value="Thêm tài khoản ngân hàng">
        </div>
        <div class="row" style="text-align: center">
            <button type="submit" style="display: none">Lưu thay đổi</button>
        </div>
    </form>
</section>
<script type="text/javascript">
    $("button.edit").click(function(){
        var target = $(this).data('target');
        $(target).each(function(){
            $(this).removeAttr('readonly').addClass('edit-field');
        });
        $("button[type='submit']").show();
        $("input.add-bank").hide();
    });
    $("input.add-bank").click(function(){
        $(".add-new-bank").fadeIn(300);
        $(this).hide();
        $("button[type='submit']").show();
    });
</script>
@endsection

