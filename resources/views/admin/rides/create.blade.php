<x-admin-layout title="Nieuwe Attractie - Dashboard • VentureValley">
    <div class="flex justify-between items-center pb-3.5">
        <h1 class="text-5xl text-[--color-primary] max-sm:text-4xl">Nieuwe Attractie</h1>
    </div>
    <div class="flex gap-5">
        <section class="w-3/4">
            <form action="{{ route('admin.attracties.store') }}" method="post" enctype="multipart/form-data"
                  class="flex flex-col gap-3 bg-white rounded-lg p-3"
                  style="box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.25); corner-shape: squircle" id="form">
                @csrf

                <div class="flex gap-3">
                    <div class="flex flex-col flex-1">
                        <label for="name">Naam</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required class="input">
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
                    <label for="tagline">Beschrijving</label>
                    <textarea rows="3" name="description" id="description"
                              class="input">{{ old('description') }}</textarea>
                    @error('subtitle')
                    <span class="text-red-700">{{ $message }}</span>
                    @enderror
                </div>
            </form>
        </section>
        <aside class="bg-white rounded-lg w-1/4 p-3"
               style="box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.25); corner-shape: squircle">
            <h2 class="text-xl">Publiceren</h2>
            <x-button type="submit" form="form" arrow="none">
                Publiceren
            </x-button>
        </aside>
    </div>
</x-admin-layout>
