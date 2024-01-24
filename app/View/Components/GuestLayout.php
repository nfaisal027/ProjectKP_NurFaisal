<?php

namespace App\View\Components;

use App\Models\brand;
use App\Models\category;
use Illuminate\View\Component;

class GuestLayout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title;
    public function __construct($title = "")
    {
        $this->title = $title ? $title : 'POJOK GARASI';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $brands = brand::with('produk')->get();
        $cat = category::with('produk')->get();
        return view('layouts.guest-layout',compact('brands','cat'));
    }
}
