<?php

namespace App\View\Components;

use Illuminate\View\Component;

class toast extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $type; 
    //TYPE LIST
    // info -> Blue
    // warning -> Yellow
    // success -> Green
    // danger -> red

    public $title;
     
    public function __construct($type, $title)
    {
        //
        $this->type = $type;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.toast');
    }
}
