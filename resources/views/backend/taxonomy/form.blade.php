@extends('backend.templates.form')
@section('element')
<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Tên danh mục 
  </label>
  <div class="col-sm-10">
    <input name="data[tax_name]" type="text"  class="form-control">
  </div>
</div>
<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Alias
  </label>
  <div class="col-sm-10">
    <input name="data[slug]" type="text"  class="form-control">
  </div>
  <span class="col-md-offset-2 col-md-10">
	<span class="middle">Khi alias để trống đường dẫn sẽ tự động lấy theo tiêu đề của bạn. Khi alias có giá trị thì đường dẫn của bạn sẽ lấy theo alias.</span>
 </span>
</div>
<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Danh mục cha
  </label>
  <div class="col-sm-10">
    <select name="data[parent]" class="col-sm-12">
    	<option value="0"> Chọn danh mục</option>
    	{!!$data['optionsCategory']!!}
    </select>
  </div>	
</div>										
@stop