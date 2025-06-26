<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Services\PageService;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    protected $pageService;
    public  function __construct(PageService $pageService)
    {
        $this->pageService = $pageService;
    }   
    
    /**
     * Display the privacy policy.
     */
    public function privacyPolicy()
    {
        $data['privacyPolicy'] = $this->pageService->getPrivacyPolicyData();
        return view('Backend.admin.pages.privacy-policy', $data);
    }

    /**
     * Update the privacy policy.
     */
    public function updatePrivacyPolicy(Request $request)
    {
        $this->pageService->updatePrivacyPolicy($request);
        return redirect()->back()->with('success', 'Privacy policy updated successfully.');
    }

    /**
     * Display the terms and conditions.
     */
    public function termsCondition()
    {
        $data['termsCondition'] = $this->pageService->getTermsConditionData();
        return view('Backend.admin.pages.terms-condition', $data);
    }

    /**
     * Update the terms and conditions.
     */
    public function updateTermsCondition(Request $request)
    {
        $this->pageService->updateTermsCondition($request);
        return redirect()->back()->with('success', 'Terms and conditions updated successfully.');
    }

    //contact us
    public function contactUs()
    {
        $data['contact'] = $this->pageService->getContactUsData();
        return view('Backend.admin.pages.contact-us', $data);
    }

    //update contact us
    public function updateContactUs(Request $request)
    {
        $this->pageService->updateContactUs($request);
        return redirect()->back()->with('success', 'Contact us updated successfully.');
    }

    //about us
    public function aboutUs()
    {
        $data = $this->pageService->getAboutUsData();
        return view('Backend.admin.pages.about-us', $data);
    }

    //update about us
    public function updateAboutUs(Request $request)
    {
        $this->pageService->updateAboutUs($request);
        return redirect()->back()->with('success', 'About us updated successfully.');
    }
    
}
