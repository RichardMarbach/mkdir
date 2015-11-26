<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Events\UserRegistered;
use App\Models\Customer;

use \Carbon\Carbon;

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

    protected $loginPath = '/';

    protected $redirectPath = '/dashboard';
    
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messages = [
            'birthdate.before' => 'You were born in the future?'
        ];

        return Validator::make($data, [
            'name'  => 'required|min:2',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'sex' => 'required|boolean',
            'birthdate' => 'required|date|before:' . \Carbon\Carbon::now()
        ], $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $customer = Customer::where('name', $data['name'])->first();

        if (!$customer) {
            $customer = Customer::create($data);
        }

        // We'll need to link the customer and user in this method
        $user = User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'sex' => $data['sex'],
            'birthdate' => $data['birthdate'],
            'customer_id' => $customer->id
        ]);

        event(new UserRegistered($user));

        return $user;
    }
}
