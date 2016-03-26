This is homepage of Homebook. <br>
@if (Auth::check())
{{Auth::user()->name}}<br>
<a href="/dang-xuat/">Đăng xuất</a>
@else 
<br>
<a href="/dang-nhap/">Đăng nhập</a>
@endif