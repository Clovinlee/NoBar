<?php

namespace App\View\Components;

use Illuminate\View\Component;

class seat extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $status;
    public $color;
    public $id;
    public function __construct($id, $color="secondary", $status = "available")
    {
        //
        $this->status = $status;
        $this->id = $id;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.seat');
    }
}
