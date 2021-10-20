<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Category as CategoryModel;
class Category extends Component
{
    public $categories = []; 
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(CategoryModel $categories)
    {
        $this->categories = $categories->all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        $categories = $this->categories;
        return view('components.category',compact('categories'));
    }
}
