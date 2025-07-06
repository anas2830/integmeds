<?php

namespace App\Http\Controllers\Backend;


use App\Models\Admin;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\AdminCrudService;
use App\Services\DashboardService;
use App\Http\Controllers\Controller;
use App\Notifications\NewOrderPlaced;


class AdminController extends Controller
{
    protected $dashboardService, $adminCrudService;

    public function __construct(DashboardService $dashboardService, AdminCrudService $adminCrudService)
    {
        $this->dashboardService = $dashboardService;
        $this->adminCrudService = $adminCrudService;
    }

    public function dashboard()
    {
        $data = $this->dashboardService->getDashboardData();
        return view('Backend.dashboard', $data);
    }

    public function showLoginForm()
    {
        return view('Backend.admin.login');
    }

    public function login(Request $request)
    {
        return $this->adminCrudService->login($request);
    }

    public function  logout(Request $request)
    {
        return $this->adminCrudService->logout($request);
    }

    public function showAdminProfile()
    {
        $data = $this->adminCrudService->showAdminProfile();
        return view('Backend.admin.profile', $data);
    }

    public function profileUpdate(Request $request)
    {
        return $this->adminCrudService->profileUpdate($request);
    }

    //admin notifications
    public function adminNotifications()
    {
        return view('Backend.admin.notifications');
    }

    public function readNotification($id)
    {
        $notification = auth('admin')->user()->notifications()->findOrFail($id);
        $notification->markAsRead();
        $orderId = $notification->data['order_id'] ?? null;
        if ($orderId) {
            return redirect()->route('order.details', $orderId);
        }
        return redirect()->back();
    }
}
