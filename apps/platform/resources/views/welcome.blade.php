@extends('layouts.site')

@section('title', 'Charsley Digital — Platforms that stay owned')
@section('description', 'Membership platforms, match scoring, and site traffic systems. Built, hosted, and maintained. Your data stays yours.')
@section('canonical', route('home'))

@push('head')
    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => 'Charsley Digital',
            'url' => 'https://charsleydigital.co.za',
            'description' => 'Membership platforms, match scoring, and site traffic systems. Built, hosted, and maintained.',
        ], JSON_UNESCAPED_SLASHES) !!}
    </script>
@endpush

@section('content')
    <section class="ink text-white">
        <div class="mx-auto max-w-6xl px-6 pb-8 pt-16 md:pt-24">
            <p class="rise font-mono text-xs uppercase tracking-[0.22em] text-brand-300">Charsley Digital</p>
            <h1 class="rise rise-d1 mt-5 max-w-4xl text-5xl font-semibold leading-[0.95] tracking-tight md:text-7xl lg:text-8xl">
                Systems built<br>to be owned.
            </h1>
            <p class="rise rise-d2 mt-8 max-w-xl text-lg text-slate-300 md:text-xl">
                Membership platforms, match scoring, and site traffic. Designed, built, and hosted on dedicated infrastructure. You keep the data.
            </p>
        </div>

        <div class="rise rise-d3 mx-auto mt-12 max-w-6xl border-t border-white/10">
            @foreach ($projects as $project)
                <a href="{{ route('work.show', $project['slug']) }}" class="group grid gap-2 border-b border-white/10 px-6 py-5 transition-colors hover:bg-white/5 md:grid-cols-12 md:items-baseline md:gap-6">
                    <span class="font-mono text-xs text-brand-300 md:col-span-1">{{ $project['index'] }}</span>
                    <span class="text-lg font-semibold tracking-tight md:col-span-3">{{ $project['name'] }}</span>
                    <span class="text-sm text-slate-400 md:col-span-6">{{ $project['summary'] }}</span>
                    <span class="font-mono text-xs uppercase tracking-wider text-slate-500 md:col-span-2 md:text-right group-hover:text-white">{{ $project['status'] }}</span>
                </a>
            @endforeach
        </div>
    </section>

    <section id="practice" class="bg-white py-24">
        <div class="mx-auto grid max-w-6xl gap-16 px-6 md:grid-cols-12">
            <div class="md:col-span-4">
                <p class="font-mono text-xs uppercase tracking-[0.2em] text-brand-700">Practice</p>
                <h2 class="mt-4 text-4xl font-semibold tracking-tight">What actually gets built.</h2>
            </div>
            <div class="md:col-span-7 md:col-start-6">
                <div class="border-t border-slate-200 py-6">
                    <h3 class="text-xl font-semibold">Membership and federation platforms</h3>
                    <p class="mt-2 text-slate-600">Applications, renewals, certificates, QR checks, and the admin that issues them. NRAPA, SAPRF, and PPRC are this work.</p>
                </div>
                <div class="border-t border-slate-200 py-6">
                    <h3 class="text-xl font-semibold">Match scoring</h3>
                    <p class="mt-2 text-slate-600">Seasons, squadding, standings, and a public results portal. DeadCenter also ships an Android app for the range, when the network is the weak part of the day.</p>
                </div>
                <div class="border-t border-slate-200 py-6">
                    <h3 class="text-xl font-semibold">Site traffic</h3>
                    <p class="mt-2 text-slate-600">Camera reads, watchlists, dwell, and reports. CentreVision labels and alerts. It does not open gates.</p>
                </div>
                <div class="border-y border-slate-200 py-6">
                    <h3 class="text-xl font-semibold">Hosting you can leave</h3>
                    <p class="mt-2 text-slate-600">Each platform runs in its own containers. You pay for that space. You can ask for a full export. There is no lock-in hiding in the contract.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="how-it-works" class="border-t border-slate-200 bg-slate-50 py-24">
        <div class="mx-auto max-w-6xl px-6">
            <p class="font-mono text-xs uppercase tracking-[0.2em] text-brand-700">How it starts</p>
            <h2 class="mt-4 max-w-xl text-4xl font-semibold tracking-tight">No price before the scope.</h2>
            <ol class="mt-14 grid gap-10 md:grid-cols-4">
                <li>
                    <p class="font-mono text-sm text-brand-700">01</p>
                    <h3 class="mt-3 text-lg font-semibold">Discovery</h3>
                    <p class="mt-2 text-sm text-slate-600">What the organisation actually does, and where the current process breaks.</p>
                </li>
                <li>
                    <p class="font-mono text-sm text-brand-700">02</p>
                    <h3 class="mt-3 text-lg font-semibold">Proposal</h3>
                    <p class="mt-2 text-sm text-slate-600">A written scope. Implementation, a usage fee, and hosting called out separately.</p>
                </li>
                <li>
                    <p class="font-mono text-sm text-brand-700">03</p>
                    <h3 class="mt-3 text-lg font-semibold">Build</h3>
                    <p class="mt-2 text-sm text-slate-600">You see it while it is being made. The queue and the scheduler ship with the site.</p>
                </li>
                <li>
                    <p class="font-mono text-sm text-brand-700">04</p>
                    <h3 class="mt-3 text-lg font-semibold">Keep</h3>
                    <p class="mt-2 text-sm text-slate-600">Hosting, updates, and later work quoted before it is billed. We stay on the system.</p>
                </li>
            </ol>
        </div>
    </section>

    <section class="bg-[#0b1220] py-24 text-white">
        <div class="mx-auto grid max-w-6xl gap-12 px-6 md:grid-cols-12">
            <div class="md:col-span-5">
                <p class="font-mono text-xs uppercase tracking-[0.2em] text-brand-300">Commercial</p>
                <h2 class="mt-4 text-4xl font-semibold tracking-tight">Four lines. No surprise invoice.</h2>
            </div>
            <dl class="md:col-span-6 md:col-start-7">
                <div class="border-t border-white/15 py-5">
                    <dt class="font-semibold">Once-off implementation</dt>
                    <dd class="mt-1 text-sm text-slate-400">Scoped to what gets built. Some agreements trade the upfront fee for a longer term.</dd>
                </div>
                <div class="border-t border-white/15 py-5">
                    <dt class="font-semibold">Usage fee</dt>
                    <dd class="mt-1 text-sm text-slate-400">Monthly, in arrears, tied to real use. It moves when the organisation moves.</dd>
                </div>
                <div class="border-t border-white/15 py-5">
                    <dt class="font-semibold">Hosting and maintenance</dt>
                    <dd class="mt-1 text-sm text-slate-400">The small monthly line that keeps the platform patched and up.</dd>
                </div>
                <div class="border-y border-white/15 py-5">
                    <dt class="font-semibold">Later enhancements</dt>
                    <dd class="mt-1 text-sm text-slate-400">Quoted and approved before anyone starts. Not folded into last month’s invoice.</dd>
                </div>
            </dl>
        </div>
    </section>

    <section id="about" class="bg-white py-24">
        <div class="mx-auto max-w-6xl px-6">
            <p class="font-mono text-xs uppercase tracking-[0.2em] text-brand-700">Ownership</p>
            <h2 class="mt-4 max-w-3xl text-4xl font-semibold tracking-tight md:text-5xl">Your data is not the product.</h2>
            <p class="mt-6 max-w-2xl text-lg text-slate-600">We host it in dedicated space you pay for. You can request a full export. Leaving does not mean negotiating your own records back.</p>
        </div>
    </section>

    <section id="contact" class="border-t border-slate-200 bg-slate-50 py-24">
        <div class="mx-auto max-w-3xl px-6">
            <p class="font-mono text-xs uppercase tracking-[0.2em] text-brand-700">Contact</p>
            <h2 class="mt-4 text-4xl font-semibold tracking-tight">Tell us what is broken.</h2>
            <p class="mt-4 text-lg text-slate-600">We reply within one business day. Pricing comes after we understand the work.</p>

            @if (session('lead_success'))
                <div class="mt-10 border border-brand-200 bg-brand-50 p-8">
                    <h3 class="text-lg font-semibold text-brand-900">Received.</h3>
                    <p class="mt-2 text-brand-800">The enquiry is in. Expect a reply within one business day.</p>
                </div>
            @else
                <form method="POST" action="{{ route('contact.submit') }}" class="mt-10 space-y-6">
                    @csrf
                    <input type="hidden" name="timestamp" value="">
                    <input type="text" name="website_url" class="hidden" tabindex="-1" autocomplete="off">

                    @if ($errors->any())
                        <div class="border border-red-200 bg-red-50 p-4">
                            <ul class="list-inside list-disc text-sm text-red-700">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="grid gap-6 sm:grid-cols-2">
                        <div>
                            <label for="org_name" class="block text-sm font-medium text-slate-700">Organisation <span class="text-red-500">*</span></label>
                            <input type="text" id="org_name" name="org_name" required value="{{ old('org_name') }}" autocomplete="organization" class="mt-1 block w-full border border-slate-300 bg-white px-4 py-3 text-slate-900 focus-visible:border-brand-700 focus-visible:outline-none">
                        </div>
                        <div>
                            <label for="contact_name" class="block text-sm font-medium text-slate-700">Your name <span class="text-red-500">*</span></label>
                            <input type="text" id="contact_name" name="contact_name" required value="{{ old('contact_name') }}" autocomplete="name" class="mt-1 block w-full border border-slate-300 bg-white px-4 py-3 text-slate-900 focus-visible:border-brand-700 focus-visible:outline-none">
                        </div>
                    </div>

                    <div class="grid gap-6 sm:grid-cols-2">
                        <div>
                            <label for="email" class="block text-sm font-medium text-slate-700">Email <span class="text-red-500">*</span></label>
                            <input type="email" id="email" name="email" required value="{{ old('email') }}" autocomplete="email" class="mt-1 block w-full border border-slate-300 bg-white px-4 py-3 text-slate-900 focus-visible:border-brand-700 focus-visible:outline-none">
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-slate-700">Phone</label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" autocomplete="tel" class="mt-1 block w-full border border-slate-300 bg-white px-4 py-3 text-slate-900 focus-visible:border-brand-700 focus-visible:outline-none">
                        </div>
                    </div>

                    <div class="grid gap-6 sm:grid-cols-2">
                        <div>
                            <label for="system_type" class="block text-sm font-medium text-slate-700">What do you need? <span class="text-red-500">*</span></label>
                            <select id="system_type" name="system_type" required class="mt-1 block w-full border border-slate-300 bg-white px-4 py-3 text-slate-900 focus-visible:border-brand-700 focus-visible:outline-none">
                                <option value="">Select one...</option>
                                <option value="Membership portal" @selected(old('system_type') === 'Membership portal')>Membership portal</option>
                                <option value="Admin/operations app" @selected(old('system_type') === 'Admin/operations app')>Admin / operations</option>
                                <option value="Custom web application" @selected(old('system_type') === 'Custom web application')>Custom web application</option>
                                <option value="Website" @selected(old('system_type') === 'Website')>Website</option>
                                <option value="Hosting & maintenance" @selected(old('system_type') === 'Hosting & maintenance')>Hosting and maintenance</option>
                                <option value="Not sure yet" @selected(old('system_type') === 'Not sure yet')>Not sure yet</option>
                            </select>
                        </div>
                        <div>
                            <label for="timeline" class="block text-sm font-medium text-slate-700">Timeline <span class="text-red-500">*</span></label>
                            <select id="timeline" name="timeline" required class="mt-1 block w-full border border-slate-300 bg-white px-4 py-3 text-slate-900 focus-visible:border-brand-700 focus-visible:outline-none">
                                <option value="">Select one...</option>
                                <option value="ASAP" @selected(old('timeline') === 'ASAP')>ASAP</option>
                                <option value="1-3 months" @selected(old('timeline') === '1-3 months')>1–3 months</option>
                                <option value="3-6 months" @selected(old('timeline') === '3-6 months')>3–6 months</option>
                                <option value="Just exploring" @selected(old('timeline') === 'Just exploring')>Just exploring</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label for="problem_description" class="block text-sm font-medium text-slate-700">The project <span class="text-red-500">*</span></label>
                        <textarea id="problem_description" name="problem_description" required rows="5" class="mt-1 block w-full border border-slate-300 bg-white px-4 py-3 text-slate-900 focus-visible:border-brand-700 focus-visible:outline-none">{{ old('problem_description') }}</textarea>
                    </div>

                    <div class="flex items-start gap-3">
                        <input type="checkbox" id="consent" name="consent" value="1" required class="mt-1 h-4 w-4 border-slate-300 text-brand-700" @checked(old('consent'))>
                        <label for="consent" class="text-sm text-slate-600">I consent to Charsley Digital storing this information to respond to my enquiry. <span class="text-red-500">*</span></label>
                    </div>

                    <button type="submit" class="w-full bg-[#0b1220] px-6 py-4 text-base font-semibold text-white hover:bg-brand-800">Send enquiry</button>
                </form>
            @endif
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ts = document.querySelector('input[name="timestamp"]');
            if (ts) ts.value = Date.now();
        });
    </script>
@endpush
