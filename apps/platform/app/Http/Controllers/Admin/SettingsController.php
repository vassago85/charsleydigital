<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingsController extends Controller
{
    private const KEYS = [
        'mailgun_domain',
        'mailgun_secret',
        'mailgun_endpoint',
        'mail_from_address',
        'mail_from_name',
        'leads_to_email',
        'ntfy_url',
        'ntfy_topic',
        'turnstile_enabled',
        'turnstile_site_key',
        'turnstile_secret',
    ];

    public function index(): View
    {
        $settings = Setting::getMany(self::KEYS);

        $defaults = [
            'mailgun_endpoint' => config('services.mailgun.endpoint', 'api.eu.mailgun.net'),
            'mail_from_address' => config('mail.from.address'),
            'mail_from_name' => config('mail.from.name'),
            'leads_to_email' => config('mail.leads_to'),
            'ntfy_url' => config('services.ntfy.url', 'https://ntfy.sh'),
            'ntfy_topic' => config('services.ntfy.topic'),
            'mailgun_domain' => config('services.mailgun.domain'),
            'mailgun_secret' => config('services.mailgun.secret'),
            'turnstile_enabled' => config('services.turnstile.enabled') ? '1' : '',
            'turnstile_secret' => config('services.turnstile.secret'),
            'turnstile_site_key' => '',
        ];

        foreach ($settings as $key => $value) {
            if ($value === null) {
                $settings[$key] = $defaults[$key] ?? '';
            }
        }

        return view('admin.settings', compact('settings'));
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'mailgun_domain' => 'nullable|string|max:255',
            'mailgun_secret' => 'nullable|string|max:255',
            'mailgun_endpoint' => 'nullable|string|max:255',
            'mail_from_address' => 'nullable|email|max:255',
            'mail_from_name' => 'nullable|string|max:255',
            'leads_to_email' => 'nullable|email|max:255',
            'ntfy_url' => 'nullable|url|max:255',
            'ntfy_topic' => 'nullable|string|max:255',
            'turnstile_enabled' => 'nullable|string|in:1',
            'turnstile_site_key' => 'nullable|string|max:255',
            'turnstile_secret' => 'nullable|string|max:255',
        ]);

        foreach (self::KEYS as $key) {
            $value = $validated[$key] ?? null;
            if ($key === 'turnstile_enabled') {
                $value = $request->has('turnstile_enabled') ? '1' : '0';
            }
            Setting::set($key, $value);
        }

        return redirect()->route('admin.settings')->with('success', 'Settings saved.');
    }
}
