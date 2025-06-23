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
        $data = $this->homePageSettingsService->getHomePageSettingsData();
        return view('Backend.admin.settings.home-page-settings', $data);
    }

    /**
     * Update the home page settings.
     */
    public function updateHomePageSidebarSettings(Request $request)
    {
        $this->homePageSettingsService->updateHomePageSidebarSettings($request);
        return redirect()->back()->with('success', 'Home page settings updated successfully.');
    }
}
