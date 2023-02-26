<?php

namespace App\View\Components;

use Illuminate\Support\Facades\App;
use Illuminate\View\Component;

class detail extends Component
{

    public $detail;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($detail)
    {
        $this->detail = $detail;

        App::setLocale('bn');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.detail');
    }
}
