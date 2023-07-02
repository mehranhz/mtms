<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Test as AppTest;
class Test extends Component
{
    public AppTest $test;

    public function mount(AppTest $test){
        $this->test = $test;
    }
    public function render()
    {
        return view('livewire.test');
    }
}
