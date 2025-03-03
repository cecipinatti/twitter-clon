<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Perfil de {{ $user->name }}
        </h2>
    </x-slot>


    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="overflow-hidden sm:rounded-lg p-6 text-gray-900">

            <div class="flex mb-12">
                <div class="self-center">
                    <img class="user-image rounded-full w-32 h-32" src="/uploads/users/user.jpg" alt="{{ $user->name }}">
                </div>

                <div class="pl-8 user-profile flex flex-col gap-2">
                    <div class="font-semibold text-2xl">Perfil de {{ $user->name }}</div>
                    <div class="text-xl">
                        @if($user->nick)
                            {!! '@'.$user->nick !!}
                        @endif
                    </div>
                    <div>
                        @if($user->city && $user->country)
                            {{ $user->city . ' - ' . $user->country }}
                        @endif
                    </div>
                    <div> {{ $user->phone }} </div>
                </div>

            </div>



            <div class="mb-12 pl-2">
                <div class="mb-4 font-semibold text-xl text-gray-800 leading-tight">
                    Últimas publicaciones de {!! '@'.$user->nick !!}
                </div>

                <div>
                    @if ($user->tweets->count() > 0)
                        @foreach ($user->tweets as $tweet)
                            <x-tweets.tweet :tweet="$tweet"></x-tweets.tweet>
                        @endforeach
                    @else
                        <p>No hay publicaciones.</p>
                    @endif
                </div>

            </div>


            <div class="pl-2">
                <div>
                    <h2 class="mb-4 font-semibold text-xl text-gray-800 leading-tight">
                        Últimos comentarios de {!! '@'.$user->nick !!}
                    </h2>
                </div>

                <div>
                    @if ($user->replies->count() > 0)
                        @foreach ($user->replies as $reply)
                            <x-tweets.tweet :tweet="$reply->tweet"></x-tweets.tweet>
                            <x-tweets.reply :reply="$reply"></x-tweets.reply>
                        @endforeach
                    @else
                        <p>No hay comentarios.</p>
                    @endif
                </div>
            </div>


        </div>

</x-app-layout>
