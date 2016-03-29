<footer>
	<div class="container">
        <div class="row row_footer">
            <div class="col-md-4">
                <h3>Hỗ trợ Online</h3>
                <div>
                    Email: banthe247@gmail.com<br />
                    Hotline: 0913081236<br />
                </div>
            </div>
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
                <h3>Điều khoản sử dụng</h3>
                <div>
                    <ul>
                        <li>
                            <a href="#">Quy định chung</a>
                        </li>
                        <li>
                            <a href="#">Quy trình xử lý khiếu nại</a>
                        </li>
                        <li>
                            <a href="#">Quy trình thanh toán</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
	</div>
</footer>

<div class="modal fade" id="signin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-times"></i></span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-sign-in"></i> Đăng nhập</h4>
            </div>
            <form id="sign_in" role="form" action="/user" method="POST">
                <div class="panel-body">
                    <div class="alert alert-danger" id="divnotify">
                        <i class="fa fa-info-circle fa-lg"></i>
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="ctrlusername"> Tên đăng nhập </label>
                        <input type="text" name="ctrlusername" id="ctrlusername" class="form-control" placeholder="Tên đăng nhập" tabindex="1" autocorrect="off" spellcheck="false" autocapitalize="off" autofocus="autofocus" />
                    </div>
                    <div class="form-group">
                        <label for="ctrlpass">Mật khẩu</label>
                        <input type="password" name="ctrlpass" id="ctrlpass" class="form-control" autocomplete="off" placeholder="Mật khẩu" tabindex="2" />
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" id="ctrlloginbtn" tabindex="3"><i class="fa fa-sign-in"></i> Đăng nhập</button>
                        <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#forgotyourpassword">Quên mật khẩu?</a>
                        
                    </div>  
                    <div class="form-group">
                        <a href="#" class="fa-google-plus-square">Đăng nhập bằng google</a>
                        <a href="#" class="fa-facebook-square">Đăng nhập bằng facebook</a>
                    </div>                      
                </div>
                <div class="panel-footer">
                    <a class="pull-right" href="/user/register"><i class="fa fa-share-square-o"></i> Bạn chưa có tài khoản? Đăng ký ngay</a>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>