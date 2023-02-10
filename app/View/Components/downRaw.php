<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class downRaw extends Component
{

    public $title;
    public $date;
    public $action;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $date, $action)
    {
        $this->title = $title;
        $this->date = $date;
        $this->action = $action;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.down-raw');
    }
}
