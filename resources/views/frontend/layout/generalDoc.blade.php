<?php  
    $data = \FuncCommon::getGeneralDoc();
?>

<div class="listtailieu">
    <div class="site-title"><h3 class="title">Tài liệu chung</h3></div>
    <div class="row">
    @foreach($data as $key => $block)
        <div class="col-md-3">
            <h4 class="title-2">
                @if ($key == 'lvbc')
                    Luận văn - Báo cáo
                @elseif ($key == 'gddt')
                    Giáo dục - Đào tạo
                @elseif ($key == 'ktcn')
                    Kỹ thuật - Công nghệ
                @else 
                    Công nghệ - Thông tin
                @endif
            </h4>
            <div class="total_doc_item_common">
            @if(isset($block) && count($block) > 0)
                @foreach ($block as $item)
                    <div class="item_common">
                        <a href="#" target="_blank" title="{{ $item['title'] }}">
                        @if($item->format == 'pdf')
                            <i class="icon i_type_doc i_type_doc2"></i>
                        @elseif ($item->format == 'doc' || $item->format == 'docx')
                            <i class="icon i_type_doc i_type_doc1"></i>
                        @elseif ($item->format == 'ppt' || $item->format == 'pptx')
                            <i class="icon i_type_doc i_type_doc3"></i>
                        @else
                            <i class="icon i_type_doc i_type_doc5"></i>
                        @endif
                            {{ str_limit($item['title'], 50) }}   </a>
                            <ul class="doc_tk_cnt">
                                <li>
                                    <i class="icon_doc"></i>{{ $item['total_page'] }}</li>
                                <li>
                                    <i class="icon_view"></i>{{ \FuncFrontend::getDocMeta($item['id'], 'num_viewed') }}</li>
                                <li>
                                    <i class="icon_down"></i>{{ \FuncFrontend::getDocMeta($item['id'], 'num_downloaded') }}</li>
                            </ul>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                @endforeach
            @endif
            </div>
        </div>
    @endforeach
     </div>
</div>