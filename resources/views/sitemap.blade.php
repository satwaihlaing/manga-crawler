<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach($pagingUrl as $url)
    <url>
        <loc>{{ $url }}</loc>
        <lastmod>{{Carbon\Carbon::now()->format('Y-m-d')}}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
@endforeach
<url>
        <loc>{{ url("library") }}</loc>
        <lastmod>{{Carbon\Carbon::now()->format('Y-m-d')}}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
</urlset>