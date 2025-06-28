<?php

namespace App\Http\Controllers\Web;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use App\Services\NewsletterService;
use App\Http\Controllers\Controller;

class NewsletterController extends Controller
{
    protected  $newsLetterService;

    public function __construct(NewsletterService $newsLetterService)
    {
        
        $this->newsLetterService = $newsLetterService;
    }
    public function subscribe(Request $request)
    {
        return $this->newsLetterService->subscribe($request);
    }
}
