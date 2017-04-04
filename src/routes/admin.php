<?php

Route::resource('genders', \Myrtle\Core\Genders\Http\Controllers\Administrator\GenderController::class, ['except' => ['show']]);

Route::group(['prefix' => 'docks/genders', 'as' => 'docks.genders.'], function() {
    Route::get('seed', [ 'uses' => \Myrtle\Core\Genders\Http\Controllers\Administrator\GendersSeedController::class.'@create', 'as' => 'seed.create' ]);
    Route::post('seed', [ 'uses' => \Myrtle\Core\Genders\Http\Controllers\Administrator\GendersSeedController::class.'@store', 'as' => 'seed.store' ]);
});