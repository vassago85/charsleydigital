@extends('layouts.site')

@section('body_class', 'cd-home')

@section('title', 'Charsley Digital — Systems built to be owned')
@section('description', 'Custom software for organisations that need to own their systems. Dedicated infrastructure, direct support, no lock-in.')
@section('canonical', url('/'))

@section('content')
@php
    $by = collect($projects)->keyBy('slug');
    $featured = ['saprf', 'centrevision', 'deadcenter'];
    $more = ['nrapa', 'pprc', 'ranyati', 'axionis-pos'];
@endphp

<div class="wrap hero">
    <div>
        <p class="label">Charsley Digital / software studio</p>
        <h1>Systems built<br>to be owned<span class="dot">.</span></h1>
        <p class="lead">Custom software for organisations that need to own their systems.</p>
        <p class="bodycopy">Dedicated infrastructure, direct support, and no platform lock-in. The software is built around how the organisation actually operates.</p>
        <div class="actions">
            <a class="button" href="#contact">Start a project</a>
            <a href="#work">View selected work</a>
        </div>
    </div>
    <aside class="index" aria-label="Selected systems">
        <div class="index-head"><span class="label">System index</span><span class="label">07</span></div>
        @foreach (['nrapa' => 'NRAPA', 'saprf' => 'SAPRF', 'pprc' => 'PPRC', 'deadcenter' => 'DeadCenter', 'centrevision' => 'CentreVision', 'ranyati' => 'Ranyati', 'axionis-pos' => 'Axionis POS'] as $slug => $label)
            <a href="#{{ $slug }}">
                <span>{{ $by[$slug]['index'] ?? '' }}</span>
                <strong>{{ $label }}</strong>
                <small>Live</small>
            </a>
        @endforeach
    </aside>
</div>
<div class="wrap hero-foot mono"><span>Selected work, 2024–2026</span><span>Dedicated infrastructure</span></div>

<section class="work" id="work">
    <div class="wrap">
        <div class="section-top"><p class="label">Selected work</p><p class="label">Live systems</p></div>
        @foreach ($featured as $slug)
            @php $project = $by[$slug]; @endphp
            <article class="project" id="{{ $slug }}">
                <span class="number mono">{{ $project['index'] }}</span>
                <div class="project-copy">
                    <h3>{{ $project['name'] }}</h3>
                    <p>{{ $project['summary'] }}</p>
                    <span class="label">{{ $project['role'] }}@if (! empty($project['stack'])) / {{ implode(', ', $project['stack']) }}@endif</span>
                    @if ($project['url'])
                        <a href="{{ $project['url'] }}" rel="noopener">Visit platform</a>
                    @endif
                </div>
                <div class="plate {{ $slug === 'centrevision' ? 'traffic' : ($slug === 'deadcenter' ? 'score' : '') }}">
                    <div class="word">{{ $project['name'] }}</div>
                    <div class="plate-footer">
                        <div>
                            <div class="spec"><span>{{ $project['status'] }}</span><span>{{ parse_url($project['url'], PHP_URL_HOST) }}</span></div>
                            <div class="caption">{{ $project['client'] }}</div>
                        </div>
                        @if ($project['logo'])
                            <img src="{{ $project['logo'] }}" alt="">
                        @endif
                    </div>
                </div>
            </article>
        @endforeach
        <div class="more">
            @foreach ($more as $slug)
                @php $project = $by[$slug]; @endphp
                <a id="{{ $slug }}" href="{{ $project['url'] ?: route('work.show', $slug) }}" @if($project['url']) rel="noopener" @endif>
                    <span class="mono">{{ $project['index'] }}</span>
                    @if ($project['logo'])
                        <img src="{{ $project['logo'] }}" alt="">
                    @else
                        <span></span>
                    @endif
                    <strong>{{ $project['name'] }}</strong>
                    <span class="desc">{{ $project['client'] }}</span>
                    <span aria-hidden="true">&rarr;</span>
                </a>
            @endforeach
        </div>
    </div>
</section>

<section id="practice">
    <div class="wrap practice">
        <div class="practice-head">
            <p class="label">Practice</p>
            <h2>Software shaped around the operation.</h2>
        </div>
        <div class="services">
            <article><span class="mono">01</span><div><h3>Membership platforms</h3><p>Member records, renewals, documents, roles, and the admin work around a real association.</p></div></article>
            <article><span class="mono">02</span><div><h3>Match and event systems</h3><p>Entries, scoring, results, and the public record of a competition.</p></div></article>
            <article><span class="mono">03</span><div><h3>Site traffic systems</h3><p>Vehicle reads, watchlists, dwell, and reports. The system records and reports. It does not control gates.</p></div></article>
            <article><span class="mono">04</span><div><h3>Point of sale</h3><p>Sales, stock, and the counter workflow for a business that needs the software on its own infrastructure.</p></div></article>
            <article><span class="mono">05</span><div><h3>Operational reporting</h3><p>The numbers the organisation actually uses, in a form the people running it can read.</p></div></article>
            <article><span class="mono">06</span><div><h3>Dedicated hosting</h3><p>The system runs on infrastructure set aside for that client, with the data kept separate.</p></div></article>
        </div>
    </div>
</section>

