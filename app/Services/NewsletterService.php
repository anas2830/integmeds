<?php

namespace App\Services;

use App\Models\Newsletter;


class NewsletterService
{
    public function subscribe($request)
    {
        // validation
        $request->validate([
            'email' => 'required|email|max:100|unique:newsletters,email',
        ]);

        $newsletter = new Newsletter();
        $newsletter->email = $request->email;
        $newsletter->save();

        // response json
        return response()->json([
            'message' => 'Subscribed successfully',
        ]) ->setStatusCode(200);
    }
}