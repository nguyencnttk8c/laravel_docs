@extends('frontend.layout.layout')
@section('sidebar', view('frontend.layout.sidebar'))
@section('generalDoc', view('frontend.layout.generalDoc'))
@section('content')
<div class="col-md-9">
@if ($data['results']->total())
	<div class="listtailieu">
        <div class="site-title"><h3 class="title">Tài liệu dành cho <span style="color:#f00">{{ $data['category'] }}</span></h3></div>
        <div class="row">
            <ul class="products">
        	@if (isset($data['results']))
				@foreach ($data['results'] as $item)
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
                            {{ \App\Models\Customer::find($item['author'])->name }}
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

    @if(isset($data['results']) && $data['results'])
        @include('Common.pagination', ['paginator' => $data['results']])
    @endif
@else 
	<h3 class='titel'>Không có tài liệu nào thuộc danh mục {{ $data['category'] }}</h3>
@endif
</div>
@endsection