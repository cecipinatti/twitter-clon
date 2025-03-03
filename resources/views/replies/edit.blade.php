<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tweets
        </h2>
    </x-slot>


    <form action="{{ route('reply.update', ['reply' => $reply->id]) }}" method="POST"
        class="max-w-4xl mx-auto rounded-xl shadow-lg bg-white p-4 mt-12">
        @csrf
        @method('put')


        <div>
            <label class="font-semibold" for="tweet">
                Editá tu respuesta a {{ $reply->tweet->user->name }}:
            </label>

            <div class="mt-4">
                <div class="w-full text-gray-600 italic break-all">
                    {{ $reply->tweet->message }}
                </div>
            </div>

            <div class="mt-4">
                <textarea class="w-full rounded-md border-0 py-2 px-6 resize-none ring-1 ring-gray-300 focus:ring-2 focus-ring-indigo-600" name="reply" rows="2">{{ old('reply', $reply->message) }}</textarea>

                @error('reply')
                    <div class="p-3 border rounded bg-red-200 border-red-300 text-red-800">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <div class="mt-6 flex items-center justify-end gap-x-8">
                <a href="{{ route('tweets') }}" class="font-semibold hover:text-gray-600" type="button">
                    Cancelar
                </a>
                <button class="font-semibold rounded-md px-3 py-2 text-white bg-indigo-600 hover:bg-indigo-500" type="submit">
                    Actualizar
                </button>
            </div>
    </form>

</x-app-layout>
