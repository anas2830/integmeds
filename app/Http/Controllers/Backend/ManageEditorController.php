<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Services\ManageEditorCrudService;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditorRequest;

class ManageEditorController extends Controller
{
    protected $manageEditorCrudService;

    public function __construct(ManageEditorCrudService $manageEditorCrudService)
    {
        $this->manageEditorCrudService = $manageEditorCrudService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data =  $this->manageEditorCrudService->index($request);
        return view('Backend.admin.manage-editor.list', $data);
    }

    public function create()
    {
        return view('Backend.admin.manage-editor.create');
    }

    public function store(EditorRequest $request)
    {
        $validatedData = $request->validated();
        $this->manageEditorCrudService->store($request, $validatedData);
        return redirect()->route('manage-editor.index')->with('success', 'Editor created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = $this->manageEditorCrudService->edit($id);
        return view('Backend.admin.manage-editor.update', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditorRequest $request, $id)
    {
        $validatedData = $request->validated();
        $this->manageEditorCrudService->update($request, $validatedData, $id);
        return redirect()->route('manage-editor.index')->with('success', 'Editor Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->manageEditorCrudService->destroy($id);
        session()->flash('success', 'Editor deleted successfully');
    }

    public function statusUpdate($id)
    {
        $this->manageEditorCrudService->statusUpdate($id);
        session()->flash('success', 'Status updated successfully');
    }
}
