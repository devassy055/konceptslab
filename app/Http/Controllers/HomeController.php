<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session as FacadesSession;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /**
         * user to validate the user login from 
         * and check if the provided credentials matches with this when user tries to login
         * then only let's in 
         */
        $userval= config('app.user');
        $userpasss=config('app.userpass');
        $adminval=config('app.admin');
        $adminpasss=config('app.adminpass');
        $user=Auth::user();
    
        if($user->name===$userval||$user->name===$adminval)
        {
            if(password_verify($userpasss, $user->password)) {
                //dd('user');
                return redirect()->route('booking.index');
               
            }
            if(password_verify($adminpasss, $user->password)) {

                 //dd('admin');
                 return redirect()->route('user.index');
             }

            //return view('home');
        }
        else{
            return redirect('login')->with(Auth::logout());
        }
    }
}
