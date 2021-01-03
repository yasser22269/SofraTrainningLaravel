<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

     const CountPaginate = 20;



// Route::group(['namespace'=>'Admin','prefix' => 'Admin','middleware' => 'guest:admins'], function(){
//         Route::get('slogin' ,'LoginController@getLogin')->name('get.admin.login');
//         Route::post('slogin' ,'LoginController@login')->name('admin.login');
// });

Route::group(['namespace' => 'Admin','prefix' => 'Admin' ],function () {
                                                    //,'middleware' =>['auth','ActiveAuth']

    Route::get('/', 'AdminHomeController@index')->name('Admin');

  //  Route::resource('/users','ClientController');

    Route::resource('/users', 'ClientController', array("as"=>"Admin"));
    Route::resource('/addresses', 'AddressController', array("as"=>"Admin"));
     Route::resource('cities', 'CityController', array("as"=>"Admin"));
      Route::resource('Products', 'ProductController', array("as"=>"Admin"));
     Route::resource('categories', 'CategoryController', array("as"=>"Admin"));
     Route::resource('contacts', 'ContactController', array("as"=>"Admin"));
     Route::resource('setting', 'SettingController', array("as"=>"Admin"))->only('index','update');

      Route::resource('products', 'ProductController', array("as"=>"Admin"));
      Route::resource('offers', 'OfferController', array("as"=>"Admin"));
      Route::resource('Orders', 'OrderController', array("as"=>"Admin"));

     //Start changePassword
     Route::get('changePassword', 'AdminHomeController@changePassword')->name('Admin.changePasswordindex');
     Route::post('changePassword', 'AdminHomeController@changePasswordupdate', array("as"=>"Admin"))->name('changePasswordupdate');
    //End changePassword



     //Route::resource('Blood_Types', 'Blood_TypeController', array("as"=>"Admin"));'update','index'
    // Route::resource('client_post', 'Client_postController');
    // Route::resource('notification', 'NotificationController');
    // Route::resource('client_notification', 'Client_notificationController');
    // Route::resource('client_governorates', 'Client_governoratesController');
    // Route::resource('blood_type_client', 'Blood_type_clientController');


});
