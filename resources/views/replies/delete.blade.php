<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tweets
        </h2>
    </x-slot>


    <form action="{{ route('reply.destroy', ['reply' => $reply->id]) }}" method="POST"
        class="max-w-4xl mx-auto rounded-xl shadow-lg bg-white p-4 mt-12">
        @csrf
        @method('delete')


        <div>
            <label class="font-semibold" for="tweet">
                Vas a eliminar tu respuesta a {{ $reply->tweet->user->name }}:
            </label>

            <div class="mt-4">
                <div class="w-full text-gray-600 italic break-all">
                    {{ $reply->tweet->message }}
                </div>
            </div>

            <div class="mt-4">
                <div class="w-full rounded-md py-2 px-8 ring-1 ring-gray-300 break-all">
                    {{ $reply->message }}
                </div>
            </div>


            <div class="mt-6 flex items-center justify-end gap-x-8">
                <a href="{{ route('tweets') }}" class="font-semibold hover:text-gray-600" type="button">
                    Cancelar
                </a>
                <button class="font-semibold rounded-md px-3 py-2 text-white bg-red-600 hover:bg-red-500"
                    type="submit">
                    Eliminar
                </button>
            </div>
    </form>

</x-app-layout>
