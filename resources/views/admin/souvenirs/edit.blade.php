<x-admin-layout title="Bewerk {{ $souvenir->name }} - Dashboard • VentureValley">
    @push('head')
        @vite(['resources/js/admin-publishing.js', 'resources/js/admin-shopitems.js'])
    @endpush

    <div class="flex justify-between items-center pb-3.5">
        <h1 class="text-5xl text-[--color-primary] max-sm:text-4xl">Bewerk {{ $souvenir->name }}</h1>
    </div>
    <div class="flex gap-5">
        <section class="w-3/4">
            <form action="{{ route('admin.souvenirs.update', $souvenir) }}" method="post"
                  enctype="multipart/form-data"
                  class="flex flex-col gap-3 bg-white rounded-lg p-3"
                  style="box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.25); corner-shape: squircle" id="form">
                @csrf
                @method('PUT')

                <h2 class="text-xl mb-0">Basis Informatie</h2>
                <div class="flex gap-3">
                    <div class="flex flex-col flex-1">
                        <label for="name">Naam</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $souvenir->name) }}" required
                               autocomplete="off"
                               class="input">
                        @error('name')
                        <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col flex-1">
                        <label for="type">Type</label>
                        <input type="text" name="type" id="type" value="{{ old('type', $souvenir->type) }}" required
                               class="input">
                        @error('type')
                        <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex gap-3">
                    <div class="flex flex-col flex-1">
                        <label for="subtitle">Subtitle</label>
                        <input type="text" name="subtitle" id="subtitle"
                               value="{{ old('subtitle', $souvenir->subtitle) }}"
                               required
                               class="input" placeholder="Dit staat over de header-foto heen">
                        @error('subtitle')
                        <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col flex-1">
                        <label for="tagline">Tagline</label>
                        <input type="text" name="tagline" id="tagline"
                               value="{{ old('tagline', $souvenir->tagline) }}"
                               required
                               class="input" placeholder="Dit staat onder de header">
                        @error('tagline')
                        <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col flex-1">
                    <label for="description">Beschrijving</label>
                    <textarea rows="3" name="description" id="description" required
                              class="input">{{ old('description', $souvenir->description) }}</textarea>
                    @error('description')
                    <span class="text-red-700">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex gap-3">
                    <div class="flex flex-col flex-1">
                        <label for="list_image">Lijst-foto (WebP, 600×800px)</label>
                        <input type="file" accept=".webp" name="list_image" id="list_image"
                               class="input p-3">
                        <p class="text-gray-400 text-sm italic">Als je de lijst-foto niet wilt veranderen, laat dit dan
                            leeg!</p>
                        @error('list_image')
                        <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col flex-1">
                        <label for="background_image">Header-foto (WebP)</label>
                        <input type="file" accept=".webp" name="background_image" id="background_image"
                               class="input p-3">
                        <p class="text-gray-400 text-sm italic">Als je de header-foto niet wilt veranderen, laat dit dan
                            leeg!</p>
                        @error('background_image')
                        <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <hr class="mt-3">

                <div>
                    <h2 class="text-xl mb-0">Shop-items</h2>
                    <p class="text-gray-400 text-sm italic">Als de souvenirwinkel nog geen assortiment heeft, kun je dit
                        leeglaten!</p>
                </div>
                <div class="flex flex-col gap-3" id="shop-items">
                    @foreach(old('shop_items', $souvenir->shopItems->toArray()) as $i => $item)
                        <div class="flex gap-3 relative bg-gray-100 border rounded p-3 shop-item-row"
                             style="corner-shape: squircle">

                            <input type="hidden" name="shop_items[{{ $i }}][id]"
                                   value="{{ $item['id'] ?? null }}">

                            <div class="flex flex-col flex-1">
                                <label for="shop_items.{{ $i }}.name">Naam</label>
                                <input type="text" name="shop_items[{{ $i }}][name]"
                                       id="shop_items.{{ $i }}.name"
                                       value="{{ old("shop_items.$i.name", $item['name'] ?? '') }}"
                                       required
                                       class="input">
                            </div>
                            <div class="flex flex-col flex-1">
                                <label for="shop_items.{{ $i }}.description">Beschrijving</label>
                                <input type="text" name="shop_items[{{ $i }}][description]"
                                       id="shop_items.{{ $i }}.description"
                                       value="{{ old("shop_items.$i.description", $item['description'] ?? '') }}"
                                       required
                                       class="input">
                            </div>
                            <div class="flex flex-col flex-1">
                                <label for="shop_items.{{ $i }}.price">Prijs (In hele ValleyCoins)</label>
                                <input type="number" name="shop_items[{{ $i }}][price]"
                                       id="shop_items.{{ $i }}.price"
                                       value="{{ old("shop_items.$i.price", $item['price'] ?? '') }}"
                                       required
                                       class="input">
                            </div>
                            <button type="button" class="absolute top-0 right-0 p-1 shop-item-remove">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                    @endforeach
                </div>
                <x-button arrow="none" type="button" class="w-fit" id="shop-item-add">
                    <i class="fa-solid fa-plus"></i> Eerste shop-item toevoegen
                </x-button>

                <input type="hidden" name="public" id="public" value="{{ old('public', (string)$souvenir->public) }}">
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
                               class="input" @checked(old('public', (string)$souvenir->public) === "1")>
                    </div>
                </li>
            </ul>
            <x-button type="submit" form="form" arrow="none" class="float-right">
                Opslaan
            </x-button>
        </aside>
    </div>
</x-admin-layout>
