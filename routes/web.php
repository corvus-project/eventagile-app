<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Livewire\Client\EventRegistration;
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


Route::get('events/{event:slug}/register', EventRegistration::class)->name('event.registration');

Route::livewire('/auth/login', 'pages::auth.login')->name('login');
Route::livewire('/', 'pages::index')->name('home');

Route::middleware('auth')->group(function () {

    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');
});


Route::middleware('auth', 'verified')->group(function () {

    Route::livewire('/dashboard', 'pages::dashboard')->name('dashboard');
    Route::livewire('/dashboard/events', 'pages::dashboard.events')->name('dashboard.events');
    Route::livewire('/dashboard/users', 'pages::dashboard.users')->name('dashboard.users');

    Route::livewire('/dashboard/events/{event:slug}', 'pages::dashboard.events.[Event]')->name('dashboard.events.show');
    Route::livewire('/dashboard/events/{event:slug}/registrations', 'pages::dashboard.events.[Event].registrations')->name('events.registrations.show');
    Route::livewire('/dashboard/events/{event:slug}/export', 'pages::dashboard.events.[Event].export')->name('events.registrations.export');
    Route::livewire('/dashboard/profile/edit', 'pages::dashboard.profile.edit')->name('profile.edit');


    Route::get('/dashboard/users/create', \App\Livewire\Users\CreateUser::class)
        ->name('users.create');

    Route::get('/dashboard/users/{user}/update', \App\Livewire\Users\UpdateUser::class)
        ->name('users.update');

    Route::get('/events/create', \App\Livewire\Events\CreateEvent::class)
        ->name('events.create');

    Route::get('/events/{event}/update', \App\Livewire\Events\UpdateEvent::class)
        ->name('events.update');
});
