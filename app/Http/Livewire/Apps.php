<?php

namespace App\Http\Livewire;

use App\Models\App;
use Livewire\Component;

class Apps extends Component
{


    public $apps = [];

    public bool $showCreateForm = false;

    public function __construct($id = null)
    {
        parent::__construct($id);
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
        return view('livewire.apps');
    }
}
