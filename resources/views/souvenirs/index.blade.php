<x-default-layout title="Souvenirs • VentureValley">
    <x-slot name="header">
        <x-header height="medium" image="{{ asset('/images/HeaderSouvenirs.webp') }}">
            <h1>Souvenirs</h1>
        </x-header>
    </x-slot>

    <section class="flex flex-col gap-8 text-center py-14">
        <div>
            <h2>De tofste souvenirs!</h2>
            <p class="text-lg">Wil jij een leuk aandenken aan jouw virtuele dagje uit? Scoor een leuke pet, knuffel,
                rugzak of één van de vele andere souvenirs! VentureValley biedt voor ieder wat wils! Bekijk hier het
                overzicht van al onze souvenirwinkels.</p>
        </div>
        <hr>
        <div class="grid grid-cols-3 gap-5 max-sm:grid-cols-1 lg:px-20">
            @foreach($souvenirs as $souvenir)
                <a href="{{ route('restaurants.show', $souvenir->slug) }}">
                    <article
                        class="flex flex-col justify-end min-h-[400px] bg-center bg-no-repeat bg-cover rounded-lg text-center pb-4 px-1 transition-all duration-300 hover:bg-bottom"
                        style="background-image: linear-gradient(180deg, #00000000 70%, #000000 100%), url({{ asset($souvenir->list_image) }}); box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.5); corner-shape: scoop">
                        <span class="text-white">{{ $souvenir->type }}</span>
                        <h3 class="text-4xl text-white">{{ $souvenir->name }}</h3>
                    </article>
                </a>
            @endforeach
        </div>
    </section>
</x-default-layout>
