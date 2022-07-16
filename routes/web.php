<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\CustomerManagerController;
use App\Http\Controllers\DeliviryManagerController;
use App\Http\Controllers\RestaurantManagerController;
use App\Http\Controllers\RestaurantManager\MealController;
use App\Http\Controllers\DeliveryManager\DMOrderController;
use App\Http\Controllers\RestaurantManager\OfferController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\RestaurantManager\RMOrderController;
use App\Http\Controllers\RestaurantManager\CategoryController;



// First route group for Localization which is for switch between languages
Route::group([
    'prefix' => LaravelLocalization::setlocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    // this for middleware so you can swap between lang and force to be a lang if it deleted will be back.
], function () {
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
    // Admin Routes
    Auth::routes();

    Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'check']], function () {
        //index route for Admin
        Route::get('/index', [AdminController::class, 'index'])->name('admin_index');
        //Restaurant Manager Routes
        Route::get('/add-restaurant-manager', [RestaurantManagerController::class, 'create'])->name('admin_add_res_manager');
        Route::post('/store-restaurant-manager', [RestaurantManagerController::class, 'store'])->name('admin_store_res_manager');
        Route::get('/restaurant-managers', [RestaurantManagerController::class, 'index'])->name('admin_res_manager_list');
        Route::post('/search-restaurant-managers', [RestaurantManagerController::class, 'search_Restaurant_Manager'])->name('search_Restaurant_Manager');
        Route::get('/edit-restaurant-manager/{id}', [RestaurantManagerController::class, 'edit'])->name('admin_edit_res_manager');
        Route::post('/update-restaurant-manager/{id}', [RestaurantManagerController::class, 'update'])->name('admin_update_res_manager');
        Route::get('/delete-restaurant-manager/{id}', [RestaurantManagerController::class, 'destroy'])->name('admin_delete_res_manager');
        //Delivery Manager Routes
        Route::get('/deliviry-managers', [DeliviryManagerController::class, 'index'])->name('admin_deliviry_manager_list');
        Route::post('/search-deliviry-managers', [DeliviryManagerController::class, 'search_Delivery_Manager'])->name('search_Delivery_Manager');
        Route::get('/add-deliviry-manager', [DeliviryManagerController::class, 'create'])->name('admin_add_deliviry_manager');
        Route::post('/store-delivery-manager', [DeliviryManagerController::class, 'store'])->name('admin_store_delivery_manager');
        Route::get('/edit-delivery-manager/{id}', [DeliviryManagerController::class, 'edit'])->name('admin_edit_deliviry_manager');
        Route::post('/update-delivery-manager/{id}', [DeliviryManagerController::class, 'update'])->name('admin_update_delivery_manager');
        Route::get('/delete-delivery-manager/{id}', [DeliviryManagerController::class, 'destroy'])->name('admin_delete_deliviry_manager');
        //Customer Routes
        Route::get('/Customers', [CustomerManagerController::class, 'index'])->name('admin_customer_manager_list');
        Route::post('/Search-Customer', [CustomerManagerController::class, 'search_customer'])->name('search_customers');
        Route::get('/ban-unban/{id}', [CustomerManagerController::class, 'ban_unbad_customer'])->name('ban_unbad_customer');
        //Restaurants Routes
        Route::get('/Restaurants', [RestaurantController::class, 'index'])->name('admin_restaurant_list');
        Route::post('/Search-Restaurants', [RestaurantController::class, 'search_Restaurant'])->name('search_Restaurant');
        Route::get('/Add-resaturant/{id}', [RestaurantController::class, 'Create'])->name('admin_add_resaturant');
        Route::post('/store-resaturant/{id}', [RestaurantController::class, 'store'])->name('admin_store_resaturant');
        Route::get('/Edit-resaturant/{id}', [RestaurantController::class, 'edit'])->name('admin_edit_resaturant');
        Route::post('/Update-resaturant/{id}', [RestaurantController::class, 'update'])->name('admin_update_resaturant');
        Route::get('/Delete-resaturant/{id}', [RestaurantController::class, 'destroy'])->name('admin_delete_resaturant');
        //Delivery Offices Routes
        Route::get('/Delivery-Offices', [DeliveryController::class, 'index'])->name('admin_delivery_list');
        Route::post('/search-deliviry-offices', [DeliveryController::class, 'search_Delivery_Office'])->name('search_Delivery_Office');
        Route::get('/Add-Delivery-Office/{id}', [DeliveryController::class, 'create'])->name('admin_add_delivery');
        Route::post('/Store-Delivery-Office/{id}', [DeliveryController::class, 'store'])->name('admin_store_delivery');
        Route::get('/Edit-Delivery-Office/{id}', [DeliveryController::class, 'edit'])->name('admin_edit_delivery');
        Route::post('/Update-Delivery-Office/{id}', [DeliveryController::class, 'update'])->name('admin_update_delivery');
        Route::get('/Delete-Delivery-Office/{id}', [DeliveryController::class, 'destroy'])->name('admin_delete_delivery');
        //Notifications Routes
        Route::get('/Notifications', [NotificationController::class, 'index'])->name('admin_notification_list');
        Route::post('/Search-Notifications', [NotificationController::class, 'search_Notification'])->name('search_Notification');
        Route::get('/Add-Notification', [NotificationController::class, 'create'])->name('admin_add_notification');
        Route::post('/Store-Notification', [NotificationController::class, 'store'])->name('admin_store_notification');
        Route::get('/Edit-Notification/{id}', [NotificationController::class, 'edit'])->name('admin_edit_notification');
        Route::post('/Update-Notification/{id}', [NotificationController::class, 'update'])->name('admin_update_notification');
        Route::get('/Delete-Notification/{id}', [NotificationController::class, 'destroy'])->name('admin_delete_notification');
    });
    // Restaurant Manager Routes
    Route::group(['prefix' => 'Restaurant-Manager', 'middleware' => ['auth', 'check']], function () {
        // Restaurant Manager Dashboard  Routes
        Route::get('/Home', [RestaurantController::class, 'RM_index'])->name('RM_Home');
        Route::get('/Edit-Restaurant/{id}', [RestaurantController::class, 'RM_edit'])->name('RM_Edit');
        Route::post('/Update-Restaurant/{id}', [RestaurantController::class, 'RM_update'])->name('RM_Update');
        // Restaurant Manager Profile Routes
        Route::get('/Profile', [RestaurantManagerController::class, 'RM_Profile'])->name('RM_Profile');
        Route::get('/Edit-Profile/{id}', [RestaurantManagerController::class, 'RM_Edit_Profile'])->name('RM_Edit_Profile');
        Route::post('/update-Profile/{id}', [RestaurantManagerController::class, 'RM_Update_Profile'])->name('RM_Update_Profile');
        // Category Route
        Route::get('/Categories', [CategoryController::class, 'index'])->name('RM_Categories');
        Route::post('/Category-search', [CategoryController::class, 'category_search'])->name('RM_Category_Search');
        Route::post('/Store-category', [CategoryController::class, 'store'])->name('RM_store_category');
        Route::post('/Update-category/{id}', [CategoryController::class, 'update'])->name('RM_update_category');
        Route::get('/delete-category/{id}', [CategoryController::class, 'destroy'])->name('RM_delete_category');
        // Meals Routes
        Route::get('/Meals', [MealController::class, 'index'])->name('RM_Meals');
        Route::post('/search_Meals', [MealController::class, 'search_Meals'])->name('search_Meals');
        Route::get('/Add-Meal', [MealController::class, 'create'])->name('RM_create_meal');
        Route::post('/Store-Meal', [MealController::class, 'store'])->name('RM_store_meal');
        Route::get('/Edit-Meal/{id}', [MealController::class, 'edit'])->name('RM_edit_meal');
        Route::post('/Update-Meal/{id}', [MealController::class, 'update'])->name('RM_update_meal');
        Route::get('/delete-Meal/{id}', [MealController::class, 'destroy'])->name('RM_delete_meal');
        //Offers Routes
        Route::get('/Offers', [OfferController::class, 'index'])->name('RM_offers');
        Route::post('/search', [OfferController::class, 'search_Offer'])->name('RM_search_Offer');
        Route::get('/Add-Offer', [OfferController::class, 'create'])->name('RM_add_offer');
        Route::post('/Store-Offer', [OfferController::class, 'store'])->name('RM_store_offer');
        Route::get('/Get-meals-by-category', [OfferController::class, 'getMealsByCategory'])->name('RM_get_Meal');//this for ajax in add offer page.
        Route::get('/Get-meals-by-category-edit', [OfferController::class, 'getMealsByCategoryEdit'])->name('RM_get_Meal_edit');//this for ajax in edit offer page.
        Route::get('/Edit-Offer/{id}', [OfferController::class, 'edit'])->name('RM_edit_offer');
        Route::post('/Edit-Offer/{id}', [OfferController::class, 'update'])->name('RM_update_offer');
        Route::get('/Delete-Offer/{id}', [OfferController::class, 'destroy'])->name('RM_delete_offer');
        //Restaurant Orders Routes
        Route::get('/Restaurant-Orders', [RMOrderController::class, 'index'])->name('RM_orders');
        Route::get('/take_order/{id}', [RMOrderController::class, 'take_order'])->name('RM_take_order');
        Route::get('/prepare_order/{id}', [RMOrderController::class, 'prepare'])->name('RM_Prepare_order');
        Route::get('/ready_order/{id}', [RMOrderController::class, 'ready'])->name('RM_Ready_order');
//        Route::post('/delivering_order/{id}', [RMOrderController::class, 'delivering'])->name('RM_delivering_order');
        Route::get('/Current-Restaurant-Orders', [RMOrderController::class, 'current_orders'])->name('RM_current_orders');
        Route::post('/search-Orders', [RMOrderController::class, 'search_Orders'])->name('RM_search_orders');
        Route::get('/Restaurant-Orders-History', [RMOrderController::class, 'history'])->name('RM_orders_history');
    });
    // Delivery Manager Routes
    Route::group(['prefix' => 'Delivery-Manager', 'middleware' => ['auth', 'check']], function () {
        // Delivery Manager Dashboard  Routes
        Route::get('/Home', [DeliveryController::class, 'DM_index'])->name('DM_Home');
        Route::get('/Edit-DeliveryOffice/{id}', [DeliveryController::class, 'DM_edit'])->name('DM_Edit');
        Route::post('/Update-DeliveryOffice/{id}', [DeliveryController::class, 'DM_update'])->name('DM_Update');
        // Delivery Manager Profile Routes
        Route::get('/Profile', [DeliviryManagerController::class, 'DM_Profile'])->name('DM_Profile');
        Route::get('/Edit-Profile/{id}', [DeliviryManagerController::class, 'DM_Edit_Profile'])->name('DM_Edit_Profile');
        Route::post('/Update-Profile/{id}', [DeliviryManagerController::class, 'DM_Update_Profile'])->name('DM_Update_Profile');
        // Delivery-Orders Routes
        Route::get('/Delivery-Orders', [DMOrderController::class, 'index'])->name('DM_orders');
        Route::get('/Delivering-Order/{id}', [DMOrderController::class, 'delivering_order'])->name('RM_delivering_order');
        Route::get('/Delivery-Orders-History', [DMOrderController::class, 'history'])->name('DM_orders_history');
        Route::post('/search-Orders-History', [DMOrderController::class, 'search_orders'])->name('DM_search_orders');
    });
});
