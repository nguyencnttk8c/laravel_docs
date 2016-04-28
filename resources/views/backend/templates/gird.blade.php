@extends('backend.layout.main')
@section('title', 'Page Title')
@section('content')
	<div class="page-content">
		<div class="page-header" style="overflow:hidden">
			<h1>
				{{$data['title'] or 'Hệ thống quản trị nội dung website'}}
			</h1>
			@if(isset($data['frmSearch']))
			<div class="search" style="overflow: hidden;padding: 0 0 24px 0;margin: 15px 0;background: #ededed;">
				<form>
					@yield('search')
					<div class="form-group">
					  <div class="col-sm-2">
					  	 <button value="active" name="search" style="width:100%;margin-top: 25px;padding: 2px;" class="btn btn-danger" type="submit">
							<i class="ace-icon fa fa-search bigger-110"></i>
							Tìm kiếm
						</button>
					  </div>
					</div>
					<div class="form-group">
					  <div class="col-sm-2">
					  	 <button style="width:100%;margin-top: 25px;padding: 2px;" class="remove-filters btn btn-warning" type="button">
							<i class="ace-icon fa fa-undo bigger-110"></i>
							Làm mới bộc lọc
						</button>
					  </div>
					</div>
				</form>
			</div>
			@endif
			<div class="pull-right">
				<a href="/backend/{{$data['url'] or ''}}">
					<button class="btn btn-success" type="submit" name="search" >
						<i class="ace-icon fa fa-plus bigger-110"></i>
						Thêm mới
					</button>
				</a>
			</div>
		</div><!-- /.page-header -->
		<div class="row">
			 <div class="col-xs-12">
				<!-- PAGE CONTENT BEGINS -->
				{!!\Session::get('messElemnt')!!}
				<div class="dataTables_info" id="dynamic-table_info" role="status" aria-live="polite">
					<h5>Hiển thị 
						{{App\Helpes\Backend\Functions::displaySearchCounter($data['list']->currentPage(),10,$data['list']->total())}} 
						trong {{$data['list']->total()}} bản nghi
					</h5>
				</div>
				<div class="row">
					<div class="col-xs-12">
						@yield('tables')
						<div class="row">
							<div class="dataTables_paginate paging_simple_numbers" id="dynamic-table_paginate">
								{!! $data['list']->render() !!}
							</div>
						</div>
					</div><!-- /.span -->
				</div><!-- /.row -->
			</div>		
		</div><!-- /.row -->
	</div>								
@stop