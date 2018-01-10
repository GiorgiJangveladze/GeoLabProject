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
Route::get('/',['uses' => 'HomeController@index','as' => 'home']);
Route::post('/','HomeController@subscriberRequest');
Route::group(['middleware' =>'guest'],function()
{
	Route::get('/registration',['uses'=>'Auth\RegisterController@showRegistrationForm','as' => 'registration']);
	Route::post('/registration','Auth\RegisterController@register');
	Route::get('/login',['uses'=>'Auth\LoginController@showLoginForm','as' => 'login']);
	Route::post('/login','Auth\LoginController@login');
});

Route::group(['middleware' =>'auth'],function() 
{
	Route::get('/account',['uses' => 'AccountController@index','as'=>'account']);	
	Route::get('/logout',['uses'=> 'Admin\AccountController@logout','as' => 'logout']);

	Route::group(['middleware' => 'admin','prefix' => 'admin'],function()
	{
		Route::get('/',['uses' => 'Admin\AccountController@index','as' => 'admin']);

		//slider 
		Route::get('/slides',['uses' => 'Admin\SliderController@index','as' => 'slides']);
		Route::get('/slides/add',['uses' => 'Admin\SliderController@addSlide','as' => 'slidesAdd']);
		Route::post('/slides/add','Admin\SliderController@addRequestSlide');
		Route::get('/slides/edit/{id}',['uses' => 'Admin\SliderController@editSlide','as' => 'editSlide'])->where('id','\d+');
		Route::post('/slides/edit/{id}','Admin\SliderController@editRequestSlide');
		Route::delete('/slides/delete',['uses' => 'Admin\SliderController@deleteSlide','as' => 'slideDelete']);
		
		//services 
		Route::get('/services',['uses' => 'Admin\ServicesController@index','as' => 'services']);
		Route::get('/services/add',['uses' => 'Admin\ServicesController@addService','as' => 'addService']);
		Route::post('/services/add','Admin\ServicesController@addRequestService');
		Route::get('/services/edit/{id}',['uses' => 'Admin\ServicesController@editService','as' => 'editService'])->where('id','\d+');
		Route::post('/services/edit/{id}','Admin\ServicesController@editRequestService');
		Route::delete('/services/delete',['uses' => 'Admin\ServicesController@deleteService','as' => 'serviceDelete']);
		
		//social links
		Route::get('/social_links',['uses' => 'Admin\SocialLinksController@index','as' => 'social_links']);
		Route::get('/social_links/add',['uses' => 'Admin\SocialLinksController@addSocial_link','as' => 'addSocial_link']);
		Route::post('/social_links/add','Admin\SocialLinksController@addRequestSocial_link');
		Route::get('/social_links/edit/{id}',['uses' => 'Admin\SocialLinksController@editSocial_link','as' => 'editSocial_link'])->where('id','\d+');
		Route::post('/social_links/edit/{id}','Admin\SocialLinksController@editRequestSocial_link');
		Route::get('/subscribers',['uses' => 'Admin\SubscribersController@index','as' => 'subscribers']);

	});
});
