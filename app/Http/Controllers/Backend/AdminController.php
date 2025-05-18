<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\AdminCrudService;
use App\Services\DashboardService;


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
}
