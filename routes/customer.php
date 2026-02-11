<?php

use App\Http\Controllers\Admin\OrderController;
use App\Models\User;


Route::middleware(['auth', 'role:'.User::USER_ROLE_ADMIN])
    ->prefix('account')
    ->name('customer.')
    ->group(function () {

        // Route::get('/orders', ...);
});
