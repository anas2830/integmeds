<?php

namespace App\Services;

use App\Models\Page;
use App\Models\AboutUsPage;

class PageService
{
    /**
     * Get the privacy policy data.
     */
    public function getPrivacyPolicyData()
    {
        $privacyPolicy = Page::where('slug', 'privacy-policy')->first();
        return $privacyPolicy;
    }

    /**
     * Update the privacy policy.
     */
    public function updatePrivacyPolicy($request)
    {
        $privacyPolicy = Page::where('slug', 'privacy-policy')->first();
        $privacyPolicy->update($request->all());
        return $privacyPolicy;
    }

    /**
     * Get the terms and conditions data.
     */
    public function getTermsConditionData()
    {
        $termsCondition = Page::where('slug', 'terms-condition')->first();
        return $termsCondition;
    }

    /**
     * Update the terms and conditions.
     */
    public function updateTermsCondition($request)
    {
        $termsCondition = Page::where('slug', 'terms-condition')->first();
        $termsCondition->update($request->all());
        return $termsCondition;
    }

    //contact us
    public function getContactUsData()
    {
        $contact = Page::where('slug', 'contact-us')->first();
        $content = json_decode($contact->content, true) ?? [];
        $data = [
            'telephone' => $content['telephone'] ?? '',
            'email' => $content['email'] ?? '',
            'address' => $content['address'] ?? '',
            'form_title' => $content['form_title'] ?? '',
            'form_subtitle' => $content['form_subtitle'] ?? '',
            'map_iframe' => $content['map_iframe'] ?? '',
        ];
        return $data;
    }

    //update contact us
    public function updateContactUs($request)
    {
        $contact = Page::where('slug', 'contact-us')->first();
        $content = [
            'telephone' => $request->telephone,
            'email' => $request->email,
            'address' => $request->address,
            'form_title' => $request->form_title,
            'form_subtitle' => $request->form_subtitle,
            'map_iframe' => $request->map_iframe,
        ];
        $contact->update(['content' => json_encode($content)]);
        return $contact;
    }

    //about us
    public function getAboutUsData()
    {
        $aboutUs = AboutUsPage::first();
        $data = [
            'aboutUs'        => $aboutUs,
            'topImageFileArray'  => $aboutUs->top_image ? [[
                'full_path' => url($aboutUs->top_image),
                'name'      => $aboutUs->top_image_original_name,
                'size'      => $aboutUs->top_image_file_size,
                'path'      => $aboutUs->top_image,
            ]] : [],
            'middleFirstImageFileArray'  => $aboutUs->middle_first_image ? [[
                'full_path' => url($aboutUs->middle_first_image),
                'name'      => $aboutUs->middle_first_image_original_name,
                'size'      => $aboutUs->middle_first_image_file_size,
                'path'      => $aboutUs->middle_first_image,
            ]] : [],
            'middleSecondImageFileArray'  => $aboutUs->middle_second_image ? [[
                'full_path' => url($aboutUs->middle_second_image),
                'name'      => $aboutUs->middle_second_image_original_name,
                'size'      => $aboutUs->middle_second_image_file_size,
                'path'      => $aboutUs->middle_second_image,
            ]] : [],
        ];
        return $data;
    }

    //update about us
    public function updateAboutUs($request)
    {
        $aboutUs = AboutUsPage::first();
        if($request->top_image){
            $this->aboutUsImageUpload($aboutUs, 'top_image', 'top_image_original_name', 'top_image_file_size', $request);
        }
        if($request->middle_first_image){
            $this->aboutUsImageUpload($aboutUs, 'middle_first_image', 'middle_first_image_original_name', 'middle_first_image_file_size', $request);
        }
        if($request->middle_second_image){  
            $this->aboutUsImageUpload($aboutUs, 'middle_second_image', 'middle_second_image_original_name', 'middle_second_image_file_size', $request);
        }
        if($request->top_image_file_to_delete){
            $this->deleteAboutUsImage($aboutUs, 'top_image', 'top_image_original_name', 'top_image_file_size');
        }
        if($request->middle_first_image_file_to_delete){
            $this->deleteAboutUsImage($aboutUs, 'middle_first_image', 'middle_first_image_original_name', 'middle_first_image_file_size');
        }
        if($request->middle_second_image_file_to_delete){
            $this->deleteAboutUsImage($aboutUs, 'middle_second_image', 'middle_second_image_original_name', 'middle_second_image_file_size');
        }
        $aboutUs->top_title = $request->top_title;
        $aboutUs->top_content = $request->top_content;
        $aboutUs->bottom_title = $request->bottom_title;
        $aboutUs->bottom_content = $request->bottom_content;
        $aboutUs->bottom_button_text = $request->bottom_button_text;
        $aboutUs->bottom_button_url = $request->bottom_button_url;
        $aboutUs->save();
        return $aboutUs;
    }


    public function aboutUsImageUpload(AboutUsPage $aboutUs, $imageName, $imageOriginalName, $imageSize, $request)
    {   
        if (!$request->$imageName) {
            return;
        }
        $fileUploadService = new FileUploadService();
        $newDirectory = 'uploads/about-us';
        $fileData = $fileUploadService->handleFileUpload($request->$imageName, 'temp/' . $request->$imageName, $newDirectory);
        $fullpath = $fileData['fullPath'] ?? NULL;
        $fileOriginalName = $fileData['originalName'] ?? NULL;
        $fileSize = $fileData['size'] ?? NULL;

        $aboutUs->$imageName = $fullpath;
        $aboutUs->$imageOriginalName = $fileOriginalName;
        $aboutUs->$imageSize = $fileSize;
    }

    public  function deleteAboutUsImage($aboutUs, $imageName, $imageOriginalName, $imageSize)
    {
        $filePath = public_path($aboutUs->$imageName);
        if (File::exists($filePath)) {
            File::delete($filePath);
        }
        $aboutUs->$imageName = null;
        $aboutUs->$imageOriginalName = null;
        $aboutUs->$imageSize = null;
        $aboutUs->save();
    }
    
    
}