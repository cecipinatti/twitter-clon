<div class="p-4 bg-slate-50 mb-6 rounded-xl shadow-lg max-w-3xl lg:ml-72 md:ml-40">
    <div class="flex">

        <div class="w-14 pr-2">
            <a href="{{ route('user.profile', ['user' => $reply->user_id]) }}"><img class="tweet-image rounded-full" src="/uploads/users/user.jpg" alt="{{ $reply->user->name }}"></a>
        </div>

        <div class="flex flex-col w-full pl-4">

            <div class="flex items-center pt-2">
                <a href="{{ route('user.profile', ['user' => $reply->user_id]) }}" class="font-bold">
                    @if ($reply->user_id != null)
                        {{ $reply->user->name }}
                    @endif
                </a>
                <div class="text-gray-500 pl-4">
                    {{ $reply->created_at->diffForHumans() }}
                </div>
            </div>

            <div class="pt-2 break-all">
                {{ $reply->message }}
            </div>

            <div class="flex items-center justify-between pt-4">
                <a class="rounded-full font-semibold text-sm text-indigo-600 px-4 py-1.5 border border-gray-300" href="#">
                    Contestar
                </a>

                <div class="flex space-x-4">
                    @if (auth()->check())
                        @if ($reply->user_id == auth()->user()->id)
                            <a class="rounded-full font-semibold text-sm text-indigo-600 px-4 py-1.5 border border-gray-300" href="{{ route('reply.edit', ['reply' => $reply->id]) }}">
                                Editar
                            </a>

                            <a class="rounded-full font-semibold text-sm text-indigo-600 px-4 py-1.5 border border-gray-300" href="{{ route('reply.delete', ['reply' => $reply->id]) }}">
                                Eliminar
                            </a>
                        @endif
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
