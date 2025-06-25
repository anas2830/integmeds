<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\HomePageSettingsService;

class HomePageSettingsController extends Controller
{
    protected $homePageSettingsService;
    public  function __construct(HomePageSettingsService $homePageSettingsService)
    {
        $this->homePageSettingsService = $homePageSettingsService;
    }   
    
    /**
     * Display the home page settings.
     */
    public function homePageSidebarSettings()
    {
        $data = $this->homePageSettingsService->getHomePageSidebarSettingsData();
        return view('Backend.admin.settings.sidebar.home-page-settings', $data);
    }

    /**
     * Update the home page settings.
     */
    public function updateHomePageSidebarSettings(Request $request)
    {
        $this->homePageSettingsService->updateHomePageSidebarSettings($request);
        return redirect()->back()->with('success', 'Home page settings updated successfully.');
    }

    public function homePageBodySettings()
    {
        $data = $this->homePageSettingsService->getHomePageBodySettingsData();
        return view('Backend.admin.settings.body.home-page-settings', $data);
    }

    /**
     * Update the home page settings.
     */
    public function updateHomePageBodySettings(Request $request)
    {
        $this->homePageSettingsService->updateHomePageBodySettings($request);
        return redirect()->back()->with('success', 'Home page settings updated successfully.');
    }
}
