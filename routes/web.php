<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PortofolioController;
use App\Http\Controllers\Admin\ProjectController;
use App\Models\Project;

Route::get('/', function () {
    $projects = Project::latest()->get();
    return view('login', compact('projects'));
});

Route::get('/dashboard', function () {
    $projects = Project::latest()->get();
    return view('dashboard', compact('projects'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('admin.dashboard');
});

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('portofolio', PortofolioController::class);
});

Route::middleware(['auth'])->group(function () {

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::resource('/admin/portfolio', PortofolioController::class);
});

Route::get('/', [PortofolioController::class, 'index']);
Route::post('/contact', [PortofolioController::class, 'storeContact']);

Route::middleware(['auth'])->prefix('admin')->group(function(){

    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');

    Route::resource('projects', ProjectController::class);

});

Route::post('/contact', [PortofolioController::class, 'storeContact']);


require __DIR__.'/auth.php';