<section class="dark" id="ownership">
    <div class="wrap">
        <div class="ownership">
            <div><p class="label">Ownership</p><h2>The client owns the system.</h2></div>
            <p>Data, access, and the right to leave stay with the organisation. The software is not rented from a shared product that can change underneath the operation.</p>
        </div>
        <div class="principles">
            <div><strong>Your data</strong><p>Records stay with the organisation that created them.</p></div>
            <div><strong>Your infrastructure</strong><p>Each system runs on dedicated infrastructure, not a shared tenancy.</p></div>
            <div><strong>No lock-in</strong><p>You can take the system and the data if the working relationship ends.</p></div>
        </div>
    </div>
</section>

<section id="process">
    <div class="wrap">
        <div class="section-top"><p class="label">Process</p><p class="label">Four stages</p></div>
        <div class="steps">
            <article><span class="mono">01</span><h3>Discovery</h3><p>How the organisation works now, and where the current tools fail.</p></article>
            <article><span class="mono">02</span><h3>Scope</h3><p>What gets built, what stays out, and what it costs to run.</p></article>
            <article><span class="mono">03</span><h3>Build</h3><p>The system, on infrastructure that belongs to the engagement.</p></article>
            <article><span class="mono">04</span><h3>Operate</h3><p>Hosting, fixes, and changes after the system is in use.</p></article>
        </div>
    </div>
</section>

<section class="commercial" id="commercial">
    <div class="wrap commercial-inner">
        <div><p class="label">Commercial</p><h2>Clear costs. No lock-in.</h2></div>
        <div>
            <div class="cost"><span class="mono">01</span><div><h3>Build</h3><p>Scoped and quoted before work starts.</p></div></div>
            <div class="cost"><span class="mono">02</span><div><h3>Hosting</h3><p>A monthly cost for the dedicated infrastructure.</p></div></div>
            <div class="cost"><span class="mono">03</span><div><h3>Support</h3><p>A retainer for fixes and small changes, or quoted work when the change is larger.</p></div></div>
            <div class="cost"><span class="mono">04</span><div><h3>Exit</h3><p>The data and the system can leave with the client.</p></div></div>
        </div>
    </div>
</section>

<section id="contact">
    <div class="wrap contact">
        <div>
            <p class="label">Start a project</p>
            <h2>Tell me what the system needs to do.</h2>
            <p>A short note is enough. I reply with whether it is a fit, and what the first step would be.</p>
        </div>
        <div>
            @if (session('lead_success'))
                <div class="ok" role="status">
                    <p class="label">Received</p>
                    <h3>Got it.</h3>
                    <p>I will reply from the studio address.</p>
                </div>
            @else
                <form method="POST" action="{{ route('contact.submit') }}">
                    @csrf
                    <div class="hp" aria-hidden="true">
                        <label for="website_url">Website</label>
                        <input id="website_url" name="website_url" type="text" tabindex="-1" autocomplete="off">
                    </div>
                    <input type="hidden" name="timestamp" value="{{ time() }}">
                    <div class="form-row">
                        <div>
                            <label for="org_name">Organisation</label>
                            <input id="org_name" name="org_name" type="text" value="{{ old('org_name') }}" required autocomplete="organization">
                        </div>
                        <div>
                            <label for="contact_name">Your name</label>
                            <input id="contact_name" name="contact_name" type="text" value="{{ old('contact_name') }}" required autocomplete="name">
                        </div>
                    </div>
                    <div class="form-row">
                        <div>
                            <label for="email">Email</label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="email">
                        </div>
                        <div>
                            <label for="phone">Phone</label>
                            <input id="phone" name="phone" type="tel" value="{{ old('phone') }}" autocomplete="tel">
                        </div>
                    </div>
                    <div class="form-row">
                        <div>
                            <label for="system_type">System type</label>
                            <select id="system_type" name="system_type" required>
                                <option value="" @selected(old('system_type') === null || old('system_type') === '')>Select</option>
                                @foreach (['Membership', 'Match scoring', 'Site traffic', 'Point of sale', 'Something else'] as $type)
                                    <option value="{{ $type }}" @selected(old('system_type') === $type)>{{ $type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="timeline">Timeline</label>
                            <input id="timeline" name="timeline" type="text" value="{{ old('timeline') }}">
                        </div>
                    </div>
                    <label for="problem_description">What the system needs to do</label>
                    <textarea id="problem_description" name="problem_description" required>{{ old('problem_description') }}</textarea>
                    <div class="check">
                        <input id="consent" name="consent" type="checkbox" value="1" @checked(old('consent')) required>
                        <label for="consent">I agree to being contacted about this enquiry.</label>
                    </div>
                    @if ($errors->any())
                        <p class="form-note" role="alert">{{ $errors->first() }}</p>
                    @endif
                    <button class="button" type="submit" style="margin-top:22px">Send enquiry</button>
                    <p class="form-note">Sent to the studio. No newsletter.</p>
                </form>
            @endif
        </div>
    </div>
</section>

@push('head')
<script type="application/ld+json">
{!! json_encode([
    '@@context' => 'https://schema.org',
    '@type' => 'ProfessionalService',
    'name' => 'Charsley Digital',
    'url' => url('/'),
    'description' => 'Custom software for organisations that need to own their systems.',
    'areaServed' => 'ZA',
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
@include('partials.work-graph')
@endpush
@endsection
