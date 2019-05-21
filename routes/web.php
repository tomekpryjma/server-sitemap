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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['auth'])->group(function () {
    /**
     * Get list of servers
     */
    Route::get('/', 'ServerController@index');

    /**
     * Add new server
     */
    Route::post('/servers/add', 'ServerController@create');
    
    /**
     * Delete server
     */
    Route::delete('/servers/delete/{id}', 'ServerController@delete');
    
    
    
    /**
     * Add new site.
     */
    Route::post('/sites/add', 'SiteController@create');
    
    /**
     * Delete a site from the database.
     */
    Route::delete('/sites/delete/{id}', 'SiteController@delete');    
});
