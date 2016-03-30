@extends('backend.templates.form')
@section('element')
<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Tên người dùng <b class='require'>*</b>
  </label>
  <div class="col-sm-10">
    <input data-validate="{required:true}" name="data[name]"  type="text" value="{{$data['current']->name or ''}}" class="form-control">
  </div>
</div>
<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Email <b class='require'>*</b>
  </label>
  <div class="col-sm-10">
    <input data-validate="{required:true,email:true}" name="data[email]" type="text" value="{{$data['current']->email or ''}}" class="form-control">
  </div>
  
</div>
<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Ngày sinh <b class='require'>*</b>
  </label>
   <div class="col-sm-10">
  <input data-validate="{required:true}" name="data[birth_day]" type="text" data-date-format="dd-mm-yyyy" value="{{$data['current']->birth_day or ''}}" class="form-control date-picker" >
  </div>
</div>	
<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Địa chỉ <b class='require'>*</b>
  </label>
   <div class="col-sm-10">
  <input data-validate="{required:true}" name="data[address]" type="text" value="{{$data['current']->address or ''}}" class="form-control">
  </div>
</div> 
<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Mật khẩu <b class='require'>*</b>
  </label>
   <div class="col-sm-10">
  <input data-validate="{required:true,minlength:5}" id="password" name="data[password]" type="password" value="{{$data['current']->address or ''}}" class="form-control">
  </div>
</div> 
<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Nhập lại mật khẩu <b class='require'>*</b>
  </label>
   <div class="col-sm-10">
  <input data-validate="{required:true,minlength:5,equalTo:#password}" name="pasword_match" type="password" value="{{$data['current']->address or ''}}" class="form-control">
  </div>
</div> 
<div class="form-group">
  <label  class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Số dư
  </label>
   <div class="col-sm-10">
  <input data-validate="{number:true}" name="aaa" type="text" value="{{$data['current']->balance or ''}}" class="form-control">
  </div>
</div>  									
@stop