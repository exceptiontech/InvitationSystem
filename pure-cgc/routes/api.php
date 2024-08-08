<?php

use App\Http\Controllers\Api\AdvertisingController;
use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\ContactUController;
use App\Http\Controllers\Api\CountriesCitiesController;
use App\Http\Controllers\Api\NotificationsController;
use App\Http\Controllers\Api\QuestionsController;
use App\Http\Controllers\Api\QuestionsSendRequests;
use App\Http\Controllers\Api\SettingAppController;
use App\Http\Controllers\Api\SocialMediaController;
use App\Http\Controllers\Api\StaticPageController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UserFavoritesController;
use App\Http\Controllers\Api\UserRatesController;
use App\Http\Controllers\Api\UsersCarsController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register_login', [UserController::class,'register_login']);
Route::post('forget_pass_user', [UserController::class,'reset_pass']);
Route::get('send_sms', [UserController::class,'send_sms']);

Route::group(['middleware' => 'auth:api'], function(){

    Route::match(['GET','POST'],'resend_activation_code', [UserController::class,'resend_activation_code'])->name('user.resend_activation_code');
    Route::post('activate_account', [UserController::class,'activate_account']);
    Route::post('update_name', [UserController::class,'update_name']);
    Route::post('update_other', [UserController::class,'update_other']);
    //users
    // Route::post('details', 'Api\UserController@details');
    Route::post('update_profile/{id}', [UserController::class,'update']);
    Route::get('profile', [UserController::class,'show']);
    Route::get('change_connect', [UserController::class,'is_connect_ms']);
    Route::get('accept_notifications', [UserController::class,'is_accept_notifications']);
    Route::resource('/user_cars', UsersCarsController::class);
    Route::post('/user_cars_multi', [UsersCarsController::class,'store_multi']);
    Route::resource('/questions', QuestionsController::class);
    Route::get('/questions/is_open/{id}', [QuestionsController::class,'is_open']);
    Route::get('/if_open_question', [QuestionsController::class,'if_open_question']);
    Route::resource('/questions_send_requests', QuestionsSendRequests::class);
    Route::get('/questions_accept_requests/{id}', [QuestionsSendRequests::class,'accept']);
    Route::get('/questions_reject_requests/{id}', [QuestionsSendRequests::class,'reject']);
    Route::get('/questions_approve_response/{id}', [QuestionsController::class,'accept']);
    Route::get('/questions_reject_response/{id}', [QuestionsController::class,'reject']);

    Route::resource('/user_rates', UserRatesController::class);
    Route::post('/notifications/del_view', [NotificationsController::class,'delete_notification'])->name('notifications.del_view');
    // Route::get('user/is_connect/{id}', [UserController::class,'is_connect_ms'])->name('user.is_connect');
    // Route::get('chat_users/t/{user}', 'Api\ChatUsersController@index')->name('chat_users.t');
    // Route::get('chat_users/un_viewed/message', 'Api\ChatUsersController@un_viewed')->name('chat_users.un_viewed.message');
    // Route::get('chat_users/get/users', 'Api\ChatUsersController@get_users')->name('chat_users.get.users');
    // Route::resource('/chat_users', 'Api\ChatUsersController');
});
Route::resource('/categories', CategoriesController::class);
Route::get('/categories/t/{lang}/{type}/{p_id}', [CategoriesController::class,'index'])->name('categories.t');
Route::get('/categories/get_with_sub/{lang}/{type}/{p_id}', [CategoriesController::class,'get_with_sub'])->name('categories.get_with_sub');
// //admin notifications
Route::resource('/notifications',NotificationsController::class);
Route::get('/notifications/t/{lang}/{typ}/{user_id}/{with_id}', [NotificationsController::class,'index'])->name('notifications.t');

// Route::get('/notifications/get_notifications_from_onesignal/{limit}/{offset}/{kind}', 'Api\NotificationsController@get_notifications_from_onesignal');
//Advertising
//Route::resource('/advertising', AdvertisingController::class);
Route::get('/advertising/t/{lang}/{type}', [AdvertisingController::class,'index'])->name('advertising.t');
//static_page
Route::resource('/static_page', StaticPageController::class);
Route::get('/social_media',[SocialMediaController::class,'index'])->name('social_media');
// Route::get('/contact_us',[ContactUController::class,'index'])->name('contact_us');
// Route::post('/contact_us',[ContactUController::class,'store'])->name('contact_us');
//setting_app
Route::resource('/setting_app', SettingAppController::class)->only('show');

// //countries_cities
Route::get('/countries_cities/t/{lang}/{p_id}', [CountriesCitiesController::class,'index'])->name('countries_cities.t');
// //user_favorite
Route::resource('/user_favorite', UserFavoritesController::class);
Route::get('/user_favorite/t/{lang}/{user_id}', [UserFavoritesController::class,'index'])->name('user_favorite.t');
// //user_rates

Route::get('/user_rates/t/{user_id}/{rated_id}', [UserRatesController::class,'index'])->name('user_rates.t');
// //user_favorite
// Route::resource('/user_follow', 'Api\UserFollowsController');
// Route::get('/user_follow/t/{lang}/{user_id}', 'Api\UserFollowsController@index')->name('user_follow.t');


