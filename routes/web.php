<?php

use App\Http\Controllers\PermissionController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SystemAdministration\AdminController;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Authenticated Routes Group
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard Route
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // About Page
    Route::get('/about', fn () => Inertia::render('About'))->name('about');

    // Users Index
    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    // Profile Routes
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Resourceful Routes
    Route::resource('skills', SkillController::class);
    Route::resource('projects', ProjectController::class);

    // System Administration Routes with Admin Role Middleware
    Route::group(['middleware' => 'role:Admin', 'prefix' => 'admin'], function () {

        Route::controller(AdminController::class)->group( function() {
            Route::get('/system-administration', 'index')->name('admin.index');
            Route::get('/system-administration/create', 'create')->name('admin.create');
            Route::post('/system-administration', 'store')->name('admin.store');
            Route::get('/system-administration/{user}/edit', 'edit')->name('admin.edit');
            Route::patch('/system-administration/{user}', 'update')->name('admin.update');
        });

        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
    });

});

require __DIR__.'/auth.php';
