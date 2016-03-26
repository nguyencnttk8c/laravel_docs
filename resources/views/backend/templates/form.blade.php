@extends('backend.layout.main')
@section('title', 'Page Title')
@section('content')
    <div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		{!!$data['messElemnt'] or ''!!}
		<form class="form-horizontal" role="form" action="" method="POST">
			@yield('element')
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
@stop