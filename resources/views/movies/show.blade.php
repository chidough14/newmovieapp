@extends("layouts.main")

@section("content")

    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
           <img src="{{$movie['poster_path'] }}" alt="image" class="w-96">
           <div class="md:ml-24">
               <h2 class="text-4xl font-semibold">{{ $movie['title']}}</h2>
               <div class="text-gray-center flex items-center text-sm flex-wrap">
                    <span>
                        <img src="{{ asset('img/star.jpg') }}" alt="" class="w-4">
                    </span>
                    <span class="ml-1">{{ $movie['vote_average']}}%</span>
                    <span class="mx-2">|</span>
                    <span>{{$movie['release_date']}}</span>
                    <span class="mx-2">|</span>
                    <span>
                       {{ $movie['genres']}}
                    </span>
                </div>

                <p class="text-gray-300 mt-8">
                    {{ $movie['overview']}}
                </p>

                <div class="mt-12">
                    <h4 class="text-white font-semibold">Featured Cast</h4>
                    <div class="flex mt-4">
                        @foreach($movie['crew'] as  $crew)
                                <div class="ml-8">
                                    <div>{{ $crew['name']}}</div>
                                    <div class="text-sm text-gray-400">{{ $crew['job']}}</div>
                                </div>
                        @endforeach
                    </div>
                </div>

                <div x-data="{ isOpen:false }">
                    @if(count($movie['videos']['results']) > 0)
                        <div class="mt-12">
                            <button
                                @click="isOpen = true"
                                class="flex inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150">
                                <span><i class="fa fa-play" aria-hidden="true"></i></span>
                                <span class="ml-4">Play Trailer</span>
                            </button>
                        </div>
                    @endif


                    <div
                        class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                         style="background-color: rgba(0, 0, 0, .5);"
                         x-show.transition.opacity="isOpen">
                        <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                            <div class="bg-gray-900 rounded">
                                <div class="flex justify-end pr-4 pt-2">
                                    <button class="text-3xl loading-none hover:text-gray-300" @click="isOpen = false">&times;</button>
                                </div>

                                <div class="modal-body px-8 py-8">
                                    <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
                                        <iframe
                                            src="https://youtube.com/embed/{{ $movie['videos']['results'][0]['key']}}"
                                            style="border: 0;" allow="autoplay; encrypted-media"
                                            allowfullscreen
                                            width="560"
                                            height="315"
                                            class="responsive-iframe absolute top-0 left-0 w-full h-full" ></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>






           </div>
        </div>
    </div>  <!-- end movie info -->

    <div class="border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Cast</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            @foreach($movie['cast'] as  $cast)
              <div class="mt-8">
                  <a href="{{ route('actors.show', $cast['id'])}}">
                      <img src="{{ 'https://image.tmdb.org/t/p/w300/'.$cast['profile_path'] }}" alt="" class="hover:opacity-75 transition ease-in-out duration-150">
                  </a>
                  <div class="mt-2">
                     <div class="text-gray-center flex items-center">
                          {{ $cast['name']}}
                     </div>

                     <div class="text-gray-400">
                         {{ $cast['character']}}
                     </div>

                  </div>
              </div>
            @endforeach

          </div>
        </div>
    </div>

    <div class="border-b border-gray-800 movie-images" x-data="{ isOpen: false, image: ''}">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Images</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @foreach($movie['images'] as  $image)
                <div class="mt-8">
                    <a
                        href="#"
                        @click.prevent="isOpen= true, image='{{ 'https://image.tmdb.org/t/p/original/'.$image['file_path'] }}'">
                        <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$image['file_path'] }}" alt="" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                </div>
            @endforeach


          </div>

        <div
            class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                style="background-color: rgba(0, 0, 0, .5);"
                x-show.transition.opacity="isOpen">
            <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                <div class="bg-gray-900 rounded">
                    <div class="flex justify-end pr-4 pt-2">
                        <button
                            class="text-3xl loading-none hover:text-gray-300"
                             @click="isOpen = false"
                             @keydown.escape.window="isOpen= false">&times;</button>
                    </div>

                    <div class="modal-body px-8 py-8">
                        <img :src="image" alt="image">
                    </div>
                </div>
            </div>
        </div>


        </div>
    </div>

@endsection
