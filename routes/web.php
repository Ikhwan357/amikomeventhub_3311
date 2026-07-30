<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| USER CONTROLLERS
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;

/*
|--------------------------------------------------------------------------
| ORGANIZER CONTROLLERS
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Organizer\DashboardController as OrganizerDashboardController;
use App\Http\Controllers\Organizer\EventController as OrganizerEventController;
use App\Http\Controllers\Organizer\OrganizationController;
use App\Http\Controllers\Organizer\ReviewController as OrganizerReviewController;

/*
|--------------------------------------------------------------------------
| ADMIN CONTROLLERS
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\TransactionController;

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/register', [AuthController::class, 'register'])
    ->name('register');

Route::post('/register', [AuthController::class, 'store'])
    ->name('register.store');
/*
|--------------------------------------------------------------------------
| Login
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'login'])
    ->name('login');

Route::post('/login', [AuthController::class, 'authenticate'])
    ->name('login.process');



/*
|--------------------------------------------------------------------------
| Logout
|--------------------------------------------------------------------------
*/

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');
/*
|--------------------------------------------------------------------------
| GOOGLE AUTH
|--------------------------------------------------------------------------
*/

Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])
    ->name('google.login');

Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback'])
    ->name('google.callback');

/*
|--------------------------------------------------------------------------
| USER AREA
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/home', [HomeController::class, 'index'])
        ->name('home');

    Route::get('/profil', [HomeController::class, 'profil'])
        ->name('profil');

    Route::get('/katalog', [HomeController::class, 'katalog'])
        ->name('katalog');

    Route::get('/bantuan', [HomeController::class, 'bantuan'])
        ->name('bantuan');

    Route::get('/contact', [HomeController::class, 'kontak'])
        ->name('kontak');

    Route::get('/transactions/{transaction}/review', [ReviewController::class, 'create'])
        ->name('reviews.create');

    Route::post('/transactions/{transaction}/review', [ReviewController::class, 'store'])
        ->name('reviews.store');
    /*
    |--------------------------------------------------------------------------
    | EVENT FLOW
    |--------------------------------------------------------------------------
    */

    Route::get('/events/{event}', [EventController::class, 'show'])
        ->name('events.show');


    Route::get('/ticket/{id}', [TransactionController::class, 'ticket'])
        ->name('ticket');
});

/*
|--------------------------------------------------------------------------
| ORGANIZER AREA
|--------------------------------------------------------------------------
*/

Route::prefix('organizer')
    ->middleware(['auth', 'organizer'])
    ->name('organizer.')
    ->group(function () {

        Route::get('/dashboard', [OrganizerDashboardController::class, 'index'])
            ->name('dashboard');

        /*
        |--------------------------------------------------------------------------
        | ORGANIZATION
        |--------------------------------------------------------------------------
        */

        Route::get('/organization', [OrganizationController::class, 'edit'])
            ->name('organization.edit');

        Route::put('/organization', [OrganizationController::class, 'update'])
            ->name('organization.update');

        /*
        |--------------------------------------------------------------------------
        | EVENTS
        |--------------------------------------------------------------------------
        */

        Route::resource('events', OrganizerEventController::class);

        /*
        |--------------------------------------------------------------------------
        | REVIEWS
        |--------------------------------------------------------------------------
        */

        Route::get('/reviews', [OrganizerReviewController::class, 'index'])
            ->name('reviews.index');

    });

/*
|--------------------------------------------------------------------------
| SUPER ADMIN AREA
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->middleware(['auth', 'superadmin'])
    ->name('admin.')
    ->group(function () {

        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('events', AdminEventController::class);

        Route::resource('categories', CategoryController::class);

        Route::resource('partners', PartnerController::class);

        Route::get('/transactions', [TransactionController::class, 'index'])
            ->name('transactions.index');

        Route::resource('organizers', \App\Http\Controllers\Admin\OrganizerController::class);

    });

use App\Http\Controllers\TicketController;

Route::middleware('auth')->group(function () {

    Route::get('/my-tickets', [TicketController::class, 'index'])
        ->name('tickets.index');

});

use App\Http\Controllers\CheckoutController;

Route::middleware('auth')->group(function () {

    Route::get('/checkout/{event}', [CheckoutController::class, 'index'])
        ->name('checkout');

    Route::post('/checkout/{event}', [CheckoutController::class, 'process'])
        ->name('checkout.process');

});