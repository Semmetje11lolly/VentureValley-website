<x-admin-layout title="Parkshows - Dashboard • VentureValley">
    @if (session('alert'))
        <div class="alert">
            {{ session('alert') }}
        </div>
    @endif

    <section>
        <div class="flex justify-between items-center pb-3.5">
            <h1 class="text-5xl text-[--color-primary] max-sm:text-4xl">Parkshows</h1>
            <x-button url="{{ route('admin.parkshows.create') }}" arrow="none">
                Nieuwe Parkshow
            </x-button>
        </div>
        <table class="bg-white rounded-lg min-w-full"
               style="box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.25); corner-shape: squircle">
            <thead class="text-left font-semibold border-b-2">
            <tr>
                <th class="p-3">Naam</th>
                <th class="p-3">Type</th>
                <th class="max-sm:hidden p-3">Gemaakt</th>
                <th class="max-sm:hidden p-3">Geüpdatet</th>
                <th class="max-sm:hidden p-3">Zichtbaarheid</th>
                <th class="p-3"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($shows as $show)
                <tr class="border-b">
                    <td class="p-3">{{ $show->name }}</td>
                    <td class="p-3">{{ $show->type }}</td>
                    <td class="max-sm:hidden p-3">{{ $show->created_at->format('d-m-Y') }}</td>
                    <td class="max-sm:hidden p-3">{{ $show->updated_at->format('d-m-Y') }}</td>
                    <td class="max-sm:hidden p-3">
                        @if($show->public)
                            <span class="text-green-600">Zichtbaar</span>
                        @else
                            <span class="text-red-700">Verborgen</span>
                        @endif
                    </td>
                    <td class="flex justify-end gap-5 text-right p-3">
                        <a href="{{ route('parkshows.show', $show) }}" aria-label="Bekijken"><i
                                class="fa-solid fa-eye"></i></a>
                        <a href="{{ route('admin.parkshows.edit', $show) }}" aria-label="Bewerken"><i
                                class="fa-solid fa-pencil"></i></a>
                        <form action="{{ route('admin.parkshows.destroy', $show) }}" method="post"
                              onsubmit="return confirm('Weet je zeker dat je {{ $show->name }} wilt verwijderen?\nDit kan niet worden teruggedraaid!')"
                              class="max-sm:hidden">
                            @csrf
                            @method('DELETE')
                            <button type="submit" aria-label="Verwijderen">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
</x-admin-layout>
