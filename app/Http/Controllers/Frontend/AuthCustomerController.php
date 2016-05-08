<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Customer, App\Models\SendMailTable;
use Validator, Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\FrontendRegisterRequest;
use App\Http\Requests\FrontendLoginRequest;

class AuthCustomerController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware($this->guestMiddleware(), ['except' => 'getLogout']);
    }

    protected function getRegister(){
        return view('frontend.authentication.dang-ky');
    }

    protected function postRegister(FrontendRegisterRequest $request) {
        \Session::forget('error');
        // Add new customer into Customers table

        $verify_code = \FuncFrontend::makeRandomString();
        $newCustomer = new Customer();
        $newCustomer->name = $request->ctrlhotentxt;
        $newCustomer->email = $request->ctrlemailtxt;
        $newCustomer->password = \Hash::make($request->ctrlpasstxt);
        $newCustomer->phone = $request->ctrlphonetxt;
        $newCustomer->role = 'user';   // set user's role is customer
        $newCustomer->status = 1; // set user's status is inactive
        $newCustomer->verify_code = $verify_code;
        $newCustomer->birth_day = date('Y-m-d', strtotime($request->ctrlbirthday));
        if ($request->ctrlgender == '1') {
            $newCustomer->gender = 'nam';
        } else {
            $newCustomer->gender = 'nu';
        }
        $newCustomer->address = $request->ctrladdress;
        
        $newCustomer->save();

        // Activate email

        $emailNotifications = new SendMailTable();
        $emailNotifications->SendFrom = $request->ctrlemailtxt;
        $emailNotifications->SendTo = 'hnv2016.dev@gmail.com';
        $emailNotifications->Subject = 'Kích hoạt tài khoản tại Nhà sách online';
        $emailNotifications->MailContent = '<p>Cảm ơn bạn đã đăng ký tài khoản tại trang web Nhà sách online</p><br/><p>Mời bạn vui lòng click vào link dưới đây để kích hoạt tài khoản <a href="'.URL('/').'/register-confirm-email/'.$verify_code.'/">Click vào đây</a></p><br><p>Hoặc bạn có thể copy và chạy trực tiếp đường link sau: '.URL('/').'/register-confirm-email/'.$verify_code.'/</p>';
        $emailNotifications->CreateDate = date('Y-m-d');
        $emailNotifications->Status = 'pending';
        $emailNotifications->save();

        // Return success message
        
        $message = '<p>Bạn đã đăng ký thành công tài khoản tại Nhà sách online. Một email chứa thông tin kích hoạt đã được gửi tới email của bạn. Mời bạn vui lòng kiểm tra mail để kích hoạt tài khoản. Xin cảm ơn!';
        
        return view('frontend.authentication.dang-ky', ['message' => $message]);
    }

    protected function getLogin() {
        return view('frontend.authentication.dang-nhap');
    }

    protected function postLogin(FrontendLoginRequest $request) {
        $auth = [
            'email'    => $request->useremail,
            'password' => $request->password,
            'status'   => 1
        ];

        if (Auth::attempt($auth)) {
            \Session::forget('error');
            return \Redirect::to('/');
        } else {
            return \Redirect::to('/')->with(['error' => 'Email, mật khẩu không chính xác hoặc tài khoản chưa kích hoạt!']);
        }
    }

    protected function getLogout() {
        Auth::logout();
        return redirect('/');
    }

    public function reInitCaptcha(){
        $response['img'] = '';

        $response['img'] = \Captcha::img();

        echo json_encode($response);
    }

    public function redirectToProviderFacebook()
    {
        return Socialite::with('facebook')->redirect();
    }

    public function handleProviderCallbackFacebook()
    {
        if (isset($_GET['error'])) {
            if (Session::get('isRegister'))
                return redirect('/dang-ky/');
            return redirect('/dang-nhap/');
        }
        try {
            $user = Socialite::with('facebook')->stateless()->user();
        } catch (Exception $e) {
            return redirect('/dang-ky/');
        }
		
        $authUser = $this->findOrCreateUser($user, 'FB');

        Auth::login($authUser, true);

        //redirect after login
        $redirect_to = \Session::get('redirect_to');
        \Session::set('redirect_to', ''); \Session::forget('redirect_to');
        if($redirect_to && $redirect_to != '' && !\Session::get('nologin')){
            return \Redirect::to($redirect_to);
        } else {
            if (Auth::user()->role == '1')
                return \Redirect::to('/backend/dashboard/');
            else
                return redirect('/');
        }

    }

    public function redirectToProviderGoogle()
    {
        return Socialite::with('google')->redirect();
    }

    public function handleProviderCallbackGoogle()
    {
        if (isset($_GET['error'])) {
            if (Session::get('isRegister'))
                return redirect('/dang-ky/');
            return redirect('/dang-nhap/');
        }

        try {
            $user = Socialite::with('google')->stateless()->user();
        } catch (Exception $e) {
            return redirect('/dang-nhap/');
        }
		
        $authUser = $this->findOrCreateUser($user, 'GG+');
		Auth::login($authUser, true);
        //redirect after login
        $redirect_to = \Session::get('redirect_to');
        \Session::set('redirect_to', ''); \Session::forget('redirect_to');
        if($redirect_to && $redirect_to != '' && !\Session::get('nologin')){
            return \Redirect::to($redirect_to);
        } else {
            if (Auth::user()->role == 'admin')
                return \Redirect::to('/backend/dashboard/');
            else
                return redirect('/');
        }

    }
	
	private function findOrCreateUser($user, $register_type = 'Email')
    {	
		
        $authUser = Customer::where('email', $user->email)->first();
        $name = ($user->name) ? strtolower($user->name) : '';
        $tmp = explode('@', $user->email);
        $name_by_email = $tmp[0];
        $user_name = ($user->name) ? $user->name : $name_by_email;
		
		if ($authUser){
			return $authUser;
		}
		
        $password_prepare = str_replace(' ', '_', $name);
        $user_data = [
            'name' => $user_name,
            'email' => ($user->email) ? $user->email : '',
            'password' => bcrypt($password_prepare),
            'role' => 'user',
            'status' => (isset($user->status)) ? $user->status : '1'
        ];
        // EmailNotifications::send_notification_email($user->email, $user_name);
		
        return Customer::create($user_data);
    }
}