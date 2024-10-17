<?php

namespace App\Http\Livewire\Administrator;

use Livewire\Component;

class Category extends Component
{
    public function render()
    {

        $categories=Category::all();
        return view('livewire.administrator.category',['$categories'=>$categories]);
    }
}
