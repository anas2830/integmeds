<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\ClientsCrudService;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    protected $clientsCrudService;

    public function __construct(ClientsCrudService $clientsCrudService)
    {
        $this->clientsCrudService = $clientsCrudService;
    }

    public function index(Request $request)
    {
        $data = $this->clientsCrudService->getClientsList($request);
        return view('Backend.admin.clients.list', $data);
    }

    public function create()
    {
        $data['existingFilesArray'] = [];
        return view('Backend.admin.clients.create', $data);
    }

    public function store(Request $request)
    {
        $this->clientsCrudService->createClient($request);
        return redirect()->route('clients.index')->with('success', 'Clients created successfully');
    }

    public function edit($id)
    {
        $data = $this->clientsCrudService->editClient($id);
        return view('Backend.admin.clients.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $this->clientsCrudService->updateClient($request, $id);
        return redirect()->route('clients.index')->with('success', 'Clients updated successfully');
    }

    public function destroy($id)
    {
        $this->clientsCrudService->deleteClient($id);
        session()->flash('success', 'Clients deleted successfully');
    }

    public function status($id)
    {
        $this->clientsCrudService->statusUpdate($id);
        session()->flash('success', 'Clients status updated successfully');
    }
}
