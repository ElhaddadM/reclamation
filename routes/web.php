<?php

use App\Models\Reclamation;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReclamationController;

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
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     $Reclamations =  Reclamation::all();
//     return  \view('dashboard')->with('Reclamations' ,$Reclamations);
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard',[ReclamationController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard/update/{reclamation} ',[ReclamationController::class, 'show'])->middleware(['auth', 'verified'])->name('dashboard.update');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::resource('reclamation', ReclamationController::class);
Route::Post('reclamation/valider', [ReclamationController::class,'valider'])->name('reclamation.valider');
Route::PUT('reclamation/{id}', [ReclamationController::class,'updateReclamation'])->name('reclamation.updateReclamation');


Route::get('recl', [ReclamationController::class,'getReclamation'])->name('reclamation.getReclamation');
