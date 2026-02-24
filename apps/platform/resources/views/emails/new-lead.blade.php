<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: sans-serif; line-height: 1.5; color: #334155; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        h1 { color: #0f172a; font-size: 1.25rem; }
        dl { margin: 1rem 0; }
        dt { font-weight: 600; color: #475569; margin-top: 0.75rem; }
        dd { margin-left: 0; margin-top: 0.25rem; }
        .btn { display: inline-block; padding: 0.5rem 1rem; background: #0d9488; color: white; text-decoration: none; border-radius: 0.375rem; margin-top: 1rem; }
    </style>
</head>
<body>
    <div class="container">
        <h1>New lead received</h1>
        <p><strong>{{ $lead->contact_name }}</strong> from <strong>{{ $lead->org_name }}</strong> submitted an enquiry.</p>
        <dl>
            <dt>Email</dt>
            <dd>{{ $lead->email }}</dd>
            <dt>Phone</dt>
            <dd>{{ $lead->phone ?? '—' }}</dd>
            <dt>Role</dt>
            <dd>{{ $lead->role_title ?? '—' }}</dd>
            <dt>System type</dt>
            <dd>{{ $lead->system_type }}</dd>
            <dt>Timeline</dt>
            <dd>{{ $lead->timeline }}</dd>
            <dt>Description</dt>
            <dd>{{ Str::limit($lead->problem_description, 500) }}</dd>
        </dl>
        <a href="{{ rtrim(config('app.url'), '/') }}/admin/leads/{{ $lead->id }}" class="btn">View in admin</a>
    </div>
</body>
</html>
