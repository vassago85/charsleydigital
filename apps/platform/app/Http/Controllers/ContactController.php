<?php

namespace App\Http\Controllers;

use App\Mail\NewLeadNotification;
use App\Models\Lead;
use App\Services\NtfyService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request, NtfyService $ntfy): RedirectResponse
    {
        if ($request->filled('website_url')) {
            return redirect('/#contact');
        }

        $timestamp = $request->input('timestamp');
        if ($timestamp && (time() * 1000 - (int) $timestamp) < 3000) {
            return back()->withInput()->withErrors(['form' => 'Please wait a moment before submitting.']);
        }

        $validated = $request->validate([
            'org_name' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'system_type' => 'required|string|max:100',
            'problem_description' => 'required|string|max:10000',
            'timeline' => 'required|string|max:100',
            'consent' => 'required|accepted',
        ]);

        $lead = Lead::create([
            'org_name' => $validated['org_name'],
            'contact_name' => $validated['contact_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'system_type' => $validated['system_type'],
            'problem_description' => $validated['problem_description'],
            'timeline' => $validated['timeline'],
            'consent' => true,
        ]);

        if ($to = config('mail.leads_to')) {
            Mail::to($to)->send(new NewLeadNotification($lead));
        }

        $ntfy->notifyNewLead($lead);

        return redirect('/#contact')->with('lead_success', true);
    }
}
