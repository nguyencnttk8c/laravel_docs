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
  <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Tác giả <b class='require'>*</b>
  </label>
  <div class="col-sm-9">
     <select data-validate="{required:true}" class="col-sm-12" name="data[author]">
      <option value=""> -- Chọn tác giả --</option>

      @if($data['authors'])
        @foreach($data['authors'] as $id => $name)
          <option {{(isset($data['current']))?($id == $data['current']->author?'selected':NULL):''}} value="{{$id}}">{{$name}}</</option>
        @endforeach
      @endif
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Từ khóa <b class='require'>*</b>
  </label>
  <div class="col-sm-9">
    <input data-validate="{required:true}" class="col-sm-12" type="text" name="keywords" value="{{$data['keywords'] or ''}}" id="form-field-tags" placeholder="Nhập từ khóa ..." />
  </div>
</div>

<div class="form-group">
   <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Danh mục <b class='require'>*</b>  </label>
   <div class="col-sm-9">
    <select data-validate="{required:true}" class="col-sm-12" name="data[tax_id]">
      <option value="">-- Chọn danh mục --</option>
      @if($data['terms'])
        @foreach($data['terms'] as $id => $name)
          <option {{(isset($data['current']))?($id == $data['current']->tax_id?'selected':NULL):''}} value="{{$id}}">{{$name}}</</option>
        @endforeach
      @endif
    </select>
  </div>
</div>	
<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Giá <b class='require'>*</b>
  </label>
   <div class="col-sm-9">
  <input data-validate="{required:true,number:true}" name="data[price]" type="text" value="{{$data['current']->price or ''}}" class="form-control">
  </div>
</div> 
<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Chọn file tài liệu <b class='require'>*</b>
  </label>
   <div class="col-sm-9">
  <input data-validate="{required:true}" name="data[link_file]" type="file" value="{{$data['current']->address or ''}}" class="form-control">
  </div>
</div> 
<div class="form-group">
  <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Ảnh đại diện <b class='require'>*</b>
  </label>
   <div class="col-sm-9">
    <span class="profile-picture">
      
    </span>
  </div>
</div> 								
@stop
@section('javascripts')
jQuery(function($) {
  var tag_input = $('#form-field-tags');
    try{
      tag_input.tag(
        {
        placeholder:tag_input.attr('placeholder'),
       
        }
      )
  
      //programmatically add a new
      var $tag_obj = $('#form-field-tags').data('tag');
    
    }
    catch(e) {
      //display a textarea for old IE, because it doesn't support this plugin or another one I tried!
      tag_input.after('<textarea id="'+tag_input.attr('id')+'" name="'+tag_input.attr('name')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
      //$('#form-field-tags').autosize({append: "\n"});
    }
})    
@stop