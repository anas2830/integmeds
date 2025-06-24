<?php

namespace App\Services;

use App\Models\Page;

class PageService
{
    /**
     * Get the privacy policy data.
     */
    public function getPrivacyPolicyData()
    {
        $privacyPolicy = Page::where('slug', 'privacy-policy')->first();
        return $privacyPolicy;
    }

    /**
     * Update the privacy policy.
     */
    public function updatePrivacyPolicy($request)
    {
        $privacyPolicy = Page::where('slug', 'privacy-policy')->first();
        $privacyPolicy->update($request->all());
        return $privacyPolicy;
    }

    /**
     * Get the terms and conditions data.
     */
    public function getTermsConditionData()
    {
        $termsCondition = Page::where('slug', 'terms-condition')->first();
        return $termsCondition;
    }

    /**
     * Update the terms and conditions.
     */
    public function updateTermsCondition($request)
    {
        $termsCondition = Page::where('slug', 'terms-condition')->first();
        $termsCondition->update($request->all());
        return $termsCondition;
    }
}