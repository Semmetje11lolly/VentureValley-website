<x-default-layout title="{{ $restaurant->name }} • VentureValley">
    <x-slot name="header">
        <x-header height="large" image="{{ asset($restaurant->background_image) }}">
            @if(!$restaurant->public)
                <div class="mb-3">Let op! Dit restaurant is <span class="text-red-700">verborgen</span>!</div>
            @endif
            <span
                class="font-[Amaranth] text-lg">{{ strtoupper($restaurant->name) }} ✦ {{ strtoupper($restaurant->type) }}</span>
            <h1>{{ $restaurant->subtitle }}</h1>
            <x-button variant="transparent" url="{{ route('restaurants.index') }}" arrow="left" class="mt-5">
                Terug naar overzicht
            </x-button>
        </x-header>
    </x-slot>

    <section class="text-center py-14">
        <h2>{{ $restaurant->tagline }}</h2>
        <p>{{ $restaurant->description }}</p>
    </section>

    <section class="text-center pb-14">
        <h2>Menukaart</h2>
        <div class="grid grid-cols-3 gap-5 bg-white p-5 rounded-lg max-sm:grid-cols-1"
             style="box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.25); corner-shape: squircle">
            @foreach($restaurant->menuItems as $i => $menuItem)
                <div class="flex flex-col gap-2">
                    <h3 class="mb-0">{{ $menuItem->name }}</h3>
                    <p class="font-semibold">{{ $menuItem->description }}</p>
                    <span>{{ $menuItem->price }},00 ValleyCoins</span>
                </div>
            @endforeach
        </div>
    </section>

    <section class="text-center pb-14">
        <h2>Ontdek meer restaurants</h2>
        <div class="grid grid-cols-3 gap-5 max-sm:grid-cols-1 lg:px-20">
            @forelse($restaurants as $restaurant)
                <a href="{{ route('attracties.show', $restaurant->slug) }}">
                    <article
                        class="flex flex-col justify-end min-h-[400px] bg-center bg-no-repeat bg-cover rounded-lg text-center pb-4 px-1 transition-all duration-300 hover:bg-bottom"
                        style="background-image: linear-gradient(180deg, #00000000 70%, #000000 100%), url({{ asset($restaurant->list_image) }}); box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.5); corner-shape: scoop">
                        <span class="text-white">{{ $restaurant->type }}</span>
                        <h3 class="text-4xl text-white">{{ $restaurant->name }}</h3>
                    </article>
                </a>
            @empty
                <p class="col-span-3">Er zijn nu geen andere restaurants om te ontdekken! Kom binnenkort terug!</p>
            @endforelse
        </div>
    </section>
</x-default-layout>
