<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public $type;
    public $name;
    public $id;
    public $label;
    public $for;

    /**
     * Create a new component instance.
     */
    public function __construct($type,$name,$id,$label,$for)
    {
        $this -> type = $type;
        $this -> name = $name;
        $this -> id = $id;
        $this -> label = $label;
        $this -> for = $for;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}
