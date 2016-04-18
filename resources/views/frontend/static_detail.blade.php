@extends('frontend.static_layout.layout')
@section('sidebar', view('frontend.static_layout.sidebar')->with('active', $data['siderbar']))
@section('content')
@if (isset($data['content']) && count($data['content']) > 0 && $data['content'])
<div class="search_bottom_right">
	<div class="relase_static">
	    <p>Tin liên quan</p>
	    @if(isset($data['related_news']) && count($data['related_news']) > 0)
		    <ul>
	    	@foreach($data['related_news'] as $item)
				<li><a target="_blank" title="{{$item->title}}" href="/static_detail/{{ $item->slug }}">{{ $item->title }}</a></li>
	    	@endforeach
		    </ul>
	    @endif
	</div>
	<div class="item detail_static">
		<h1>{{ $data['content']->title }}</h1>
		<ul class="doc_tk_cnt">
		    <li><i class="icon_watch"></i>{{ date('d/m/Y', strtotime($data['content']->created_at)) }}</li>
		</ul>
		<div class="social">
			<div class="fb-like fb_iframe_widget" data-href="http://123doc.org//statics-detail/1-gioi-thieu-ve-123doc-org.htm" 
				data-layout="button_count" data-action="like" data-show-faces="false" data-share="true" fb-xfbml-state="rendered" 
				fb-iframe-plugin-query="action=like&amp;app_id=389304137790873&amp;container_width=0&amp;href=http%3A%2F%2F123doc.org%2F%2Fstatics-detail%2F1-gioi-thieu-ve-123doc-org.htm&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;show_faces=false">
				<span style="vertical-align: bottom; width: 141px; height: 20px;">
					<iframe name="f35f2a575a16d24" width="1000px" height="1000px" frameborder="0" allowtransparency="true" 
					allowfullscreen="true" scrolling="no" title="fb:like Facebook Social Plugin" 
					src="http://www.facebook.com/v2.0/plugins/like.php?action=like&amp;app_id=389304137790873&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D42%23cb%3Df18a842279c6724%26domain%3D123doc.org%26origin%3Dhttp%253A%252F%252F123doc.org%252Ff1d03dfa87ddcb4%26relation%3Dparent.parent&amp;container_width=0&amp;href=http%3A%2F%2F123doc.org%2F%2Fstatics-detail%2F1-gioi-thieu-ve-123doc-org.htm&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;show_faces=false" style="border: none; visibility: visible; width: 141px; height: 20px;" class=""></iframe>
				</span>
			</div>
		</div>
		<div class="content_static">
			{!! $data['content']->content !!}
		</div>
	</div>
</div>
@endif
@endsection