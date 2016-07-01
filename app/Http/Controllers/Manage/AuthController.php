<?php
namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\System_User;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Input;
use Validator;

class AuthController extends Controller
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
    protected $redirectTo = '/manage';
    protected $guard = 'manage';
    protected $loginView = 'manage.login';
    protected $registerView = 'manage.register';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'manage/logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:System_User',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        return System_User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }


    public function getLogin()
    {
        return view('manage.auth.login', ['model' => 'system', 'menu' => 'role']);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    public function postLogin(Request $request)
    {

    }

    public function getLogout()
    {
        Auth::logout();
    }

    public function getRegister()
    {
        return view('manage.auth.register', ['model' => 'system', 'menu' => 'role']);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    public function postRegister()
    {
        $validator = Validator::make(Input::all(), System_User::$rules);
        if ($validator->passes()) {
            $manage = new System_User();
            $manage->name = Input::get('name');
            $manage->email = Input::get('email');
            $manage->password = bcrypt(Input::get('password'));
            $manage->save();

        } else {
            Response::json(['message' => '注册失败'], 410);
        }
//        return System_User::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'password' => bcrypt($data['password']),
//        ]);
    }

}
