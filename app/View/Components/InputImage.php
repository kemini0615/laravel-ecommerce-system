<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputImage extends Component
{
    public string $name;
    public ?string $image;
    public string $previewId;
    public string $inputId;

    /**
     * Create a new component instance.
     */
    public function __construct(string $name, ?string $image = null, string $previewId, string $inputId)
    {
        $this->name = $name;
        $this->image = $image;
        $this->previewId = $previewId;
        $this->inputId = $inputId;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-image');
    }
}
