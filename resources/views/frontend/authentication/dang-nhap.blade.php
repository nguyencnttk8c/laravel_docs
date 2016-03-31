<h2>Đăng nhập</h2>
<form action="" method="post">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	Email         	  : <input type="text" name="useremail" value="{{ old('useremail') }}" placeholder="Nhập email . . .">
	<br>{!! $errors->first('useremail') !!}<br>
	Mật khẩu      	  : <input type="password" name="password" placeholder="Nhập mật khẩu . . .">
	<br>{!! $errors->first('password') !!}<br>
	<button type="submit">Đăng nhập</button>
	<a href="/">Hủy bỏ</a>
</form>