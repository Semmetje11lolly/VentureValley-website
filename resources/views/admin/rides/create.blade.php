<x-admin-layout title="Nieuwe Attractie - Dashboard • VentureValley">
    @push('head')
        @vite(['resources/js/admin-publishing.js'])
    @endpush

    <div class="flex justify-between items-center pb-3.5">
        <h1 class="text-5xl text-[--color-primary] max-sm:text-4xl">Nieuwe Attractie</h1>
    </div>
    <div class="flex gap-5">
        <section class="w-3/4">
            <form action="{{ route('admin.attracties.store') }}" method="post" enctype="multipart/form-data"
                  class="flex flex-col gap-3 bg-white rounded-lg p-3"
                  style="box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.25); corner-shape: squircle" id="form">
                @csrf

                <h2 class="text-xl mb-0">Basis Informatie</h2>
                <div class="flex gap-3">
                    <div class="flex flex-col flex-1">
                        <label for="name">Naam</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required autocomplete="off"
                               class="input">
                        @error('name')
                        <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col flex-1">
                        <label for="type">Type</label>
                        <input type="text" name="type" id="type" value="{{ old('type') }}" required class="input">
                        @error('type')
                        <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex gap-3">
                    <div class="flex flex-col flex-1">
                        <label for="subtitle">Subtitle</label>
                        <input type="text" name="subtitle" id="subtitle" value="{{ old('subtitle') }}" required
                               class="input" placeholder="Dit staat over de header-foto heen">
                        @error('subtitle')
                        <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col flex-1">
                        <label for="tagline">Tagline</label>
                        <input type="text" name="tagline" id="tagline" value="{{ old('tagline') }}" required
                               class="input" placeholder="Dit staat onder de statistieken">
                        @error('subtitle')
                        <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col flex-1">
                    <label for="description">Beschrijving</label>
                    <textarea rows="3" name="description" id="description" required
                              class="input">{{ old('description') }}</textarea>
                    @error('subtitle')
                    <span class="text-red-700">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex gap-3">
                    <div class="flex flex-col flex-1">
                        <label for="list_image">Lijst-foto (WebP, 600×800px)</label>
                        <input type="file" accept=".webp" name="list_image" id="list_image" required
                               class="input p-3">
                        @error('list_image')
                        <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col flex-1">
                        <label for="background_image">Header-foto (WebP)</label>
                        <input type="file" accept=".webp" name="background_image" id="background_image" required
                               class="input p-3">
                        @error('background_image')
                        <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <hr class="mt-3">

                <div>
                    <h2 class="text-xl mb-0">Statistieken</h2>
                    <p class="text-gray-400 text-sm italic">Als de attractie een bepaalde statistiek niet heeft, kun je
                        deze leeg
                        laten!</p>
                </div>
                <div class="grid grid-cols-5 gap-3">
                    <div class="flex flex-col">
                        <label for="stat_speed">Snelheid (km/u)</label>
                        <input type="number" name="stat_speed" id="stat_speed" value="{{ old('stat_speed') }}"
                               class="input">
                        @error('stat_speed')
                        <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="stat_length">Baanlengte (meter)</label>
                        <input type="number" name="stat_length" id="stat_length" value="{{ old('stat_length') }}"
                               class="input">
                        @error('stat_length')
                        <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="stat_height">Hoogte (meter)</label>
                        <input type="number" name="stat_height" id="stat_height" value="{{ old('stat_height') }}"
                               class="input">
                        @error('stat_height')
                        <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="stat_duration">Ritduur (seconden)</label>
                        <input type="number" name="stat_duration" id="stat_duration" value="{{ old('stat_duration') }}"
                               class="input">
                        @error('stat_duration')
                        <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="stat_capacity">Capaciteit (p/u)</label>
                        <input type="number" name="stat_capacity" id="stat_capacity" value="{{ old('stat_capacity') }}"
                               class="input">
                        @error('stat_capacity')
                        <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <hr class="mt-3">

                <h2 class="text-xl mb-0">Eigenschappen</h2>
                <div class="grid grid-cols-3 gap-3">
                    <div class="flex flex-row gap-4">
                        <label for="property_controllable">Bestuurbaar</label>
                        <input type="hidden" name="property_controllable" value="0">
                        <input type="checkbox" name="property_controllable" id="property_controllable" value="1"
                               class="input" @checked(old('property_controllable', '0') === "1")>
                        @error('property_controllable')
                        <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-row gap-4">
                        <label for="property_audio">Audio</label>
                        <input type="hidden" name="property_audio" value="0">
                        <input type="checkbox" name="property_audio" id="property_audio" value="1"
                               class="input" @checked(old('property_audio', '0') === "1")>
                        @error('property_audio')
                        <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-row gap-4">
                        <label for="property_smoothcoasters">Smoothcoasters</label>
                        <input type="hidden" name="property_smoothcoasters" value="0">
                        <input type="checkbox" name="property_smoothcoasters" id="property_smoothcoasters" value="1"
                               class="input" @checked(old('property_smoothcoasters', '0') === "1")>
                        @error('property_smoothcoasters')
                        <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <input type="hidden" name="public" id="public" value="{{ old('public', '1') }}">
            </form>
        </section>
        <aside class="bg-white rounded-lg w-1/4 h-fit p-3"
               style="box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.25); corner-shape: squircle">
            <h2 class="text-xl">Publiceren</h2>
            <ul>
                <li>
                    <div class="flex flex-row gap-4">
                        <label for="setter-public">Zichtbaar</label>
                        <input type="checkbox" name="setter-public" id="setter-public"
                               class="input" @checked(old('public', '1') === "1")>
                    </div>
                </li>
            </ul>
            <x-button type="submit" form="form" arrow="none" class="float-right">
                Opslaan
            </x-button>
        </aside>
    </div>
</x-admin-layout>
