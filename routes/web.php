<?php

use App\Http\Controllers\Configuration\AccessRoleController;
use App\Http\Controllers\Configuration\AccessUser;
use App\Http\Controllers\Configuration\AccessUserController;
use App\Http\Controllers\Configuration\MenuController;
use App\Http\Controllers\Configuration\PermissionController;
use App\Http\Controllers\Configuration\RoleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/master', function () {
    return view('master/index');
})->name('master');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::group(['prefix' => 'configuration', 'as' => 'configuration.'], function () {
        Route::put('menu/sort', [MenuController::class, 'sort'])->name('menu.sort');
        Route::resource('menu', MenuController::class);

        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);

        Route::get('access-role/{role}/role', [AccessRoleController::class, 'getPermissionByRole']);
        Route::resource('access-role', AccessRoleController::class)
            ->except(['create', 'store', 'destroy'])
            ->parameters(['access-role' => 'role']);
        Route::resource('access-user', AccessUserController::class)
            ->except(['create', 'store', 'destroy'])
            ->parameters(['access-user' => 'user']);
        Route::get('access-user/{user}/user', [AccessUserController::class, 'getPermissionByUser']);
    });
});

require __DIR__ . '/auth.php';
