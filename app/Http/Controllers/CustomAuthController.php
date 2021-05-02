<?php

namespace App\Http\Controllers;

use Hash;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class CustomAuthController extends Controller
{
    /**
     * show custom login form
     *
     * @return response()
     */
    public function custom_login(){
        return view('auth.login');
    }


    /**
     * show custom register form 
     *
     * @return response()
     */
    public function custom_register(){
        return view('auth.register');
    }


    /**
     * custom login processing
     *
     * @return response()
     */
    public function custom_login_post(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, $remember = true)) {
            return redirect()->intended('admin-dashboard')
                            ->with('loggedin', 'Hello Admin, You have Successfully loggedin');
        }

        return back()->with('credential_wrong', 'Oppes! You have entered invalid credentials');
    }


    /**
     * custom register processing
     *
     * @return response()
     */
    public function custom_register_post(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);

        Auth::attempt(['email' => $data['email'], 'password' => $data['password']], $remember = true);
        return redirect()->route('home')->with('registered', 'Great! You have Successfully loggedin');
    }


    /**
     * create new admin 
     *
     * @return response()
     */
    public function create(array $data){
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }


    /**
     * custom logout method
     *
     * @return response()
     */
    public function custom_logout(){
        Session::flush();
        Auth::logout();
  
        return Redirect()->route('portfolio');
    }


    /**
     * custom verification page
     *
     * @return void
     */
    function custom_verify(){
        return view('auth.verify');
    }


    /**
     * verification processing
     *
     * @param  mixed $request
     * @return void
     */
    function get_verified(EmailVerificationRequest $request){
        $request->fulfill();

        return redirect()->route('home');
    }


    /**
     * request new verification token
     *
     * @param  mixed $request
     * @return void
     */
    function request_new_verification_token(Request $request){
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }
}
