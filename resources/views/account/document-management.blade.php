@extends('frontend.layout.layout')
@section('sidebar', view('account.layout.sidebar')->with('current', 'doc'))
@section('content')
<section class="col-md-9" id="content-account">
    <div class="row">
        <div class="col-md-12">
            <h1 class="title">Quản lý tài liệu</h1>
        </div>
    </div>
    <div class="row titsearch">
        <div class="col-md-2">
            <input type="radio"/> Đã duyệt(1)
        </div>
        <div class="col-md-2">
            <input type="radio"/> Chưa duyệt
        </div>
        <div class="col-md-2">
            <input type="radio"/> Cập nhật lại(1)
        </div>
        <div class="col-md-2">
            <input type="radio"/> Lọc nâng cao
        </div>
        <div class="col-md-4">
            <input class="search" type="text " placeholder="Tìm Kiếm..."/>
        </div>
    </div>
    <div class="row danhsachtailieu">
        @if(isset($data) && $data != '')
            @foreach($data as $item)
                <div class="doc-item">
                    <div class="col-md-12">
                        <input class="edit_doc" name="edit_doc[]" value="{{$item->id}}" type="checkbox">
                    </div>
                    <div class="row">
                        <div class="col-md-2 doc-item-image">
                            <a  href="/document/{{$item->slug}}" title="{{$item->title}}">
                                <img src="http://media.store123doc.com:8080/images/document/2016_03/26/medium_neh1458953902.jpg" alt="{{$item->title}}">
                            </a>
                        </div>
                        <div class="col-md-7 doc-item-detail">
                            <div class="doc-item-title">
                                <h4><a href="/document/{{$item->slug}}">{{$item->title}}</a></h4>
                            </div>
                            <div class="doc-item-date">
                                <span>Ngày tải lên: {{$item->created_at->format('d/m/Y, H:i')}} </span>
                            </div>
                            <div class="doc-item-more">
                                <ul class="doc_tk_cnt">
                                    <li>
                                        <i class="fa fa-file-text-o"></i> 6
                                    </li>
                                    <li>
                                        <i class="fa fa-eye"></i> 13
                                    </li>
                                    <li>
                                        <i class="fa fa-download"></i> 0
                                    </li>
                                    <li>
                                        <span class="cl_price">Miễn phí</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</section>
@endsection