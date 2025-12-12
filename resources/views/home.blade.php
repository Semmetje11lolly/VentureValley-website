<x-default-layout title="VentureValley • Minecraft Pretpark">
    <x-slot name="header">
        <x-header height="large" class="bg-top pb-10">
            <h1>Beleef de gaafste attracties voor jong en oud in VentureValley</h1>
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

    <section class="flex gap-5 py-14">
        <div class="flex flex-col items-center justify-center text-center">
            <h2>Hét virtuele dagje uit in Minecraft!</h2>
            <p>Houd jij van ruige achtbanen of heb je toch liever een rustige darkride? Meedoen aan een evenement of een
                parkshow bekijken? Wij hebben voor elk wat wils! VentureValley is een volledig werkend Custom Pretpark
                gemaakt in Minecraft. Je kunt verschillende attracties bezoeken, souvenirs kopen in winkeltjes,
                achievements ontgrendelen en zoveel meer!</p>
        </div>
        <div>
            <iframe src="https://youtube.com/embed/X3NhLQJaMgE" class="w-96 aspect-video rounded-3xl"
                    style="corner-shape: squircle"></iframe>
        </div>
    </section>
</x-default-layout>
