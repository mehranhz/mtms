<?php

namespace App\Http\Livewire;

use App\Models\Test;
use Livewire\Component;

class Tests extends Component
{
    public $tests = [];

    public function mount(){
        $this->tests = Test::all();
    }

    public function render()
    {
        return view('livewire.tests');
    }
}
