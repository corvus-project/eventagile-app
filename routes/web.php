<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Livewire\Account\AccountHome;
use App\Livewire\Client\EventRegistration;
use App\Livewire\Dashboard\DashboardHome;
use App\Livewire\Dashboard\Events;
use App\Models\Tenant;
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
    $tenant = Tenant::first();

    return 'This is a test route.';
});

foreach (config('tenancy.central_domains') as $domain) {
    Route::domain($domain)->group(function () {

        Route::livewire('/', 'pages::index')->name('home');
    });
}





Route::livewire('/auth/login', 'pages::auth.login')->name('login');
Route::livewire('/auth/register', 'pages::auth.register')->name('register');

Route::livewire('/auth/forget-password', 'pages::auth.reset')->name('password.request');


Route::middleware('auth')->group(function () {

    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');
});
