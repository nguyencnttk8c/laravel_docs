@extends('frontend.layout.layout')
@section('sidebar', view('frontend.layout.sidebar'))
@section('generalDoc', view('frontend.layout.generalDoc'))
@section('content')

<div class="col-md-9">
   	<h2 class="page_titel">Đăng ký tài khoản</h2>

	<div class="panel panel-default">
		<form action="" method="post" name="frmTransaction" id="frmTransaction">
	    	<div class="panel-body">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	            <div class="form-group">
	                <label class="control-label" for="ctrlhotentxt">Họ tên<span class="asterisk_input"></span></label>
	                <input type="text" id="ctrlhotentxt"  name="ctrlhotentxt" value="{{ old('ctrlhotentxt') }}" class="form-control" placeholder="Họ tên" maxlength="50" tabindex="1">
	            	{!! $errors->first('ctrlhotentxt') !!}
	            </div>
	            <div class="form-group">
	                <label class="control-label" for="ctrlphonetxt">Số điện thoại<span class="asterisk_input"></span></label>
	                <input type="text" id="ctrlphonetxt" name="ctrlphonetxt" value="{{ old('ctrlphonetxt') }}" class="form-control" placeholder="Số điện thoại" maxlength="12" tabindex="2">
	            	{!! $errors->first('ctrlphonetxt') !!}
	            </div>
	            <div class="form-group">
	                <label class="control-label" for="ctrlemailtxt">Địa chỉ email<span class="asterisk_input"></span></label>
	                <input type="email" id="ctrlemailtxt" name="ctrlemailtxt" class="form-control" placeholder="Địa chỉ email" value="{{ old('ctrlemailtxt') }}" autocorrect="off" spellcheck="false" autocapitalize="off" tabindex="3">
	            	{!! $errors->first('ctrlemailtxt') !!}
	            </div>
	            <div class="form-group">
	                <label class="control-label" for="ctrlpasstxt">Mật khẩu<span class="asterisk_input"></span></label>
	                <input type="password" id="ctrlpasstxt" name="ctrlpasstxt" class="form-control" placeholder="Mật khẩu" autocomplete="off" tabindex="4">
	            	{!! $errors->first('ctrlpasstxt') !!}
	            </div>
	            <div class="form-group">
	                <label class="control-label" for="ctrlrepasstxt">Nhập lại mật khẩu<span class="asterisk_input"></span></label>
	                <input type="password" id="ctrlrepasstxt" name="ctrlrepasstxt" class="form-control" placeholder="Mật khẩu" autocomplete="off" tabindex="5">
	            	{!! $errors->first('ctrlrepasstxt') !!}
	            </div>
	    	</div>
		    <div class="form-inline">
		        <div class="form-group">
		            <div class="col-sm-12">
		                <label class="control-label" for="ValidateCode">Nhập mã kiểm tra<span class="asterisk_input"></span></label>
		                <input maxlength="40" class="form-control" autocomplete="off" data-val="true" placeholder="Nhập mã kiểm tra" data-val-required="Vui lòng điền mã xác nhận" id="ValidateCode" name="ValidateCode" type="text" value="" tabindex="6">
		                
		            </div>
		        </div>
		        <div class="form-group">
		            <label class="control-label" for="ValidateCode">&nbsp;</label>
		            <img alt="Nhấp vào ảnh để đổi ảnh khác" title="Nhấp vào ảnh để đổi ảnh khác" src="/User/ValidateCode" style="cursor: pointer;"
		                 onclick="RefreshValidateCode(this);" />
		        </div>        
		    </div>
		    <div class="form-group">        
		        
		        
		    </div>
		    <br />
		    <div class="form-group">        
		        <div class="col-sm-12">Bằng cách nhấn vào "Đăng ký tài khoản", bạn đồng ý với <a href="#" target="_blank">Điều khoản & Điều kiện</a> của chúng tôi và rằng bạn đã đọc <a href="#" target="_blank">chính sách bảo mật</a></div>
		        <div class="clearfix"></div>
		    </div>

		    <div class="panel-footer">
		        <button type="submit" class="btn btn-primary" id="ctrregisterbtn" data-dismiss="modal" tabindex="7"><i class="fa fa-sign-in"></i> Đăng ký tài khoản</button>        
		        <div class="clearfix"></div>
		    </div>
        </form>
	</div>
</div>
@endsection