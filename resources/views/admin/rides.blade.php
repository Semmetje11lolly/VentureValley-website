<x-admin-layout>
    <section>
        <h1 class="text-5xl text-[--color-primary] mb-3.5">Attracties</h1>
        <table class="bg-white rounded-lg min-w-full">
            <thead class="text-left font-semibold border-b-2">
            <tr>
                <th class="p-3">Naam</th>
                <th class="p-3">Type</th>
                <th class="p-3">Gemaakt</th>
                <th class="p-3">Geüpdatet</th>
                <th class="p-3"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($rides as $ride)
                <tr class="border-b">
                    <td class="p-3">{{ $ride->name }}</td>
                    <td class="p-3">{{ $ride->type }}</td>
                    <td class="p-3">{{ $ride->created_at }}</td>
                    <td class="p-3">{{ $ride->updated_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
</x-admin-layout>
