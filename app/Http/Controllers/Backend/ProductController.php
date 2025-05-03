<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ProductController extends Controller
{

    public function index(Request $request)
    {
        $data['existingFilesArray'] = [];
        return view('Backend.Product.list', $data);
    }
}
