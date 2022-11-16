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
     
    public function __construct($id)
    {
        //
        // $this->img = $img;
        $m = ModelMovie::find($id);
        $this->img = $m->image;
        $this->slug = $m->slug;
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
