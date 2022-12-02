<?php

use App\Http\Controllers\JasaController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Routing\RouteGroup;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/dashboard', function () {
    return view('LandingPage');
})->name('landingpage');


Route::get('/', [App\Http\Controllers\PerolehanController::class, 'homepage'])->name('home');
Route::get('/Medali/{id}', [App\Http\Controllers\PerolehanController::class, 'perolehan'])->name('homemedali');

// Route::get('/', [App\Http\Controllers\JasaController::class, 'landingpage'])->name('landingpage');

// Route::get('/Jasa/{id}', [App\Http\Controllers\JasaController::class, 'show'])->name('detailjasa');


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');



Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/HomeAdmin', [App\Http\Controllers\DashboardController::class, 'index'])->name('admin');

    Route::prefix('event')->group(function () {
        Route::get('/', [App\Http\Controllers\AcaraController::class, 'index'])->name('event');
        Route::get('/AddEvent', [App\Http\Controllers\AcaraController::class, 'create'])->name('tambahEv');
        Route::post('/AddEvent/post', [App\Http\Controllers\AcaraController::class, 'store'])->name('postevent');
        Route::get('/{id}', [App\Http\Controllers\AcaraController::class, 'edit'])->name('editevent');
        Route::put('/edit/{id}', [App\Http\Controllers\AcaraController::class, 'update'])->name('updateevent');
        Route::get('/hapus/{id}', [App\Http\Controllers\AcaraController::class, 'destroy'])->name('hapusevent');
        Route::get('/AddAtlet/{id}', [App\Http\Controllers\AcaraController::class, 'createAtlet'])->name('addAtlet');
        Route::post('/AddAtlet/post', [App\Http\Controllers\AcaraController::class, 'storeAtlet'])->name('postAtlet');
        Route::get('/detail/{id}', [App\Http\Controllers\AcaraController::class, 'detail'])->name('detailAtlet');
        Route::get('/detail/edit/{id}', [App\Http\Controllers\AcaraController::class, 'editAtlet'])->name('editAtlet');
        Route::put('/detail/edit/{id}', [App\Http\Controllers\AcaraController::class, 'updateAtlet'])->name('updateAtlet');
        Route::get('/delete/{id}', [App\Http\Controllers\AcaraController::class, 'destroyAtlet'])->name('hapusAtlet');
    });

    Route::prefix('olahraga')->group(function () {
        Route::get('/', [App\Http\Controllers\olahragaController::class, 'index'])->name('olahraga');
        Route::get('/Add', [App\Http\Controllers\OlahragaController::class, 'create'])->name('addCabor');
        Route::post('/Add/post', [App\Http\Controllers\OlahragaController::class, 'store'])->name('postCabor');
        Route::get('/detail/{id}', [App\Http\Controllers\OlahragaController::class, 'detail'])->name('detailCabor');
        Route::get('/{id}', [App\Http\Controllers\OlahragaController::class, 'edit'])->name('editCabor');
        Route::put('/edit/{id}', [App\Http\Controllers\OlahragaController::class, 'update'])->name('updateCabor');
        Route::get('/hapus/{id}', [App\Http\Controllers\OlahragaController::class, 'destroy'])->name('hapusCabor');
        Route::get('/AddNomor/{id}', [App\Http\Controllers\OlahragaController::class, 'createNomor'])->name('addNomor');
        Route::post('/AddNomor/post', [App\Http\Controllers\OlahragaController::class, 'storeNomor'])->name('postNomor');
        Route::get('/detail/edit/{id}', [App\Http\Controllers\OlahragaController::class, 'editNomor'])->name('editNomor');
        Route::put('/detail/edit/{id}', [App\Http\Controllers\OlahragaController::class, 'updateNomor'])->name('updateNomor');
        Route::get('/delete/{id}', [App\Http\Controllers\OlahragaController::class, 'destroyNomor'])->name('hapusNomor');
    });

    Route::prefix('perolehanMedali')->group(function () {
        Route::get('/', [App\Http\Controllers\PerolehanController::class, 'index'])->name('perolehan');
        Route::get('/{id}', [App\Http\Controllers\PerolehanController::class, 'show'])->name('medali');
        Route::get('/Add/{id}', [App\Http\Controllers\PerolehanController::class, 'create'])->name('addMedali');
        Route::post('/add', [App\Http\Controllers\PerolehanController::class, 'store'])->name('postMedali');
        Route::get('/edit/{id}', [App\Http\Controllers\PerolehanController::class, 'edit'])->name('editMedali');
        Route::put('/update/{id}', [App\Http\Controllers\PerolehanController::class, 'update'])->name('updateMedali');
        Route::get('/hapus/{id}', [App\Http\Controllers\PerolehanController::class, 'destroy'])->name('hapusMedali');
    });
});


Route::middleware(['auth', 'role:operator'])->group(function () {
    Route::get('/HomeOperator', [App\Http\Controllers\DashboardController::class, 'index1'])->name('operator');

    Route::prefix('biodata')->group(function () {
        Route::get('/', [App\Http\Controllers\BiodataMHSController::class, 'index'])->name('biodata');
        Route::put('/update', [App\Http\Controllers\BiodataMHSController::class, 'update'])->name('updatebiodata');
    });

    Route::prefix('PerolehanMedali')->group(function () {
        Route::get('/', [App\Http\Controllers\PerolehanController::class, 'indexOperator'])->name('perolehan1');
        Route::get('/{id}', [App\Http\Controllers\PerolehanController::class, 'showOperator'])->name('medali1');
        Route::get('/Add/{id}', [App\Http\Controllers\PerolehanController::class, 'createOperator'])->name('addMedali1');
        Route::post('/add', [App\Http\Controllers\PerolehanController::class, 'storeOperator'])->name('postMedali1');
        Route::get('/edit/{id}', [App\Http\Controllers\PerolehanController::class, 'editOperator'])->name('editMedali1');
        Route::put('/update/{id}', [App\Http\Controllers\PerolehanController::class, 'updateOperator'])->name('updateMedali1');
        Route::get('/hapus/{id}', [App\Http\Controllers\PerolehanController::class, 'destroyOperator'])->name('hapusMedali1');
    });
});


Route::get('/olahraga-select', [\App\Http\Controllers\PerolehanController::class, 'select'])->name('olahraga.select');
Route::get('/nomor-select', [\App\Http\Controllers\PerolehanController::class, 'select1'])->name('nomor.select');
Route::get('/atlet-select', [\App\Http\Controllers\PerolehanController::class, 'select2'])->name('atlet.select');
Route::get('/search', [\App\Http\Controllers\PerolehanController::class, 'select3'])->name('search-select');
