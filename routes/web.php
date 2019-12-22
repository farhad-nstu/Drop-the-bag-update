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
    return view('front.index');
})->name('front.home');

Auth::routes();

//Fronts Routes
/*Route::get('/home', 'HomeController@index');*/

Route::get('/home', 'HomeController@front');


//Partners
Route::get('/partner-subscription', 'Front\PartnersController@index')->name('partner-subscription');
Route::post('/partner-subscription/insert', 'Front\PartnersController@store')->name('partner-subscription-insert');

Route::get('/partner-place/{id}', 'Front\PartnersController@partnerPlace')->name('partner-place');
Route::post('/partner-place/{id}', 'Front\PartnersController@partnerSubscription')->name('partner-subscription-complete');


//Destination Routes
Route::get('/city-destination/{city}', 'LocationController@destination')->name('city.destination');
//Luggage storage
Route::get('/luggage-storage/{city}', 'LocationController@luggageStorage')->name('luggage-storage');
//Order
Route::post('/give-order/{loc_id}', 'OrderController@giveOrder')->name('give-order');
// Route::get('/payment/{last_id}', 'OrderController@payment')->name('payment');
// Route::post('/order-paypal/{id}', 'OrderController@paypal')->name('paypal');
Route::get('/user-order-list', 'OrderController@allOrder')->name('userOrderList');
Route::get('/user-order-review/{id}', 'OrderController@orderReview')->name('orderReview');
Route::post('/user-order-review/{order_id}', 'OrderController@reviewStore')->name('review-insert');


Route::get('partner-signup-old', 'Admin\PartnersController@index')->name('partner-signup-old');
//Order 
Route::get('order', 'Admin\OrdersController@create')->name('order-create');
Route::post('order-insert', 'Admin\OrdersController@store')->name('order-insert');

//Paypal
Route::get('payment-view/{last_id}', 'PayPalController@paymentView')->name('payment-view');
Route::get('payment', 'PayPalController@payment')->name('payment');
Route::get('payment/cancel', 'PayPalController@cancel')->name('payment.cancel');
Route::get('payment/success', 'PayPalController@success')->name('payment.success');
Route::post('ipn/notify','PayPalController@postNotify');


//Admin Routes
Route::get('/dashboard', 'Admin\HomeController@index')->name('admin.dashboard');


Route::get('/admin/roles', 'Admin\RolesController@index')->name('roles.index');
Route::get('/admin/roles/create', 'Admin\RolesController@create')->name('roles.create');
Route::post('/admin/roles', 'Admin\RolesController@store')->name('roles.store');

Route::get('/admin/users', 'Admin\UsersController@index')->name('users.index');
Route::get('/admin/users/create', 'Admin\UsersController@create')->name('users.create');
Route::post('/admin/users', 'Admin\UsersController@store')->name('users.store');
Route::get('/update/user/status/{id}', 'Admin\UsersController@updateStatus')->name('update.status');

