@extends('layouts.site')

@section('title', 'Work | Charsley Digital')
@section('description', 'Live platforms by Charsley Digital: NRAPA, SAPRF, PPRC, DeadCenter, CentreVision, Axionis POS, and the Ranyati brand.')
@section('canonical', route('work.index'))

@push('head')
    @include('partials.work-graph')
@endpush

@section('content')
    <section class="ink text-white">
        <div class="mx-auto max-w-6xl px-6 pb-20 pt-16 md:pt-24">
            <p class="rise font-mono text-xs uppercase tracking-[0.22em] text-brand-300">Selected work</p>
            <h1 class="rise rise-d1 mt-4 max-w-3xl text-5xl font-semibold tracking-tight md:text-7xl">Eight systems.<br>Still running.</h1>
            <p class="rise rise-d2 mt-6 max-w-xl text-lg text-slate-300">Membership federations, a club, match scoring, site traffic, a point of sale, and the Ranyati brand. Designed, built, and hosted here.</p>
        </div>
    </section>

    <section class="bg-white">
        <div class="mx-auto max-w-6xl px-6">
            @foreach ($projects as $project)
                <article class="grid gap-6 border-b border-slate-200 py-10 md:grid-cols-12 md:items-center md:gap-8 md:py-12">
                    <a href="{{ route('work.show', $project['slug']) }}" class="grid gap-6 md:col-span-9 md:grid-cols-9 md:items-center">
                        <div class="flex items-center gap-5 md:col-span-5">
                            @if ($project['logo'])
                                <img src="{{ $project['logo'] }}" alt="{{ $project['name'] }} logo" class="h-16 w-16 shrink-0 border border-slate-200 bg-white object-contain p-1.5" width="64" height="64">
                            @endif
                            <div>
                                <p class="font-mono text-sm text-brand-700">{{ $project['index'] }}</p>
                                <h2 class="text-3xl font-semibold tracking-tight text-slate-950 md:text-4xl">{{ $project['name'] }}</h2>
                                <p class="mt-1 text-sm text-slate-500">{{ $project['client'] }}</p>
                            </div>
                        </div>
                        <p class="text-slate-600 md:col-span-4">{{ $project['summary'] }}</p>
                    </a>
                    <div class="md:col-span-3 md:text-right">
                        @if ($project['url'])
                            <a href="{{ $project['url'] }}" class="text-sm font-semibold text-brand-800 underline decoration-brand-300 underline-offset-4 hover:decoration-brand-800" rel="noopener noreferrer">{{ parse_url($project['url'], PHP_URL_HOST) }}</a>
                        @else
                            <p class="font-mono text-xs uppercase tracking-wider text-slate-400">{{ $project['status'] }}</p>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>
    </section>
@endsection
