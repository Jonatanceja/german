<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="@csrf()">

    <title>
        {{ site()->title() }} | {{ page()->title() }}
    </title>

    <meta name="description" content="{{ site()->metadescription()->or(page()->text()->excerpt(160)) }}">

    {{-- Open Graph / Facebook --}}
    <meta property="og:title" content="{{ site()->title() }} | {{ page()->title() }}">
    <meta property="og:description" content="{{ site()->ogdescription()->or(page()->text()->excerpt(160)) }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url() }}">
    @if($image = site()->ogimage()->toFile())
        <meta property="og:image" content="{{ $image->url() }}">
    @endif

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ site()->title() }} | {{ page()->title() }}">
    <meta name="twitter:description" content="{{ site()->ogdescription()->or(page()->text()->excerpt(160)) }}">
    @if($image = site()->ogimage()->toFile())
        <meta name="twitter:image" content="{{ $image->url() }}">
    @endif
    @if(site()->twitterhandle()->isNotEmpty())
        <meta name="twitter:site" content="{{ site()->twitterhandle() }}">
    @endif

    {{-- Favicon --}}
    <link rel="icon" href='data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="50" fill="black"/><text x="50%" y="55%" font-size="60" text-anchor="middle" fill="white" font-family="Arial, sans-serif" dominant-baseline="middle">G</text></svg>'>

    {{-- Preconnect para fuentes externas --}}
    <link rel="preconnect" href="https://db.onlinewebfonts.com" crossorigin>
    <link rel="dns-prefetch" href="https://db.onlinewebfonts.com">

    <link href="//db.onlinewebfonts.com/c/7da0db9483744ded8d3a0d5f4aea5c33?family=Gauthier+Next+FY" rel="stylesheet" type="text/css"/>
    <link href="//db.onlinewebfonts.com/c/110de0bbe7344f96136d5cedd6608f9d?family=GT+Cinetype" rel="stylesheet" type="text/css"/>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="bg-zinc-950">
    {{ $slot }}
</body>
</html>
