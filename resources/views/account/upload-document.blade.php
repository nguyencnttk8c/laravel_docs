@extends('frontend.layout.layout')
@section('sidebar', view('account.layout.sidebar')->with('current', 'up'))
@section('content')
<div class="col-md-9">
    <h2 class="page_titel">Đăng tải tài liệu</h2>

    <div class="uploadtailieu">
        {!! FuncCommon::fileUploadInput() !!}
    </div>
    <br/>
    <div class="form-upload">
        <form role="form" method="post" action="">
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <label for="table[document][title]">Tên tài liệu <span class="required">(*)</span></label>
                    <input type="text" class="form-control" name="table[document][title]" id="document_title" value="" required/>
                    <input type="hidden" name="table[document][id]" id="document_id" value=""/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-xs-12 danh-muc">
                    <select title="Danh mục" class="selectpicker">
                        @if (isset($tax_list) && !empty($tax_list))
                            @foreach ($tax_list as $id=>$tax_name)
                                <option value="{{$id}}">{{$tax_name}}</option>
                            @endforeach
                        @endif
                    </select>
                    <input type="hidden" class="form-control" name="table[document][tax_id]" id="tax_id" value="" required/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <label for="table[doc_keywords][key_word]">Từ khóa <span class="required">(*)</span></label>
                    <input type="text" class="form-control" name="table[doc_keywords][key_word]" id="table[doc_keywords][key_word]" value="" required/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <label for="table[document][description]">Mô tả <span class="required">(*)</span></label>
                    <textarea name="table[document][description]" id="table[document][description]" rows="8"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <label for="table[document][price]">Giá bán <span class="required">(*)</span></label>
                    <input type="text" class="form-control" name="table[document][price]" id="table[document][price]" value="" required/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <label for="table[document][page_viewed]">Số trang xem trước <span class="required">(*)</span></label>
                    <input type="text" class="form-control" name="table[document][page_viewed]" id="table[document][page_viewed]" value="" required/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-xs-12">
                    <button type="submit" class="form-control btn btn-default">Lưu</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection