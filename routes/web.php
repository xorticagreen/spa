<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
//Route::get('/admin','\App\Http\Controllers\admin\AdminController')->middleware(['auth', 'verified', 'checkRole'])->name('admin.Main.index');

Route::middleware(['auth', 'verified', 'checkRole'])->group(function () {
    Route::group(['prefix' => 'admin'], function (){

        Route::get('/',\App\Http\Controllers\admin\AdminController::class)->name('admin.Main.index');

        Route::group(['prefix' => 'categories'], function () {
            Route::get('/', \App\Http\Controllers\admin\Category\IndexController::class)->name('admin.categories.index');
            Route::get('/create', \App\Http\Controllers\admin\Category\CreateController::class)->name('admin.categories.create');
            Route::post('/', App\Http\Controllers\admin\Category\StoreController::class)->name('admin.categories.store');
            Route::get('/{id}', App\Http\Controllers\admin\Category\ShowController::class)->name('admin.categories.show');
            Route::get('/edit/{id}', App\Http\Controllers\admin\Category\EditController::class)->name('admin.categories.edit');
            Route::post('/{id}', App\Http\Controllers\admin\Category\UpdateController::class)->name('admin.categories.update');
            Route::get('/{id}/delete', App\Http\Controllers\admin\Category\DestroyController::class)->name('admin.categories.destroy'); //action soft_delete data
            Route::get('/{id}/force-delete', App\Http\Controllers\admin\Category\ForceDestroyController::class)->name('admin.categories.force-destroy');
            Route::get('/restore/{id}', App\Http\Controllers\admin\Category\RestoreController::class)->name('admin.categories.restore');
        });

        Route::group(['prefix' => 'users'], function (){
            Route::get('/', App\Http\Controllers\admin\User\IndexController::class)->name('admin.users.index');
            Route::get('/create', App\Http\Controllers\admin\User\CreateController::class)->name('admin.users.create');
            Route::get('/{id}', App\Http\Controllers\admin\User\ShowController::class)->name('admin.users.show');
            Route::post('/', App\Http\Controllers\admin\User\StoreController::class)->name('admin.users.store');
            Route::get('/edit/{id}', App\Http\Controllers\admin\User\EditController::class)->name('admin.users.edit');
            Route::get('/{id}/delete', App\Http\Controllers\admin\User\DestroyController::class)->name('admin.users.destroy'); //action soft_delete data
            Route::get('/restore/{id}', App\Http\Controllers\admin\User\RestoreController::class)->name('admin.users.restore');
            Route::post('/{id}', App\Http\Controllers\admin\User\UpdateController::class)->name('admin.users.update');
        });

    });
});


Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
