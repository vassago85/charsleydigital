@extends('layouts.admin')

@section('title', 'Settings')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold text-slate-900">Settings</h1>
    <p class="mt-1 text-slate-600">Configure integrations and notifications. Values saved here override environment defaults.</p>
</div>

<form method="POST" action="{{ route('admin.settings.update') }}" class="space-y-8">
    @csrf
    @method('PUT')

    @if ($errors->any())
        <div class="rounded-lg border border-red-200 bg-red-50 p-4">
            <ul class="list-inside list-disc text-sm text-red-700">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Mailgun --}}
    <div class="rounded-lg border border-slate-200 bg-white p-6">
        <div class="mb-4 flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-orange-100 text-orange-600">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </div>
            <div>
                <h2 class="text-lg font-semibold text-slate-900">Mailgun</h2>
                <p class="text-sm text-slate-500">Email delivery for lead notifications</p>
            </div>
        </div>
        <div class="grid gap-4 sm:grid-cols-2">
            <div>
                <label for="mailgun_domain" class="block text-sm font-medium text-slate-700">Domain</label>
                <input type="text" id="mailgun_domain" name="mailgun_domain" value="{{ old('mailgun_domain', $settings['mailgun_domain']) }}" placeholder="mg.example.com" class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label for="mailgun_secret" class="block text-sm font-medium text-slate-700">API Key</label>
                <input type="password" id="mailgun_secret" name="mailgun_secret" value="{{ old('mailgun_secret', $settings['mailgun_secret']) }}" placeholder="key-xxxxxxxx" class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label for="mailgun_endpoint" class="block text-sm font-medium text-slate-700">Endpoint</label>
                <input type="text" id="mailgun_endpoint" name="mailgun_endpoint" value="{{ old('mailgun_endpoint', $settings['mailgun_endpoint']) }}" placeholder="api.eu.mailgun.net" class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500">
                <p class="mt-1 text-xs text-slate-400">Use api.eu.mailgun.net for EU, api.mailgun.net for US</p>
            </div>
            <div>
                <label for="mail_from_address" class="block text-sm font-medium text-slate-700">From Address</label>
                <input type="email" id="mail_from_address" name="mail_from_address" value="{{ old('mail_from_address', $settings['mail_from_address']) }}" placeholder="noreply@example.com" class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label for="mail_from_name" class="block text-sm font-medium text-slate-700">From Name</label>
                <input type="text" id="mail_from_name" name="mail_from_name" value="{{ old('mail_from_name', $settings['mail_from_name']) }}" placeholder="Charsley Digital" class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label for="leads_to_email" class="block text-sm font-medium text-slate-700">Lead Notifications To</label>
                <input type="email" id="leads_to_email" name="leads_to_email" value="{{ old('leads_to_email', $settings['leads_to_email']) }}" placeholder="paul@charsley.co.za" class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500">
                <p class="mt-1 text-xs text-slate-400">paul@charsley.co.za always receives new lead notifications. Another address here is copied as well.</p>
            </div>
        </div>
    </div>

    {{-- Ntfy --}}
    <div class="rounded-lg border border-slate-200 bg-white p-6">
        <div class="mb-4 flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-100 text-blue-600">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
            </div>
            <div>
                <h2 class="text-lg font-semibold text-slate-900">Ntfy</h2>
                <p class="text-sm text-slate-500">Push notifications for new leads</p>
            </div>
        </div>
        <div class="grid gap-4 sm:grid-cols-2">
            <div>
                <label for="ntfy_url" class="block text-sm font-medium text-slate-700">Server URL</label>
                <input type="url" id="ntfy_url" name="ntfy_url" value="{{ old('ntfy_url', $settings['ntfy_url']) }}" placeholder="https://ntfy.sh" class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label for="ntfy_topic" class="block text-sm font-medium text-slate-700">Topic</label>
                <input type="text" id="ntfy_topic" name="ntfy_topic" value="{{ old('ntfy_topic', $settings['ntfy_topic']) }}" placeholder="my-leads-topic" class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500">
                <p class="mt-1 text-xs text-slate-400">Subscribe to this topic in the Ntfy app to receive alerts</p>
            </div>
        </div>
    </div>

    {{-- Turnstile --}}
    <div class="rounded-lg border border-slate-200 bg-white p-6">
        <div class="mb-4 flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-amber-100 text-amber-600">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
            </div>
            <div>
                <h2 class="text-lg font-semibold text-slate-900">Cloudflare Turnstile</h2>
                <p class="text-sm text-slate-500">Bot protection for the contact form</p>
            </div>
        </div>
        <div class="mb-4">
            <label class="flex items-center gap-3">
                <input type="checkbox" name="turnstile_enabled" value="1" {{ old('turnstile_enabled', $settings['turnstile_enabled']) === '1' ? 'checked' : '' }} class="h-4 w-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                <span class="text-sm font-medium text-slate-700">Enable Turnstile verification</span>
            </label>
        </div>
        <div class="grid gap-4 sm:grid-cols-2">
            <div>
                <label for="turnstile_site_key" class="block text-sm font-medium text-slate-700">Site Key</label>
                <input type="text" id="turnstile_site_key" name="turnstile_site_key" value="{{ old('turnstile_site_key', $settings['turnstile_site_key']) }}" placeholder="0x4AAAAAAA..." class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500">
                <p class="mt-1 text-xs text-slate-400">Visible key used in the frontend widget</p>
            </div>
            <div>
                <label for="turnstile_secret" class="block text-sm font-medium text-slate-700">Secret Key</label>
                <input type="password" id="turnstile_secret" name="turnstile_secret" value="{{ old('turnstile_secret', $settings['turnstile_secret']) }}" placeholder="0x4AAAAAAA..." class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500">
                <p class="mt-1 text-xs text-slate-400">Server-side key for verifying tokens</p>
            </div>
        </div>
    </div>

    <div class="flex items-center gap-4">
        <button type="submit" class="rounded-lg bg-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
            Save Settings
        </button>
        <a href="{{ route('admin.leads.index') }}" class="text-sm text-slate-500 hover:text-slate-700">Back to Leads</a>
    </div>
</form>
@endsection
