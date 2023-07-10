<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TestCaseController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TestTemplateController;
use App\Http\Livewire\Apps;
use App\Http\Livewire\SubmitTest;
use App\Http\Livewire\TemplateTestCases;
use App\Http\Livewire\TestTemplates;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Test;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/app',AppController::class);
    Route::get('/app/{app}/scenarios',TestTemplates::class)->name('app.scenarios');
    Route::resource('/test-template',TestTemplateController::class);
    Route::resource('/test-case',TestCaseController::class);
    Route::get('/test-template/add-test-case/{testTemplate}',[TestCaseController::class,'create'])->name('test-templates.add-test-case');
    Route::get('/test-template/test-cases/{testTemplate}',TemplateTestCases::class)->name('test-templates.test-cases');
    Route::resource('/test',TestController::class);
    Route::get('/submit-test/{testTemplate}',SubmitTest::class)->name('test.form');
    Route::get('/test-report/{test}',Test::class)->name('test.report');
    Route::resource('/permission',PermissionController::class);
    Route::resource('/role',RoleController::class);

});

require __DIR__.'/auth.php';
