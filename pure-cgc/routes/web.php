<?php

use App\Http\Controllers\Seo;
use App\Models\User;
use App\Http\Livewire\Site\Home\Home;
use App\Http\Livewire\Site\Jobs;
use App\Http\Livewire\Site\Team;
use App\Http\Livewire\BlogSearch;
use App\Http\Livewire\Site\Hosts;
use App\Http\Livewire\Site\Plans;
use App\Http\Livewire\Admin\Offer;
use App\Http\Livewire\Site\Search;
use App\Http\Livewire\UserRequest;
use App\Http\Livewire\Site\ApplyJob;
use App\Http\Livewire\Site\Projects;
use App\Http\Livewire\Site\Portfolio;
use App\Http\Livewire\Site\Subscribe;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Site\Employment;
use App\Http\Livewire\Site\Blogs\Blogs;
use App\Http\Livewire\Admin\Roles\Roles;
use App\Http\Livewire\Admin\Teams\Teams;
use App\Http\Livewire\Admin\Users\Users;
use App\Http\Livewire\Site\ApplyTraining;
use App\Http\Livewire\Admin\Counts\Counts;
use App\Http\Livewire\Admin\UsersRequests;
use App\Http\Controllers\ArticlesController;
use App\Http\Livewire\Admin\ArtMins\ArtMins;
use App\Http\Livewire\Admin\About\AboutAdmin;
use App\Http\Livewire\Admin\Hosting\Hostings;
use App\Http\Livewire\Site\Blogs\BlogDetails;
use App\Http\Livewire\Site\Services\Services;
use App\Http\Livewire\Admin\Products\Products;
use App\Http\Livewire\Site\About as SiteAbout;
use App\Http\Livewire\Admin\Partener\Parteners;
use App\Http\Livewire\Admin\Gallaries\Gallaries;
use App\Http\Controllers\Admin\PagesMnuController;
use App\Http\Livewire\Admin\Attributes\Attributes;
use App\Http\Livewire\Admin\Categories\Categories;
use App\Http\Livewire\Admin\Portfolios\Portfolios;
use App\Http\Livewire\Notifications\Notifications;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\SettingMsController;
use App\Http\Controllers\Hosting\HostingController;
use App\Http\Livewire\Site\Services\ServiceDetails;
use App\Http\Controllers\Admin\StaticPageController;
use App\Http\Livewire\Admin\Permissions\Permissions;
use App\Http\Livewire\Admin\Advertisings\Advertisings;
use App\Http\Livewire\Admin\SocialMedias\SocialMedias;
use App\Http\Livewire\Site\ContactUs as SiteContactUs;
use App\Http\Livewire\Admin\PaymentsPlans\PaymentsPlans;
use App\Http\Livewire\Admin\CountriesCities\CountriesCities;
use App\Http\Livewire\Admin\CategoryServices\CategoryServices;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Livewire\Admin\Articles\Articles;
use App\Http\Livewire\Admin\Cgc\Calendar;
use App\Http\Livewire\Admin\CGC\Calender;
use App\Http\Livewire\Admin\Cgc\Contacts;
use App\Http\Livewire\Admin\Cgc\Dash;
use App\Http\Livewire\Admin\Cgc\Events;
use App\Http\Livewire\Admin\Cgc\InvitationDetail;
use App\Http\Livewire\Admin\Cgc\Invitations;
use App\Http\Livewire\Admin\Cgc\Maindashboard;
use App\Http\Livewire\Admin\Cgc\Moderators;
use App\Http\Livewire\Admin\Cgc\Statistics;
use App\Http\Livewire\Admin\Notifications\Notifications as AdminNotifications;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


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

Route::post('/logout2', function (Request $request) {
    Auth::guard('web')->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/A_ms_admin/invitations');
})->name('logout2');
Route::get('/A_ms_admin/invitation', Invitations::class)->name('invitation');
// Route::get('home', [HomeController::class,'index'])->name('home');
// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard')->extends('layouts.app');
// })->name('dashboard');

