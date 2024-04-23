<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//unpkg.com/alpinejs" defer></script>

    <title>{{ $title ?? 'Page Title' }}</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    {{ $slot }}
</body>

</html>
