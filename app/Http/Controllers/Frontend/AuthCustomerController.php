<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Customer;
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

        $newCustomer = new Customer();
        $newCustomer->name = $request->ctrlhotentxt;
        $newCustomer->email = $request->ctrlemailtxt;
        $newCustomer->password = \Hash::make($request->ctrlpasstxt);
        $newCustomer->phone = $request->ctrlphonetxt;
        $newCustomer->role = 'user';   // set user's role is customer
        $newCustomer->status = 1; // set user's status is inactive
        $newCustomer->save();

        // Send activate email

        // Redirect to login page

        return \Redirect::to('/');
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
        return redirect()->back();
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
            if (Auth::user()->role == 'admin')
                return \Redirect::to('/backend/');
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

        //redirect after login
        $redirect_to = \Session::get('redirect_to');
        \Session::set('redirect_to', ''); \Session::forget('redirect_to');
        if($redirect_to && $redirect_to != '' && !\Session::get('nologin')){
            return \Redirect::to($redirect_to);
        } else {
            if (Auth::user()->role == 'admin')
                return \Redirect::to('/backend/');
            else
                return redirect('/');
        }

    }
}