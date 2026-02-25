<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin') - {{ config('app.name') }}</title>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect rx='20' width='100' height='100' fill='%231e53a0'/><text x='50' y='68' font-family='system-ui' font-size='48' font-weight='700' fill='white' text-anchor='middle'>CD</text></svg>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-50 text-slate-900 antialiased">
    <header class="border-b border-slate-200 bg-white">
        <nav class="mx-auto flex max-w-6xl items-center justify-between px-6 py-4">
            <div class="flex items-center gap-6">
                <a href="{{ route('admin.leads.index') }}" class="font-semibold text-slate-900 {{ request()->routeIs('admin.leads.*') ? 'text-blue-600' : '' }}">Leads</a>
                <a href="{{ route('admin.settings') }}" class="text-sm font-medium text-slate-600 hover:text-blue-600 {{ request()->routeIs('admin.settings*') ? 'text-blue-600' : '' }}">Settings</a>
            </div>
            @auth
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-sm text-slate-600 hover:text-blue-600">Log out</button>
                </form>
            @endauth
        </nav>
    </header>
    <main class="mx-auto max-w-6xl px-6 py-8">
        @if (session('success'))
            <div class="mb-6 rounded-md bg-blue-100 p-4 text-blue-800">{{ session('success') }}</div>
        @endif
        @yield('content')
    </main>
</body>
</html>
