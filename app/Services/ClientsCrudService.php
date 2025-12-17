<?php

namespace App\Services;

use App\Models\Client;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ClientsCrudService
{
    public function getClientsList($request)
    {
        $data['clients'] = Client::latest()->paginate(10);
        return $data;
    }


    public function createClient($request)
    {
        $request->validate([
            'status' => 'required|integer',
            'client_image' => 'required|string|max:255',
        ]);
        $client = new Client();
        $client->status = $request->status ?? 0;

        $this->clientImageUpload($client, $request);

        $client->save();
        return $client;
    }

    public function editClient($id)
    {
        $client = Client::findOrFail($id);
        $data = [
            'client'        => $client,
            'existingFilesArray'  => $client->client_image ? [[
                'full_path' => url($client->client_image),
                'name'      => $client->file_original_name,
                'size'      => $client->file_size,
                'path'      => $client->client_image,
            ]] : [],
        ];
        return $data;
    }


    public function updateClient($request, $id)
    {
        $request->validate([
            'status' => 'required|integer',
            'client_image' => 'nullable|string|max:255',
        ]);

        $client = Client::findOrFail($id);
        $client->name = $request->name;
        $client->status = $request->status ?? 0;
        if($request->client_image){
            $this->clientImageUpload($client, $request);
        }
        if($request->files_to_delete){
            $this->deleteClientImage($request->files_to_delete);
        }
        $client->save();
        return $client;
    }

    public function deleteClient($id)
    {
        $client = Client::find($id);
        $client->delete();
    }

    public function statusUpdate($id)
    {
        $client = Client::find($id);
        $client->status = !$client->status;
        $client->save();
    }

    public function clientImageUpload(Client $client, $request)
    {   
        if (!$request->client_image) {
            return;
        }
        $fileUploadService = new FileUploadService();
        $newDirectory = 'uploads/clients';
        $fileData = $fileUploadService->handleFileUpload($request->client_image, 'temp/' . $request->client_image, $newDirectory);
        $fullpath = $fileData['fullPath'] ?? NULL;
        $fileOriginalName = $fileData['originalName'] ?? NULL;
        $fileSize = $fileData['size'] ?? NULL;
        $fileExtension = $fileData['extension'] ?? NULL;
        $client->client_image = $fullpath;
        $client->file_original_name = $fileOriginalName;
        $client->file_size = $fileSize;
        $client->file_extension = $fileExtension;
    }

    public  function deleteClientImage($id)
    {
        $client = Client::find($id);
        $filePath = public_path($client->client_image);
        if (File::exists($filePath)) {
            File::delete($filePath);
        }
        $client->client_image = null;
        $client->file_original_name = null;
        $client->file_size = null;
        $client->file_extension = null;
        $client->save();
    }

}
