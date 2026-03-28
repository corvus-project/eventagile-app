<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Livewire\Account\AccountHome;
use App\Livewire\Client\EventRegistration;
use App\Livewire\Dashboard\DashboardHome;
use App\Livewire\Dashboard\Events;
use Illuminate\Support\Facades\Route;


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



Route::get('events/{event:slug}/register', EventRegistration::class)->name('event.show');

Route::livewire('/auth/login', 'pages::auth.login')->name('login');
Route::livewire('/auth/register', 'pages::auth.register')->name('register');

Route::livewire('/auth/forget-password', 'pages::auth.reset')->name('password.request');

Route::livewire('/', 'pages::index')->name('home');

Route::livewire('u/{account:subdomain}', 'pages::accounts.home')->name('account.home');
Route::livewire('u/{account:subdomain}/event/{event:slug}', 'pages::accounts.event')->name('account.event');

Route::middleware('auth')->group(function () {

    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');
});


Route::middleware('auth', 'verified')->group(function () {

    Route::livewire('/dashboard', DashboardHome::class)->name('dashboard');
    Route::livewire('/dashboard/events', Events::class)->name('dashboard.events');

    Route::livewire('/dashboard/users', 'pages::dashboard.users')->name('dashboard.users');

    Route::livewire('/dashboard/events/{event:slug}', 'pages::dashboard.events.[Event]')->name('dashboard.events.show');
    Route::livewire('/dashboard/events/{event:slug}/registrations', 'pages::dashboard.events.[Event].registrations')->name('dashboard.events.registrations.show');
    Route::livewire('/dashboard/events/{event:slug}/export', 'pages::dashboard.events.[Event].export')->name('dashboard.events.registrations.export');
    Route::livewire('/dashboard/profile/edit', 'pages::dashboard.profile.edit')->name('profile.edit');

    Route::livewire('/dashboard/reports', 'pages::dashboard.reports')->name('reports.index');
    Route::livewire('/dashboard/settings', 'pages::dashboard.settings')->name('settings.index');

    Route::get('/dashboard/users/create', \App\Livewire\Users\CreateUser::class)
        ->name('users.create');

    Route::get('/dashboard/users/{user}/update', \App\Livewire\Users\UpdateUser::class)
        ->name('users.update');

    Route::get('/events/create', \App\Livewire\Dashboard\CreateEvent::class)
        ->name('dashboard.events.create');

    Route::get('/events/{event}/update', \App\Livewire\Dashboard\UpdateEvent::class)
        ->name('dashboard.events.update');
});