// admin
Route::group(['prefix'=>'A_ms_admin','middleware'=>'auth:sanctum','verified'], function () {
    //admin home
    // Route::get('/', [AdminHomeController::class,'index'])->name('A_ms_admin');
    // Route::get('/home',[AdminHomeController::class,'index'])->name('A_ms_admin');
    //admin page_mnu
    Route::resource('pages_mnu',PagesMnuController::class);
    Route::get('pages_mnu/t/{p_id}', [PagesMnuController::class,'index'])->name('pages_mnu.t');
    Route::put('pages_mnu/active_ms/{id}',[PagesMnuController::class,'active_ms'])->name('pages_mnu.active_ms');
    Route::resource('static_pages',StaticPageController::class);
    Route::resource('setting-page', SettingMsController::class);
    Route::resource('contact-messages', ContactUsController::class);
    // ---------- livewires routes ----------------
    Route::get('gallery/{type}',Gallaries::class);
    Route::get('social-media',SocialMedias::class);
    Route::get('users/{type}/{role_id}',Users::class);
    Route::get('contacts/{type}/{role_id}',Contacts::class);
    Route::get('moderators',Moderators::class);
    Route::get('events',Events::class);
    Route::get('invitations',Invitations::class);
    Route::get('invitations_details/{id}',InvitationDetail::class);
    Route::get('calender',Calendar::class);
    Route::get('statistics',Statistics::class);
    Route::get('maindashboard',Dash::class)->name('maindashboard');
    Route::get('/', Dash::class)->name('A_ms_admin');

    Route::get('category/{type}/{parent_id}' , Categories::class);
    Route::get('category/{type}/{parent_id}' , Categories::class);
    Route::get('portfolios/{type}/{category_id}', Portfolios::class)->name('portfolios');
    Route::get('attributes/{parent_id}' , Attributes::class);
    Route::get('notifications/{type}/{with_id}' , AdminNotifications::class);
    Route::get('roles',Roles::class);
    Route::get('permissions',Permissions::class);
    Route::get('countries_cities/{parent_id}' , CountriesCities::class);
    Route::get('articles/{type}/{category_id}',Articles::class);
    Route::get('art-mins/{type}/{category_id}',ArtMins::class);
    Route::get('users-requests',UsersRequests::class);
    Route::get('advertisings/{type}/{with_id}' , Advertisings::class);
    Route::get('/products/{company_id}/{category_id}', Products::class);
    Route::get('about_admin', AboutAdmin::class)->name('about_admin');
    Route::get('category_services', CategoryServices::class)->name('category_services');
    Route::get('counts', Counts::class)->name('counts');
    Route::get('offer', Offer::class)->name('offer');
    // Route::get('hosting', Hostings::class)->name('offer');
    Route::get('payments_plans', PaymentsPlans::class);
    Route::get('parteners' , Parteners::class )->name('parteners');
    Route::get('teams' , Teams::class )->name('teams');
    Route::get('seo', \App\Http\Livewire\SeoPage::class);
    // --------- End Livewires routes -------------
});
Route::get('locale/{locale}', function ($locale){
    $upd_usr=User::find(Auth::user()->id);
    $upd_usr->user_lang=$locale;
    $upd_usr->save();
    Session::put('locale', $locale);
    return redirect()->back();
})->middleware('auth');

Route::get('lang/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});
// ---------- livewires site routes ----------------
// dd('');
Route::get('/', function () {



    return redirect('/A_ms_admin');
})->name('home_home');
// Route::get('/', Dash::class)->name('home_home');
Route::get('/about', SiteAbout::class)->name('about');
Route::get('/team', Team::class)->name('team');
Route::get('/blogs-category/{category_id}', Blogs::class)->name('blogs');
// Route::get('/blogs', Blogs::class)->name('blogs');
Route::get('/hosts/{id}', Hosts::class)->name('host');
Route::get('/blog-detail/{id}', BlogDetails::class)->name('blog-detail');
Route::get('/service/{category_id}/{name}', ServiceDetails::class)->name('service');
// Route::get('/contact-us',ContactUs::class)->name('contact-us');
Route::get('/contact-us',SiteContactUs::class)->name('contact-us');
Route::get('/hosting',[HostingController::class,'index'])->name('hosting');
Route::get('/services',Services::class)->name('services');
Route::get('/portofilo',Portfolio::class)->name('portfolio');
Route::get('/projects',Projects::class)->name('projects');
Route::get('/plans', Plans::class)->name('plans');
Route::get('/employment' , Employment::class)->name('employment');
Route::get('/subscribe' , Subscribe::class)->name('subscribe');
Route::get('/search/{key}' , Search::class)->name('search');
Route::get('/blog-search/{key}' , BlogSearch::class)->name('blogsearch');
// Route::get('/service-deails/{id}' , SiteServiceDetails::class)->name('service.details');
Route::get('/apply-training' , ApplyTraining::class)->name('apply-train');
Route::get('/jobs' , Jobs::class)->name('jobs');
Route::get('/apply-job/{id}' , ApplyJob::class)->name('apply-job');

// --------- End Livewires routes -------------
Route::group(['middleware'=>'auth:sanctum','verified'], function () {
    Route::get('user-request-group',UserRequest::class);
    Route::get('my-notifications',Notifications::class);

});

// Route::get('/hosting',function(){
//     return view('host.app');
// })->name('hosting');

// Route::get('/hosting',[HostingController::class,'index'])->name('hosting');
