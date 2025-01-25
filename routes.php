<?php

Route::group(['prefix' => 'api/v1.0'], function() {
    
    Route::group(['prefix' => 'currency'], function() {
        
        Route::get('get-currencies', 'Responsiv\Currency\Api\Controllers\CurrencyApi@getCurrencies');
        
    });

});