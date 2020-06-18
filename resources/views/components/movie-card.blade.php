<div>
    <!-- Simplicity is an acquired taste. - Katharine Gerould -->
    <div class="mt-8">
        <a href="{{ route('movies.show', $mv['id']) }}">
            <img src="{{ $mv['poster_path'] }}" alt="poster" class="hover:opacity-75 transition ease-in-out duration-150">
        </a>
        <div class="mt-2">
            <a href="{{ route('movies.show', $mv['id']) }}" class="text-lg mt-2 hover:text-gray-300">{{ $mv['title']}}</a>
            <div class="text-gray-center flex items-center">
                <span>
                    <img src="{{ asset('img/star.jpg') }}" alt="" class="w-4">
                </span>
                <span class="ml-1">{{ $mv['vote_average']}}%</span>
                <span class="mx-2">|</span>
                <span>{{$mv['release_date']}}</span>
            </div>

            <div class="text-gray-400">

                {{$mv['genres']}}
            </div>

        </div>
    </div>
</div>
