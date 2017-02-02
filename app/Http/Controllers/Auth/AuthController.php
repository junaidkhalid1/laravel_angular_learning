<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use League\Flysystem\Exception;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

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
    protected $redirectTo = '/';

//    /**
//     * Create a new authentication controller instance.
//     *
//     * @return void
//     */
//    public function __construct()
//    {
//        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
//    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)){
                return $this->response->errorUnauthorized();
            }

        } catch (JWTException $ex) {
            return $this->response->errorInternal();
        }

        return $this->response->array(compact('token'))->setStatusCode(200);
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    //Get all users
    public function index()
    {
        try {
        return User::all();
        } catch (Exception $ex) {
            return $ex;
        }
    }

    //Get users details based on Id
    public function show()
    {
        try {
            $user = JWTAuth::parseToken()->toUser();

            if (! $user){
                return $this->response->errorNotFound("User not found");
            }
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $ex){
            return $this->response->error('Something went wrong');
        }

        return $this->response->array(compact('user'))->setStatusCode(200);
    }

    /**
     * Refresh the token and send back to client.
     *
     */
    public function getToken()
    {
        $token = JWTAuth::getToken();

        if (! $token) {
            return $this->response->errorUnauthorized('Token is invalid');
        }

        try {
            $refreshedToken = JWTAuth::refresh($token);
            //$refreshedToken = JWTAuth::parseToken()->refresh();
        } catch (JWTException $ex) {
            return $this->response->error('Something went wrong');
        }

        return $this->response->array(compact('refreshedToken'));
    }

    public function destroy()
    {
        $user = JWTAuth::parseToekn()->authenticate();

        if (! $user) {
            // Fail the delete process

        }

        // If not go with the delete process

        $user->delete();
    }
}
