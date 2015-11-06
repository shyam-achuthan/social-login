<?php

namespace App\Http\Controllers;


class UserController extends Controller
{
    public function __construct()
    {
       
    }

    /**
     *
     *
     * @return view
    */
    public function login()
    {
        return view('user.login');
    }
    /**
     *
     *
     * @return view
    */
    public function register()
    {
        return view('user.register');
    }

    /**
     *
     *
     * @return view
    */
    public function login_google()
    {
        return "google";
    }
    
    /**
     *
     *
     * @return view
    */
    public function login_facebook()
    {
        return "facebook";
    }



}
