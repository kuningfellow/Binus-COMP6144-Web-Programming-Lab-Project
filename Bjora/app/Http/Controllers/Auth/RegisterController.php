<?php

namespace Bjora\Http\Controllers\Auth;

use Bjora\User;
use Bjora\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
// use \DateTime;     ga perlu pake ini soalnya <input type='date'> sudah 'Y-m-d' (sesuai standar SQL)

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'alpha_num', 'confirmed'],    // pakai 'alpha_num' dapet error message bagus ketimbang pake 'regex:/[a-zA-Z0-9]/'
            'gender' => ['required'],
            'address' => ['required'],
            'date_of_birth' => ['required', 'date_format:Y-m-d'],   // ternyata HTML <input type='date'> udh auto paksa Y-m-d
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Bjora\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'gender' => $data['gender'],
            'address' => $data['address'],
            'date_of_birth' => $data['date_of_birth'],
            // 'date_of_birth' => DateTime::createFromFormat('m/d/Y', $data['date_of_birth'])->format('Y-m-d'),
        ]);
    }
}
