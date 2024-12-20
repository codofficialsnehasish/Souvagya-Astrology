<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\NewsletterEmail;

class NewsletterSubscription extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $NewsletterEmail = new NewsletterEmail();
        $NewsletterEmail->email = $request->email;
        $NewsletterEmail->save();

        return response()->json(['message' => 'Subscription successful']);
    }
}
