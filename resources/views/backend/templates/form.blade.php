@extends('backend.layout.main')
@section('title', 'Page Title')
@section('content')
   <div class="page-content">
	<div class="page-header" style="overflow:hidden">
		<h1>
			{{$data['title'] or 'Hệ thống quản trị nội dung website'}}
		</h1>
		<div class="pull-right">
			<a href="/backend/{{$data['url'] or ''}}">
				<button class="btn btn-danger" type="submit">
					<i class="ace-icon fa fa-chevron-left bigger-110"></i>
					Quay lại
				</button>
			</a>
			
		</div>
	</div><!-- /.page-header -->
	<div class="row">

		  <div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			{!!\Session::get('messElemnt')!!}
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
	</div><!-- /.row -->
</div>												
@stop

