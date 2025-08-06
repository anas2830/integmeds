<?php

namespace App\Services\Web;

use App\Models\SiteSetting;

class SiteSettingsService
{
    public function getSiteSettings()
    {
        $data['siteSettings']  = SiteSetting::first();
        return $data;
    }

    public function updateSiteSettings($request)
    {
        $data = SiteSetting::first();

        if ($data) {
            $data->site_name        = $request->site_name;
            $data->site_email       = $request->site_email;
            $data->site_phone       = $request->site_phone;
            $data->site_description = $request->site_description;
            $data->copyright_text   = $request->copyright_text;
            $data->address          = $request->address;
            $data->currency         = $request->currency;
            $data->minimum_order    = $request->minimum_order;
            $data->timezone         = $request->timezone;

            $data->save();
        }

        return $data; // will be null if no row found
    }
}