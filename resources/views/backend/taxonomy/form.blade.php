@extends('backend.templates.form')
@section('element')
<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Tên danh mục <b class='require'>*</b>
  </label>
  <div class="col-sm-9">
    <input name="data[tax_name]" data-validate="{required:true}" type="text" value="{{$data['current']->tax_name or ''}}" class="form-control">
  </div>
</div>
<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Loại <b class='require'>*</b>
  </label>
  <div class="col-sm-9">
    <select name="data[type]" class="col-sm-12" data-validate="{required:true}">
      <option value=""> Chọn kiểu danh mục</option>
      <option {{($data['current']->type == 'document' || !$data['current']->type)?'selected':NULL}} value="document"> Danh mục tài liệu</option>
      <option {{($data['current']->type == 'article')?'selected':NULL}} value="article"> Danh mục bài viết</option>
    </select>
  </div>  
</div>
<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Alias
  </label>
  <div class="col-sm-9">
    <input name="data[slug]" type="text" value="{{$data['current']->slug or ''}}" class="form-control">
  </div>
  <span class="col-md-offset-2 col-md-10">
	<span class="middle">Khi alias để trống đường dẫn sẽ tự động lấy theo tiêu đề của bạn. Khi alias có giá trị thì đường dẫn của bạn sẽ lấy theo alias.</span>
 </span>
</div>
<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Danh mục cha
  </label>
  <div class="col-sm-9">
    <select name="data[parent]" class="col-sm-12">
    	<option value="0"> Chọn danh mục</option>
    	{!!$data['optionsCategory']!!}
    </select>
  </div>	
</div>										
@stop