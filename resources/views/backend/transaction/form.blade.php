@extends('backend.templates.form')
@section('element')
<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Mã giao dịch <b class='require'>*</b>
  </label>
  <div class="col-sm-9">
    <input data-validate="{required:true}" name="data[trading_code]"  type="text" value="{{$data['current']->trading_code or ''}}" class="form-control">
  </div>
</div>
<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Hình thức thanh toán <b class='require'>*</b>
  </label>
  <div class="col-sm-9">
     <select data-validate="{required:true}" class="col-sm-12" name="data[trading_type]">
      <option value=""> -- Chọn hình thức thanh toán --</option>
      <option value="1"> -- Thanh toán bằng thẻ điện thoại --</option>
    </select>
  </div>
</div>

<div class="form-group">
   <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Khách hàng <b class='require'>*</b>  </label>
   <div class="col-sm-9">
    <select data-validate="{required:true}" class="col-sm-12" name="data[owner_id]">
      <option value="">-- Chọn khách hàng --</option>
      @if($data['authors'])
        @foreach($data['authors'] as $id => $name)
          <option {{(isset($data['current']))?($id == $data['current']->owner_id?'selected':NULL):''}} value="{{$id}}">{{$name}}</</option>
        @endforeach
      @endif
    </select>
  </div>
</div>	
<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Số tiền <b class='require'>*</b>
  </label>
   <div class="col-sm-9">
  <input data-validate="{required:true,number:true}" name="data[amount_money]" type="text" value="{{$data['current']->amount_money or ''}}" class="form-control">
  </div>
</div> 
<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Ngày giao dịch <b class='require'>*</b>
  </label>
   <div class="col-sm-9">
  <input data-validate="{required:true}" name="data[trading_date]"  type="text" value="{{$data['current']->trading_date or ''}}" class="form-control date-picker" >
  </div>
</div> 
@stop
@section('javascripts') 
$('.date-picker').datetimepicker({format: 'YYYY-MM-DD'});

@stop