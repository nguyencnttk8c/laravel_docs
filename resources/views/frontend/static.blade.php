@extends('frontend.static_layout.layout')
@section('sidebar', view('frontend.static_layout.sidebar')->with('active', $data['siderbar']))
@section('content')
@if (isset($data['content']) && count($data['content']) > 0 && $data['content'])
<div class="search_bottom_right" id="sta_right" style="min-height: 300px">
    <h2>{{ (isset($data['title']) && $data['title']) ? $data['title'] : '' }}</h2>
    <div class="list_item" id="list_item">
    @foreach($data['content'] as $item)
        <div class="item">
            <h2>
                <a href="/static-detail/{{ $item['slug'] }}" target="_blank" title="{{$item['title']}}">{{$item['title']}}</a>
            </h2>
            <ul class="doc_tk_cnt">
                <li><i class="icon_watch"></i>{{ date('d/m/Y', strtotime($item['created_at'])) }}</li>
            </ul>
            <div></div>
        </div>
    @endforeach
    </div>
</div>
@else
<p>Không có bài viết nào trong chuyên mục này.</p>
@endif
@endsection