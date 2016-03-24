@extends('backend.layout.main')
@section('title', 'Page Title')
@section('content')
    <div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<form class="form-horizontal" role="form" action="" method="POST">
			{!!$data['element'] or ''!!}
			<div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9">
					<button class="btn btn-info" type="submit">
						<i class="ace-icon fa fa-check bigger-110"></i>
						Cập nhật
					</button>
					&nbsp; &nbsp; &nbsp;
					<button class="btn" type="reset">
						<i class="ace-icon fa fa-undo bigger-110"></i>
						Reset
					</button>
				</div>
			</div>
		</form>
	</div>		
									
@stop