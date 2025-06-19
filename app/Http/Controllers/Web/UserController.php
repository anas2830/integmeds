<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
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
        return view('Web.Layout.users.login');
    }
    
    public  function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return to_route('user.login');
    }

    public function showRegisterForm()
    {
        return view('Web.Layout.users.register');
    }
}
