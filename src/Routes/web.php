<?php

use Masfahri\Nutech\Controllers\ItemsController;

Route::group(['middleware'=>'web'], function(){
    Route::put('item/{product_id}/update', [ItemsController::class, 'update']);
    Route::resource('/items', ItemsController::class);
    Route::get('/', [ItemsController::class, 'index']);
});
