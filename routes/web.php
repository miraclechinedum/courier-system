<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingsController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
});

Route::middleware(['auth'])->group(function () {

    // Route::get('/email/verify', [EmailVerificationPromptController::class, '__invoke'])
    //     ->name('verification.notice');

    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->middleware('auth')->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware(['throttle:6,1'])
        ->name('verification.send');
    // End of email verifiy

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/get-states', [BookingController::class, 'getStates'])->name('getStates');
    Route::get('/get-cities', [BookingController::class, 'getCities'])->name('getCities');
    Route::post('/user/address', [UserController::class, 'storeUserAddress'])->name('user.address.store');
    Route::post('/store-address', [UserController::class, 'store'])->name('store.address');

    // Route to access the booking creation form
    Route::get('/submit-booking', [BookingController::class, 'create'])->name('bookings.create');

    // Route to handle the form submission
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');

    // Route to view booking history
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/{tracking_id}', [BookingController::class, 'track'])->name('bookings.track');

    Route::get('/invoices/{booking}', [BookingController::class, 'show'])->name('invoice.show');

    // Settings
    Route::get('/add-country', [SettingsController::class, 'addCountryForm'])->name('add-country');
    Route::post('/save-country', [SettingsController::class, 'saveCountry'])->name('countries.store');
    Route::get('/countries', [SettingsController::class, 'index'])->name('countries.index');

    // Route for displaying the edit form
    Route::get('/countries/{id}/edit', [SettingsController::class, 'editCountry'])->name('countries.edit');

    // Route for updating the country
    Route::put('/countries/{id}', [SettingsController::class, 'updateCountry'])->name('countries.update');
    // Route::post('/countries/{id}/delete', 'CountriesController@delete')->name('countries.delete');

    Route::get('/add-state', [SettingsController::class, 'addStateForm'])->name('state.create');
    Route::post('/store', [SettingsController::class, 'addState'])->name('add-state');
    Route::get('/states', [SettingsController::class, 'getStates'])->name('getmodalstates');

    Route::get('/states/{id}/edit', [SettingsController::class, 'edit'])->name('states.edit');
    Route::get('/states/{id}/update', [SettingsController::class, 'updatestate'])->name('states.update');

    Route::get('/cities', [SettingsController::class, 'getCities'])->name('cities');

    Route::get('/states', [SettingsController::class, 'showStates'])->name('states.index');

    Route::get('/add-city', [SettingsController::class, 'showAddCityForm'])->name('city.create');
    Route::get('/get-states', [SettingsController::class, 'getStates'])->name('getStates');

    Route::post('/save-city', [SettingsController::class, 'saveCity'])->name('saveCity');
    Route::get('/cities', [SettingsController::class, 'showAllCities'])->name('cities.index');

    Route::get('/add-recipient', [UserController::class, 'showAddRecipientForm'])->name('add-recipient-form');
    Route::post('/add-recipient', [UserController::class, 'store'])->name('store-recipient');

    Route::get('/recipients', [UserController::class, 'showRecipients'])->name('recipients');
});
