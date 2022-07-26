<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BaseLayout extends Component
{
    public function __construct()
    {
        view()->share('dark_mode', session()->has('dark_mode') ? filter_var(session('dark_mode'), FILTER_VALIDATE_BOOLEAN) : false);
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.base');
    }
}
