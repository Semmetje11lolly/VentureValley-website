<x-default-layout title="Parkshows • VentureValley">
    <x-slot name="header">
        <x-header height="medium" image="{{ asset('/images/HeaderRides.webp') }}">
            <h1>Parkshows</h1>
        </x-header>
    </x-slot>

    <section class="flex flex-col gap-8 text-center py-14">
        <div>
            <h2>Spectaculaire parkshows!</h2>
            <p class="text-lg">Een korte pauze nodig van alle attracties? Laat je verwonderen door onze diverse
                parkshows! Van spectaculaire acts tot een grote watershow, VentureValley biedt genoeg entertainment!
                Bekijk hier het overzicht van al onze parkshows.</p>
        </div>
        <hr>
        <div class="grid grid-cols-3 gap-5 max-sm:grid-cols-1 lg:px-20">
            @foreach($shows as $show)
                <a href="{{ route('parkshows.show', $show->slug) }}">
                    <article
                        class="flex flex-col justify-end min-h-[400px] bg-center bg-no-repeat bg-cover rounded-lg text-center pb-4 px-1 transition-all duration-300 hover:bg-bottom"
                        style="background-image: linear-gradient(180deg, #00000000 70%, #000000 100%), url({{ asset($ride->list_image) }}); box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.5); corner-shape: scoop">
                        <span class="text-white">{{ $show->type }}</span>
                        <h3 class="text-4xl text-white">{{ $show->name }}</h3>
                    </article>
                </a>
            @endforeach
        </div>
    </section>
</x-default-layout>
