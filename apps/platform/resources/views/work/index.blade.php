@extends('layouts.site')

@section('title', 'Work | Charsley Digital')
@section('description', 'Live platforms by Charsley Digital: NRAPA, SAPRF, PPRC, DeadCenter, CentreVision, and the Ranyati brand.')
@section('canonical', route('work.index'))

@section('content')
    <section class="ink text-white">
        <div class="mx-auto max-w-6xl px-6 pb-20 pt-16 md:pt-24">
            <p class="rise font-mono text-xs uppercase tracking-[0.22em] text-brand-300">Selected work</p>
            <h1 class="rise rise-d1 mt-4 max-w-3xl text-5xl font-semibold tracking-tight md:text-7xl">Seven systems.<br>Still running.</h1>
            <p class="rise rise-d2 mt-6 max-w-xl text-lg text-slate-300">Membership federations, a club, match scoring, site traffic, and the Ranyati brand. Designed, built, and hosted here.</p>
        </div>
    </section>

    <section class="bg-white">
        <div class="mx-auto max-w-6xl px-6">
            @foreach ($projects as $project)
                <a href="{{ route('work.show', $project['slug']) }}" class="group grid gap-4 border-b border-slate-200 py-10 md:grid-cols-12 md:items-end md:gap-8 md:py-12">
                    <p class="font-mono text-sm text-brand-700 md:col-span-1">{{ $project['index'] }}</p>
                    <div class="md:col-span-4">
                        <h2 class="text-3xl font-semibold tracking-tight text-slate-950 group-hover:text-brand-700 md:text-4xl">{{ $project['name'] }}</h2>
                        <p class="mt-2 text-sm text-slate-500">{{ $project['client'] }}</p>
                    </div>
                    <p class="text-slate-600 md:col-span-5">{{ $project['summary'] }}</p>
                    <p class="font-mono text-xs uppercase tracking-wider text-slate-400 md:col-span-2 md:text-right">{{ $project['status'] }}</p>
                </a>
            @endforeach
        </div>
    </section>
@endsection
