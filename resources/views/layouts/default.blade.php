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
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/mega-menu.js'])
</head>

<body>

<x-button url="{{ url('#main') }}"
          class="absolute top-0 left-0 z-[999] opacity-0 pointer-events-none -translate-y-96 transition-none mt-5 ml-5 focus:opacity-100 focus:pointer-events-auto focus:translate-y-0">
    Naar hoofdinhoud
</x-button>

<nav>
    @can('admin')
        <div class="bg-gray-900 text-white py-3">
            <div class="nav-container">
                <a href="">Dashboard</a>
                <a href="{{ route('profile.edit') }}">Hey, {{ auth()->user()->name }}</a>
            </div>
        </div>
    @endcan
    <div class="nav-container">
        <a href="{{ route('home') }}" aria-label="Home">
            <img src="{{ asset('/images/LogoFullBlue.png') }}" alt="">
        </a>
        <ul class="nav-headings">
            <li tabindex="0" data-mega="ontdek"
                aria-expanded="false" aria-controls="mega-ontdek">Ontdek VentureValley
            </li>
            <li tabindex="0" data-mega="bezoek"
                aria-expanded="false" aria-controls="mega-bezoek">Plan je bezoek
            </li>
            <li tabindex="0" data-mega="contact"
                aria-expanded="false" aria-controls="mega-contact">Contact & Over
            </li>
        </ul>
    </div>
    <div class="bg-[--body-background-color] border-t border-solid border-[#E5E7EB] py-5" id="mega-menu">
        <div class="nav-container" data-mega="ontdek" id="mega-ontdek">
            <div class="grid grid-cols-4 pb-2.5">
                <ul class="list-none">
                    <b>Pretpark</b>
                    <li><a href="">Attracties</a></li>
                    <li><a href="">Parkshows</a></li>
                    <li><a href="">Horeca</a></li>
                    <li><a href="">Souvenirs</a></li>
                    <li><a href="">Plattegrond</a></li>
                </ul>
                <ul class="list-none">
                    <b>Recente Evenementen</b>
                    <li><a href="">Halloween 2025</a></li>
                    <li><a href="">1e verjaardag</a></li>
                    <li><a href="">Wavebreaker Opening</a></li>
                    <li><a href="">Halloween 2024</a></li>
                    <li><a href="">De Grote Opening</a></li>
                </ul>
                <ul class="list-none">
                    <b>Meer VentureValley</b>
                    <li><a href="">VentureValley Blog</a></li>
                    <li><a href="">VentureValley App</a></li>
                    <li><a href="">Creator-programma</a></li>
                    <li><a href="">Werken bij VentureValley</a></li>
                </ul>
                <div class="flex items-center">
                    <x-button url="https://shop.venturevalleymc.nl" target="_black">
                        Bezoek Webshop
                    </x-button>
                </div>
            </div>
        </div>
        <div class="nav-container" data-mega="bezoek" id="mega-bezoek">
            <div class="grid grid-cols-4 pb-2.5">
                <ul class="list-none">
                    <b>Praktische Informatie</b>
                    <li><a href="">Bezoeken</a></li>
                    <li><a href="">Openingstijden</a></li>
                    <li><a href="">Plattegrond</a></li>
                    <li><a href="">Onderhoudskalender</a></li>
                    <li><a href="">Parkreglement</a></li>
                </ul>
                <ul class="list-none">
                    <b>Ranks & Cosmetics</b>
                    <li><a href="https://shop.venturevalleymc.nl/category/vip" target="_blank">VIP Rank</a></li>
                    <li><a href="https://shop.venturevalleymc.nl/category/plus" target="_blank">Plus Rank</a></li>
                    <li><a href="https://shop.venturevalleymc.nl/category/cosmetics" target="_blank">Cosmetics</a></li>
                </ul>
                <div class="flex items-center">
                    <x-button url="https://discord.venturevalleymc.nl" target="_black">
                        Join onze Discord
                    </x-button>
                </div>
            </div>
        </div>
        <div class="nav-container" data-mega="contact" id="mega-contact">
            <div class="grid grid-cols-4 pb-2.5">
                <ul class="list-none">
                    <b>Contact</b>
                    <li><a href="">Contact met VentureValley</a></li>
                    <li><a href="">Veelgestelde Vragen</a></li>
                    <li><a href="">Discord server</a></li>
                    <li><a href="">Instagram</a></li>
                    <li><a href="">TikTok</a></li>
                </ul>
                <ul class="list-none">
                    <b>Over VentureValley</b>
                    <li><a href="">Ons verhaal</a></li>
                    <li><a href="">Geschiedenis</a></li>
                    <li><a href="">Het Team</a></li>
                    <li><a href="">Werken bij VentureValley</a></li>
                </ul>
                <div class="flex items-center">
                    <x-button url="https://wiki.venturevalleymc.nl" target="_black">
                        Bekijk onze Wiki
                    </x-button>
                </div>
            </div>
        </div>
    </div>
</nav>

{{ $header ?? '' }}

<main @if(empty($header)) id="main" @endif>
    {{ $slot }}
</main>

<footer class="border-t border-solid border-[#E5E7EB]">
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
                    <a href="https://instagram.com/venturevalleymc" target="_blank" aria-label="Instagram">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                </li>
                <li>
                    <a href="https://tiktok.com/@venturevalley" target="_blank" aria-label="TikTok">
                        <i class="fa-brands fa-tiktok"></i>
                    </a>
                </li>
                <li>
                    <a href="https://www.youtube.com/@venturevalley" target="_blank" aria-label="YouTube">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                </li>
                <li>
                    <a href="https://www.twitch.tv/venturevalleymc" target="_blank" aria-label="Twitch">
                        <i class="fa-brands fa-twitch"></i>
                    </a>
                </li>
                <li>
                    <a href="https://discord.venturevalleymc.nl" target="_blank" aria-label="Discord">
                        <i class="fa-brands fa-discord"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</footer>

</body>

</html>
