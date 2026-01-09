<x-default-layout title="{{ $show->name }} • VentureValley">
    <x-slot name="header">
        <x-header height="large" image="{{ asset($show->background_image) }}">
            @if(!$show->public)
                <div class="mb-3">Let op! Deze parkshow is <span class="text-red-700">verborgen</span>!</div>
            @endif
            <span class="font-[Amaranth] text-lg">{{ strtoupper($show->name) }} ✦ {{ strtoupper($show->type) }}</span>
            <h1>{{ $show->subtitle }}</h1>
            <x-button variant="transparent" url="{{ route('parkshows.index') }}" arrow="left" class="mt-5">
                Terug naar overzicht
            </x-button>
        </x-header>
    </x-slot>

    <section class="text-center py-14">
        <h2>{{ $show->tagline }}</h2>
        <p>{{ $show->description }}</p>
    </section>

    <section class="text-center pb-14">
        <h2>Showtijden</h2>
        <div class="grid grid-cols-1 gap-5 bg-white p-5 rounded-lg"
             style="box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.25); corner-shape: squircle">
            @foreach($show->showTimes as $i => $showTime)
                <div class="flex gap-5 justify-between items-center max-sm:justify-center">
                    <div class="flex gap-3 items-center">
                        <i class="text-3xl text-[--color-primary] max-sm:hidden fa-solid fa-masks-theater"></i>
                        <b class="font-mono">{{ $showTime->start_time }} - {{ $showTime->end_time }}</b>
                        <span>{{ $showTime->edition }}</span>
                    </div>
                    <div class="flex gap-3 items-center max-sm:hidden">
                        <i class="text-3xl text-[--color-primary] fa-solid fa-map-pin"></i>
                        <span>{{ $showTime->location }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="text-center pb-14">
        <h2>Ontdek meer parkshows</h2>
        <div class="grid grid-cols-3 gap-5 max-sm:grid-cols-1 lg:px-20">
            @forelse($shows as $show)
                <a href="{{ route('attracties.show', $show->slug) }}">
                    <article
                        class="flex flex-col justify-end min-h-[400px] bg-center bg-no-repeat bg-cover rounded-lg text-center pb-4 px-1 transition-all duration-300 hover:bg-bottom"
                        style="background-image: linear-gradient(180deg, #00000000 70%, #000000 100%), url({{ asset($show->list_image) }}); box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.5); corner-shape: scoop">
                        <span class="text-white">{{ $show->type }}</span>
                        <h3 class="text-4xl text-white">{{ $show->name }}</h3>
                    </article>
                </a>
            @empty
                <p class="col-span-3">Er zijn nu geen andere parkshows om te ontdekken! Kom binnenkort terug!</p>
            @endforelse
        </div>
    </section>
</x-default-layout>
