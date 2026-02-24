<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewLeadNotification;
use App\Models\Lead;
use App\Models\Setting;
use App\Services\NtfyService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LeadController extends Controller
{
    public function store(Request $request, NtfyService $ntfy): JsonResponse
    {
        if ($request->filled('website_url')) {
            return response()->json(['message' => 'Invalid submission.'], 422);
        }

        $timestamp = $request->input('timestamp');
        if ($timestamp && (time() * 1000 - (int) $timestamp) < 5000) {
            return response()->json(['message' => 'Please wait a moment before submitting.'], 422);
        }

        if (config('services.turnstile.enabled') && $request->filled('cf-turnstile-response')) {
            // TODO: Validate Cloudflare Turnstile token when enabled
        }

        $validated = $request->validate([
            'org_name' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
            'role_title' => 'nullable|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:50',
            'system_type' => 'required|string|max:100',
            'problem_description' => 'required|string|max:10000',
            'users_admins' => 'nullable|in:0,1',
            'users_staff' => 'nullable|in:0,1',
            'users_members' => 'nullable|in:0,1',
            'users_public' => 'nullable|in:0,1',
            'users_other' => 'nullable|string|max:255',
            'active_users_est' => 'nullable|integer|min:0',
            'monthly_transactions_est' => 'nullable|integer|min:0',
            'storage_est' => 'nullable|string|max:255',
            'timeline' => 'required|string|max:100',
            'budget_expectation' => 'nullable|string|max:255',
            'consent' => 'required|accepted',
        ]);

        $lead = Lead::create([
            'org_name' => $validated['org_name'],
            'contact_name' => $validated['contact_name'],
            'role_title' => $validated['role_title'] ?? null,
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'system_type' => $validated['system_type'],
            'problem_description' => $validated['problem_description'],
            'users_admins' => ($validated['users_admins'] ?? '0') === '1',
            'users_staff' => ($validated['users_staff'] ?? '0') === '1',
            'users_members' => ($validated['users_members'] ?? '0') === '1',
            'users_public' => ($validated['users_public'] ?? '0') === '1',
            'users_other' => $validated['users_other'] ?? null,
            'active_users_est' => $validated['active_users_est'] ?? null,
            'monthly_transactions_est' => $validated['monthly_transactions_est'] ?? null,
            'storage_est' => $validated['storage_est'] ?? null,
            'timeline' => $validated['timeline'],
            'budget_expectation' => $validated['budget_expectation'] ?? null,
            'consent' => true,
        ]);

        $this->applyMailgunSettings();

        $to = Setting::get('leads_to_email') ?: config('mail.leads_to');
        if ($to) {
            Mail::to($to)->send(new NewLeadNotification($lead));
        }

        $ntfy->notifyNewLead($lead);

        return response()->json(['ok' => true, 'lead_id' => $lead->id]);
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
