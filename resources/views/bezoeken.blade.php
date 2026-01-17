<x-default-layout title="VentureValley • Minecraft Pretpark">
    @push('head')
        <meta name="description"
              content="Ben jij klaar voor hét virtuele dagje uit in Minecraft? Hier vind je uitgebreide stappen hoe je ons pretpark kunt bezoeken en extra nuttige tips!">
    @endpush

    <x-slot name="header">
        <x-header height="medium">
            <h1>Bezoek VentureValley</h1>
        </x-header>
    </x-slot>

    <section class="flex flex-col gap-8 text-left py-14">
        <div class="text-center">
            <h2>Kom gezellig langs!</h2>
            <p class="text-lg">Ben jij er klaar voor om hét virtuele dagje uit in Minecraft zelf te ervaren? Hier vind
                je uitgebreide stappen hoe je ons park kunt bezoeken en nuttige tips om je bezoek nog magischer te
                maken!</p>
        </div>
        <hr>
        <div>
            <h3>Hoe bezoek ik de server?</h3>
            <p class="mb-4">Volg onderstaand stappenplan aandachtig om VentureValley zonder problemen te kunnen
                bezoeken! Op dit moment is VentureValley helaas alleen te bezoeken met de Java-editie van Minecraft.</p>
            <ol class="flex flex-col gap-1 list-decimal list-inside mb-4">
                <li>Open de <b>Minecraft Launcher.</b></li>
                <li>Zorg dat je een installatie aanklikt met versie <b>1.20.4 (of hoger)</b>.</li>
                <li>Klik in de Minecraft Launcher op <b>Spelen</b>.</li>
                <li>Als het spel is opgestart, klik je op <b>Samen spelen (Multiplayer)</b>.</li>
                <li>Klik rechtsonder op <b>Server toevoegen (Add Server)</b>.</li>
                <li>Vul bij <b>Servernaam (Server Name)</b> <span class="underline">VentureValley</span> in en bij <b>Serveradres
                        (Server Address)</b> <span class="underline">play.venturevalleymc.nl</span></li>
                <li>Zet <b>Serverbronpaketten (Server Resource Packs)</b> op <span class="underline">ingeschakeld (Enabled)</span>
                    en klik op <b>Gereed (Done)</b>.
                </li>
                <li>Je hebt nu de server VentureValley toegevoegd aan je serverlijst. Dubbelklik erop om ons pretpark te
                    bezoeken.
                </li>
            </ol>
            <p>Mocht het je niet lukken, controleer dan of je alle stappen écht goed hebt gevolgd. Lukt het nog steeds
                niet? Twijfel dan niet om het in onze <a class="text-[--color-primary] underline"
                                                         href="https://discord.venturevalleymc.nl/">Discord server</a>
                te vragen! Wij helpen je graag!</p>
        </div>
    </section>
</x-default-layout>
