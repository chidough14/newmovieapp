@extends("layouts.main")

@section("content")

  <div class="container mx-auto px-4 pt-16">
      <div class="popular-movies">
          <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">POPULAR MOVIES</h2>
          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
              @foreach($popularMovies as $mv)


              <x-movie-card :mv="$mv"/>
            @endforeach


          </div>
      </div>

      <div class="now-playing py-24">
          <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">NOW PLAYING</h2>
          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
             <!--  <div class="mt-8">
                  <a href="#">
                      <img src="{{ asset('img/test.jpg') }}" alt="" class="hover:opacity-75 transition ease-in-out duration-150">
                  </a>
                  <div class="mt-2">
                     <a href="#" class="text-lg mt-2 hover:text-gray-300">New Movie</a>
                     <div class="text-gray-center flex items-center">
                         <span>
                             <img src="{{ asset('img/star.jpg') }}" alt="" class="w-4">
                         </span>
                         <span class="ml-1">55%</span>
                         <span class="mx-2">|</span>
                         <span>Feb 20, 2020</span>
                     </div>

                     <div class="text-gray-400">
                         Action, Thriller, Comedy
                     </div>

                  </div>
              </div> -->
              @foreach($nowPlaying as $mv)
                  <x-movie-card :mv="$mv" />
              @endforeach

          </div>
      </div>
  </div>

@endsection
