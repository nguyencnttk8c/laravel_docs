@extends('backend.templates.gird')
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
            <a href="/backend/transaction/edit/{{$record->id}}">
              <button class="btn btn-xs btn-info">
                <i class="ace-icon fa fa-pencil bigger-120"></i>
              </button>
            </a>
            <a href="javascript:void(0)" onclick="deleteRecord({{$record->id}},'document')" >
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