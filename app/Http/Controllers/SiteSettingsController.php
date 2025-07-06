<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSiteSettingsRequest;
use Illuminate\Http\Request;
use App\Services\Web\SiteSettingsService;

class SiteSettingsController extends Controller
{
    protected $siteSettingsService;

    public  function __construct(SiteSettingsService $siteSettingsService){

        $this->siteSettingsService = $siteSettingsService;
    }
    public function siteSettings()
    {
        $data = $this->siteSettingsService->getSiteSettings();
        return view('Backend.admin.settings.site.site-settings', $data);
    }

    public  function updateSiteSettings(UpdateSiteSettingsRequest $request)
    {
        $this->siteSettingsService->updateSiteSettings($request);
        return redirect()->route('site.settings')->with('success', 'Settings updated successfully.');
    }
}
