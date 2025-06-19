<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomePageController extends Controller
{

    public function index()
    {
        return view('Web.Layout.pages.index');
    }
}
