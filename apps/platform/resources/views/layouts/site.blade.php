<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Charsley Digital')</title>
    <meta name="description" content="@yield('description', 'Membership platforms, match scoring, and site traffic systems. Built, hosted, and maintained by Charsley Digital.')">
    <link rel="canonical" href="@yield('canonical', url('/'))">
    <meta name="theme-color" content="#0b1220">
    <meta property="og:type" content="website">
    <meta property="og:url" content="@yield('canonical', url('/'))">
    <meta property="og:title" content="@yield('title', 'Charsley Digital')">
    <meta property="og:description" content="@yield('description', 'Membership platforms, match scoring, and site traffic systems. Built, hosted, and maintained by Charsley Digital.')">
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect width='100' height='100' fill='%230b1220'/><text x='50' y='64' font-family='system-ui' font-size='42' font-weight='700' fill='white' text-anchor='middle'>CD</text></svg>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;500&family=Instrument+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="min-h-screen bg-slate-50 text-slate-900 antialiased">
    <a href="#main" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 focus:z-50 focus:bg-white focus:px-4 focus:py-2">Skip to content</a>

    <header class="sticky top-0 z-50 border-b border-white/10 bg-[#0b1220]/90 text-white backdrop-blur-md">
        <div class="mx-auto flex max-w-6xl items-center justify-between px-6 py-4">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <span class="flex h-8 w-8 items-center justify-center bg-white text-xs font-bold tracking-tight text-[#0b1220]">CD</span>
                <span class="text-sm font-semibold tracking-tight">Charsley Digital</span>
            </a>
            <nav class="hidden items-center gap-8 md:flex" aria-label="Main">
                <a href="{{ route('work.index') }}" class="text-sm text-slate-300 hover:text-white">Work</a>
                <a href="{{ route('home') }}#practice" class="text-sm text-slate-300 hover:text-white">Practice</a>
                <a href="{{ route('home') }}#contact" class="bg-white px-4 py-2 text-sm font-semibold text-[#0b1220] hover:bg-brand-100">Start a project</a>
            </nav>
            <button type="button" class="md:hidden text-slate-200" aria-expanded="false" aria-controls="mobile-menu" onclick="var m=document.getElementById('mobile-menu'); m.classList.toggle('hidden'); this.setAttribute('aria-expanded', m.classList.contains('hidden') ? 'false' : 'true')">
                <span class="sr-only">Menu</span>
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-width="1.5" d="M4 7h16M4 12h16M4 17h16"/></svg>
            </button>
        </div>
        <div id="mobile-menu" class="hidden border-t border-white/10 px-6 py-4 md:hidden">
            <div class="flex flex-col gap-3">
                <a href="{{ route('work.index') }}" class="text-sm text-slate-200">Work</a>
                <a href="{{ route('home') }}#practice" class="text-sm text-slate-200">Practice</a>
                <a href="{{ route('home') }}#contact" class="text-sm font-semibold text-white">Start a project</a>
            </div>
        </div>
    </header>

    <main id="main">
        @yield('content')
    </main>

    <footer class="border-t border-slate-200 bg-[#0b1220] text-slate-400">
        <div class="mx-auto flex max-w-6xl flex-col gap-8 px-6 py-12 md:flex-row md:items-end md:justify-between">
            <div>
                <p class="font-mono text-xs uppercase tracking-[0.2em] text-slate-500">Charsley Digital</p>
                <p class="mt-3 max-w-sm text-sm text-slate-300">Platforms for membership, matches, and site traffic. Hosted on dedicated infrastructure. The data stays yours.</p>
            </div>
            <div class="flex flex-wrap items-center gap-x-6 gap-y-2 text-sm">
                <a href="{{ route('work.index') }}" class="hover:text-white">Work</a>
                <a href="{{ route('home') }}#contact" class="hover:text-white">Contact</a>
                <span>&copy; {{ date('Y') }}</span>
                @auth
                    <a href="{{ route('admin.leads.index') }}" class="hover:text-white">Admin</a>
                @else
                    <a href="{{ route('login') }}" class="hover:text-white">Admin</a>
                @endauth
            </div>
        </div>
    </footer>
    @stack('scripts')
</body>
</html>
