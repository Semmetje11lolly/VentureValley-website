<x-default-layout title="Parkreglement • VentureValley">
    @push('head')
        <meta name="description"
              content="Het parkreglement met alle regels van VentureValley: Nederlandse Minecraft Pretpark server.">
    @endpush

    <x-slot name="header">
        <x-header height="medium" image="{{ asset('/images/HeaderRules.webp') }}">
            <h1>Parkreglement</h1>
        </x-header>
    </x-slot>

    <section class="flex flex-col gap-8 text-center py-14">
        <div>
            <h2>Alle regels van VentureValley!</h2>
            <p class="text-lg">Om een bezoek aan VentureValley zo prettig mogelijk te maken voor iedereen, hebben we een
                aantal regels opgesteld. Met het betreden van de Minecraft server ga je automatisch akkoord met deze
                regels.</p>
        </div>
        <hr>
        <div class="flex gap-5 text-left max-sm:flex-col">
            <div class="flex-1">
                <h3>Reglement voor iedereen</h3>
                <b>✨ Algemeen</b>
                <ul class="list-disc list-inside mb-4">
                    <li>Behandel elkaar met respect en denk aan anderen.</li>
                    <li>Voorkom intimidatie, pesten of aanstootgevend gedrag.</li>
                    <li>Houd het overal SFW (Geen pornografie, bloederige zaken etc.)</li>
                    <li>Spam geen berichten in chat.</li>
                </ul>
                <b>📰 Adverteren en Privacy</b>
                <ul class="list-disc list-inside mb-4">
                    <li>Deel geen links, IP adressen etc. die niet VV-gerelateerd zijn.</li>
                    <li>Lek geen persoonsgegevens van jezelf of anderen.</li>
                </ul>
                <b>🎮 Gameplay</b>
                <ul class="list-disc list-inside">
                    <li>Kom niet op plekken waar je de beleving van een ander verpest.</li>
                    <li>Gebruik geen hacks en maak geen misbruik van glitches.</li>
                    <li>Rapporteer bugs die je tegenkomt en maak er geen misbruik van.</li>
                    <li>Maak gebruik van een fatsoenlijke gebruikersnaam en skin.</li>
                    <li>Download en/of kopieer het werk van VentureValley niet.</li>
                </ul>
            </div>
            <div class="flex-1">
                <h3>Reglement voor VIP</h3>
                <p class="italic mb-6">Naast het reglement voor iedereen, gelden er extra regels voor VIP’s:</p>
                <b>🎡 Attracties</b>
                <ul class="list-disc list-inside mb-4">
                    <li>Doe geen pogingen om opzettelijk attracties stuk te maken.</li>
                    <li>Laat bezoekers niet in besturingshokken en backstagegebieden.</li>
                    <li>Maak geen misbruik van omroepen (Status spammen, storing etc.)</li>
                    <li>Besturen doe je altijd voor iedereen, niet alleen vrienden of privé.</li>
                </ul>
                <b>👑 Verantwoordelijkheid</b>
                <ul class="list-disc list-inside mb-4">
                    <li>Foto’s en video’s nemen tijdens VIP Previews is toegestaan, maar het publiceren ervan is <span
                            class="underline">niet</span>
                        toegestaan vóór de vermelde datum.
                    </li>
                    <li>Probeer jezelf niet voor te doen als VentureValley Teamlid.</li>
                </ul>
                <b>🚨 Storingsmelder</b>
                <p>Bestuur je een attractie die een storing heeft? Meld deze dan via het omroep-menu van de
                    desbetreffende attractie.</p>
            </div>
        </div>
        <div class="text-left">
            <h3>Opvolging en overtreding</h3>
            <p class="mb-4">Voor een goede orde in ons pretpark is het belangrijk dat iedereen het parkreglement
                naleeft. Het kan
                voorkomen dat bepaalde regels tijdelijk niet gelden of er tijdelijk extra regels toegevoegd zijn. Volg
                in dit geval de instructies op van het VentureValley Team.</p>
            <p class="mb-4">Bij overtreding van dit parkreglement kunnen verschillende sancties worden opgelegd,
                variërend van een waarschuwing tot een verbanning uit ons pretpark, afhankelijk van de ernst van de
                overtreding. Teamleden zijn niet verplicht een reden te geven voor opgelegde sancties.</p>
            <p class="italic">Voor alle overige situaties die niet expliciet in dit parkreglement worden vermeld,
                behoudt het management het recht om te beslissen.</p>
        </div>
    </section>
</x-default-layout>
