<x-admin-layout>
    <section>
        <div class="flex justify-between items-center pb-3.5">
            <h1 class="text-5xl text-[--color-primary] max-sm:text-4xl">Nieuwe Attractie</h1>
        </div>
        <form action="{{ route('admin.attracties.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div>
                <label for="name">Naam</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required>
                @error('name')
                <span class="text-red-700">{{ $message }}</span>
                @enderror
            </div>
        </form>
    </section>
</x-admin-layout>
