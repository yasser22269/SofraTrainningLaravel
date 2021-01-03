<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Api'], function() {
    Route::post('registerClient','AuthController@registerClient');
    Route::post('loginClient','AuthController@loginClient');
    Route::post('registerRestaurant','AuthController@registerRestaurant');
    Route::post('loginRestaurant','AuthController@loginRestaurant');
    //Start newpassword Client
    Route::post('resetPass','AuthController@resetPass');
    Route::post('newpassword','AuthController@newpassword');
    //End newpassword Client


       //Start cities
    Route::get('cities','generalController@cities');
    Route::get('address','generalController@address');
       //End cities


    //Start Contact
    Route::get('categories','generalController@categories');
    //End Contact

     //Start settings && aboat_us
     Route::get('settings','generalController@settings');
     Route::get('aboat-us','generalController@aboat_us');
     //End settings && aboat_us


     //Start Products
     Route::get('Products','ApiProductController@Products');
     Route::get('offers','ApiProductController@offers');
     //End Products

    //Start Notification
    Route::get('Notification','generalController@Notification');
    //End Notification

    //////////////////////////start api:client//////////////////////////

    Route::group(['middleware' => 'auth:api'/*client*/], function () {
    //Start profile
    Route::get('getprofileClient','MainClientController@getprofileClient');
    Route::post('UpdateprofileClient','MainClientController@UpdateprofileClient');
    //End profile

    //////////////////////////Start generalController//////////////////////////



    //Start Contact
    Route::post('contacts','generalController@contacts');
    //End Contact


        //----------------------
		Route::post('new-order', 'ApiOrderController@newOrder');
		Route::get('order-details/{id}', 'ApiOrderController@orderDetails');
		Route::get('my-orders/{client_id}', 'ApiOrderController@myOrders');
        Route::get('client-confirm-order/{order_id}', 'ApiOrderController@clientconfirmOrder');
		Route::get('client-Reject-order/{order_id}', 'ApiOrderController@clientRejectedOrder');
		//----------------------


        //Start token
    Route::post('client-register-token', 'TokenController@clientRegisterToken');
	Route::post('client-remove-token', 'TokenController@clientRemoveToken');
        //End token

    //////////////////////////END api:client//////////////////////////
    });


        //////////////////////////start res-api//////////////////////////


    Route::group(['middleware' => 'auth:res-api'], function () {
        //Start profile
        Route::get('getprofileRestaurants','MainRestaurantsController@getprofileRestaurants');
        Route::post('UpdateprofileRestaurants','MainRestaurantsController@UpdateprofileRestaurants');
        //End profile


        //Start Product And Offers
        Route::post('Product','ApiProductController@ProductCreate');
        Route::get('Product/{id}','ApiProductController@Product');
        Route::post('Product/{id}','ApiProductController@DeleteOffer');

        Route::post('Offer','ApiProductController@OfferCreate');
        Route::get('Offer/{id}','ApiProductController@Offer');
        Route::post('Offer/{id}','ApiProductController@UpdateOffer');

        //End Product And Offers


        	//----------------------
		Route::get('res-order', 'ApiOrderController@resOrder');
		Route::get('restaurant-accepted-order', 'ApiOrderController@restaurantAcceptedOrder');
		Route::get('restaurant-delivered-order', 'ApiOrderController@restaurantConfirmOrder');
		//----------------------



        //Start Notification
        // Route::get('Notification','generalRestaurantsController@Notification');
        //End Notification



        });

    //////////////////////////END res-api//////////////////////////










});





