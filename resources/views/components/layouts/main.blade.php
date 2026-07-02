<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!--  Character set & viewport -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--  Robots directive -->
    <meta name="robots" content="index, follow">

    <!--  Page identity -->
    <title>{{ $title ?? config('app.name')}}</title>

    <!-- 39 characters — under 60 ✓ -->


    <meta name="description"
        content="Create and manage events, classes, and lessons with ease. Let your customers self-register online. Perfect for studios, clubs, and small businesses.">
    <!-- 148 characters — within 120–160 ✓ -->

    <link rel="canonical" href="{{ config('app.url') }}">

    <!-- Open Graph tags -->
    <meta property="og:title" content="EventAgile — Event Management Made Simple">
    <meta property="og:description" content="Create and manage events, classes, and lessons with ease. Let your customers self-register online. Perfect for studios, clubs, and small businesses.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ config('app.url') }}/index.html">
    <meta property="og:image" content="{{ config('app.url') }}/assets/img/og-index.svg">

    <!--  CDN loading order — EXACT ORDER REQUIRED -->

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- 5b. Flowbite CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css">

    <!-- 5c. Alpine.js v3 — defer required -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>

    <!--  Schema.org JSON-LD — WebSite + SoftwareApplication -->

</head>

<body>

    {{ $slot }}

    <!-- ⑦ Flowbite JS CDN — must be last, just before </body> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</body>

</html>