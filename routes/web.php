<?php
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SetupController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PCPartSpecsController;
use App\Http\Controllers\PCBuildController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public routes
Route::get('/Produits/{cat}', [SetupController::class, 'getArticles']);
Route::get('/', [SetupController::class, 'Home']);

// Authentication routes
Auth::routes();

// Dashboard route - accessible to authenticated users
Route::middleware('auth')->get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::get('/chatbot', function () {
    return view('chatbot');
});

// User & Admin PC Build CRUD
Route::middleware('auth')->group(function () {
    Route::resource('pcbuilds', PCBuildController::class);
    /*Route::get(
        'addtonewbuild/{type}/{id}',
        [PCBuildController::class, 'addToNewBuild']
    )->name('addToNewBuild');
    Route::get(
        'remove-from-new-build/{type}',
        [PCBuildController::class, 'removeFromNewBuild']
    )->name('removeFromNewBuild');*/
});

// Product routes

// Public product listing and viewing (no middleware)
Route::get('/produits', [ArticleController::class, 'index'])->name('produits.index');
Route::get('/produits/{id}', [ArticleController::class, 'show'])->name('produits.show')->where('id', '[0-9]+');

// Admin-only product management routes
Route::middleware(['auth', 'adminuser'])->group(function () {
    Route::resource('pcpartspecs', PCPartSpecsController::class);

    Route::get('/EspaceAdmin', [SetupController::class, 'EspaceAdmin'])->name('EspaceAdmin');

    Route::get('/produits/create', [ArticleController::class, 'create'])->name('produits.create');
    Route::post('/produits', [ArticleController::class, 'store'])->name('produits.store');
    Route::get('/produits/{id}/edit', [ArticleController::class, 'edit'])->name('produits.edit')->where('id', '[0-9]+');
    Route::put('/produits/{id}', [ArticleController::class, 'update'])->name('produits.update')->where('id', '[0-9]+');
    Route::delete('/produits/{id}', [ArticleController::class, 'destroy'])->name('produits.destroy')->where('id', '[0-9]+');

    Route::post('/send-email', [EmailController::class, 'sendEmail'])->name('send.email');
    Route::get('/email-form', function () {
        return view('email_form');
    });
});

// User-only routes
Route::middleware(['auth', 'useruser'])->group(function () {
    Route::get('cart', [ArticleController::class, 'cart']);
    Route::get('cart/addc/{id}', [ArticleController::class, 'addToCart']);
    Route::patch('update-cart', [ArticleController::class, 'updatec'])->name('cart.update');
    Route::delete('remove-cart', [ArticleController::class, 'removec'])->name('cart.remove');

    // Payment routes
    Route::get('/payment', [PaymentController::class, 'showPaymentForm'])->name('payment.form');
    Route::post('/process-payment', [PaymentController::class, 'processPayment'])->name('payment.process');
    Route::get('/payment/success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
    Route::get('/payment/cancel', [PaymentController::class, 'paymentCancel'])->name('payment.cancel');

    Route::get('/catalogue', [SetupController::class, 'cataloguepdf'])->name('catalogue.pdf');
});

// Language switcher (place last to avoid route conflicts)
Route::get('/{lang?}', function ($lang = 'en') {
    App::setLocale($lang);
    return view('Home');
});
