<x-default-layout title="{{ $souvenir->name }} • VentureValley">
    @push('head')
        <meta name="description" content="{{ $souvenir->description }}">
    @endpush

    <x-slot name="header">
        <x-header height="large" image="{{ asset($souvenir->background_image) }}">
            @if(!$souvenir->public)
                <div class="mb-3">Let op! Deze souvenirwinkel is <span class="text-red-700">verborgen</span>!</div>
            @endif
            <span
                class="font-[Amaranth] text-lg">{{ strtoupper($souvenir->name) }} ✦ {{ strtoupper($souvenir->type) }}</span>
            <h1>{{ $souvenir->subtitle }}</h1>
            <x-button variant="transparent" url="{{ route('souvenirs.index') }}" arrow="left" class="mt-5">
                Terug naar overzicht
            </x-button>
        </x-header>
    </x-slot>

    <section class="text-center py-14">
        <h2>{{ $souvenir->tagline }}</h2>
        <p>{{ $souvenir->description }}</p>
    </section>

    <section class="text-center pb-14">
        <h2>Assortiment</h2>
        <div class="grid grid-cols-3 gap-5 bg-white p-5 rounded-lg max-sm:grid-cols-1"
             style="box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.25); corner-shape: squircle">
            @foreach($souvenir->shopItems as $i => $shopItem)
                <div class="flex flex-col gap-2">
                    <h3 class="mb-0">{{ $shopItem->name }}</h3>
                    <p class="font-semibold">{{ $shopItem->description }}</p>
                    <span>{{ $shopItem->price }},00 ValleyCoins</span>
                </div>
            @endforeach
        </div>
    </section>

    <section class="text-center pb-14">
        <h2>Ontdek meer souvenirwinkels</h2>
        <div class="grid grid-cols-3 gap-5 max-sm:grid-cols-1 lg:px-20">
            @forelse($souvenirs as $souvenir)
                <a href="{{ route('souvenirs.show', $souvenir->slug) }}">
                    <article
                        class="flex flex-col justify-end min-h-[400px] bg-center bg-no-repeat bg-cover rounded-lg text-center pb-4 px-1 transition-all duration-300 hover:bg-bottom"
                        style="background-image: linear-gradient(180deg, #00000000 70%, #000000 100%), url({{ asset($souvenir->list_image) }}); box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.5); corner-shape: scoop">
                        <span class="text-white">{{ $souvenir->type }}</span>
                        <h3 class="text-4xl text-white">{{ $souvenir->name }}</h3>
                    </article>
                </a>
            @empty
                <p class="col-span-3">Er zijn nu geen andere souvenirwinkels om te ontdekken! Kom binnenkort terug!</p>
            @endforelse
        </div>
    </section>
</x-default-layout>
