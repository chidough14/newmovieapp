<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ViewMoviesTest extends TestCase
{

   public function test_main_page () {

       Http::fake([
           'https://api.themoviedb.org/3/movie/popular'=> $this->fakePopularMovies(),
           'https://api.themoviedb.org/3/movie/now_playing'=> $this->fakeNowPlaying(),
           //'https://api.themoviedb.org/3/genre/movie/list'=> $this->fakeGenreArray()
       ]);

       $response = $this->get(route('movies.index'));

       $response->assertSuccessful();
       $response->assertSee('POPULAR MOVIES');
       $response->assertSee('Fake Movie');

       $response->assertSee('NOW PLAYING');
       $response->assertSee('Now Playing Fake Movie');
   }

   /* public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    } */

    private function fakePopularMovies () {
        return Http::response([
            'results'=> [
             [
                 "popularity" => 78.635,
                 "vote_count" => 1751,
                 "video" => false,
                 "poster_path" => "/p69QzIBbN06aTYqRRiCOY1emNBh.jpg",
                 "id" => 501170,
                 "adult" => false,
                 "backdrop_path" => "/A1lvRqwbLz0PIs5QyivFVzCarc6.jpg",
                 "original_language" => "en",
                 "original_title" => "Fake Movie",
                 "genre_ids" => [
                   0 => 18,
                   1 => 14,
                   2 => 27,
                   3 => 53,
                 ],
                 "title" => "Fake Movie",
                 "vote_average" => 7.1,
                 "overview" => "Fake Movie title Still irrevocably scarred by the trauma he endured as a child at the Overlook, Dan Torrance has fought to find some semblance of peace. But that peace is shattered when he encounters Abra, a courageous teenager with her own powerful extrasensory gift, known as the 'shine'. Instinctively recognising that Dan shares her power, Abra has sought him out, desperate for his help against the merciless Rose the Hat and her followers.",
                 "release_date" => "2019-10-30"
               ]
            ]
        ], 200);
    }

    private function fakeNowPlaying () {
        return Http::response([
            'results'=> [
                [
                    "popularity" => 32.367,
                    "vote_count" => 1564,
                    "video" => false,
                    "poster_path" => "/3nk9UoepYmv1G9oP18q6JJCeYwN.jpg",
                    "id" => 503919,
                    "adult" => false,
                    "backdrop_path" => "/5BmcysaAASA00FM0gRjD0ClMUY9.jpg",
                    "original_language" => "en",
                    "original_title" => "Now Playing Fake Movie",
                    "genre_ids" => [
                      0 => 18,
                      1 => 14,
                      2 => 27,
                      3 => 9648,
                    ],
                    "title" => "Now Playing Fake Movie",
                    "vote_average" => 7.6,
                    "overview" => "Two lighthouse keepers try to maintain their sanity while living
                    on a remote and mysterious New England island in the 1890s.",
                    "release_date" => "2019-10-18"
                  ]
            ]
        ], 200);
    }

   /*  private function fakeGenreArray () {
        return Http::response([
            'results'=> [
                [
                    "popularity" => 32.367,
                    "vote_count" => 1564,
                    "video" => false,
                    "poster_path" => "/3nk9UoepYmv1G9oP18q6JJCeYwN.jpg",
                    "id" => 503919,
                    "adult" => false,
                    "backdrop_path" => "/5BmcysaAASA00FM0gRjD0ClMUY9.jpg",
                    "original_language" => "en",
                    "original_title" => "The Lighthouse",
                    "genre_ids" => [
                      0 => 18,
                      1 => 14,
                      2 => 27,
                      3 => 9648,
                    ],
                    "title" => "The Lighthouse",
                    "vote_average" => 7.6,
                    "overview" => "Two lighthouse keepers try to maintain their sanity while living
                    on a remote and mysterious New England island in the 1890s.",
                    "release_date" => "2019-10-18"
                  ]
            ]
        ], 200);
    } */
}
