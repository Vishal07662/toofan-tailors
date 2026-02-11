<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Middleware\RoleMiddleware;

use App\Models\User;

Route::middleware(['auth', 'role:'.User::USER_ROLE_SUPER_ADMIN.','.User::USER_ROLE_ADMIN])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'create'])->name('dash');
        Route::resource('/orders', OrderController::class);
    }
);
