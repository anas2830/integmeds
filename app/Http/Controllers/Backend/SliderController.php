<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SliderCrudService;
use App\Http\Requests\SliderRequest;

class SliderController extends Controller
{
    protected $sliderCrudService;

    public function __construct(SliderCrudService $sliderCrudService)
    {
        $this->sliderCrudService = $sliderCrudService;
    }

    public function index(Request $request)
    {
        $data = $this->sliderCrudService->getSliderList($request);
        return view('Backend.admin.slider.list', $data);
    }

    public function create()
    {
        $data['existingFilesArray'] = [];
        return view('Backend.admin.slider.create', $data);
    }

    public function store(SliderRequest $request)
    {
        $this->sliderCrudService->createSlider($request);
        return redirect()->route('slider.index')->with('success', 'Slider created successfully');
    }

    public function edit($id)
    {
        $data = $this->sliderCrudService->editSlider($id);
        return view('Backend.admin.slider.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $this->sliderCrudService->updateSlider($request, $id);
        return redirect()->route('slider.index')->with('success', 'Slider updated successfully');
    }

    public function destroy($id)
    {
        $this->sliderCrudService->deleteSlider($id);
        session()->flash('success', 'Slider deleted successfully');
    }

    public function status($id)
    {
        $this->sliderCrudService->statusUpdate($id);
        session()->flash('success', 'Slider status updated successfully');
    }
}
