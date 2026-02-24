<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lead extends Model
{
    use HasUuids;

    protected $fillable = [
        'org_name',
        'contact_name',
        'role_title',
        'email',
        'phone',
        'system_type',
        'problem_description',
        'users_admins',
        'users_staff',
        'users_members',
        'users_public',
        'users_other',
        'active_users_est',
        'monthly_transactions_est',
        'storage_est',
        'timeline',
        'budget_expectation',
        'consent',
        'source',
        'status',
        'follow_up_date',
    ];

    protected $casts = [
        'users_admins' => 'boolean',
        'users_staff' => 'boolean',
        'users_members' => 'boolean',
        'users_public' => 'boolean',
        'consent' => 'boolean',
        'follow_up_date' => 'date',
    ];

    public const STATUSES = [
        'new',
        'contacted',
        'qualified',
        'proposal_sent',
        'won',
        'lost',
        'archived',
    ];

    public function notes(): HasMany
    {
        return $this->hasMany(LeadNote::class)->orderByDesc('created_at');
    }

}
