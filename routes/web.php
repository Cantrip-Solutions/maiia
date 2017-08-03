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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', 'DashboardController@gotoDashboard')->middleware('role:["A"]');


Route::get('/tab/consumer', 'ConsumerController@chartConsumer')->middleware('role:["A"]');
Route::get('/tab/company', 'CompanyController@chartCompany')->middleware('role:["A"]');
Route::get('/tab/category', 'CategoryController@chartCategory')->middleware('role:["A"]');
Route::get('/tab/company/add',  ['uses'=>'CompanyController@addCompany', 'as'=> 'addCompany'])->middleware('role:["A"]');
Route::get('/tab/company/edit/{name}/{id}', 'CompanyController@editCompany');
Route::get('/tab/company/view/{name}/{id}', 'CompanyController@viewCompany');
Route::post('/tab/company/update', 'CompanyController@updateCompany');
Route::get('/tab/company/delete/{id}', 'CompanyController@destroyCompany');
Route::post('getState', 'CompanyController@getState');
Route::post('getCity', 'CompanyController@getCity');
Route::get('/tab/category/add',  ['uses'=>'CategoryController@addCategory', 'as'=> 'addCategory'])->middleware('role:["A"]');

Route::post('/tab/company/create', 'CompanyController@createCompany');
Route::post('/tab/category/create', 'CategoryController@createCategory');
Route::post('getSubCategories', 'CategoryController@getSubCategories');
Route::get('/tab/subcategory/add/{cat_id}',  ['uses'=>'CategoryController@addsubCategory', 'as'=> 'addSubCategories'])->middleware('role:["A"]');