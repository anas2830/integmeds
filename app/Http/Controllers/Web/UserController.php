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
    public function orders(Request $request)
    {
        $data['orders'] = $this->userService->getOrders($request);
        $data['request'] = $request;
        return view('Web.Layout.users.orders', $data);
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
        return view('Web.Layout.users.login');
    }
    
    public function login(Request $request)
    {
        return $this->userService->login($request);
    }

    public function showRegisterForm()
    {
        return view('Web.Layout.users.register');
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
