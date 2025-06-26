<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewSubmitRequest;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function dashboard()
    {
        $data['user'] = $this->userService->getUser();
        return view('Web.Layout.users.dashboard', $data);
    }
    public function orders(Request $request)
    {
        $data['user'] = $this->userService->getUser();
        $data['orders'] = $this->userService->getOrders($request);
        $data['request'] = $request;
        return view('Web.Layout.users.orders', $data);
    }


    //account
    public function accountDetails(Request $request)
    {
        $data['user'] = $this->userService->getUser();
        return view('Web.Layout.users.account', $data);
    }

    public function updateAccount(Request $request)
    {
        return $this->userService->updateAccount($request);
    }
    //end account


    //address
    public function address()
    {
        $data['user'] = $this->userService->getUser();
        $data['billing_address'] = json_decode($data['user']->billing_address, true);
        $data['shipping_address'] = json_decode($data['user']->shipping_address, true);
        return view('Web.Layout.users.address', $data);
    }

    public function billingAddress()
    {
        $data['user'] = $this->userService->getUser();
        $data['billing_address'] = json_decode($data['user']->billing_address, true);
        $data['countries'] = countries();
        return view('Web.Layout.users.billing-address', $data);
    }

    public function updateBillingAddress(Request $request)
    {
        return $this->userService->updateBillingAddress($request);
    }

    public function shippingAddress()
    {
        $data['user'] = $this->userService->getUser();
        $data['shipping_address'] = json_decode($data['user']->shipping_address, true);
        $data['countries'] = countries();
        return view('Web.Layout.users.shipping-address', $data);
    }

    public function updateShippingAddress(Request $request)
    {
        return $this->userService->updateShippingAddress($request);
    }
    //end address

    public  function wishlistStore(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        return $this->userService->addToWishlist($request);
    }

    //change password
    public function changePasswordForm()
    {
        $data['user'] = $this->userService->getUser();
        return view('Web.Layout.users.change-password', $data);
    }

    public function changePassword(Request $request)
    {
        return $this->userService->changePassword($request);
    }
    //end change password


    //wishlist
    public function wishlist()
    {
        $data['user'] = $this->userService->getUser();
        $data['wishlists'] = auth()->user()->wishlists()->with(['product','product.categories:id,name','product.images:id,product_id,image_url'])->paginate(10);
        return view('Web.Layout.users.wishlist', $data);
    }

    public  function addToWishlist(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        return $this->userService->addToWishlist($request);
    }

    public function removeWishlist($id)
    {
        return $this->userService->removeWishlist($id);
    }
    //end wishlist

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


    public function reviewStoreOrUpdate(ReviewSubmitRequest  $request)
    {
        $response = $this->userService->reviewStoreOrUpdate($request->validated());

        return response()->json($response);
    }
}
