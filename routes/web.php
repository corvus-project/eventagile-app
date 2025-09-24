<?php

use App\Events\EventRegistration as EventsEventRegistration;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Livewire\Client\EventRegistration;
use Illuminate\Support\Carbon;
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


Route::get('/debug', function () {

        $event = \App\Models\Event::where('slug', 'birthday')->first();   

        $eventRegistration = $event->registrations()->create([
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'is_attending' => true, // Assuming default is attending
            'registered_at' => Carbon::now(),
        ]);


        EventsEventRegistration::dispatch($eventRegistration);

/*     $user = \App\Models\User::first();
    $canNotify = $user->able('notify-event-registration');
    return response()->json([
        'time' => now()->toDateTimeString(),
        'user_id' => $user->id,
        'can_notify_event_registration' => $canNotify,
    ]); */
});


Route::get('events/{event:slug}/register', EventRegistration::class)->name('event.registration');




Route::group([
    'middleware' => ['web']
], function () {

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
});
