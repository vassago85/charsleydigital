<?php

namespace App\Http\Controllers;

use App\Mail\LeadRecipients;
use App\Mail\NewLeadNotification;
use App\Models\Lead;
use App\Models\Setting;
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

        $this->applyMailgunSettings();

        Mail::to(LeadRecipients::all())->send(new NewLeadNotification($lead));

        $ntfy->notifyNewLead($lead);

        return redirect('/#contact')->with('lead_success', true);
    }

    private function applyMailgunSettings(): void
    {
        $domain = Setting::get('mailgun_domain');
        $secret = Setting::get('mailgun_secret');
        $endpoint = Setting::get('mailgun_endpoint');
        $fromAddress = Setting::get('mail_from_address');
        $fromName = Setting::get('mail_from_name');

        if ($domain) {
            config(['services.mailgun.domain' => $domain]);
        }
        if ($secret) {
            config(['services.mailgun.secret' => $secret]);
        }
        if ($endpoint) {
            config(['services.mailgun.endpoint' => $endpoint]);
        }
        if ($fromAddress) {
            config(['mail.from.address' => $fromAddress]);
        }
        if ($fromName) {
            config(['mail.from.name' => $fromName]);
        }
    }
}
