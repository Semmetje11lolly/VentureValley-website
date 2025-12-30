<x-default-layout title="VentureValley • Minecraft Pretpark">
    @push('head')
        <meta name="description"
              content="VentureValley is een volledig werkend Custom Pretpark gemaakt in Minecraft. Bezoek diverse attracties, verzamel souvenirs, ontgrendel achievements en meer!">
    @endpush

    <x-slot name="header">
        <x-header height="large" class="bg-top pb-10">
            <h1 class="max-sm:text-5xl">Beleef de gaafste attracties voor jong en oud in VentureValley</h1>
            <x-button variant="transparent" url="{{ route('attracties.index') }}" class="mt-5">
                Bekijk alle Attracties
            </x-button>
        </x-header>
    </x-slot>

    <x-header-card>
        <h2 class="text-2xl">play.venturevalleymc.nl</h2>
        Bezoek VentureValley met Minecraft Java-editie 1.20.4 of hoger
        <x-button>
            VentureValley bezoeken
        </x-button>
    </x-header-card>

    <section class="flex gap-5 py-14
                    max-sm:flex-col">
        <div class="flex flex-col flex-[3] items-center justify-center text-center">
            <h2>Hét virtuele dagje uit in Minecraft!</h2>
            <p>Houd jij van ruige achtbanen of heb je toch liever een rustige darkride? Meedoen aan een evenement of een
                parkshow bekijken? Wij hebben voor elk wat wils! VentureValley is een volledig werkend Custom Pretpark
                gemaakt in Minecraft. Je kunt verschillende attracties bezoeken, souvenirs kopen in winkeltjes,
                achievements ontgrendelen en zoveel meer!</p>
        </div>
        <div class="flex-[2]" style="margin: 0 auto">
            <a class="video-opener" href="https://youtu.be/X3NhLQJaMgE" target="_blank"
               aria-label="Trailer VentureValley">
                <img src="{{ asset('/images/YTThumbnail.webp') }}" alt=""
                     class="rounded-lg max-sm:w-[90vw]"
                     style="corner-shape: squircle">
                <i class="fa-solid fa-circle-play"></i>
            </a>
        </div>
    </section>

    <section class="pb-14">
        <div class="grid grid-cols-3 gap-5 max-sm:grid-cols-1">
            <a href="https://discord.venturevalleymc.nl">
                <article
                    class="flex flex-col justify-end min-h-[400px] bg-center bg-no-repeat bg-cover rounded-lg text-center pb-4 px-1 transition duration-500 hover:scale-[0.975]"
                    style="background-image: url({{ asset('/images/EntranceWithForest.webp') }}); box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.5); corner-shape: scoop">
                    <h2 class="text-5xl text-white">Betreed onze Discord</h2>
                </article>
            </a>
            <a href="{{ route('attracties.index') }}">
                <article
                    class="flex flex-col justify-end min-h-[400px] bg-center bg-no-repeat bg-cover rounded-lg text-center pb-4 px-1 transition duration-500 hover:scale-[0.975]"
                    style="background-image: url({{ asset('/images/HeaderRides.webp') }}); box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.5); corner-shape: scoop">
                    <h2 class="text-5xl text-white">Bekijk onze Attracties</h2>
                </article>
            </a>
            <article
                class="flex flex-col justify-end min-h-[400px] bg-center bg-no-repeat bg-cover rounded-lg text-center pb-4 px-1 transition duration-500 hover:scale-[0.975]"
                style="background-image: url({{ asset('/images/HeaderTeam.webp') }}); box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.5); corner-shape: scoop">
                <h2 class="text-5xl text-white">Versterk ons Team</h2>
            </article>
        </div>
    </section>
</x-default-layout>
