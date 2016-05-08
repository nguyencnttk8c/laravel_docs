@extends('frontend.layout.layout')
@section('generalDoc', view('frontend.layout.generalDoc'))
@section('content')
<div class="col-md-12">
    <div class="modal-dialog modal-md">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="modal-title" style="color: #FFF" id="myModalLabel"><i class="fa fa-sign-in"></i> Đăng nhập</h4>
            </div>
            <form id="sign_in" role="form" action="{!! route('postLogin') !!}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <p>{{Session::get('error')}}</p>
                <div class="panel-body">
                    <div class="alert alert-danger" id="divnotify">
                        <i class="fa fa-info-circle fa-lg"></i>
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="ctrlusername"> Tên đăng nhập </label>
                        <input value="{{ old('useremail') }}" type="text" name="useremail" id="ctrlusername" class="form-control" placeholder="Tên đăng nhập" tabindex="1" autocorrect="off" spellcheck="false" autocapitalize="off" autofocus="autofocus" />
                        {!! $errors->first('useremail') !!}
                    </div>
                    <div class="form-group">
                        <label for="ctrlpass">Mật khẩu</label>
                        <input type="password" name="password" id="ctrlpass" class="form-control" autocomplete="off" placeholder="Mật khẩu" tabindex="2" />
                        {!! $errors->first('password') !!}
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" id="ctrlloginbtn" tabindex="3"><i class="fa fa-sign-in"></i> Đăng nhập</button>
                        <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#forgotyourpassword">Quên mật khẩu?</a>
                        
                    </div>  
                    <div class="form-group">
                        <a href="{{URL('/')}}/googlelogin" class="fa-google-plus-square">Đăng nhập bằng google</a>
                        <a href="{{URL('/')}}/facebooklogin" class="fa-facebook-square">Đăng nhập bằng facebook</a>
                    </div>                      
                </div>
                <div class="panel-footer">
                    <a class="pull-right" href="/dang-ky/"><i class="fa fa-share-square-o"></i> Bạn chưa có tài khoản? Đăng ký ngay</a>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection