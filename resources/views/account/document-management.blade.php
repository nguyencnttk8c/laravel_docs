@extends('frontend.layout.layout')
@section('sidebar')
@include('account.layout.sidebar')
@endsection
@section('content')
<div class="col-md-9">
    <h3 class="titel">Quản lý tài liệu</h3>
    <div class="titsearch"><span><input type="radio"/> Đã duyệt(1)</span>  <span><input type="radio"/> Chưa duyệt</span> <span><input type="radio"/> Cập nhật lại(1)</span> <span><input type="radio"/> lọc nâng cao</span>
        <div class="col-sm-3 pull-right"><input placeholder="tìm kiếm"/></div>
    </div>
    <div class="danhsachtailieu">
        @if(isset($data) && $data != '')
            @foreach($data as $item)
                <div class="doc_list_cnt list_cnt_small list div_del">
                    <p class="ck_man_doc_t"><input class="edit_doc" name="edit_doc[]" value="{{$item->id}}" type="checkbox"></p>
                    <i class="icon_type_doc"></i>
                    <span class="doc_man_date">Ngày tải lên :{{$item->created_at->format('d/m/Y, H:i')}} </span>
                    <a class="doc_cnt_img" href="/document/{{$item->slug}}" title="{{$item->title}}">
                        <img src="http://media.store123doc.com:8080/images/document/2016_03/26/medium_neh1458953902.jpg" alt="{{$item->title}}">
                    </a>
                    <div class="left_item_doc">
                        <a class="doc_title_cnt" href="/document/{{$item->slug}}">{{$item->title}}</a>
                        <ul class="doc_tk_cnt">
                            <li>
                                <i class="icon_doc"></i>6                                    </li>
                            <li>
                                <i class="icon_view"></i>13                                    </li>
                            <li>
                                <i class="icon_down"></i>0                                    </li>
                            <li>
                                <span class="cl_price">Miễn phí</span>
                            </li>
                        </ul>
                        <div class="doc_man_hover">
                            <a class="man_doc_del icon deleteitem" bid="{{$item->id}}" href="javascript:;">Xoá </a>
                            <a class="man_doc_edit icon" href="/document/edit-d3456525.htm">Sửa</a>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <hr>
            @endforeach
        @endif
    </div>
</div>
@endsection