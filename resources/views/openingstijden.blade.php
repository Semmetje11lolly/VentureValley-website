<x-default-layout title="Openingstijden • VentureValley">
    @push('head')
        <meta name="description"
              content="Ben jij er klaar voor om hét virtuele dagje uit in Minecraft zelf te ervaren? Hier vind je alle informatie over onze openingstijden!">
    @endpush

    <x-slot name="header">
        <x-header height="medium" image="{{ asset('/images/EntranceWithForest.webp') }}">
            <h1>Openingstijden</h1>
        </x-header>
    </x-slot>

    <section class="flex flex-col gap-8 text-center py-14">
        <div>
            <h2>Eindeloos plezier!</h2>
            <p class="text-lg">Ben jij er klaar voor om hét virtuele dagje uit in Minecraft zelf te ervaren? Hier vind
                je alle informatie over onze openingstijden!</p>
        </div>
        <hr>
    </section>
</x-default-layout>
