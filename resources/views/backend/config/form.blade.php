@extends('backend.layout.main')
@section('title', 'Page Title')
@section('content')
<div class="page-content">
	<div class="page-header" style="overflow:hidden">
		<h1>
			{{$data['title'] or ''}}
		</h1>
	</div>
    <div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		{!!$data['messElemnt'] or ''!!}
		<form class="form-horizontal" role="form" action="" method="POST">
			{!!$data['element'] or ''!!}
			<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
			<div class="clearfix form-actions">
				<div class="col-md-offset-2 col-md-10">
					<button style="margin-left: -22px;"class="btn btn-info" type="submit">
						<i class="ace-icon fa fa-check bigger-110"></i>
						Cập nhật
					</button>
					&nbsp;&nbsp;&nbsp;
					<button class="btn" type="reset">
						<i class="ace-icon fa fa-undo bigger-110"></i>
						Reset
					</button>
				</div>
			</div>
		</form>
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
    $('.ace-input-file').ace_file_input({
		no_file:'No File ...',
		btn_choose:'Choose',
		btn_change:'Change',
		droppable:false,
		onchange:null,
		thumbnail:false //| true | large
		//whitelist:'gif|png|jpg|jpeg'
		//blacklist:'exe|php'
		//onchange:''
		//
	});
@stop