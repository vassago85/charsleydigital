@extends('layouts.site')

@section('title', $project['name'].' | Charsley Digital')
@section('description', $project['summary'])
@section('canonical', route('work.show', $project['slug']))

@section('content')
    <section class="ink text-white">
        <div class="mx-auto max-w-6xl px-6 pb-16 pt-12 md:pb-24 md:pt-16">
            <a href="{{ route('work.index') }}" class="font-mono text-xs uppercase tracking-[0.18em] text-slate-400 hover:text-white">All work</a>
            <p class="mt-8 font-mono text-sm text-brand-300">{{ $project['index'] }} — {{ $project['kicker'] }}</p>
            <h1 class="mt-3 text-5xl font-semibold tracking-tight md:text-8xl">{{ $project['name'] }}</h1>
            <p class="mt-4 max-w-2xl text-xl text-slate-300">{{ $project['client'] }}</p>
            <dl class="mt-10 grid gap-6 border-t border-white/10 pt-8 sm:grid-cols-3">
                <div>
                    <dt class="font-mono text-xs uppercase tracking-wider text-slate-500">Status</dt>
                    <dd class="mt-2 text-sm text-white">{{ $project['status'] }}</dd>
                </div>
                <div>
                    <dt class="font-mono text-xs uppercase tracking-wider text-slate-500">Role</dt>
                    <dd class="mt-2 text-sm text-white">{{ $project['role'] }}</dd>
                </div>
                @if (count($project['stack']))
                    <div>
                        <dt class="font-mono text-xs uppercase tracking-wider text-slate-500">Stack</dt>
                        <dd class="mt-2 text-sm text-white">{{ implode(' · ', $project['stack']) }}</dd>
                    </div>
                @endif
            </dl>
        </div>
    </section>

    <article class="bg-white">
        <div class="mx-auto grid max-w-6xl gap-16 px-6 py-16 md:grid-cols-12 md:py-24">
            <div class="md:col-span-7 md:col-start-1">
                @foreach ($project['story'] as $block)
                    <section class="{{ $loop->first ? '' : 'mt-12' }}">
                        <h2 class="font-mono text-xs uppercase tracking-[0.18em] text-brand-700">{{ $block['heading'] }}</h2>
                        <p class="mt-4 text-lg leading-relaxed text-slate-700">{{ $block['body'] }}</p>
                    </section>
                @endforeach
            </div>
            <aside class="md:col-span-4 md:col-start-9">
                <div class="border border-slate-200 bg-slate-50 p-6">
                    <p class="font-mono text-xs uppercase tracking-[0.18em] text-slate-500">Open</p>
                    @if (count($project['links']))
                        <ul class="mt-4 space-y-3">
                            @foreach ($project['links'] as $link)
                                <li>
                                    <a href="{{ $link['href'] }}" class="text-sm font-semibold text-slate-950 underline decoration-brand-300 underline-offset-4 hover:decoration-brand-700" @if (str_starts_with($link['href'], 'http')) target="_blank" rel="noopener noreferrer" @endif>{{ $link['label'] }}</a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="mt-4 text-sm text-slate-600">No public URL on this page. Ask and we will walk through it.</p>
                    @endif
                    <a href="{{ route('home') }}#contact" class="mt-8 inline-block bg-[#0b1220] px-4 py-3 text-sm font-semibold text-white hover:bg-brand-800">Start a project</a>
                </div>
            </aside>
        </div>
    </article>

    <nav class="border-t border-slate-200 bg-slate-50" aria-label="More work">
        <div class="mx-auto grid max-w-6xl md:grid-cols-2">
            <a href="{{ route('work.show', $previous['slug']) }}" class="border-b border-slate-200 px-6 py-8 hover:bg-white md:border-b-0 md:border-r">
                <p class="font-mono text-xs uppercase tracking-wider text-slate-500">Previous</p>
                <p class="mt-2 text-2xl font-semibold tracking-tight">{{ $previous['name'] }}</p>
            </a>
            <a href="{{ route('work.show', $next['slug']) }}" class="px-6 py-8 text-left hover:bg-white md:text-right">
                <p class="font-mono text-xs uppercase tracking-wider text-slate-500">Next</p>
                <p class="mt-2 text-2xl font-semibold tracking-tight">{{ $next['name'] }}</p>
            </a>
        </div>
    </nav>
@endsection
