<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    /**
     * Handle contact form submission
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function send(Request $request)
    {
        // Validate form data
        $validated = $request->validate([
            'name' => 'required|string|min:2|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|min:3|max:255',
            'message' => 'required|string|min:10|max:1000',
        ], [
            'name.required' => 'Name is required',
            'name.min' => 'Name must be at least 2 characters',
            'email.required' => 'Email is required',
            'email.email' => 'Please enter a valid email address',
            'subject.required' => 'Subject is required',
            'subject.min' => 'Subject must be at least 3 characters',
            'message.required' => 'Message is required',
            'message.min' => 'Message must be at least 10 characters',
            'message.max' => 'Message must not exceed 1000 characters',
        ]);
        
        try {
            // Log contact attempt
            Log::info('Contact form submission', [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'subject' => $validated['subject'],
            ]);
            
            // TODO: Send email notification
            // Uncomment when you configure mail settings in .env
            /*
            Mail::send('emails.contact', $validated, function($message) use ($validated) {
                $message->to(config('mail.from.address'))
                    ->subject('Portfolio Contact: ' . $validated['subject'])
                    ->replyTo($validated['email'], $validated['name']);
            });
            */
            
            // For now, just return success
            // In production, you should actually send the email
            
            return response()->json([
                'success' => true,
                'message' => 'Thank you for your message! I will get back to you soon.',
            ]);
            
        } catch (\Exception $e) {
            Log::error('Contact form error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Oops! Something went wrong. Please try again later.',
            ], 500);
        }
    }
}
