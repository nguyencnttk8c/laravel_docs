<h2>Đăng ký</h2>
<form action="" method="post">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	Tên người dùng    : <input type="text" name="username" value="{{ old('username') }}" placeholder="Nhập tên . . .">
	<br>{!! $errors->first('username') !!}<br/>
	Email         	  : <input type="text" name="useremail" value="{{ old('useremail') }}" placeholder="Nhập email . . .">
	<br>{!! $errors->first('useremail') !!}<br>
	Mật khẩu      	  : <input type="password" name="password" placeholder="Nhập mật khẩu . . .">
	<br>{!! $errors->first('password') !!}<br>
	Xác nhận mật khẩu : <input type="password" name="repassword" placeholder="Nhập lại mật khẩu . . .">
	<br>{!! $errors->first('repassword') !!}<br>
	<button type="submit">Đăng ký</button>
	<a href="/">Hủy bỏ</a>
</form>