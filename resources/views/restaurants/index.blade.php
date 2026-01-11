<x-default-layout title="Eten & drinken • VentureValley">
    @push('head')
        <meta name="description"
              content="Ontdek al het lekkere eten & drinken van VentureValley! Bekijk hier het overzicht!">
    @endpush

    <x-slot name="header">
        <x-header height="medium" image="{{ asset('/images/HeaderRestaurants.webp') }}">
            <h1>Eten & drinken</h1>
        </x-header>
    </x-slot>

    <section class="flex flex-col gap-8 text-center py-14">
        <div>
            <h2>Het lekkerste eten & drinken!</h2>
            <p class="text-lg">Even een lekker hapje of drankje doen? VentureValley heeft een ruim aanbod aan eet- en
                drinkgelegenheden. Een snelle snack, chique diner of een lekkere pizza? Wij hebben het allemaal! Bekijk
                hier het overzicht van al onze restaurants.</p>
        </div>
        <hr>
        <div class="grid grid-cols-3 gap-5 max-sm:grid-cols-1 lg:px-20">
            @foreach($restaurants as $restaurant)
                <a href="{{ route('restaurants.show', $restaurant->slug) }}">
                    <article
                        class="flex flex-col justify-end min-h-[400px] bg-center bg-no-repeat bg-cover rounded-lg text-center pb-4 px-1 transition-all duration-300 hover:bg-bottom"
                        style="background-image: linear-gradient(180deg, #00000000 70%, #000000 100%), url({{ asset($restaurant->list_image) }}); box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.5); corner-shape: scoop">
                        <span class="text-white">{{ $restaurant->type }}</span>
                        <h3 class="text-4xl text-white">{{ $restaurant->name }}</h3>
                    </article>
                </a>
            @endforeach
        </div>
    </section>
</x-default-layout>
