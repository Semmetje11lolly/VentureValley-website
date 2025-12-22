<x-default-layout>
    <x-slot name="header">
        <x-header height="large" image="{{ asset($ride->background_image) }}">
            <span class="font-[Amaranth] text-lg">{{ strtoupper($ride->name) }} ✦ {{ strtoupper($ride->type) }}</span>
            <h1>{{ $ride->subtitle }}</h1>
            <x-button variant="transparent" url="{{ route('attracties.index') }}" arrow="left" class="mt-5">
                Terug naar overzicht
            </x-button>
        </x-header>
    </x-slot>

    @php
        $stats = collect([
            ['title' => 'Snelheid', 'value' => $ride->stat_speed, 'unit' => 'km/h'],
            ['title' => 'Baanlengte', 'value' => $ride->stat_length, 'unit' => 'meter'],
            ['title' => 'Hoogte', 'value' => $ride->stat_height, 'unit' => 'meter'],
            ['title' => 'Ritduur', 'value' => $ride->stat_duration, 'unit' => 'minuten'],
            ['title' => 'Capaciteit', 'value' => $ride->stat_capacity, 'unit' => 'p/u'],
        ])->filter(fn($stat) => filled($stat['value']))
          ->take(4)
          ->map(function ($stat) {
              if ($stat['title'] === 'Duration') {
                  $minutes = intdiv($stat['value'], 60);
                  $seconds = $stat['value'] % 60;
                  $stat['value'] = "{$minutes}:" . str_pad($seconds, 2, '0', STR_PAD_LEFT);
              }
              return $stat;
          });
    @endphp

    <x-header-card>
        <div class="flex gap-10">
            @foreach($stats as $stat)
                <div class="flex flex-col">
                    <span
                        class="font-[Amaranth] font-bold text-2xl text-[--color-primary] max-sm:text-sm">{{ $stat['title'] }}</span>
                    <span
                        class="font-semibold text-7xl text-[--color-primary] max-sm:text-3xl">{{ $stat['value'] }}</span>
                    <span class="font-[Amaranth] text-lg max-sm:text-sm">{{ $stat['unit'] }}</span>
                </div>
            @endforeach
        </div>
    </x-header-card>

    <section class="text-center py-14">
        <h2>{{ $ride->tagline }}</h2>
        <p>{{ $ride->description }}</p>
    </section>

    <section class="text-center pb-14">
        <h2>Goed om te weten</h2>
        <p>Hier komt ultra coole content!</p>
    </section>

    <section class="text-center pb-14">
        <h2>Ontdek meer attracties</h2>
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
