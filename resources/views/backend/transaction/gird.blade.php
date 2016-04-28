@extends('backend.templates.gird')
@section('search')
<div class="form-group">
  <div class="col-sm-2">
     <label> Mã giao dịch </label>
    <input placeholder="Nhập mã giao dịch ..." value="{{$_GET['trading_code'] or NULL}}" name="trading_code" type="text"  class="form-control">
  </div>
</div>
<div class="form-group">
  <div class="col-sm-2">
     <label> Khách hàng </label>
    <select style="width:100%;height: 34px;" name="owner_id">
      <option value="">Chọn khách hàng</option>
      @if($data['authors'])
        @foreach($data['authors'] as $id => $name)
          <option {{(isset($_GET['owner_id']))?($id == $_GET['owner_id']?'selected':NULL):''}} value="{{$id}}">{{$name}}</</option>
        @endforeach
      @endif
    </select>
  </div>
</div>
<div class="form-group">
  <div class="col-sm-2">
     <label> Hình thức thanh toán </label>
    <select style="width:100%;height: 34px;" name="category">
      <option value="">Chọn hình thức thanh toán</option>
    </select>
  </div>
</div>
<div class="form-group">
  <div class="col-sm-2">
     <label> Trạng thái </label>
     <select style="width:100%;height: 34px;" name="status">
      <option value="">Chọn trạng thái</option>
    </select>
  </div>
</div>
<div class="form-group">
  <div class="col-sm-4">
    <label style="display:block"> Ngày giao dịch </label>
    <div class="range">
    <label> Từ ngày </label>
    <input placeholder="Ngày bắt đầu ..." value="{{$_GET['trading_date|from'] or NULL}}" name="trading_date|from" type="text"  class="form-control date-picker">
    <label>  Đến ngày </label>
    <input placeholder="Ngày kết thúc ..." value="{{$_GET['trading_date|to'] or NULL}}" name="trading_date|to" type="text"  class="form-control date-picker">
    </div>
  </div>
</div>
@stop
@section('tables')
<table id="simple-table" class="table table-striped table-bordered table-hover">
  <thead>
    <tr>
      
      <th class="center">
        <label class="pos-rel">
          <input type="checkbox" class="ace" />
          <span class="lbl"></span>
        </label>
      </th>
      <th>ID</th>
      <th>Mã giao dịch</th>
      <th>Hình thức thanh toán</th>
      <th>Khách hàng</th>
      <th>Tình trạng</th>
      <th>Số tiền giao dịch</th>
      <th><i class="ace-icon fa fa-clock-o bigger-110"></i>Ngày giao dịch</th>
      <th>Thao tác</th>
      
    </tr>
  </thead>

  <tbody>
    @if($data['list'])
      @foreach($data['list'] as $record)
        <tr>
        <td class="center">
          <label class="pos-rel">
            <input type="checkbox" value="{{$record->id}}" class="ace" />
            <span class="lbl"></span>
          </label>
        </td>
        <td>
          {{$record->id}}
        </td>
        <td>
         {{$record->trading_code}}
        </td>

        <td> Thanh toán bằng thẻ điện thoại</td>

        <td>{{(\App\Models\Customer::find($record->owner_id))?\App\Models\Customer::find($record->owner_id)->name:''}}</td>
      
        <td>Đang chờ</td>
        <td>{{number_format($record->amount_money)}}</td>
        <td>{{$record->trading_date}}</td>
        
        <td>
          <div class="hidden-sm hidden-xs btn-group">
            
            <a href="javascript:void(0)" onclick="deleteRecord({{$record->id}},'transaction')" >
            <button class="btn btn-xs btn-danger">
              <i class="ace-icon fa fa-trash-o bigger-120"></i>
            </button>
            </a>
          </div>
        </td>
      </tr>
      @endforeach
    @endif
    
  </tbody>
</table>									
@stop
@section('javascripts') 
$('.date-picker').datetimepicker({format: 'YYYY-MM-DD'});
@stop