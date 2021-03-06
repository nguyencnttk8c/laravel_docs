@extends('backend.templates.gird')
@section('search')
<div class="form-group">
  <div class="col-sm-3">
     <label> Tiêu đề </label>
    <input placeholder="Nhập từ khóa ..." value="{{$_GET['title'] or NULL}}" name="title" type="text"  class="form-control">
  </div>
</div>
<div class="form-group">
  <div class="col-sm-3">
     <label> Danh mục </label>
    <select style="width:100%;height: 34px;" name="category">
      <option value="">Chọn danh mục</option>
       @if($data['categories'])
          @foreach($data['categories'] as $id => $name)
            <option {{(isset($_GET['category']))?($id == $_GET['category']?'selected':NULL):''}} value="{{$id}}">{{$name}}</</option>
          @endforeach
       @endif
    </select>
  </div>
</div>
<div class="form-group">
  <div class="col-sm-2">
     <label> Trạng thái </label>
     <select style="width:100%;height: 34px;" name="status">
      <option value="">Chọn trạng thái</option>
      <option {{(isset($_GET['status']) && $_GET['status'] == 1)?'selected':''}} value="1">Hoạt động</option>
      <option {{(isset($_GET['status']) && $_GET['status'] == -1)?'selected':''}} value="-1">Không hoạt động</option>
    </select>
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
      <th>Tiêu đề</th>
      <th>Danh mục</th>
      <th>Nội dung</th>
      <th>Hình ảnh</th>
      <th>
        <i class="ace-icon fa fa-clock-o bigger-110"></i>
        Ngày tạo
      </th>
      <th>Trạng thái</th>
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
          {{$record->title}}
        </td>

         <td>{{(\App\Models\Taxonomy::find($record->category))?\App\Models\Taxonomy::find($record->category)->tax_name: ''}}</td>

        <td>{{str_limit(strip_tags($record->content),150)}}</td>
        
        <td class="hidden-480">
          <span style="display:block;width:40px;height:20px;background:#fff;border:solid 1px #ccc"></span>
        </td>
     
        <td>{{$record->created_at}}</td>

        <td class="hidden-480">
          @if($record->status)
          <span class="label label-sm label-success">Hoạt động</span>
          @else
          <span class="label label-sm label-warning">Không hoạt động</span>
          @endif
        </td>

        <td>
          <div class="hidden-sm hidden-xs btn-group">
            <a href="/backend/articles/edit/{{$record->id}}">
              <button class="btn btn-xs btn-info">
                <i class="ace-icon fa fa-pencil bigger-120"></i>
              </button>
            </a>
            <a href="javascript:void(0)" onclick="deleteRecord({{$record->id}},'articles')" >
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