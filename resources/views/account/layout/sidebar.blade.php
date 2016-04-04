<aside class="col-md-3 col-sx-4" id="sidebar-account">
<!--    <h3 class="title">Chức năng</h3>-->

    <nav class="listcategory">
        <ul class="listParentCate">
            <li class="{{(isset($current) && $current=='doc') ? 'active' : ''}}">
                <a href="/account/quan-ly-tai-lieu" title="Giáo dục đào tạo" >
                    <i class="fa fa-files-o"></i>
                    <span>Quản lý tài liệu</span>
                </a>
            </li>
            <li class="{{(isset($current) && $current=='fin') ? 'active' : ''}}">
                <a  href="/account/quan-ly-tai-chinh">
                    <i class="fa fa-usd"></i>
                    <span>Quản lý tài chính</span>
                </a>
            </li>
            <li class="{{(isset($current) && $current=='per') ? 'active' : ''}}">
                <a  href="/account/thong-tin-ca-nhan">
                    <i class="fa fa-user"></i>
                    <span>Thông tin cá nhân</span>
                </a>
            </li>
            <li class="{{(isset($current) && $current=='inc') ? 'active' : ''}}">
                <a href="/account/thong-ke-doanh-thu">
                    <i class="fa fa-line-chart"></i>
                    <span>Thống kê</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>