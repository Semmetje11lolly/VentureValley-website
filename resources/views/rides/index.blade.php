<x-default-layout title="Attracties • VentureValley">
    <x-slot name="header">
        <x-header height="medium" image="{{ asset('/images/HeaderRides.webp') }}">
            <h1>Attracties</h1>
        </x-header>
    </x-slot>

    <section class="flex flex-col gap-8 text-center py-14">
        <div>
            <h2>De gaafste attracties!</h2>
            <p class="text-lg">Beleef ons ruime aanbod aan spectaculaire attracties! Blus een bosbrand, ga op avontuur
                door
                de ruimte of
                ervaar hoe het is om een piraat te zijn. Er is van alles te beleven in VentureValley. Bekijk hier het
                overzicht van al onze attracties.</p>
        </div>
        <hr>
        <div class="grid grid-cols-3 gap-5 max-sm:grid-cols-1 lg:px-20">
            @foreach($rides as $ride)
                <a href="{{ route('attracties.show', $ride->slug) }}">
                    <article
                        class="flex flex-col justify-end min-h-[400px] bg-center bg-no-repeat bg-cover rounded-lg text-center pb-4 px-1 transition-all duration-300 hover:bg-bottom"
                        style="background-image: linear-gradient(180deg, #00000000 70%, #000000 100%), url({{ asset($ride->list_image) }}); box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.5); corner-shape: scoop">
                        <span class="text-white">{{ $ride->type }}</span>
                        <h3 class="text-4xl text-white">{{ $ride->name }}</h3>
                    </article>
                </a>
            @endforeach
        </div>
    </section>
</x-default-layout>
