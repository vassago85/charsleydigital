<?php

namespace App\Mail;

use App\Models\Setting;

class LeadRecipients
{
    public const INBOX = 'paul@charsley.co.za';

    /**
     * @return list<string>
     */
    public static function all(): array
    {
        $configured = Setting::get('leads_to_email') ?: config('mail.leads_to');

        $addresses = [self::INBOX];

        if (is_string($configured) && filter_var($configured, FILTER_VALIDATE_EMAIL)) {
            $addresses[] = $configured;
        }

        return array_values(array_unique($addresses));
    }
}
