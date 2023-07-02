<?php

namespace App\Http\Livewire;

use App\Models\App;
use App\Models\TestTemplate;
use Livewire\Component;

class TestTemplates extends Component
{
    public $templates = [];
    public $apps = [];

    public bool $showCreateForm = false;

    public function __construct($id = null)
    {
        parent::__construct($id);
        $this->templates = TestTemplate::all() ?? [];
        $this->apps = App::all() ?? [];
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
        return view('livewire.test-templates');
    }
}
