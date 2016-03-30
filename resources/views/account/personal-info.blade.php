@extends('frontend.layout.layout')
@section('sidebar')
@include('account.layout.sidebar')
@endsection
@section('content')
<div class="col-md-9 col-sx-8">
    <h1>Cập nhật thông tin cá nhân</h1>
    <form role="form" method="post" action="">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="name">Họ tên:</label>
            <input type="text" class="form-control" id="text" name="name" required value="{{$user->name}}">
        </div>
        <div class="form-group">
            <label for="email">Địa chỉ Email:</label>
            <input type="email" class="form-control" id="email" name="email" required value="{{$user->email}}">
        </div>
        <div class="form-group">
            <label for="phone">Số điện thoại:</label>
            <input type="text" class="form-control" id="phone" name="phone" required value="{{$user->phone}}">
        </div>
        <div class="form-group">
            <label for="id_card">CMTND:</label>
            <input type="text" class="form-control" id="id_card" name="id_card" required value="{{$user->id_card}}">
        </div>
        <div class="form-group">
            <label for="birth_day">Ngày sinh:</label>
            <input type="text" class="form-control" id="birth_day" name="birth_day" required value="{{$user->birth_day}}">
        </div>
        <div class="radio">
            <label><input name="gender" type="radio" value="nam" {{($user->gender == 'nam') ? 'checked' : NULL}}> Nam</label>
            <label><input name="gender" type="radio" value="nu" {{($user->gender == 'nu') ? 'checked' : NULL}}> Nữ</label>
        </div>
        <div class="form-group">
            <label for="address">Địa chỉ:</label>
            <input type="text" class="form-control" id="address" name="address" value="{{$user->address}}">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>
@endsection

