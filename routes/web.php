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



Route::get('/debug',   function () {
    $query = App\Models\EventRegistration::query();
    $rows = $query->with(['event'])->get();

    foreach ($rows as $row) {
        echo $row->name . ' - ' . $row->event_title  . $row->event->id . '<br>';
    }
})->name('debug');

//Route::redirect('home', '/')->name('home');

Route::get('events/{event:slug}/register', EventRegistration::class)->name('event.registration');

Route::livewire('/auth/login', 'pages::auth.login')->name('login');

Route::middleware('auth')->group(function () {

    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');
});

Route::middleware('auth', 'verified')->group(function () {

    Route::get('/dashboard/users/create', \App\Livewire\Users\CreateUser::class)
        ->name('users.create');

    Route::get('/dashboard/users/{user}/update', \App\Livewire\Users\UpdateUser::class)
        ->name('users.update');

    Route::get('/events/create', \App\Livewire\Events\CreateEvent::class)
        ->name('events.create');

    Route::get('/events/{event}/update', \App\Livewire\Events\UpdateEvent::class)
        ->name('events.update');
});
