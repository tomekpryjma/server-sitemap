<?php

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

Auth::routes(['register' => false]);

Route::middleware(['auth'])->group(function () {
    /**
     * ======== Servers ========
     */

    /**
     * Get list of servers
     */
    Route::get('/', [
        'uses' => 'ServerController@index',
        'as' => 'server.index'
    ]);


    Route::group(['prefix' => 'server', 'as' => 'server.'], function() {

        /**
         * Add new server
         */
        Route::post('/add', [
            'uses' => 'ServerController@create',
            'as' => 'add'
        ]);
        
        /**
         * Delete server
         */
        Route::delete('/delete/{id}', [
            'uses' => 'ServerController@delete',
            'as' => 'delete'
        ]);
    });
    
    /**
     * ======== Sites ========
     */
    Route::group(['prefix' => 'site', 'as' => 'site.'], function() {

        /**
         * Add new site.
         */
        Route::post('/add', [
            'uses' => 'SiteController@create',
            'as' => 'add'
        ]); 
        
        /**
         * Delete a site from the database.
         */
        Route::delete('/delete/{id}', [
            'uses' => 'SiteController@delete',
            'as' => 'delete'
        ]);
    });

    /**
     * ======== Clients ========
     */
    Route::group(['prefix' => 'client', 'as' => 'client.'], function() {
                
        /**
         * Show a index of clients.
         */
        Route::get('/all', [
            'uses' => 'ClientController@index',
            'as' => 'index'
        ]);

        /**
         * Show a client's details page.
         */
        Route::get('/{id}', [
            'uses' => 'ClientController@show',
            'as' => 'show'
        ]);
    });
});
