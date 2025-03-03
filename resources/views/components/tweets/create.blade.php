<form action="{{ route('tweets.store') }}" method="POST"
        class="max-w-4xl mx-auto rounded-xl shadow-lg bg-white p-4 mb-12">
    @csrf

    <div>
        <label class="font-semibold text-xl" for="tweet">
            ¿Qué estás pensando?
        </label>

        <div class="mt-2">
            <textarea class="w-full rounded-md border-0 py-1.5 resize-none ring-1 ring-gray-300 focus:ring-2 focus-ring-indigo-600"
            name="tweet" rows="2">{{ old('tweet') }}</textarea>

            @error('tweet')
                <div class="p-3 border rounded bg-red-200 border-red-300 text-red-800">
                    {{ $message }}
                </div>
            @enderror

        </div>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-8">
        <button class="font-semibold rounded-md text-white bg-indigo-600 px-3 py-2 hover:bg-indigo-500" type="submit">
            Publicar
        </button>
    </div>

</form>

