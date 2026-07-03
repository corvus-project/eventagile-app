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
        content="Create, promote, and manage events, classes, and lessons from one platform. Let customers self-register online. Perfect for studios, clubs, and small businesses.">

    <link rel="canonical" href="{{ config('app.url') }}">

    <!-- Open Graph tags -->
    <meta property="og:title" content="EventAgile — Event Management Made Simple">
    <meta property="og:description" content="Create, promote, and manage events, classes, and lessons from one platform. Let customers self-register online. Perfect for studios, clubs, and small businesses.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ config('app.url') }}">
    <meta property="og:image" content="{{ config('app.url') }}/assets/img/og-index.svg">

    <!--  CDN loading order — EXACT ORDER REQUIRED -->

    @vite(['resources/css/app.css', 'resources/js/app.js'])



</head>

<body>

    {{ $slot }}


</body>

</html>