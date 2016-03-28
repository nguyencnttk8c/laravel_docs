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
      <th>Tên danh mục</th>
      <th>Danh mục cha</th>
      <th class="hidden-480">Hình ảnh</th>
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
            <input type="checkbox" class="ace" />
            <span class="lbl"></span>
          </label>
        </td>

        <td>
          {{$record->tax_name}}
        </td>
        <td>{{App\Models\Taxonomy::TaxName($record->parent)}}</td>
        <td class="hidden-480">
          <span style="display:block;width:40px;height:20px;background:#fff;border:solid 1px #ccc"></span>
        </td>
        <td>{{$record->created_at}}</td>

        <td class="hidden-480">
          <span class="label label-sm label-success">Hoạt động</span><!-- 
          <span class="label label-sm label-warning">Không hoạt động</span> -->
        </td>

        <td>
          <div class="hidden-sm hidden-xs btn-group">
            <a href="/backend/taxonomy/edit/{{$record->id}}">
              <button class="btn btn-xs btn-info">
                <i class="ace-icon fa fa-pencil bigger-120"></i>
              </button>
            </a>
             <a href="#">
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