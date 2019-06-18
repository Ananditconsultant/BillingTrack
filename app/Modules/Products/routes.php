<?php

/**
 * This file is part of BillingTrack.
 *
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

Route::group(['middleware' => ['web', 'auth.admin'], 'namespace' => 'BT\Modules\Products\Controllers'], function () {
		//products
	    Route::group(['prefix' => 'products'], function () {
		    Route::get('/', ['uses' => 'ProductController@index', 'as' => 'products.index']);
		    Route::get('{id}/edit', ['uses' => 'ProductController@edit', 'as' => 'products.edit']);
		    Route::put('{id}/edit', ['uses' => 'ProductController@update', 'as' => 'products.update']);
		    Route::get('create', ['uses' => 'ProductController@create', 'as' => 'products.create']);
		    Route::post('create', ['uses' => 'ProductController@store', 'as' => 'products.store']);

            Route::get('products/ajax/get_product/{vendorId}', ['uses' => 'ProductController@getProduct', 'as' => 'products.ajax.getProduct']);
            Route::post('products/ajax/process_product', ['uses' => 'ProductController@processProduct', 'as' => 'products.ajax.processProduct']);
            Route::get('products/ajax/product', ['uses' => 'ProductController@ajaxProduct', 'as' => 'products.ajax.product']);
        });
});
