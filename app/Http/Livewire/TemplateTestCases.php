<?php

namespace App\Http\Livewire;

use App\Models\App;
use App\Models\TestTemplate;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class TemplateTestCases extends Component
{

    public TestTemplate $testTemplate;
    public $testCases = [];
    public bool $showCreateForm = false;

    public function mount($testTemplate)
    {
        $this->testCases = $this->testTemplate->testCases;
    }

    public function activateForm()
    {
        $this->showCreateForm = true;
    }

    public function deActiveForm()
    {
        $this->showCreateForm = false;
    }

    public function render()
    {
        return view('livewire.template-test-cases');
    }
}
