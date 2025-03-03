<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tweets
        </h2>
    </x-slot>


    <div class="max-w-7xl mx-auto sm:px-6 lg-px-8 py-12">

        <div class="mb-6 max-w-4xl mx-auto">
            {{--  tweets --}}
            @if ($notify_tweet_published == true)
                <div class="p-3 border rounded bg-green-200 border-green-300 text-green-800">
                    ¡Tu tweet ha sido publicado!
                </div>
            @endif

            @if ($notify_tweet_updated == true)
                <div class="p-3 border rounded bg-green-200 border-green-300 text-green-800">
                    ¡Tu tweet ha sido actualizado!
                </div>
            @endif

            @if ($notify_tweet_deleted == true)
                <div class="p-3 border rounded bg-red-200 border-red-300 text-red-800">
                    ¡Tu tweet ha sido eliminado!
                </div>
            @endif

            {{--  replies --}}
            @if ($notify_reply_published == true)
                <div class="p-3 border rounded bg-green-200 border-green-300 text-green-800">
                    ¡Tu respuesta ha sido creada!
                </div>
            @endif

            @if ($notify_reply_updated == true)
                <div class="p-3 border rounded bg-green-200 border-green-300 text-green-800">
                    ¡Tu respuesta ha sido actualizada!
                </div>
            @endif

            @if ($notify_reply_deleted == true)
                <div class="p-3 border rounded bg-red-200 border-red-300 text-red-800">
                    ¡Tu respuesta ha sido eliminada!
                </div>
            @endif

        </div>


        {{-- @if (auth()->check()) - @else - @endif --}}
        @auth
            <x-tweets.create>
            </x-tweets.create>
        @endauth

        @guest
            <p class="mb-4 text-lg text-center">
                Debes <a class="text-gray-600" href="{{ route('login') }}">iniciar sesión</a> para publicar tweets.
            </p>
        @endguest


        @foreach ($tweets as $tweet)
            <x-tweets.tweet :tweet="$tweet">
            </x-tweets.tweet>

            @foreach ($tweet->replies as $reply)
                <x-tweets.reply :reply="$reply">
                </x-tweets.reply>
            @endforeach
        @endforeach

    </div>

</x-app-layout>
