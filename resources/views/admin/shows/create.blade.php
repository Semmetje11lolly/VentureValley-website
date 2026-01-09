<x-admin-layout title="Nieuwe Parkshow - Dashboard • VentureValley">
    @push('head')
        @vite(['resources/js/admin-publishing.js', 'resources/js/admin-showtimes.js'])
    @endpush

    <div class="flex justify-between items-center pb-3.5">
        <h1 class="text-5xl text-[--color-primary] max-sm:text-4xl">Nieuwe Parkshow</h1>
    </div>
    <div class="flex gap-5">
        <section class="w-3/4">
            <form action="{{ route('admin.parkshows.store') }}" method="post" enctype="multipart/form-data"
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
                               class="input" placeholder="Dit staat onder de header">
                        @error('tagline')
                        <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col flex-1">
                    <label for="description">Beschrijving</label>
                    <textarea rows="3" name="description" id="description" required
                              class="input">{{ old('description') }}</textarea>
                    @error('description')
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
                    <h2 class="text-xl mb-0">Showtijden</h2>
                    <p class="text-gray-400 text-sm italic">Een show heeft minimaal één showtijd nodig! Je kunt er meer
                        toevoegen!</p>
                </div>
                <div class="flex flex-col gap-3" id="show-times">
                    <div class="flex gap-3 relative bg-gray-100 border rounded p-3 show-time-row"
                         style="corner-shape: squircle">
                        <div class="flex flex-col flex-1">
                            <label for="show_times.0.start_time">Starttijd</label>
                            <input type="time" name="show_times[0][start_time]" id="show_times.0.start_time"
                                   value="{{ old('show_times.0.start_time') }}" required
                                   class="input">
                            @error('show_times.0.start_time')
                            <span class="text-red-700">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col flex-1">
                            <label for="show_times.0.end_time">Eindtijd</label>
                            <input type="time" name="show_times[0][end_time]" id="show_times.0.end_time"
                                   value="{{ old('show_times.0.end_time') }}" required
                                   class="input">
                            @error('show_times.0.end_time')
                            <span class="text-red-700">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col flex-1">
                            <label for="show_times.0.edition">Editie</label>
                            <input type="text" name="show_times[0][edition]" id="show_times.0.edition"
                                   value="{{ old('show_times.0.edition') }}" required
                                   class="input">
                            @error('show_times.0.edition')
                            <span class="text-red-700">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col flex-1">
                            <label for="show_times.0.location">Locatie</label>
                            <input type="text" name="show_times[0][location]" id="show_times.0.location"
                                   value="{{ old('show_times.0.location') }}" required
                                   class="input">
                            @error('show_times.0.location')
                            <span class="text-red-700">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <x-button arrow="none" type="button" class="w-fit" id="show-times-add">
                    <i class="fa-solid fa-plus"></i> Nog een showtijd toevoegen
                </x-button>

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
