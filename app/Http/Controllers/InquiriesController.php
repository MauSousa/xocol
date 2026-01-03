<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInquiryRequest;
use App\Mail\InquirySubmitted;
use App\Models\Inquiry;
use Illuminate\Support\Facades\Mail;

class InquiriesController extends Controller
{
    public function store(StoreInquiryRequest $request)
    {
        $inquiry = Inquiry::create($request->validated());

        // Mail::to(config('mail.from.address'))
        //     ->send(new InquirySubmitted($inquiry));

        return back()->with('success', 'Thanks! We will contact you soon.');
    }
}
