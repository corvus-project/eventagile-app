<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\TenantEmailVerificationController;
use App\Livewire\Account\AccountHome;
use App\Livewire\Client\EventRegistration;
use App\Livewire\Dashboard\DashboardHome;
use App\Livewire\Dashboard\Events;
use App\Models\Tenant;
use App\Models\User;
use App\Services\Helper;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

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

Route::get('/debug', function () {
    return Carbon::now()->toDateTimeString();
})->name('debug');

Route::livewire('/', 'pages::site.home')->name('home');
Route::livewire('/signup', 'pages::site.signup')->name('signup');

Route::livewire('/account-setup', 'pages::site.account-setup')->name('account-setup');
Route::middleware('auth')->group(function () {

    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');


    Route::post('logout', LogoutController::class)
        ->name('logout');
});

Route::livewire('/privacy', 'pages::site.privacy')->name('privacy');
Route::livewire('/terms', 'pages::site.terms')->name('terms');

Route::livewire('/features', 'pages::site.features')->name('features');
Route::livewire('/examples', 'pages::site.examples')->name('sample-usage');
Route::livewire('/demo', 'pages::site.demos')->name('demo');
Route::livewire('/contact', 'pages::site.contact')->name('contact');
Route::livewire('/pricing', 'pages::site.pricing')->name('pricing');
Route::livewire('/support', 'pages::site.support')->name('support');
