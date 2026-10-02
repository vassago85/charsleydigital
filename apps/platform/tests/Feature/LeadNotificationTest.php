<?php

namespace Tests\Feature;

use App\Mail\NewLeadNotification;
use App\Models\Setting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class LeadNotificationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Setting::flush();
    }

    public function test_website_enquiry_always_notifies_paul(): void
    {
        Mail::fake();
        config(['mail.leads_to' => null]);
        Setting::set('leads_to_email', 'other@example.com');

        $this->post('/contact', $this->enquiry())->assertRedirect('/#contact');

        Mail::assertSent(NewLeadNotification::class, function (NewLeadNotification $mail) {
            return $mail->hasTo('paul@charsley.co.za')
                && $mail->hasTo('other@example.com');
        });
    }

    public function test_api_enquiry_notifies_paul_when_no_address_is_configured(): void
    {
        Mail::fake();
        config(['mail.leads_to' => '']);

        $this->postJson('/api/leads', $this->enquiry())->assertOk();

        Mail::assertSent(NewLeadNotification::class, function (NewLeadNotification $mail) {
            return $mail->hasTo('paul@charsley.co.za') && count($mail->to) === 1;
        });
    }

    private function enquiry(): array
    {
        return [
            'org_name' => 'Example Club',
            'contact_name' => 'Ada',
            'email' => 'ada@example.com',
            'system_type' => 'Membership',
            'problem_description' => 'Need a membership system.',
            'timeline' => 'This year',
            'consent' => '1',
            'timestamp' => (string) (time() - 10),
        ];
    }
}
