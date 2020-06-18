<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MovieCard extends Component
{
    public $mv;
    //public $genres;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($mv)
    {
        $this->mv = $mv;
        //$this->genres = $genres;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.movie-card');
    }
}
