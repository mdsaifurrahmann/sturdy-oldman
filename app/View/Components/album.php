<?php

namespace App\View\Components;

use Illuminate\View\Component;

class album extends Component
{
    public $action;
    public $image;
    public $title;
    public $date;
    public $time;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($action, $image, $title, $date, $time)
    {
        $this->action = $action;
        $this->image = $image;
        $this->title = $title;
        $this->date = $date;
        $this->time = $time;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.album');
    }
}
