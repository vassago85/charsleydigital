<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class WorkController extends Controller
{
    public function index(): View
    {
        return view('work.index', [
            'projects' => config('work.projects'),
        ]);
    }

    public function show(string $slug): View
    {
        $projects = config('work.projects');
        $index = collect($projects)->search(fn (array $project) => $project['slug'] === $slug);

        abort_if($index === false, 404);

        $count = count($projects);

        return view('work.show', [
            'project' => $projects[$index],
            'previous' => $projects[($index - 1 + $count) % $count],
            'next' => $projects[($index + 1) % $count],
        ]);
    }
}
