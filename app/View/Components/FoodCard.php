<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FoodCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public int $idFood;
    public string $img;
    public string $deskripsi;
    public int $harga;

    public function __construct($idFood, $description, $img, $price)
    {
        //
        $this->idFood = $idFood;
        $this->img = $img;
        $this->deskripsi = $description;
        $this->harga = $price;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.food-card');
    }
}
