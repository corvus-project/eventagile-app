<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Livewire\Account\AccountHome;
use App\Livewire\Client\EventRegistration;
use App\Livewire\Dashboard\DashboardHome;
use App\Livewire\Dashboard\Events;
use App\Models\Tenant;
use App\Models\User;
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
    $tenant = Tenant::query()->where('id', '17b645f6-c80e-466b-a4a7-8910c2e7a34e')->first();

    config(['database.connections.template_tenant_connection.database' => database_path($tenant->tenancy_db_name)]);

    $users = User::on('template_tenant_connection')->with('roles')->get();

    return $users;
})->name('welcome');

foreach (config('tenancy.central_domains') as $domain) {
    Route::domain($domain)->group(function () {
        Route::livewire('/', 'pages::site.home')->name('home');
        Route::livewire('/signup', 'pages::site.signup')->name('signup');

        Route::livewire('/account-setup', 'pages::site.temporary')->name('temporary');
        Route::middleware('auth')->group(function () {

            Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
                ->middleware('signed')
                ->name('verification.verify');

            Route::post('logout', LogoutController::class)
                ->name('logout');
        });
    });
}

Route::livewire('/privacy', 'pages::site.privacy')->name('privacy');
Route::livewire('/features', 'pages::site.features')->name('features');
Route::livewire('/examples', 'pages::site.examples')->name('examples');
Route::livewire('/contact', 'pages::site.contact')->name('contact');
Route::livewire('/pricing', 'pages::site.pricing')->name('pricing');
Route::livewire('/support', 'pages::site.support')->name('support');

//Route::livewire('/auth/login', 'pages::auth.login')->name('login');
//Route::livewire('/auth/register', 'pages::auth.register')->name('register');

//Route::livewire('/auth/forget-password', 'pages::auth.reset')->name('password.request');


/* Route::middleware('auth')->group(function () {

    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');
}); */
