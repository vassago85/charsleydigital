<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Charsley Digital')</title>
    <meta name="description" content="@yield('description', 'Custom software for organisations that need to own their systems. Dedicated infrastructure, direct support, no lock-in.')">
    <link rel="canonical" href="@yield('canonical', url('/'))">
    <meta name="theme-color" content="#f3f1ec">
    <meta property="og:type" content="website">
    <meta property="og:url" content="@yield('canonical', url('/'))">
    <meta property="og:title" content="@yield('title', 'Charsley Digital')">
    <meta property="og:description" content="@yield('description', 'Custom software for organisations that need to own their systems. Dedicated infrastructure, direct support, no lock-in.')">
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect width='100' height='100' fill='%23171918'/><rect x='88' width='12' height='100' fill='%23b43c25'/><text x='44' y='62' font-family='Arial' font-size='36' font-weight='700' fill='%23f3f1ec' text-anchor='middle'>CD</text></svg>">
    @vite(['resources/css/app.css', 'resources/css/site.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="cd @yield('body_class')">
    <a class="skip" href="#main">Skip to content</a>
    <header class="cd-header">
        <div class="wrap bar">
            <a class="brand" href="{{ route('home') }}" aria-label="Charsley Digital home"><span class="mark">CD</span>Charsley Digital</a>
            <button class="menu" type="button" aria-expanded="false" aria-controls="nav">Menu</button>
            <nav id="nav" class="cd-nav" aria-label="Primary">
                <a href="{{ route('home') }}#work">Work</a>
                <a href="{{ route('home') }}#practice">Practice</a>
                <a href="{{ route('home') }}#process">Process</a>
                <a href="{{ route('home') }}#commercial">Commercial</a>
                <a href="{{ route('home') }}#contact">Contact</a>
                <a class="start" href="{{ route('home') }}#contact">Start a project</a>
            </nav>
        </div>
    </header>
    <main id="main">
        @yield('content')
    </main>
    <footer class="cd-footer">
        <div class="wrap footer-main">
            <div>
                <a class="brand" href="{{ route('home') }}"><span class="mark">CD</span>Charsley Digital</a>
                <p>Custom software for organisations that need to own their systems.<br>Dedicated infrastructure, direct support, no lock-in.</p>
            </div>
            <nav class="footer-links" aria-label="Footer">
                <a href="{{ route('home') }}#work">Work</a>
                <a href="{{ route('home') }}#practice">Practice</a>
                <a href="{{ route('home') }}#process">Process</a>
                <a href="{{ route('home') }}#commercial">Commercial</a>
                <a href="{{ route('home') }}#contact">Contact</a>
                <a href="{{ route('work.index') }}">Case studies</a>
            </nav>
        </div>
        <div class="wrap footer-bottom mono">
            <span>&copy; {{ date('Y') }} Charsley Digital</span>
            <span>
                @auth
                    <a href="{{ route('admin.leads.index') }}">Admin</a>
                @else
                    <a href="{{ route('login') }}">Admin</a>
                @endauth
            </span>
        </div>
    </footer>
    <script>
      const menu = document.querySelector('.menu');
      const nav = document.querySelector('#nav');
      if (menu && nav) {
        menu.addEventListener('click', () => {
          const open = nav.classList.toggle('open');
          menu.setAttribute('aria-expanded', open ? 'true' : 'false');
        });
        nav.querySelectorAll('a').forEach((link) => link.addEventListener('click', () => {
          nav.classList.remove('open');
          menu.setAttribute('aria-expanded', 'false');
        }));
        document.addEventListener('keydown', (event) => {
          if (event.key === 'Escape') {
            nav.classList.remove('open');
            menu.setAttribute('aria-expanded', 'false');
          }
        });
      }
    </script>
    @stack('scripts')
</body>
</html>
