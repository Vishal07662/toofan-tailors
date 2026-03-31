<?php

use App\Http\Controllers\Admin\OrderController;
use App\Models\User;


Route::middleware(['auth']) // no need to check for role in the front office
    ->prefix('account')
    ->name('customer.')
    ->group(function () {

        // Route::get('/orders', ...);
});
