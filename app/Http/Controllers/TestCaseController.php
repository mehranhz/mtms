<?php

namespace App\Http\Controllers;

use App\Models\TestCase;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        Auth::user()->testCases()->create([
            'title'=>$request->title,
            'description'=>$request->description,
            'test_template_id'=>$request->test_template,
            'test_steps'=>$request->test_steps,
            'test_data'=>$request->test_data,
            'exception_result'=>$request->exception_result,
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(TestCase $testCase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TestCase $testCase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TestCase $testCase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TestCase $testCase)
    {
        //
    }
}
