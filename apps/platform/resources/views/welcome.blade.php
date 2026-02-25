<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Charsley Digital') }} — Reliable Web Applications & Hosting</title>
    <meta name="description" content="Reliable web applications, hosting, and maintenance. Built for growth, hosted responsibly. No hype — just solid builds.">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        html { scroll-behavior: smooth; }
    </style>
</head>
<body class="min-h-screen bg-slate-50 text-slate-900 antialiased">

    {{-- Navigation --}}
    <nav class="sticky top-0 z-50 border-b border-slate-200 bg-white/90 backdrop-blur">
        <div class="mx-auto flex max-w-6xl items-center justify-between px-6 py-4">
            <a href="/" class="flex items-center gap-3">
                @if (file_exists(public_path('images/logo.png')))
                    <img src="/images/logo.png" alt="Charsley Digital" class="h-9 w-auto">
                @endif
                <span class="text-lg font-bold text-slate-900">Charsley Digital</span>
            </a>
            <div class="hidden items-center gap-8 md:flex">
                <a href="#services" class="text-sm font-medium text-slate-600 hover:text-brand-600 transition-colors">Services</a>
                <a href="#products" class="text-sm font-medium text-slate-600 hover:text-brand-600 transition-colors">Products</a>
                <a href="#how-it-works" class="text-sm font-medium text-slate-600 hover:text-brand-600 transition-colors">How It Works</a>
                <a href="#about" class="text-sm font-medium text-slate-600 hover:text-brand-600 transition-colors">About</a>
                <a href="#contact" class="rounded-md bg-brand-600 px-4 py-2 text-sm font-medium text-white hover:bg-brand-700 transition-colors">Get In Touch</a>
            </div>
            {{-- Mobile menu button --}}
            <button onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" class="md:hidden rounded p-2 text-slate-600 hover:bg-slate-100">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </div>
        <div id="mobile-menu" class="hidden border-t border-slate-200 bg-white px-6 py-4 md:hidden">
            <div class="flex flex-col gap-3">
                <a href="#services" class="text-sm font-medium text-slate-600 hover:text-brand-600">Services</a>
                <a href="#products" class="text-sm font-medium text-slate-600 hover:text-brand-600">Products</a>
                <a href="#how-it-works" class="text-sm font-medium text-slate-600 hover:text-brand-600">How It Works</a>
                <a href="#about" class="text-sm font-medium text-slate-600 hover:text-brand-600">About</a>
                <a href="#contact" class="rounded-md bg-brand-600 px-4 py-2 text-center text-sm font-medium text-white hover:bg-brand-700">Get In Touch</a>
            </div>
        </div>
    </nav>

    {{-- Hero --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 py-24 text-white md:py-32">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, rgba(255,255,255,0.15) 1px, transparent 0); background-size: 40px 40px;"></div>
        </div>
        <div class="relative mx-auto max-w-4xl px-6 text-center">
            <h1 class="text-4xl font-bold tracking-tight md:text-5xl lg:text-6xl">
                Reliable. Hosted. <span class="text-brand-400">Maintainable.</span>
            </h1>
            <p class="mx-auto mt-6 max-w-2xl text-lg text-slate-300 md:text-xl">
                Web applications and hosting you can depend on. No hype &mdash; just solid builds, predictable costs, and systems that grow with you.
            </p>
            <div class="mt-10 flex flex-col items-center gap-4 sm:flex-row sm:justify-center">
                <a href="#contact" class="inline-flex items-center rounded-lg bg-brand-500 px-8 py-4 text-base font-semibold text-white shadow-lg hover:bg-brand-400 transition-colors">
                    Request a Discovery Call
                    <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                <a href="#services" class="inline-flex items-center text-base font-medium text-slate-300 hover:text-white transition-colors">
                    See What We Do
                    <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </a>
            </div>
        </div>
    </section>

    {{-- Value Pillars --}}
    <section class="py-20">
        <div class="mx-auto max-w-6xl px-6">
            <div class="grid gap-8 md:grid-cols-3">
                <div class="rounded-xl border border-slate-200 bg-white p-8 shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-brand-100 text-brand-600">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <h3 class="mt-5 text-lg font-semibold text-slate-900">Automation First</h3>
                    <p class="mt-2 text-slate-600">We automate repetitive work so your team can focus on what matters.</p>
                </div>
                <div class="rounded-xl border border-slate-200 bg-white p-8 shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-brand-100 text-brand-600">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2"/></svg>
                    </div>
                    <h3 class="mt-5 text-lg font-semibold text-slate-900">Hosted Responsibly</h3>
                    <p class="mt-2 text-slate-600">Dedicated, secure hosting with predictable costs. No surprises.</p>
                </div>
                <div class="rounded-xl border border-slate-200 bg-white p-8 shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-brand-100 text-brand-600">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                    </div>
                    <h3 class="mt-5 text-lg font-semibold text-slate-900">Built for Growth</h3>
                    <p class="mt-2 text-slate-600">Modular systems that scale as you do. Start small, expand when ready.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Services --}}
    <section id="services" class="bg-white py-20">
        <div class="mx-auto max-w-6xl px-6">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-slate-900 md:text-4xl">Services</h2>
                <p class="mx-auto mt-4 max-w-2xl text-lg text-slate-600">From membership management to custom applications &mdash; built to last.</p>
            </div>
            <div class="mt-14 grid gap-8 sm:grid-cols-2">
                <div class="flex gap-4">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-brand-600 text-white">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-slate-900">Membership &amp; Admin Portals</h3>
                        <p class="mt-1 text-slate-600">Member management, roles, certificates, and compliance &mdash; all in one place.</p>
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-brand-600 text-white">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-slate-900">Dashboards &amp; Notifications</h3>
                        <p class="mt-1 text-slate-600">Admin dashboards that simplify payment tracking, automated notifications, and integrations. We never handle bank data.</p>
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-brand-600 text-white">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-slate-900">Custom Web Applications</h3>
                        <p class="mt-1 text-slate-600">Bespoke solutions for your unique workflows &mdash; no off-the-shelf compromises.</p>
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-brand-600 text-white">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-slate-900">Hosting, Maintenance &amp; Reliability</h3>
                        <p class="mt-1 text-slate-600">Dedicated hosting, updates, and support so you can focus on your business.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Products --}}
    <section id="products" class="py-20">
        <div class="mx-auto max-w-6xl px-6">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-slate-900 md:text-4xl">Featured Products</h2>
                <p class="mx-auto mt-4 max-w-2xl text-lg text-slate-600">Real platforms we've built, host, and maintain.</p>
            </div>
            <div class="mt-14 grid gap-8 md:grid-cols-3">
                <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm hover:shadow-md transition-shadow">
                    <div class="bg-gradient-to-br from-brand-600 to-brand-800 p-6">
                        <h3 class="text-xl font-bold text-white">NRAPA Portal</h3>
                    </div>
                    <div class="p-6">
                        <p class="text-slate-600">Membership management, compliance tracking, certificates, firearm reference, QR verification, and POPIA compliance.</p>
                        <div class="mt-4 flex flex-wrap gap-2">
                            <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-700">Laravel</span>
                            <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-700">Livewire</span>
                            <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-700">MySQL</span>
                        </div>
                    </div>
                </div>
                <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm hover:shadow-md transition-shadow">
                    <div class="bg-gradient-to-br from-slate-700 to-slate-900 p-6">
                        <h3 class="text-xl font-bold text-white">MatchBookPro</h3>
                    </div>
                    <div class="p-6">
                        <p class="text-slate-600">Stage and difficulty management for competitive shooting events. Streamlined scheduling and scoring.</p>
                        <div class="mt-4 flex flex-wrap gap-2">
                            <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-700">Laravel</span>
                            <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-700">Tailwind</span>
                            <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-700">Alpine.js</span>
                        </div>
                    </div>
                </div>
                <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm hover:shadow-md transition-shadow">
                    <div class="bg-gradient-to-br from-brand-700 to-slate-800 p-6">
                        <h3 class="text-xl font-bold text-white">Custom Client Apps</h3>
                    </div>
                    <div class="p-6">
                        <p class="text-slate-600">Tailored applications hosted in your dedicated space. You own the data, we handle the infrastructure.</p>
                        <div class="mt-4 flex flex-wrap gap-2">
                            <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-700">Bespoke</span>
                            <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-700">Docker</span>
                            <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-700">Dedicated</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- How It Works --}}
    <section id="how-it-works" class="bg-white py-20">
        <div class="mx-auto max-w-6xl px-6">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-slate-900 md:text-4xl">How It Works</h2>
                <p class="mx-auto mt-4 max-w-2xl text-lg text-slate-600">A simple, transparent process from first conversation to ongoing support.</p>
            </div>
            <div class="mt-14 grid gap-8 md:grid-cols-4">
                <div class="text-center">
                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-brand-600 text-xl font-bold text-white">1</div>
                    <h3 class="mt-4 text-lg font-semibold text-slate-900">Discovery</h3>
                    <p class="mt-2 text-slate-600">We understand your needs &mdash; no pricing before we properly scope.</p>
                </div>
                <div class="text-center">
                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-brand-600 text-xl font-bold text-white">2</div>
                    <h3 class="mt-4 text-lg font-semibold text-slate-900">Proposal</h3>
                    <p class="mt-2 text-slate-600">A clear proposal tailored to your requirements. No surprises.</p>
                </div>
                <div class="text-center">
                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-brand-600 text-xl font-bold text-white">3</div>
                    <h3 class="mt-4 text-lg font-semibold text-slate-900">Build</h3>
                    <p class="mt-2 text-slate-600">Implementation with regular updates so you always know where things stand.</p>
                </div>
                <div class="text-center">
                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-brand-600 text-xl font-bold text-white">4</div>
                    <h3 class="mt-4 text-lg font-semibold text-slate-900">Launch &amp; Support</h3>
                    <p class="mt-2 text-slate-600">Ongoing hosting, maintenance, and enhancements. We don't disappear.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Commercial Model --}}
    <section class="bg-slate-900 py-20 text-white">
        <div class="mx-auto max-w-4xl px-6 text-center">
            <h2 class="text-3xl font-bold md:text-4xl">Transparent, Fair Pricing</h2>
            <p class="mx-auto mt-4 max-w-2xl text-lg text-slate-300">No hidden costs. No vendor lock-in. You always know what you're paying for.</p>
            <div class="mt-12 grid gap-6 text-left sm:grid-cols-2">
                <div class="rounded-lg border border-slate-700 bg-slate-800/50 p-6">
                    <div class="flex items-center gap-3">
                        <svg class="h-6 w-6 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <h3 class="font-semibold">Small once-off implementation fee</h3>
                    </div>
                    <p class="mt-2 text-sm text-slate-400">Scoped to exactly what you need. Pay for what's built.</p>
                </div>
                <div class="rounded-lg border border-slate-700 bg-slate-800/50 p-6">
                    <div class="flex items-center gap-3">
                        <svg class="h-6 w-6 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <h3 class="font-semibold">Monthly usage-based fee</h3>
                    </div>
                    <p class="mt-2 text-sm text-slate-400">Scales with your actual usage. Fair and predictable.</p>
                </div>
                <div class="rounded-lg border border-slate-700 bg-slate-800/50 p-6">
                    <div class="flex items-center gap-3">
                        <svg class="h-6 w-6 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <h3 class="font-semibold">Small monthly hosting &amp; maintenance</h3>
                    </div>
                    <p class="mt-2 text-sm text-slate-400">Keeps your platform secure, updated, and running smoothly.</p>
                </div>
                <div class="rounded-lg border border-slate-700 bg-slate-800/50 p-6">
                    <div class="flex items-center gap-3">
                        <svg class="h-6 w-6 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <h3 class="font-semibold">Enhancements scoped &amp; approved</h3>
                    </div>
                    <p class="mt-2 text-sm text-slate-400">Major changes quoted separately. No surprise invoices.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- About --}}
    <section id="about" class="py-20">
        <div class="mx-auto max-w-6xl px-6">
            <div class="grid gap-12 md:grid-cols-2 md:items-center">
                <div>
                    <h2 class="text-3xl font-bold text-slate-900 md:text-4xl">About Charsley Digital</h2>
                    <p class="mt-4 text-lg text-slate-600">Built on reliability, clarity, and respect for your data.</p>
                    <div class="mt-8 space-y-6">
                        <div class="flex gap-4">
                            <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-brand-100 text-brand-600">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-slate-900">Reliability over hype</h3>
                                <p class="text-slate-600">We focus on systems that work, not buzzwords.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-brand-100 text-brand-600">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-slate-900">Modular builds</h3>
                                <p class="text-slate-600">Components you can extend and maintain over time.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-brand-100 text-brand-600">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-slate-900">Containerized deployments</h3>
                                <p class="text-slate-600">Predictable, portable deployments that scale.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-brand-100 text-brand-600">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-slate-900">Client ownership</h3>
                                <p class="text-slate-600">You own your data and control your infrastructure. No lock-in.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rounded-xl border border-slate-200 bg-white p-8 shadow-sm">
                    <h3 class="text-xl font-bold text-slate-900">Data Ownership &amp; Control</h3>
                    <p class="mt-4 text-slate-600">You own and control your data. We host it in dedicated space you pay for &mdash; if you ever want to leave, your data and code go with you. That's how it should be.</p>
                    <div class="mt-6 rounded-lg bg-brand-50 p-4">
                        <p class="text-sm font-medium text-brand-800">No vendor lock-in. Your code. Your data. Always.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Contact / Lead Intake --}}
    <section id="contact" class="bg-white py-20">
        <div class="mx-auto max-w-3xl px-6">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-slate-900 md:text-4xl">Ready to Explore?</h2>
                <p class="mx-auto mt-4 max-w-xl text-lg text-slate-600">Tell us about your project. We'll respond within one business day.</p>
            </div>

            @if (session('lead_success'))
                <div class="mt-10 rounded-lg border border-brand-200 bg-brand-50 p-6 text-center">
                    <svg class="mx-auto h-12 w-12 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <h3 class="mt-4 text-lg font-semibold text-brand-900">Thank you!</h3>
                    <p class="mt-2 text-brand-700">We've received your enquiry and will be in touch within one business day.</p>
                </div>
            @else
                <form method="POST" action="{{ route('contact.submit') }}" class="mt-10 space-y-6">
                    @csrf
                    <input type="hidden" name="timestamp" value="">
                    <input type="text" name="website_url" class="hidden" tabindex="-1" autocomplete="off">

                    @if ($errors->any())
                        <div class="rounded-lg border border-red-200 bg-red-50 p-4">
                            <ul class="list-inside list-disc text-sm text-red-700">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="grid gap-6 sm:grid-cols-2">
                        <div>
                            <label for="org_name" class="block text-sm font-medium text-slate-700">Organisation Name <span class="text-red-500">*</span></label>
                            <input type="text" id="org_name" name="org_name" required value="{{ old('org_name') }}" class="mt-1 block w-full rounded-lg border border-slate-300 px-4 py-3 text-slate-900 shadow-sm focus:border-brand-500 focus:ring-brand-500">
                        </div>
                        <div>
                            <label for="contact_name" class="block text-sm font-medium text-slate-700">Contact Name <span class="text-red-500">*</span></label>
                            <input type="text" id="contact_name" name="contact_name" required value="{{ old('contact_name') }}" class="mt-1 block w-full rounded-lg border border-slate-300 px-4 py-3 text-slate-900 shadow-sm focus:border-brand-500 focus:ring-brand-500">
                        </div>
                    </div>

                    <div class="grid gap-6 sm:grid-cols-2">
                        <div>
                            <label for="email" class="block text-sm font-medium text-slate-700">Email <span class="text-red-500">*</span></label>
                            <input type="email" id="email" name="email" required value="{{ old('email') }}" class="mt-1 block w-full rounded-lg border border-slate-300 px-4 py-3 text-slate-900 shadow-sm focus:border-brand-500 focus:ring-brand-500">
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-slate-700">Phone</label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" class="mt-1 block w-full rounded-lg border border-slate-300 px-4 py-3 text-slate-900 shadow-sm focus:border-brand-500 focus:ring-brand-500">
                        </div>
                    </div>

                    <div>
                        <label for="system_type" class="block text-sm font-medium text-slate-700">What kind of system do you need? <span class="text-red-500">*</span></label>
                        <select id="system_type" name="system_type" required class="mt-1 block w-full rounded-lg border border-slate-300 px-4 py-3 text-slate-900 shadow-sm focus:border-brand-500 focus:ring-brand-500">
                            <option value="">Select one...</option>
                            <option value="Membership portal" @selected(old('system_type') === 'Membership portal')>Membership Portal</option>
                            <option value="Admin/operations app" @selected(old('system_type') === 'Admin/operations app')>Admin / Operations App</option>
                            <option value="Custom web application" @selected(old('system_type') === 'Custom web application')>Custom Web Application</option>
                            <option value="Website" @selected(old('system_type') === 'Website')>Website</option>
                            <option value="Hosting & maintenance" @selected(old('system_type') === 'Hosting & maintenance')>Hosting &amp; Maintenance</option>
                            <option value="Not sure yet" @selected(old('system_type') === 'Not sure yet')>Not Sure Yet</option>
                        </select>
                    </div>

                    <div>
                        <label for="problem_description" class="block text-sm font-medium text-slate-700">Tell us about your project <span class="text-red-500">*</span></label>
                        <textarea id="problem_description" name="problem_description" required rows="5" class="mt-1 block w-full rounded-lg border border-slate-300 px-4 py-3 text-slate-900 shadow-sm focus:border-brand-500 focus:ring-brand-500">{{ old('problem_description') }}</textarea>
                    </div>

                    <div>
                        <label for="timeline" class="block text-sm font-medium text-slate-700">Timeline <span class="text-red-500">*</span></label>
                        <select id="timeline" name="timeline" required class="mt-1 block w-full rounded-lg border border-slate-300 px-4 py-3 text-slate-900 shadow-sm focus:border-brand-500 focus:ring-brand-500">
                            <option value="">Select one...</option>
                            <option value="ASAP" @selected(old('timeline') === 'ASAP')>ASAP</option>
                            <option value="1-3 months" @selected(old('timeline') === '1-3 months')>1&ndash;3 months</option>
                            <option value="3-6 months" @selected(old('timeline') === '3-6 months')>3&ndash;6 months</option>
                            <option value="Just exploring" @selected(old('timeline') === 'Just exploring')>Just exploring</option>
                        </select>
                    </div>

                    <div class="flex items-start gap-3">
                        <input type="checkbox" id="consent" name="consent" value="1" required class="mt-1 h-4 w-4 rounded border-slate-300 text-brand-600 focus:ring-brand-500" @checked(old('consent'))>
                        <label for="consent" class="text-sm text-slate-600">I consent to Charsley Digital storing this information to respond to my enquiry. <span class="text-red-500">*</span></label>
                    </div>

                    <button type="submit" class="w-full rounded-lg bg-brand-600 px-6 py-4 text-base font-semibold text-white shadow-md hover:bg-brand-700 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2 transition-colors">
                        Send Enquiry
                    </button>
                </form>
            @endif
        </div>
    </section>

    {{-- Footer --}}
    <footer class="border-t border-slate-200 bg-slate-50 py-12">
        <div class="mx-auto max-w-6xl px-6">
            <div class="flex flex-col items-center justify-between gap-6 md:flex-row">
                <div class="flex items-center gap-3">
                    @if (file_exists(public_path('images/logo.png')))
                        <img src="/images/logo.png" alt="Charsley Digital" class="h-7 w-auto opacity-60">
                    @endif
                    <span class="text-sm text-slate-500">&copy; {{ date('Y') }} Charsley Digital. All rights reserved.</span>
                </div>
                <div class="flex items-center gap-6">
                    @auth
                        <a href="{{ route('admin.leads.index') }}" class="text-sm text-slate-500 hover:text-brand-600 transition-colors">Admin</a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-sm text-slate-500 hover:text-brand-600 transition-colors">Log out</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-slate-500 hover:text-brand-600 transition-colors">Admin Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ts = document.querySelector('input[name="timestamp"]');
            if (ts) ts.value = Date.now();
        });
    </script>
</body>
</html>
