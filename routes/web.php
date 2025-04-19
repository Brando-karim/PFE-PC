<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SetupController ;
use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::get('/Produits/{cat}',[SetupController::class,'getArticles']);
Route::get('/',[SetupController::class,'Home']);
Route::resource('produits', ArticleController::class);
    
Auth::routes();



Route::middleware(['adminuser'])->group(function () { 
    Route::get('/EspaceAdmin', [SetupController::class, 'EspaceAdmin'])->name('EspaceAdmin'); 

    // Route to display the form to create a new product
    Route::get('/produits/create', [ArticleController::class, 'create'])->name('produits.create'); 

    // Route to store the new product
    Route::post('/produits', [ArticleController::class, 'store'])->name('produits.store'); 

    // Route to edit a product
    Route::get('/produits/{id}/edit', [ArticleController::class, 'edit'])->name('edit'); 

    // Route to update a product
    Route::put('/produits/{id}', [ArticleController::class, 'update'])->name('update'); 

    // Route to delete a product
    Route::delete('/produits/{id}', [ArticleController::class, 'destroy'])->name('destroy');

    Route::post('/send-email',[EmailController::class,'sendEmail'])->name('send.email');

    Route::get('/email-form',function(){ return view('email_form');

});
});
    Route::middleware(['useruser'])->group(function () { 
        Route::get('/EspaceClient', [SetupController::class,'EspaceClient'])->name('EspaceClient');
        Route::get('cart', [ArticleController::class,'cart']);
        Route::get('cart/addc/{id}', [ArticleController::class,'addToCart']);
        Route::patch('update-cart', [ArticleController::class, 'updatec'])->name('cart.update');
        Route::delete('remove-cart', [ArticleController::class, 'removec'])->name('cart.remove');
        // Payment routes
        Route::get('/payment', [PaymentController::class, 'showPaymentForm'])->name('payment.form');
        Route::post('/process-payment', [PaymentController::class, 'processPayment'])->name('payment.process');
        Route::get('/payment/success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
        Route::get('/payment/cancel', [PaymentController::class, 'paymentCancel'])->name('payment.cancel');
    }); 

    Route::get('/catalogue', [SetupController::class, 'cataloguepdf'])->middleware('useruser')->name('catalogue.pdf');     
    Route::get('/{lang?}', function ($lang = 'en') { 
        App::setLocale($lang); 
            return view('Home'); }); 
        // Payment
        
       
