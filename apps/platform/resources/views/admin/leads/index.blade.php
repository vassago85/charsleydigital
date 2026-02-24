@extends('layouts.admin')

@section('title', 'Leads')

@section('content')
<div class="mb-8 flex flex-wrap items-center gap-4">
    <h1 class="text-2xl font-semibold">Leads</h1>
</div>

<form method="GET" action="{{ route('admin.leads.index') }}" class="mb-8 flex flex-wrap gap-4">
    <input type="search" name="search" value="{{ request('search') }}" placeholder="Search name, email, org" class="rounded-md border-slate-300 shadow-sm">
    <select name="status" class="rounded-md border-slate-300">
        <option value="">All statuses</option>
        @foreach (\App\Models\Lead::STATUSES as $s)
            <option value="{{ $s }}" {{ request('status') === $s ? 'selected' : '' }}>{{ ucfirst(str_replace('_', ' ', $s)) }}</option>
        @endforeach
    </select>
    <select name="system_type" class="rounded-md border-slate-300">
        <option value="">All types</option>
        <option value="membership_portal" {{ request('system_type') === 'membership_portal' ? 'selected' : '' }}>Membership portal</option>
        <option value="admin_portal" {{ request('system_type') === 'admin_portal' ? 'selected' : '' }}>Admin portal</option>
        <option value="ecommerce" {{ request('system_type') === 'ecommerce' ? 'selected' : '' }}>E-commerce</option>
        <option value="custom_webapp" {{ request('system_type') === 'custom_webapp' ? 'selected' : '' }}>Custom web app</option>
        <option value="website" {{ request('system_type') === 'website' ? 'selected' : '' }}>Website</option>
        <option value="other" {{ request('system_type') === 'other' ? 'selected' : '' }}>Other</option>
    </select>
    <input type="date" name="from" value="{{ request('from') }}" class="rounded-md border-slate-300">
    <input type="date" name="to" value="{{ request('to') }}" class="rounded-md border-slate-300">
    <button type="submit" class="rounded-md bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">Filter</button>
</form>

<div class="overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm">
    <table class="min-w-full divide-y divide-slate-200">
        <thead class="bg-slate-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase text-slate-500">Org</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase text-slate-500">Contact</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase text-slate-500">Type</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase text-slate-500">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase text-slate-500">Date</th>
                <th class="px-6 py-3"></th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-200">
            @forelse ($leads as $lead)
                <tr>
                    <td class="px-6 py-4 text-sm font-medium text-slate-900">{{ $lead->org_name }}</td>
                    <td class="px-6 py-4 text-sm text-slate-600">{{ $lead->contact_name }}</td>
                    <td class="px-6 py-4 text-sm text-slate-600">{{ str_replace('_', ' ', $lead->system_type) }}</td>
                    <td class="px-6 py-4">
                        <span class="inline-flex rounded-full bg-slate-100 px-2 py-1 text-xs font-medium text-slate-700">{{ ucfirst(str_replace('_', ' ', $lead->status)) }}</span>
                    </td>
                    <td class="px-6 py-4 text-sm text-slate-600">{{ $lead->created_at->format('Y-m-d H:i') }}</td>
                    <td class="px-6 py-4">
                        <a href="{{ route('admin.leads.show', $lead) }}" class="text-blue-600 hover:text-blue-700">View</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-6 py-8 text-center text-slate-500">No leads yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if ($leads->hasPages())
    <div class="mt-6">
        {{ $leads->links() }}
    </div>
@endif
@endsection
