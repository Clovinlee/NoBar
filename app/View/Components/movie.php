<?php

namespace App\View\Components;

use App\Models\Movie as ModelMovie;
use Illuminate\View\Component;

class movie extends Component
{
    /**
     * Create a new component instance.
     * @return void
     */
    public $img;
    public $slug;
     
    public function __construct($slug, $img)
    {
        //
        // $this->img = $img;
        $this->slug = $slug;
        $this->img = $img;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.movie');
    }
}
