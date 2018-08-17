<?php

/**
 * This file is part of FusionInvoiceFOSS.
 *
 *
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

Route::group(['middleware' => ['web', 'auth.admin'], 'namespace' => 'FI\Modules\Utilities\Controllers'], function ()
{
    Route::get('utilities/manage_trash', ['uses' => 'UtilityController@manageTrash', 'as' => 'utilities.manage_trash']);
    Route::get('utilities/{id}/restore_trash/{entity}', ['uses' => 'UtilityController@restoreTrash', 'as' => 'utilities.restore_trash']);
    Route::get('utilities/{id}/delete_trash/{entity}', ['uses' => 'UtilityController@deleteTrash', 'as' => 'utilities.delete_trash']);
    Route::post('utilities/bulk/delete_trash', ['uses' => 'UtilityController@bulkDeleteTrash', 'as' => 'utilities.bulk.deletetrash']);
    Route::post('utilities/bulk/restore_trash', ['uses' => 'UtilityController@bulkRestoreTrash', 'as' => 'utilities.bulk.restoretrash']);

    //batchprint pdf
    Route::any('batchprint', ['uses' => 'UtilityController@batchPrint', 'as' => 'utilities.batchprint']);

//    Route::get('users/create/{userType}', ['uses' => 'UserController@create', 'as' => 'users.create']);
//    Route::post('users/create/{userType}', ['uses' => 'UserController@store', 'as' => 'users.store']);
//
//    Route::get('users/{id}/edit/{userType}', ['uses' => 'UserController@edit', 'as' => 'users.edit']);
//    Route::post('users/{id}/edit/{userType}', ['uses' => 'UserController@update', 'as' => 'users.update']);
//
//    Route::get('users/{id}/delete', ['uses' => 'UserController@delete', 'as' => 'users.delete']);
//
//    Route::get('users/{id}/password/edit', ['uses' => 'UserPasswordController@edit', 'as' => 'users.password.edit']);
//    Route::post('users/{id}/password/edit', ['uses' => 'UserPasswordController@update', 'as' => 'users.password.update']);
//
//    Route::post('users/client', ['uses' => 'UserController@getClientInfo', 'as' => 'users.clientInfo']);

});