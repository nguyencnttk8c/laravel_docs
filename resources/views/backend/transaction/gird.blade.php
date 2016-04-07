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
      <th>Tác giả</th>
      <th>Tiêu đề</th>
      <th>Danh mục</th>
      <th>Định dạng</th>
      <th>Giá</th>
      <th>Hình ảnh</th>
      <th>Link file</th>
      <th>Số lượt xem</th>
      <th>Số lượt tải</th>
      <th><i class="ace-icon fa fa-clock-o bigger-110"></i>Ngày tạo</th>
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
          {{(\App\Models\Customer::find($record->author))?\App\Models\Customer::find($record->author)->name:''}}
        </td>

        <td>{{$record->title}}</td>

        <td>{{(\App\Models\Taxonomy::find($record->tax_id))?\App\Models\Taxonomy::find($record->tax_id)->tax_name: ''}}</td>
        <td>{{$record->format}}</td>
        <td>{{number_format($record->price)}}</td>
         
        <td class="hidden-480">
          <span style="display:block;width:40px;height:20px;background:#fff;border:solid 1px #ccc"></span>
        </td>
       
        <td><a href="{{$record->link_file}}">Tải xuống</a></td>
        <td>{{($record->DocumentMeta)?$record->DocumentMeta->num_viewed: 0}}</td>
        <td>{{($record->DocumentMeta)?$record->DocumentMeta->num_downloaded: 0}}</td>
        <td>{{$record->created_at}}</td>
        
        <td>
          <div class="hidden-sm hidden-xs btn-group">
            <a href="/backend/document/edit/{{$record->id}}">
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