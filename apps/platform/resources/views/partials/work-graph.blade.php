<script type="application/ld+json">
{!! json_encode([
    '@@context' => 'https://schema.org',
    '@type' => 'ItemList',
    'name' => 'Platforms built and hosted by Charsley Digital',
    'itemListElement' => collect($projects)->values()->map(function (array $project, int $index) {
        $site = [
            '@type' => 'WebSite',
            'name' => $project['name'],
            'description' => $project['summary'],
            'url' => $project['url'] ?: route('work.show', $project['slug']),
        ];

        return [
            '@type' => 'ListItem',
            'position' => $index + 1,
            'name' => $project['name'],
            'url' => route('work.show', $project['slug']),
            'item' => $site,
        ];
    })->all(),
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
