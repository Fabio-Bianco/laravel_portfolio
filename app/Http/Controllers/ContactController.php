<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Log;

/**
 * Contact form controller
 * 
 * simplified: uses FormRequest instead of inline validation
 * removed unnecessary try-catch (Laravel handles exceptions automatically)
 */
class ContactController extends Controller
{
    public function send(ContactRequest $request)
    {
        // simplified: validation already done by FormRequest
        $validated = $request->validated();
        
        // Log contact attempt
        Log::info('Contact form submission', [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => $validated['subject'],
        ]);
        
        // TODO: Send email notification when mail is configured
        // Mail::to(config('mail.from.address'))
        //     ->send(new ContactMail($validated));
        
        return response()->json([
            'success' => true,
            'message' => 'Thank you for your message! I will get back to you soon.',
        ]);
    }
}
