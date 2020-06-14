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


Route::group(['namespace' => 'BackEnd','prefix' => 'admin'],function (){
	Route::group(['middleware' => ['auth:admin']], function () {

	Route::get('/home', 'HomeController@index')->name('dashboard.index');
	Route::resource('/categories', 'CategoryController');
	Route::resource('/admins', 'AdminController');
	Route::get('/all', 'AdminController@index')->name('admins.index');
	Route::resource('/settings', 'SettingController');
	Route::resource('/sizes', 'SizeController');
	Route::resource('/colors', 'ColorController');
	Route::resource('/brands', 'BrandController');
	Route::resource('/products', 'ProductController');
	Route::resource('messages','MessageController');
	Route::resource('users','UserController');
	Route::post('messeges/replay/{id}', 'MessageController@replay')->name('message.replay');
	Route::post('product/comments','ProductController@commentStore')->name('comment.store');	
	Route::delete('comments/delete/{id}','ProductController@destroyComment')->name('comment.destroy');
	Route::post('comments/update/{id}','ProductController@UpdateComment')->name('comment.update');


	Route::middleware('auth')->group(function(){
	Route::get('/profile/{id}/{slug?}', 'AdminController@profile')->name('profile.index');
	Route::put('/profile/update/', 'AdminController@Updateprofile')->name('profile.update');
});


	Route::get('logout','LoginController@logout')->name('logout');
});
	//login routes
	Route::get('/login','LoginController@login')->name('admin.login');
	Route::post('login','LoginController@store')->name('login.store'); 

});
  
  //front-end routes
  Route::get('/home','HomeController@index')->name('home'); 
  Route::get('/','HomeController@welcome')->name('landing.index'); 
  Route::get('/product/{id}/{slug?}','HomeController@product')->name('landing.product'); 
  Route::get('/category/{id}/{slug?}', 'HomeController@category')->name('product.category');
  Route::get('/contact', 'HomeController@showMessege')->name('contact.create');
  Route::post('/contact/store', 'HomeController@storeMessege')->name('contact.store');
  Route::resource('cart', 'CartController');
  Route::delete('cart/destroy/{id}', ['as' => 'cart.destroy' , 'uses' => 'CartController@destroy']);
  Route::get('/profile/{id}/{slug?}', 'HomeController@profile')->name('front.profile');	
  Route::get('/shop', 'HomeController@shop')->name('shop');  
 
  //user Registration
  Route::get('/user/register','RegisterController@index')->name('userRegiater');
  Route::post('/user/register','RegisterController@store')->name('user.register');

   //user login
  Route::get('user/login','UserLoginController@index')->name('userLogin');
  Route::post('user/login','UserLoginController@store')->name('user.login');
  Route::post('user/logout','UserLoginController@logout')->name('user.logout');

  //user Reset Password Routs
  Route::post('user/password/email','userAuth\ForgotPasswordController@sendResetLinkEmail')->name('user.password.email');
  Route::get('user/password/reset','userAuth\ForgotPasswordController@showLinkRequestForm')->name('user.password.request');
  Route::post('user/password/reset','userAuth\ResetPasswordController@reset');
  Route::get('user/password/reset/{token}','userAuth\ResetPasswordController@showResetForm')->name('user.password.reset');

  Route::middleware('auth')->group(function(){
  Route::post('/comments/{id}/create', 'HomeController@commentStore')->name('front.commentStore');
  Route::post('/comments/{id}', 'HomeController@commentUpdate')->name('front.comment.update');
  Route::get('/profile', 'HomeController@profileUpdate')->name('profile.update');

});


 Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
