<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function dashboard()
    {
        return view('Web.Layout.users.dashboard');
    }
    public function orders()
    {
        return view('Web.Layout.users.orders');
    }

    public function accountDetails()
    {
        return view('Web.Layout.users.account');
    }

    public function address()
    {
        return view('Web.Layout.users.address');
    }

    public function billingShippingAddress()
    {
        return view('Web.Layout.users.billing-shipping-address');
    }


    public function changePasswordForm()
    {
        return view('Web.Layout.users.change-password');
    }


    public function wishlist()
    {
        return view('Web.Layout.users.wishlist');
    }

    public function showLoginForm()
    {
        if (!auth()->user()) {
            return view('Web.Layout.users.login');
        }
        return redirect()->route('user.dashboard');
    }
    
    public function login(Request $request)
    {
        return $this->userService->login($request);
    }

    public function showRegisterForm()
    {
        if(!auth()->user()){
            return view('Web.Layout.users.register');
        }
        return redirect()->route('user.dashboard');
    }

    public function register(Request $request)
    {
        return $this->userService->register($request);
    }

    public function  logout(Request $request)
    {
        return $this->userService->logout($request);
    }
}
