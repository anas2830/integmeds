<?php

namespace App\Services;

use App\Models\Slider;
use Illuminate\Support\Facades\File;

class SliderCrudService
{
    public function getSliderList($request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
            'sort_by' => 'nullable|string',
            'sort_direction' => 'nullable|string|in:asc,desc',
        ]);
        $data['search'] = $search = $request->input('search');
        $data['sortBy'] = $sortBy = $request->input('sort_by', 'id');
        $data['sortDirection'] = $sortDirection = $request->input('sort_direction', 'desc');
        $data['sliders'] = Slider::when($search, function ($query, $search) {
                return $query->where('title', 'like', "%{$search}%")
                    ->orWhere('subtitle', 'like', "%{$search}%");
            })
            ->orderBy($sortBy, $sortDirection)
            ->paginate(10);
        return $data;
    }


    public function createSlider($request)
    {
        $slider = new Slider();
        $slider->title = $request->title;
        $slider->subtitle = $request->subtitle;
        $slider->button_color = $request->button_color;
        $slider->button_text = $request->button_text;
        $slider->button_url = $request->button_url;
        $slider->status = $request->status ?? 0;

        $this->sliderImageUpload($slider, $request);

        $slider->save();
        return $slider;
    }

    public function editSlider($id)
    {
        $slider = Slider::findOrFail($id);
        $data = [
            'slider'        => $slider,
            'existingFilesArray'  => $slider->slider_image ? [[
                'full_path' => url($slider->slider_image),
                'name'      => $slider->file_original_name,
                'size'      => $slider->file_size,
                'path'      => $slider->slider_image,
            ]] : [],
        ];
        return $data;
    }


    public function updateSlider($request, $id)
    {
        $slider = Slider::findOrFail($id);
        $slider->title = $request->title;
        $slider->subtitle = $request->subtitle;
        $slider->button_color = $request->button_color;
        $slider->button_text = $request->button_text;
        $slider->button_url = $request->button_url;
        $slider->status = $request->status ?? 0;
        if($request->slider_image){
            $this->sliderImageUpload($slider, $request);
        }
        if($request->files_to_delete){
            $this->deleteSliderImage($request->files_to_delete);
        }
        $slider->save();
        return $slider;
    }

    public function deleteSlider($id)
    {
        $slider = Slider::find($id);
        $slider->delete();
    }

    public function statusUpdate($id)
    {
        $slider = Slider::find($id);
        $slider->status = !$slider->status;
        $slider->save();
    }

    public function SliderImageUpload(Slider $slider, $request)
    {   
        if (!$request->slider_image) {
            return;
        }
        $fileUploadService = new FileUploadService();
        $newDirectory = 'uploads/sliders';
        $fileData = $fileUploadService->handleFileUpload($request->slider_image, 'temp/' . $request->slider_image, $newDirectory);
        $fullpath = $fileData['fullPath'] ?? NULL;
        $fileOriginalName = $fileData['originalName'] ?? NULL;
        $fileSize = $fileData['size'] ?? NULL;
        $fileExtension = $fileData['extension'] ?? NULL;
        $slider->slider_image = $fullpath;
        $slider->file_original_name = $fileOriginalName;
        $slider->file_size = $fileSize;
        $slider->file_extension = $fileExtension;
    }

    public  function deleteSliderImage($id)
    {
        $slider = Slider::find($id);
        $filePath = public_path($slider->slider_image);
        if (File::exists($filePath)) {
            File::delete($filePath);
        }
        $slider->slider_image = null;
        $slider->file_original_name = null;
        $slider->file_size = null;
        $slider->file_extension = null;
        $slider->save();
    }

}
