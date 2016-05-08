@extends('frontend.layout.layout')
@section('sidebar', view('frontend.layout.sidebar'))
@section('generalDoc', view('frontend.layout.generalDoc'))
@section('content')
	<div class="col-md-9 col-xs-12">
	    <div class="listtailieu">
	        <div class="site-title"><h3 class="title"><img src="{{ asset('frontend/images/dau-muc-tai-lieu.png') }}" alt="">Tài liệu mới nhất</h3></div>
	        <div class="row">
	            <ul class="products">
            	@if (isset($data['lastestDoc']))
					@foreach ($data['lastestDoc'] as $item)
						<li class="col-sm-3 product">
	                    	<div class="doc-list">
	                    		<a class="doc-img" href="#">
	                            <img src="{{URL('/')}}/frontend/images/medium_cad1364805486.jpg"/>
	                        </a>
	                        <a href="#" class="doc-title">
	                            <i class="icon icon-doc-title {{ \FuncFrontend::getDocIcon($item['format']) }}"></i>
	                            {{ $item['title'] }}
	                        </a>
	                        <a href="#" class="doc-author">
	                            {{ (\App\Models\Customer::find($item['author'])) ? \App\Models\Customer::find($item['author'])->name : '' }}
	                        </a>
	                        <ul class="doc_tk_cnt">                                    
	                            <li><i class="icon_doc"></i>{{ $item['total_page'] }}</li>
	                            <li><i class="icon_view"></i>{{ \FuncFrontend::getDocMeta($item['id'], 'num_viewed') }}</li>
	                            <li><i class="icon_down"></i>{{ \FuncFrontend::getDocMeta($item['id'], 'num_downloaded') }}</li>            
	                        </ul>
	                    </div>
	                </li>
					@endforeach
            	@endif
	            </ul>
	        </div>
	    </div>

     	<div class="listtailieu">
	        <div class="site-title"><h3 class="title"><img src="{{ asset('frontend/images/dau-muc-tai-lieu.png') }}" alt="">Tài liệu tải nhiều</h3></div>
	        <div class="row">
	            <ul class="products">
	                @if (isset($data['highestDownload']))
						@foreach ($data['highestDownload'] as $item)
							<li class="col-sm-3 product">
		                    	<div class="doc-list">
		                    		<a class="doc-img" href="#">
		                            <img src="{{URL('/')}}/frontend/images/medium_cad1364805486.jpg"/>
		                        </a>
		                        <a href="#" class="doc-title">
		                            <i class="icon icon-doc-title {{ \FuncFrontend::getDocIcon($item['format']) }}"></i>
		                            {{ $item['title'] }}
		                        </a>
		                        <a href="#" class="doc-author">
		                            {{ (isset(\App\Models\Customer::find($item['author'])->name)) ? \App\Models\Customer::find($item['author'])->name : '' }}
		                        </a>
		                        <ul class="doc_tk_cnt">
		                            <li><i class="icon_doc"></i>{{ $item['total_page'] }}</li>
		                            <li><i class="icon_view"></i>{{ \FuncFrontend::getDocMeta($item['id'], 'num_viewed') }}</li>
		                            <li><i class="icon_down"></i>{{ \FuncFrontend::getDocMeta($item['id'], 'num_downloaded') }}</li>            
		                        </ul>
		                    </div>
		                </li>
						@endforeach
	            	@endif
	            </ul>
	        </div>
	    </div>

	    <div class="listtailieu">
	        <div class="site-title"><h3 class="title"><img src="{{ asset('frontend/images/dau-muc-tai-lieu.png') }}" alt="">Tài liệu xem nhiều</h3></div>
	        <div class="row">
	            <ul class="products">
	                @if (isset($data['hightestView']))
						@foreach ($data['hightestView'] as $item)
							<li class="col-sm-3 product">
		                    	<div class="doc-list">
		                    		<a class="doc-img" href="#">
		                            <img src="{{URL('/')}}/frontend/images/medium_cad1364805486.jpg"/>
		                        </a>
		                        <a href="#" class="doc-title">
		                            <i class="icon icon-doc-title {{ \FuncFrontend::getDocIcon($item['format']) }}"></i>
		                            {{ $item['title'] }}
		                        </a>
		                        <a href="#" class="doc-author">
		                            {{ (isset(\App\Models\Customer::find($item['author'])->name)) ? \App\Models\Customer::find($item['author'])->name : '' }}
		                        </a>
		                        <ul class="doc_tk_cnt">
		                            <li><i class="icon_doc"></i>{{ $item['total_page'] }}</li>
		                            <li><i class="icon_view"></i>{{ \FuncFrontend::getDocMeta($item['id'], 'num_viewed') }}</li>
		                            <li><i class="icon_down"></i>{{ \FuncFrontend::getDocMeta($item['id'], 'num_downloaded') }}</li>            
		                        </ul>
		                    </div>
		                </li>
						@endforeach
	            	@endif
	            </ul>
	        </div>
	    </div>
	</div>
@endsection
