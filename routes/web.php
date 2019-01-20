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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'WelcomeController@index')->name('welcome');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/testcss', function() {
  return view('testcss');
});
Route::resource('/items', 'ItemController');
Route::get('/category_ajax2/{id}', 'ItemController@ajax2')->name('category_ajax2');
Route::get('/category_modal', 'ItemController@showmodal')->name('category_modal');
Route::get('/category_ajax', 'ItemController@ajax')->name('category_ajax');

Route::group(['prefix'=>'settings'], function () {
    Route::resource('/address', 'AddressController',['as' =>'settings'])->except(['show']);
    Route::resource('/account', 'AccountController',['as' =>'settings'])->except(['show']);
    // Route::resource('/color', 'Admin\ColourController',['as' =>'admin']);

});

Route::group(['prefix'=>'admin'], function () {
  //  Route::resource('/articles', 'Admin\ArticlesController',['as' =>'admin']);
    Route::resource('/', 'Admin\AdminDashboardController',['as' =>'admin']);
    Route::resource('/brand', 'Admin\BrandController',['as' =>'admin']);
    Route::resource('/color', 'Admin\ColourController',['as' =>'admin']);
    Route::resource('/condition', 'Admin\ConditionController',['as' =>'admin']);
    Route::resource('/size', 'Admin\SizeController',['as' =>'admin']);
    Route::resource('/categories', 'Admin\CategoryController',['as' =>'admin']);
    Route::resource('/cat_size', 'Admin\CategorySizeController',['as' =>'admin'])->except(['show','index']);
    Route::post('/addsub', 'Admin\CategoryController@addsub')->name('admin.categories.addsub');

});
