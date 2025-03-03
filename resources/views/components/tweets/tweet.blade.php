<div class="p-4 bg-white mb-6 max-w-4xl mx-auto rounded-xl shadow-lg">
    <div class="flex">

        <div class="w-14 pr-2 self-start">
            <a href=" {{ route('user.profile', ['user' => $tweet->user_id]) }} ">
                <img class="tweet-image rounded-full" src="/uploads/users/user.jpg" alt="{{ $tweet->name }}">
            </a>
        </div>

        <div class="flex flex-col w-full pl-4">

            <div class="flex items-center pt-2">
                <a href="{{ route('user.profile', ['user' => $tweet->user_id]) }}" class="font-bold">
                    @if ($tweet->user_id != null)
                        {{ $tweet->user->name }}
                    @endif
                </a>
                <div class="text-gray-500 pl-4">
                    {{ $tweet->created_at->diffForHumans() }}
                </div>
            </div>

            <div class="pt-2 break-all">
                {{ $tweet->message }}
            </div>


            <div class="flex items-center justify-between pt-4">

                <a class="rounded-full font-semibold text-sm text-indigo-600 px-4 py-1.5 border border-gray-300" href="{{ route('reply.create', ['tweet' => $tweet->id]) }}">
                    Contestar
                </a>

                <div class="flex space-x-4">
                    @if (auth()->check())
                        @if ($tweet->user_id == auth()->user()->id)
                            <a class="rounded-full font-semibold text-sm text-indigo-600 px-4 py-1.5 border border-gray-300" href="{{ route('tweets.edit', ['tweet' => $tweet->id]) }}">
                                Editar
                            </a>

                            <a class="rounded-full font-semibold text-sm text-indigo-600 px-4 py-1.5 border border-gray-300" href="{{ route('tweets.delete', ['tweet' => $tweet->id]) }}">
                                Eliminar
                            </a>

                        @endif
                    @endif
                </div>

            </div>

        </div>

    </div>
</div>
