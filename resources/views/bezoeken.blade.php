<x-default-layout title="Bezoek VentureValley • VentureValley">
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
        <div id="smoothcoasters">
            <h3>Hoe zorg ik ervoor dat mijn camera meebeweegt met het treintje?</h3>
            <p class="mb-4">Om ervoor te zorgen dat je camera met het treintje meebeweegt in bochten, loopings etc, maak
                je gebruik van de SmoothCoasters mod! Deze mod is eenvoudig te installeren als je onderstaande stappen
                volgt.<br>
                <i>Voordat je onderstaande stappen volgt, lees eerst onderaan de disclaimer!</i>
            </p>
            <ol class="flex flex-col gap-1 list-decimal list-inside mb-4">
                <li>Zorg ervoor dat je de <b>normale 1.20.4 installatie</b> hebt geïnstalleerd en gespeeld. Een 'Vanilla
                    installatie' is vereist om mods te installeren.
                </li>
                <li>Ga naar de website van <a class="text-[--color-primary] underline"
                                              href="https://fabricmc.net/use/installer/">Fabric</a> en download de
                    installer. Als deze is gedownload, open
                    je hem.
                </li>
                <li>Selecteer de juiste <b>Minecraft Version</b> <i>(Loader Version en Install Location kun je
                        afblijven)</i>
                    en klik op <b>Install</b>.
                </li>
                <li>Druk tegelijk op de <b>Windows-knop en R</b>. Er opent een klein venster met de naam Uitvoeren. Typ
                    hier <span class="underline">%appdata%\.minecraft</span> en klik op <b>OK</b>.
                </li>
                <li>Vind de map genaamd <span class="underline">mods</span>. Als deze er niet is, kun je deze gewoon
                    aanmaken. Let hierbij op de spelling en geen hoofdletters!
                </li>
                <li>Als je alleen SmoothCoasters wilt en een paar functies van OptiFine, zoals Zoom en Shaders, download
                    dan <a class="text-[--color-primary] underline"
                           href="https://filemanager.venturevalleymc.nl/modpacks/VVModpack.zip">deze Modpack</a>. Als je
                    SmoothCoasters wilt en meer OptiFine functies, zoals Connected Textures, Capes, en veel meer,
                    download dan <a class="text-[--color-primary] underline"
                                    href="https://filemanager.venturevalleymc.nl/modpacks/VVModpackExtra.zip">deze
                        Modpack</a>.
                </li>
                <li>Zet de gedownloade <span class="underline">.zip</span> in de <b>mods</b> map. Rechtsklik op de <span
                        class="underline">.zip</span> en klik op <b>Alles uitpakken…</b> (en vervolgens nog eens op
                    <b>Uitpakken</b>).
                </li>
                <li>Je kunt nu de <span class="underline">.zip</span> verwijderen uit de <b>mods</b> map. Je zou nu in
                    de mods map veel <span class="underline">.jar</span> bestandjes moeten
                    zien.
                </li>
                <li>Open de <b>Minecraft Launcher</b>, selecteer de <span class="underline">Fabric-installatie</span> en
                    maak een ritje in je favoriete achtbaan!
                </li>
            </ol>
            <h4>DISCLAIMER</h4>
            <p>De modpacks hierboven zijn altijd gebaseerd op de laagste Minecraft versie waarmee onze server te joinen
                is. In dit geval is dat dus 1.20.4. Ook kan het gebeuren dat bovenstaande stappen na verloop van tijd
                niet meer werken. Wij hebben geen associatie met de mods in de modpacks en we kunnen niet aansprakelijk
                worden gesteld voor eventuele schade aan je PC door het installeren van mods. Ondanks dat we alle mods
                grondig testen, kunnen we niet garanderen dat latere updates van de mods blijven werken. Dit stappenplan
                is alleen maar onze poging om je te helpen je ervaring te verbeteren.</p>
        </div>
    </section>
</x-default-layout>
