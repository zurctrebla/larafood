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
Route::prefix('admin')
        ->namespace('Admin')
        ->group(function(){

    /**
     * Permission x Profiles
     */
    Route::post('profiles/{id}/permissions', 'ACL\PermissionProfileController@attachPermissionsProfile')->name('profiles.permissions.attach');
    Route::get('profiles/{id}/permissions/create', 'ACL\PermissionProfileController@permissionsAvailable')->name('profiles.permissions.available');
    Route::get('profiles/{id}/permissions', 'ACL\PermissionProfileController@permissions')->name('profiles.permissions');

    /**
     * Routes Permissions
     */
    Route::any('permissions/search', 'ACL\PermissionController@search')->name('permissions.search');
    Route::resource('permissions', 'ACL\PermissionController');

    /**
     * Routes Profiles
     */
    Route::any('profiles/search', 'ACL\ProfileController@search')->name('profiles.search');
    Route::resource('profiles', 'ACL\ProfileController');

    /**
     * Routes Details Plans
     */
    Route::get('plans/{url}/details', 'DetailPlanController@index')->name('details.plans.index');

    /**
     * Routes Plans
     */
    Route::get('plans/create', 'PlanController@create')->name('plans.create');
    Route::put('plans/{url}', 'PlanController@update')->name('plans.update');
    Route::get('plans/{url}/edit', 'PlanController@edit')->name('plans.edit');
    Route::any('plans/search', 'PlanController@search')->name('plans.search');
    Route::delete('plans/{url}', 'PlanController@destroy')->name('plans.destroy');
    Route::get('plans/{url}', 'PlanController@show')->name('plans.show');
    Route::post('plans', 'PlanController@store')->name('plans.store');
    Route::get('plans', 'PlanController@index')->name('plans.index');

    /**
     * Routes Dashboard
     */
    Route::get('/', 'PlanController@index')->name('admin.index');
});

// Route::get('admin/plans/create', 'Admin\PlanController@create')->name('plans.create');
// Route::put('admin/plans/{url}', 'Admin\PlanController@update')->name('plans.update');
// Route::get('admin/plans/{url}/edit', 'Admin\PlanController@edit')->name('plans.edit');
// Route::any('admin/plans/search', 'Admin\PlanController@search')->name('plans.search');
// Route::delete('admin/plans/{url}', 'Admin\PlanController@destroy')->name('plans.destroy');
// Route::get('admin/plans/{url}', 'Admin\PlanController@show')->name('plans.show');
// Route::post('admin/plans', 'Admin\PlanController@store')->name('plans.store');
// Route::get('admin/plans', 'Admin\PlanController@index')->name('plans.index');

// Route::get('admin', 'Admin\PlanController@index')->name('admin.index');

Route::get('/', function () {
    return view('welcome');
});
