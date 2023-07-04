<?php

namespace App\Http\Livewire;

use App\Models\App;
use App\Models\TestTemplate;
use Livewire\Component;

class TestTemplates extends Component
{
    public $templates = [];
    public $apps = [];
    public $appIsSet = false;
    public $app;

    public bool $showCreateForm = false;

    public function mount(App $app)
    {
        if ($app->id) {
            $this->appIsSet = true;
            $this->app = $app;
            $this->templates = $app->testTemplates ?? [];
        } else {
            $this->templates = TestTemplate::all() ?? [];
            $this->apps = App::all() ?? [];
        }

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
