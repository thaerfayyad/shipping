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

Route::group(['prefix' => LaravelLocalization::setLocale() ], function (){

   
       Auth::routes();
   // Route::group(['middleware' => ['web']], function (){

      //Auth::routes(['verify' => true]);
  
         Route::get('logout', 'Auth\LoginController@logout')->name('logout');
        
 Route::resource('contacts','ContactController');
      
       Route::get('about-us', 'HomeController@aboutUs')->name('about');
     Route::get('home', 'HomeController@index')->name('home');
      Route::get('/', 'HomeController@index');
      Route::get('all-services','ServicesController@index')->name('services');

                 Route::resource('order' ,'Site\OrderController');
                  Route::get('getCountriesFrom/{id}', 'Site\OrderController@getCountriesFrom')->name('get-countries-from');
                   Route::get('getCountriesTo/{id}', 'Site\OrderController@getCountriesTo')->name('get-countries-to');
                   Route::get('getPackageTypes/{id}', 'Site\OrderController@getPackageTypes')->name('get-getPackageTypes');
                   Route::get('getShippingMethods/{id}/{zone_id}', 'Site\OrderController@getShippingMethods')->name('get-getShippingMethods');
                Route::get('getShippingPrice/{id}', 'Site\OrderController@getShippingPrice')->name('get-getShippingPrice');

        Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
         // Route::group(['middleware' => ['role:admin']], function () {

                Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard.index');
               
                Route::resource('menu', 'MenuController');
                //Route::get('menu/create/{id?}', 'MenuController@create')->name('menu.create.item');
                Route::post('menu/post/item', 'MenuController@postIndex')
                    ->name('menu.store.item');

                Route::resource('website-menu', 'WebsiteMenuController');
                // Route::get('website-menu/create', 'WebsiteMenuController@create');
                Route::get('website-menu/status/{id}', 'WebsiteMenuController@updateStatus')
                    ->name('website-menu.status');
                Route::post('website-menu/post/item', 'WebsiteMenuController@postIndex')
                    ->name('website-menu.store.item');

                Route::resource('shipping-methods', 'Admin\ShippingMethodController');
                Route::resource('profile', 'Admin\ProfileController');
             Route::resource('settings', 'Admin\SettingController');
              Route::resource('companies', 'Admin\CompanyController');
               Route::resource('members', 'Admin\MemberController');
                Route::resource('orders', 'Admin\OrderController');
                 Route::resource('services', 'Admin\ServiceController');

                  Route::resource('contacts','Admin\ContactController');
                 Route::get('show-orders', 'Admin\OrderController@index')->name('admin.show-orders');
                 Route::post('orders/update-orders/{id}', 'Admin\OrderController@update')->name('update-orders');
                Route::get('/changeStatus', 'Admin\UserController@changeStatus');
                // Route::prefix('manage')
                //     ->name('manage.')->group(function ()  {
                //     Route::resource('roles', 'Admin\RoleController');
                //     Route::resource('users', 'Admin\UserController');

                // });
                 Route::resource('users', 'Admin\UserController');

            });
          // });

            Route::group(['prefix' => 'company', 'middleware' => ['auth']], function ()   {
              // Route::group(['middleware' => ['role:admin|company']], function () {

                Route::resource('packages', 'Company\PackageController');
                Route::resource('zones', 'Company\ZoneController');

                Route::resource('zones-prices', 'Company\ZonePriceController');
                Route::post('zones-prices/insert', 'Company\ZonePriceController@insert')->name('add_prices.insert');

                  // Route::post('zones/insert', 'Company\ZoneController@insert')->name('add_zone.insert');

                   Route::post('zones/insert', 'Company\ZoneCountryController@insert')->name('add_zone.insert');
                Route::resource('profile', 'Company\ProfileController');

                Route::resource('orders', 'Company\OrderController');
                 Route::resource('tracks', 'Company\TrackController')->except('create');
                 Route::get('tracks/create/{id}', 'Company\TrackController@create')->name('create-track');


            // });
});
        Route::group(['prefix' => 'member', 'middleware' => ['auth']], function () {
               // Route::group(['middleware' => ['role:admin|company|member']], function () {
                 Route::resource('profile', 'Member\ProfileController');
                 
                 Route::get('all-orders', 'OrderController@index')->name('all-orders');
                
                 
              Route::get('tracks/{id}','Site\TrackController@index')->name('tracks.index');
              // Route::get('orders/home/{id}','Site\OrderController@index')->name('Order.home');




            // });
 });



//});
});

 Route::get('getCities/', 'HomeController@getCities')->name('get-citites');

  // route for processing payment
        Route::post('paypal', 'PaymentController@payWithpaypal');

// route for check status of the payment
        Route::get('status', 'PaymentController@getPaymentStatus');













