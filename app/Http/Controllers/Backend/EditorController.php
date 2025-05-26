<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Services\EditorCrudService;
use App\Http\Controllers\Controller;

class EditorController extends Controller
{
    protected $editorCrudService;

    public function __construct(EditorCrudService $editorCrudService)
    {
        $this->editorCrudService = $editorCrudService;
    }

    public function showLoginForm()
    {
        return view('Backend.editor.login');
    }

    public function login(Request $request)
    {
        return $this->editorCrudService->login($request);
    }

    public function  logout(Request $request)
    {
        return $this->editorCrudService->logout($request);
    }

    public function showEditorProfile()
    {
        $data = $this->editorCrudService->showEditorProfile();
        return view('Backend.editor.profile', $data);
    }

    public function editorProfileUpdate(Request $request)
    {
        return $this->editorCrudService->editorProfileUpdate($request);
    }
}
