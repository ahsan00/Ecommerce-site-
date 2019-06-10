<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use\App\district;
use\App\division;
use\App\notifications\verifyregistration;

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
    protected $redirectTo = '/';

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
     * Create a mrthod override for registration form
     *
     *
     */
public function showRegistrationForm()
{
      $district=district::orderBy('name','asc')->get();
        $division=division::orderBy('prority','asc')->get();
  return view('auth.register',compact('district','division'));

  // code...
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
            'first_name' => ['required', 'string', 'max:255'],
              'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
              'division_id' => ['required'],
                'district_id' => ['required'],
                  'phone_no' => ['required'],
                    'street_address' => ['required'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function register(Request $request)
    {
        $user= User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
              'username' => str_slug($request->first_name.$request->last_name),
            'district_id' => $request->district_id,
            'division_id' => $request->division_id,
            'phone_no' => $request->phone_no,
            'street_address' => $request->street_address,
            'ip_address' => request()->ip(),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'remember_token'=>str_random(50),
            'status'=>0,
        ]);
        $user->notify(new verifyregistration($user));

        return redirect('/');
          session()->flash('sucess','check your Email');
    }
}
