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

Route::group(['middleware' => 'auth'], function () {

	Route::get('/dashboard', 'DashboardController@gotoDashboard')->middleware('role:A|S');


	//-------------------------Admin Panel-----------------------
	Route::group(['middleware' => 'role:A'], function () {

		// consumer route
		Route::get('/tab/consumer', 'ConsumerController@chartConsumer');
		Route::get('/tab/consumer/view/{name}/{id}', 'ConsumerController@viewConsumer');

		// company user route
		Route::get('/tab/company', 'CompanyController@chartCompany');
		Route::get('/tab/company/add',  ['uses'=>'CompanyController@addCompany', 'as'=> 'addCompany']);
		Route::get('/tab/company/edit/{name}/{id}', 'CompanyController@editCompany');
		Route::get('/tab/company/view/{name}/{id}', 'CompanyController@viewCompany');
		Route::post('/tab/company/update', 'CompanyController@updateCompany');
		Route::get('/tab/company/delete/{id}', 'CompanyController@destroyCompany');
		Route::post('getState', 'CompanyController@getState');
		Route::post('getCity', 'CompanyController@getCity');
		Route::post('/tab/company/create', 'CompanyController@createCompany');

		// category rout
		
		Route::get('/tab/category', 'CategoryController@chartCategory');
		Route::get('/tab/category/add',  ['uses'=>'CategoryController@addCategory', 'as'=> 'addCategory']);
		Route::post('/tab/category/create', 'CategoryController@createCategory');
		Route::post('getSubCategories', 'CategoryController@getSubCategories');
		Route::get('/tab/subcategory/add/{cat_id}',  ['uses'=>'CategoryController@addsubCategory']);
		Route::post('/tab/subcategory/create', 'CategoryController@createSubCategory');
		Route::get('tab/category/edit/{name}/{id}', 'CategoryController@editCategory');
		Route::post('updateCategory', 'CategoryController@updateCategory');
		Route::post('category/delete', 'CategoryController@deleteCategory');

		// product route
		 
		Route::get('/tab/product', 'ProductController@chartProduct');
		Route::get('/tab/product/add',  ['uses'=>'ProductController@addProduct', 'as'=> 'addProduct']);
		Route::post('/createProduct', 'ProductController@createProduct');
		
	});

	//-------------------------Vendor Panel-----------------------


	// ------------------------Settings---------------------------

	// Change Password for all
	Route::get('passwordChange', 'SettingsController@passwordChange');
	Route::post('updatePassword', 'SettingsController@updatePassword');

});

