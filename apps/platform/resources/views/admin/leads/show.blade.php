@extends('layouts.admin')

@section('title', $lead->org_name)

@section('content')
<div class="mb-8 flex flex-wrap items-center justify-between gap-4">
    <div>
        <a href="{{ route('admin.leads.index') }}" class="text-sm text-slate-600 hover:text-blue-600">&larr; Back to leads</a>
        <h1 class="mt-2 text-2xl font-semibold">{{ $lead->org_name }}</h1>
        <p class="text-slate-600">{{ $lead->contact_name }} &middot; {{ $lead->email }}</p>
    </div>
</div>

<div class="grid gap-8 lg:grid-cols-3">
    <div class="lg:col-span-2 space-y-6">
        <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
            <h2 class="mb-4 text-lg font-semibold">Details</h2>
            <dl class="grid gap-3 sm:grid-cols-2">
                <div><dt class="text-sm text-slate-500">Organisation</dt><dd>{{ $lead->org_name }}</dd></div>
                <div><dt class="text-sm text-slate-500">Contact</dt><dd>{{ $lead->contact_name }}</dd></div>
                <div><dt class="text-sm text-slate-500">Role</dt><dd>{{ $lead->role_title ?? '—' }}</dd></div>
                <div><dt class="text-sm text-slate-500">Email</dt><dd><a href="mailto:{{ $lead->email }}" class="text-blue-600 hover:underline">{{ $lead->email }}</a></dd></div>
                <div><dt class="text-sm text-slate-500">Phone</dt><dd>{{ $lead->phone ?? '—' }}</dd></div>
                <div><dt class="text-sm text-slate-500">System type</dt><dd>{{ str_replace('_', ' ', $lead->system_type) }}</dd></div>
                <div class="sm:col-span-2"><dt class="text-sm text-slate-500">Description</dt><dd class="mt-1 whitespace-pre-wrap">{{ $lead->problem_description }}</dd></div>
                <div><dt class="text-sm text-slate-500">Timeline</dt><dd>{{ str_replace('_', ' ', $lead->timeline) }}</dd></div>
                <div><dt class="text-sm text-slate-500">Est. users</dt><dd>{{ $lead->active_users_est ?? '—' }}</dd></div>
                <div><dt class="text-sm text-slate-500">Est. transactions/mo</dt><dd>{{ $lead->monthly_transactions_est ?? '—' }}</dd></div>
                <div><dt class="text-sm text-slate-500">Storage est.</dt><dd>{{ $lead->storage_est ?? '—' }}</dd></div>
                <div><dt class="text-sm text-slate-500">Budget expectation</dt><dd>{{ $lead->budget_expectation ?? '—' }}</dd></div>
                <div class="sm:col-span-2">
                    <dt class="text-sm text-slate-500">User types</dt>
                    <dd>{{ collect(['admins' => $lead->users_admins, 'staff' => $lead->users_staff, 'members' => $lead->users_members, 'public' => $lead->users_public])->filter()->keys()->implode(', ') ?: '—' }}{{ $lead->users_other ? " ({$lead->users_other})" : '' }}</dd>
                </div>
            </dl>
        </div>

        <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
            <h2 class="mb-4 text-lg font-semibold">Notes</h2>
            <form method="POST" action="{{ route('admin.leads.notes.store', $lead) }}" class="mb-6">
                @csrf
                <textarea name="note" rows="3" required class="w-full rounded-md border-slate-300 shadow-sm" placeholder="Add a note..."></textarea>
                <button type="submit" class="mt-2 rounded-md bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">Add note</button>
            </form>
            <div class="space-y-4">
                @forelse ($lead->notes as $note)
                    <div class="border-l-2 border-slate-200 pl-4">
                        <p class="whitespace-pre-wrap">{{ $note->note }}</p>
                        <p class="mt-1 text-xs text-slate-500">{{ $note->creator->name ?? 'Unknown' }} &middot; {{ $note->created_at->format('Y-m-d H:i') }}</p>
                    </div>
                @empty
                    <p class="text-slate-500">No notes yet.</p>
                @endforelse
            </div>
        </div>
    </div>

    <div class="space-y-6">
        <form method="POST" action="{{ route('admin.leads.update', $lead) }}" class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
            @csrf
            @method('PATCH')
            <h2 class="mb-4 text-lg font-semibold">Update</h2>
            <div class="space-y-4">
                <div>
                    <label for="status" class="block text-sm font-medium text-slate-700">Status</label>
                    <select name="status" id="status" class="mt-1 w-full rounded-md border-slate-300 shadow-sm">
                        @foreach (\App\Models\Lead::STATUSES as $s)
                            <option value="{{ $s }}" {{ $lead->status === $s ? 'selected' : '' }}>{{ ucfirst(str_replace('_', ' ', $s)) }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="follow_up_date" class="block text-sm font-medium text-slate-700">Follow-up date</label>
                    <input type="date" name="follow_up_date" id="follow_up_date" value="{{ $lead->follow_up_date?->format('Y-m-d') }}" class="mt-1 w-full rounded-md border-slate-300 shadow-sm">
                </div>
                <button type="submit" class="w-full rounded-md bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">Save</button>
            </div>
        </form>

        <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
            <h2 class="mb-4 text-lg font-semibold">Reply template</h2>
            <p class="mb-4 text-sm text-slate-600">Copy a prepared acknowledgment to reply to this lead.</p>
            <button type="button" id="copy-reply" class="w-full rounded-md border border-slate-300 px-4 py-2 text-sm hover:bg-slate-50">Copy reply template</button>
            <template id="reply-template">Hi {{ $lead->contact_name }},

Thank you for reaching out. We've received your enquiry and will respond within one business day to schedule a discovery call.

Best regards,
Charsley Digital</template>
        </div>
    </div>
</div>

<script>
document.getElementById('copy-reply')?.addEventListener('click', function() {
    const template = document.getElementById('reply-template');
    navigator.clipboard.writeText(template.textContent).then(() => {
        this.textContent = 'Copied!';
        setTimeout(() => { this.textContent = 'Copy reply template'; }, 2000);
    });
});
</script>
@endsection
