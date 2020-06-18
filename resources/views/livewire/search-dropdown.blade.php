<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="relative mt-3 md:mt-0" x-data="{ isOpen: true }" @click.away="isOpen = false">
        <input
            wire:model.debounce.500ms="search"
            @focus="isOpen = true"
            @keydown="isOpen = true"
            @keydown.escape.window="isOpen = false"
            @keydown.shift.tab="isOpen = false"
            type="text" class="bg-gray-800 rounded-full w-64 px-4 py-1 pl-8 focus:outline-none focus:shadow-outline"
            placeholder="Search"
            x-ref="search"
            @keydown.window="
               if(event.keyCode === 191) {
                   event.preventDefault();
                   $refs.search.focus();
               }
            ">

        <div wire:loading class="spinner top-0 right-0 mr-4 mt-3"></div>
        @if(strlen($search) > 2)
            <div
               class="absolute bg-gray-800 rounded w-64 mt-4 text-sm z-50"
               x-show.transition.opacity="isOpen">

                @if($searchResults->count() > 0)
                    <ul>
                        @foreach($searchResults as $res)
                        <li class="border-b border-gray-700">
                            <a
                                href="{{ route('movies.show', $res['id'])}}"
                                class="block hover:border-gray-700 px-3 py-3 flex items-center"
                                @if ($loop->last) @keydown.tab="isOpen = false"  @endif>

                                @if($res['poster_path'])
                                   <img src="{{ 'https://image.tmdb.org/t/p/w92/'.$res['poster_path'] }}" alt="poster" class="w-8">
                                @else
                                    <img src="https://via.placeholder.com/50x75" alt="poster" class="w-8">
                                @endif
                                <span class="ml-4">{{ $res['title'] }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                @else
                    <div class="px-3 py-4">No Results for "{{ $search }}"</div>
                @endif
            </div>
        @endif
    </div>
</div>
