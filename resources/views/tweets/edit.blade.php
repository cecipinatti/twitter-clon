<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tweets
        </h2>
    </x-slot>


    <form action="{{ route('tweets.update', ['tweet' => $tweet->id]) }}" method="POST"
        class="max-w-4xl mx-auto rounded-xl shadow-lg bg-white p-4 mt-12">
        @csrf
        @method('put')


        <div>
            <label class="font-semibold" for="tweet">
               Editá tu tweet
            </label>

            <div class="mt-4">
                <textarea class="w-full rounded-md border-0 py-2 px-6 resize-none ring-1 ring-gray-300 focus:ring-2 focus-ring-indigo-600" name="tweet" rows="2">{{ old('tweet', $tweet->message) }}</textarea>

                @error('tweet')
                    <div class="p-3 border rounded bg-red-200 border-red-300 text-red-800">
                        {{ $message }}
                    </div>
                @enderror
            </div>
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


{{--
    @extends('layouts.main')

    @section('body')
        <div class="row align-items-center justify-content-center">
            <div class="mt-5 col-7">

                <h2 class="mb-4 fw-bold">Editá tu tweet</h2>

                <div class="p-4" style="background: #FFF; border-radius: 12px">
                    <form action="{{ route('tweets.update', ['tweet' => $tweet->id]) }}" method="POST">
                        @csrf
                        @method('put')

                        <div class="mb-3">
                            <textarea name="tweet" cols="30" rows="10" style="resize: none;" class="form-control">{{ old('tweet', $tweet->message) }}</textarea>
                            @error('tweet')
                                <div class="alert alert-danger mt-2"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div>
                            <button class="btn btn-primary me-3" type="submit">Actualizar</button>
                            <a class="btn btn-secondary" href="{{ route('tweets') }}">Cancelar</a>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    @endsection
 --}}
