<?php
namespace App\Core\User\Application\Service;

use App\Core\User\Model\User as UserModel;
use \Auth;
use \Session;

/**
 * Description of UserExistingException
 *
 * @author shyamachuthan
 */
class User
{

    function __construct()
    {

    }

    function register_user($user_data)
    {


        $app_user = UserModel::create();
        $app_user->name = $user_data['fullname'];
        $app_user->email = strtolower($user_data['email']);
        $app_user->password = \Hash::make($user_data['password']);

        $app_user->save();

        $this->authenticate($app_user);

        return redirect('/dashboard');



    }

    function authenticate_google_user($social_user)
    {
        $app_user = $this->get_user_by_email($social_user->email);
        if(!$app_user)
        {
            $app_user = UserModel::create();
        }


        if($app_user->googleid!=$social_user->id)
           {
               $app_user->googleid = $social_user->id;
               $app_user->name = $social_user->name;
               $app_user->email = strtolower($social_user->email);
           }

        $app_user->save();

        $this->authenticate($app_user);

        return redirect('/dashboard');
    }

    function authenticate_facebook_user($social_user)
    {
        $app_user = $this->get_user_by_email($social_user->email);
        if(!$app_user)
        {
            $app_user = UserModel::create();
        }


        if($app_user->fbid!=$social_user->id)
           {
               $app_user->fbid = $social_user->id;
               $app_user->name = $social_user->name;
               $app_user->email = strtolower($social_user->email);
           }

        $app_user->save();

        $this->authenticate($app_user);

        return redirect('/dashboard');
    }

    function get_user_by_email($email)
    {
        return UserModel::get_user_by_email($email);
    }


    function authenticate_email_user($email,$password)
    {
        if(\Auth::attempt(['email' => $email, 'password' => $password]))
        {
             $this->authenticate(\Auth::user());
            return redirect('/dashboard');
        }
        else
        {
            throw new \App\Core\User\Application\Exceptions\UserPasswordIncorrectException("Invalid Username/Password");
        }
    }

    function authenticate($app_user)
    {
        Session::put('auth_user',$app_user->toArray());
        \Auth::login($app_user);
    }

    function logout()
    {
        Session::forget('auth_user');
        \Auth::logout();
        return redirect('login');
    }

    
}

