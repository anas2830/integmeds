<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\HomePageService;

class HomePageController extends Controller
{

    protected $homePageService;
    public  function __construct(HomePageService $homePageService)
    {
        $this->homePageService = $homePageService;
    }
    public function index()
    {
        $data = $this->homePageService->homePageData();
        return view('Web.Layout.pages.index', $data);
    }
}
