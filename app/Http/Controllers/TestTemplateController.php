<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestTemplate\CreateTestTemplateRequest;
use App\Models\TestTemplate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('scenario:read');
        return view('test-template.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTestTemplateRequest $request)
    {
        $this->authorize('scenario:write');
        Auth::user()->testTemplates()->create([
            'title' => $request->title,
            'description' => $request->description,
            'app_id' => $request->app
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(TestTemplate $testTemplate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TestTemplate $testTemplate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TestTemplate $testTemplate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TestTemplate $testTemplate)
    {
        //
    }

    public function testCases(TestTemplate $testTemplate){
        $this->authorize('test-case:read');
        $testCases = $testTemplate->testCases;
        return view('test-template.test-cases',compact('testTemplate'));
    }
}
