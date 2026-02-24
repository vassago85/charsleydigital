<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin') - {{ config('app.name') }}</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif
</head>
<body class="min-h-screen bg-slate-50 text-slate-900 antialiased">
    <header class="border-b border-slate-200 bg-white">
        <nav class="mx-auto flex max-w-6xl items-center justify-between px-6 py-4">
            <div class="flex items-center gap-6">
                <a href="{{ route('admin.leads.index') }}" class="font-semibold text-slate-900 {{ request()->routeIs('admin.leads.*') ? 'text-teal-600' : '' }}">Leads</a>
                <a href="{{ route('admin.settings') }}" class="text-sm font-medium text-slate-600 hover:text-teal-600 {{ request()->routeIs('admin.settings*') ? 'text-teal-600' : '' }}">Settings</a>
            </div>
            @auth
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-sm text-slate-600 hover:text-teal-600">Log out</button>
                </form>
            @endauth
        </nav>
    </header>
    <main class="mx-auto max-w-6xl px-6 py-8">
        @if (session('success'))
            <div class="mb-6 rounded-md bg-teal-100 p-4 text-teal-800">{{ session('success') }}</div>
        @endif
        @yield('content')
    </main>
</body>
</html>
