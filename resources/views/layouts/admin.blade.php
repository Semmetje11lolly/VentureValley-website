@props(['title'])

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name') }}</title>

    @stack('head')

    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/d0c003e79c.js" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

<nav>
    <div class="flex items-center justify-between bg-gray-900 text-white px-3 py-3">
        <a href="{{ route('home') }}"><i class="fa-solid fa-angle-left"></i> Website</a>
        <a href="{{ route('profile.edit') }}">Hey, {{ auth()->user()->name }}</a>
    </div>
</nav>

<div class="flex grow">
    <nav class="bg-gray-900 text-white min-w-44">
        <div class="admin-nav flex flex-col">
            <a href="{{ route('admin.index') }}"
               class="px-2.5 py-2.5 @if(Route::currentRouteName() === "admin.index") font-semibold bg-[--color-primary] @endif">
                <i class="fa-solid fa-gauge"></i> Dashboard
            </a>
            <a href=""
               class="px-2.5 py-2.5 @if(Route::currentRouteName() === "admin.rides") font-semibold bg-[--color-primary] @endif">
                <i class="fa-solid fa-ticket"></i> Attracties
            </a>
        </div>
    </nav>
    <main class="max-w-none py-3" id="main">
        {{ $slot }}
    </main>
</div>

</body>

</html>
