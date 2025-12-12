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
    @can('admin')
        <div class="bg-gray-900 text-white">
            <div class="nav-container">
                <a href="">Dashboard</a>
                <a href="{{ route('profile.edit') }}">Hey, {{ auth()->user()->name }}</a>
            </div>
        </div>
    @endcan
    <div class="nav-container">
        <a href="{{ route('home') }}">
            <img src="{{ asset('/images/LogoFullBlue.png') }}" alt="">
        </a>
        <ul class="nav-headings">
            <li>Ontdek VentureValley</li>
            <li>Plan je bezoek</li>
            <li>Contact & Over</li>
        </ul>
    </div>
</nav>

{{ $header ?? '' }}

<main>
    {{ $slot }}
</main>

<footer>
    <div class="footer-container">
        <div class="flex grow justify-between pb-2.5">
            <ul class="list-none">
                <b>Pretpark</b>
                <li><a href="">Attracties</a></li>
                <li><a href="">Openingstijden</a></li>
                <li><a href="">Attracties in onderhoud</a></li>
                <li><a href="">Bezoeken</a></li>
            </ul>
            <ul class="list-none">
                <b>Over VentureValley</b>
                <li><a href="">Ons verhaal</a></li>
                <li><a href="">Geschiedenis</a></li>
                <li><a href="">Het Team</a></li>
                <li><a href="">Werken bij VentureValley</a></li>
            </ul>
            <ul class="list-none">
                <b>Meer VentureValley</b>
                <li><a href="">VentureValley Blog</a></li>
                <li><a href="">VentureValley App</a></li>
                <li><a href="">Creator-programma</a></li>
            </ul>
            <ul class="list-none">
                <b>Webshop</b>
                <li><a href="https://shop.venturevalleymc.nl/category/vip" target="_blank">VIP Rank</a></li>
                <li><a href="https://shop.venturevalleymc.nl/category/plus" target="_blank">Plus Rank</a></li>
                <li><a href="https://shop.venturevalleymc.nl/category/cosmetics" target="_blank">Cosmetics</a></li>
            </ul>
        </div>
        <hr>
        <div class="flex grow items-center justify-between gap-14 text-[12px]">
            <div class="flex flex-col">
                © Copyright {{ date('Y') }} VentureValley
                <i>Wij zijn geen onderdeel van Mojang AB.</i>
            </div>
            <ul class="flex list-none gap-2.5">
                <li><a href="">Privacybeleid</a></li>
                •
                <li><a href="">Parkreglement</a></li>
                •
                <li><a href="">Contact</a></li>
            </ul>
            <div class="grow"></div>
            <ul class="flex list-none gap-2.5 text-[25px]">
                <li>
                    <a href="https://instagram.com/venturevalleymc" target="_blank">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                </li>
                <li>
                    <a href="https://tiktok.com/@venturevalley" target="_blank">
                        <i class="fa-brands fa-tiktok"></i>
                    </a>
                </li>
                <li>
                    <a href="https://www.youtube.com/@venturevalley" target="_blank">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                </li>
                <li>
                    <a href="https://www.twitch.tv/venturevalleymc" target="_blank">
                        <i class="fa-brands fa-twitch"></i>
                    </a>
                </li>
                <li>
                    <a href="https://discord.venturevalleymc.nl" target="_blank">
                        <i class="fa-brands fa-discord"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</footer>

</body>

</html>
