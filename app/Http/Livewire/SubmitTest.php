<?php

namespace App\Http\Livewire;

use App\Models\TestTemplate;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class SubmitTest extends Component
{
    public TestTemplate $testTemplate;
    public $testCases = [];
    public $testCaseResults = [];
    public bool $showCreateForm = false;
    public $photo;
    use WithFileUploads;

    public function mount($testTemplate)
    {
        $this->testCases = $this->testTemplate->testCases;
        foreach ($this->testCases as $testCase) {
            $this->testCaseResults[$testCase->id] = [
                'status' => '',
                'description' => '',
                'files' => []
            ];
        }
    }

    public function updateTestCaseResult($case, $key, $value)
    {
        $this->testCaseResults[$case][$key] = $value;
    }

    public function save()
    {
        $test = Auth::user()->tests()->create([
            'test_template_id' => $this->testTemplate->id
        ]);
        foreach ($this->testCaseResults as $testCaseID => $result) {
            $testCaseResult = $test->testCaseResults()->create([
                'status' => $result['status'] === 1,
                'description' => $result['description'],
                'test_case_id' => $testCaseID

            ]);

            foreach ($result['files'] as $file) {
                $testCaseResult->files()->create([
                    'path' => $file
                ]);
            }
        }
        return $this->redirect(route('test.index'));
    }

    public function savePhoto($caseID)
    {
        $path = $this->photo->store('public/files');
        $this->testCaseResults[$caseID]['files'][] = '/storage/files/' . explode('/', $path)[2];
    }

    public function render()
    {
        return view('livewire.submit-test');
    }
}
