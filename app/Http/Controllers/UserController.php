<?php

namespace App\Http\Controllers;

use App\Core\User\Application\Service\User as UserService;

class UserController extends Controller
{
    protected $user_service=null;

    public function __construct(UserService $user_service)
    {
       $this->user_service = $user_service;
    }

    /**
     *
     *
     * @return view
    */
    public function login()
    {
        if(\Auth::check())
        {
            return redirect('dashboard');
        }
        else {
            return view('user.login');
        }
    }

    //Processing login info
    public function login_post()
    {
            $user = \Input::All();

            $validations = [
                'email'=>'required|email',
                'password'=>'required'
            ];

            $validator = \Validator::make($user, $validations,[
                'passkey.required'=>'Password is required.'
            ]);

            if($validator->fails())
            {
                return \Redirect::to('/login')
                    ->withInput()
                    ->withErrors($validator)
                    ->with('failure',"Correct the following errors and try again!");
            }
            else
            {
                return "sss";
            }
    }

    /**
     *
     *
     * @return view
    */
    public function register()
    {
        if(\Auth::check())
        {
            return redirect('dashboard');
        }
        else {
            return view('user.register');
        }
    }

    //Processing registration info
    public function register_post()
    {
            $user = \Input::All();

            $validations = [
                'fullname'=>'required|min:3',
                'email'=>'required|email|unique:users,email',
                'password'=>'required',
                'cpassword'=>'required|same:password'
            ];

            $validator = \Validator::make($user, $validations,[
                'passkey.required'=>'Password is required.',
                'cpassword.same'=>'Password and Confirm password should match'
            ]);

            if($validator->fails())
            {
                return \Redirect::to('/sign-up')
                    ->withInput()
                    ->withErrors($validator)
                    ->with('failure',"Correct the following errors and try again!");
            }
            else
            {
                return $this->user_service->register_user($user);
            }
    }

     
    public function login_google()
    {
        return \Socialize::with('google')->redirect();
    }

    public function login_google_callback()
    {
        $user = \Socialize::with('google')->user();
        //dd($user);
        return $this->user_service->authenticate_google_user($user);
    }
    
    public function login_facebook()
    {
        return \Socialize::with('facebook')->redirect();
    }
    
    public function login_facebook_callback()
    {
        $user = \Socialize::with('facebook')->user();
        return $this->user_service->authenticate_facebook_user($user);
    }

    public function dashboard()
    {
        $data['user'] = \Session::get('auth_user');
        return view('user.dashboard',$data);
    }

    public function logout()
    {

       return $this->user_service->logout();
    }



}
