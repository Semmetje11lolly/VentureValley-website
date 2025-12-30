<x-admin-layout>
    <section>
        <div class="flex justify-between items-center pb-3.5">
            <h1 class="text-5xl text-[--color-primary] max-sm:text-4xl">Attracties</h1>
            <x-button url="{{ route('admin.attracties.create') }}" arrow="none">
                Nieuwe Attractie
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
                <th class="p-3"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($rides as $ride)
                <tr class="border-b">
                    <td class="p-3">{{ $ride->name }}</td>
                    <td class="p-3">{{ $ride->type }}</td>
                    <td class="max-sm:hidden p-3">{{ $ride->created_at }}</td>
                    <td class="max-sm:hidden p-3">{{ $ride->updated_at }}</td>
                    <td class="flex justify-end gap-5 text-right p-3">
                        <a href="{{ route('admin.attracties.edit', $ride) }}"><i class="fa-solid fa-pencil"></i></a>
                        <form action="{{ route('admin.attracties.destroy', $ride) }}" method="post"
                              onsubmit="return confirm('Weet je zeker dat je {{ $ride->name }} wilt verwijderen?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">
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
