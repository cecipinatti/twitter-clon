{{--
        @extends('layouts.main')

    @section('body')
        <div class="row align-items-center justify-content-center">
            <div class="mt-5 col-7">

                <h2 class="mb-4 fw-bold">Publicá tu tweet</h2>

                <div class="p-4" style="background: #FFF; border-radius: 12px">
                    <form action="{{ route('tweets.store') }}" method="POST">
                        @csrf
    --}}
                    {{--
                        <div class="mb-3">
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Tu nombre"  class="form-control">
                            @error('name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    --}}

    {{--
                            <div class="mb-3">
                            <textarea name="tweet" placeholder="¿Qué estás pensando?" cols="30" rows="10" style="resize: none;" class="form-control">{{ old('tweet') }}</textarea>
                            @error('tweet')
                                <div class="alert alert-danger mt-2"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div>
                            <button class="btn btn-primary me-3" type="submit">Publicar</button>
                            <a class="btn btn-secondary" href="{{ route('tweets') }}">Cancelar</a>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    @endsection
--}}
