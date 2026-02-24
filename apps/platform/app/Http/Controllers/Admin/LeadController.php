<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\LeadNote;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LeadController extends Controller
{
    public function index(Request $request): View
    {
        $query = Lead::query();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('system_type')) {
            $query->where('system_type', $request->system_type);
        }
        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('org_name', 'like', "%{$s}%")
                    ->orWhere('contact_name', 'like', "%{$s}%")
                    ->orWhere('email', 'like', "%{$s}%");
            });
        }
        if ($request->filled('from')) {
            $query->whereDate('created_at', '>=', $request->from);
        }
        if ($request->filled('to')) {
            $query->whereDate('created_at', '<=', $request->to);
        }

        $leads = $query->orderByDesc('created_at')->paginate(20)->withQueryString();

        return view('admin.leads.index', compact('leads'));
    }

    public function show(Lead $lead): View
    {
        $lead->load('notes.creator');

        return view('admin.leads.show', compact('lead'));
    }

    public function update(Request $request, Lead $lead): RedirectResponse
    {
        $request->validate([
            'status' => 'nullable|string|in:'.implode(',', Lead::STATUSES),
            'follow_up_date' => 'nullable|date',
        ]);

        if ($request->has('status')) {
            $lead->status = $request->status;
        }
        if ($request->has('follow_up_date')) {
            $lead->follow_up_date = $request->follow_up_date ?: null;
        }
        $lead->save();

        return redirect()->route('admin.leads.show', $lead)->with('success', 'Lead updated.');
    }

    public function storeNote(Request $request, Lead $lead): RedirectResponse
    {
        $request->validate(['note' => 'required|string|max:10000']);

        LeadNote::create([
            'lead_id' => $lead->id,
            'note' => $request->note,
            'created_by' => $request->user()->id,
        ]);

        return redirect()->route('admin.leads.show', $lead)->with('success', 'Note added.');
    }
}
