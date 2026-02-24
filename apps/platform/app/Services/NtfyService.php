<?php

namespace App\Services;

use App\Models\Lead;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class NtfyService
{
    protected string $baseUrl;

    protected ?string $topic;

    public function __construct()
    {
        $this->baseUrl = config('services.ntfy.url', 'https://ntfy.sh');
        $this->topic = config('services.ntfy.topic');
    }

    public function send(string $title, string $message, int $priority = 3, array $tags = []): bool
    {
        if (empty($this->topic)) {
            return false;
        }

        try {
            $response = Http::withHeaders([
                'Title' => $title,
                'Priority' => (string) $priority,
                'Tags' => implode(',', $tags),
            ])->post("{$this->baseUrl}/{$this->topic}", $message);

            return $response->successful();
        } catch (\Throwable $e) {
            Log::error('Ntfy send failed', ['message' => $e->getMessage()]);

            return false;
        }
    }

    public function notifyNewLead(Lead $lead): bool
    {
        if (empty($this->topic)) {
            return false;
        }

        $url = rtrim(config('app.url'), '/').'/admin/leads/'.$lead->id;
        $message = "Org: {$lead->org_name}\nContact: {$lead->contact_name}\nEmail: {$lead->email}\nType: {$lead->system_type}\n\n{$url}";

        return $this->send('New lead: '.$lead->org_name, $message, 4, ['incoming_envelope', 'loudspeaker']);
    }
}
