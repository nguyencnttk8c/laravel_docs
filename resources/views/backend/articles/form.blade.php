@extends('backend.templates.form')
@section('element')
<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Tiêu đề <b class='require'>*</b>
  </label>
  <div class="col-sm-9">
    <input data-validate="{required:true}" name="data[title]"  type="text" value="{{$data['current']->title or ''}}" class="form-control">
  </div>
</div>
<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Danh mục <b class='require'>*</b>
  </label>
  <div class="col-sm-9">
      <select class="col-sm-12" name="data[category]">
      <option value="0">-- Root --</option>
       @if($data['categories'])
          @foreach($data['categories'] as $id => $name)
            <option {{(isset($data['current']))?($id == $data['current']->category?'selected':NULL):''}} value="{{$id}}">-- {{$name}} --</</option>
          @endforeach
        @endif
    </select>
  </div>
</div>
<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Mô tả <b class='require'>*</b>
  </label>
   <div class="col-sm-9">
  <textarea class="col-sm-12" data-validate="{required:true}" name="data[description]">{{$data['current']->description or ''}}</textarea>
  </div>
</div>	
<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Nội dung <b class='require'>*</b>
  </label>
   <div class="col-sm-9" style="width: 74.9%;">
     <textarea class="content-editor" data-validate="{required:true}" name="data[content]">{{$data['current']->content or ''}}</textarea>
  </div>
</div> 
<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> SEO Meta Kewords
  </label>
   <div class="col-sm-9">
  <textarea class="col-sm-6"  name="data[meta_kewords]">{{$data['current']->meta_kewords or ''}}</textarea>
  </div>
</div> 

<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> SEO Meta Description
  </label>
   <div class="col-sm-9">
  <textarea class="col-sm-6"  name="data[meta_description]">{{$data['current']->meta_description or ''}}</textarea>
  </div>
</div>  

<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Trạng thái <b class='require'>*</b>
  </label>
  <div class="col-sm-9">
      <select class="col-sm-12" name="data[status]">
      <option value="1">-- Hoạt động --</option>
      <option value="0">-- Không hoạt động --</</option>
    </select>
  </div>
</div>									
@stop

@section('javascripts')
  tinymce.init({
      selector: ".content-editor",
      theme: "modern",
      content_css : "/backend/css/custom_editor.css",
      subfolder:"",
      relative_urls: false,
      remove_script_host: false,
      plugins: [
           "fullscreen advlist autolink link image lists charmap print preview hr anchor pagebreak",
           "searchreplace wordcount visualblocks visualchars code insertdatetime media nonbreaking",
           "table contextmenu directionality emoticons paste textcolor filemanager"
     ],
     image_advtab: true,
     toolbar: "fullscreen | undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect forecolor backcolor | link unlink anchor | image media | print preview code"
  });

@stop