<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tweets
        </h2>
    </x-slot>


    <form action="{{ route('tweets.destroy', ['tweet' => $tweet->id]) }}" method="POST"
        class="max-w-4xl mx-auto rounded-xl shadow-lg bg-white p-4 mt-12">
        @csrf
        @method('delete')


        <div>
            <label class="font-semibold" for="tweet">
                Vas a eliminar tu tweet
            </label>

            <div class="mt-4">
                <div class="w-full rounded-md py-2 px-8 ring-1 ring-gray-300 break-all">
                    {{ $tweet->message }}
                </div>
            </div>
        </div>


        <div class="mt-6 flex items-center justify-end gap-x-8">
            <a href="{{ route('tweets') }}" class="font-semibold hover:text-gray-600" type="button">
                Cancelar
            </a>
            <button class="font-semibold rounded-md px-3 py-2 text-white bg-red-600 hover:bg-red-500" type="submit">
                Eliminar
            </button>
        </div>
    </form>

</x-app-layout>

{{--
    @extends('layouts.main')
    @section('body')
        <div class="row align-items-center justify-content-center">
            <div class="mt-5 col-7">

                <h2 class="mb-4 fw-bold">¿Estás seguro de eliminar tu tweet?</h2>

                <div class="p-4" style="background: #FFF; border-radius: 12px; overflow: hidden">
                    <form action="{{ route('tweets.destroy', ['tweet' => $tweet->id]) }}" method="POST">
                        @csrf
                        @method('delete')

                        <div class="mb-4" style="word-wrap: break-word;">
                            <div>
                                <p> {{ $tweet->message }}  </p>
                            </div>
                        </div>

                        <div>
                            <button class="btn btn-primary me-3" type="submit">Eliminar</button>
                            <a class="btn btn-secondary" href="{{ route('tweets') }}">Cancelar</a>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    @endsection
 --}}
