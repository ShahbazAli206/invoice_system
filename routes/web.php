<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\mailController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\DepositController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\AdminTechController;
use App\Http\Controllers\EstimatesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PublicmailController;
use App\Http\Controllers\TechnicianController;
use App\Http\Controllers\TechProfileController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\ResidentProfileController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;

Route::get('/', [HomeController::class, 'public'])->name('public');
Route::post('/', [HomeController::class, 'store'])->name('public.store');
Route::post('/otp', [HomeController::class, 'otp'])->name('otp');





Auth::routes(['verify' => true]);
// Auth::routes();

Route::get('/login/forgot-password', [ResetController::class, 'create']);
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendEmail']);
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'resetPass'])->name('password.reset');
Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');


Route::group(['middleware' => 'admin'], function () {
    Route::get('/adminpanel', [HomeController::class, 'home'])->name('adminpanel');
    Route::get('msgs', [HomeController::class, 'read'])->name('msgs');
    Route::delete('msgs/{id}', [HomeController::class, 'delete'])->name('msgs.delete');
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('billing', function () {
        return view('billing');
    })->name('billing');
    Route::get('profile', function () {
        return view('profile');
    })->name('profile');
    Route::get('rtl', function () {
        return view('rtl');
    })->name('rtl');
    Route::get('tables', function () {
        return view('tables');
    })->name('tables');
    Route::get('virtual-reality', function () {
        return view('virtual-reality');
    })->name('virtual-reality');
    Route::get('static-sign-in', function () {
        return view('static-sign-in');
    })->name('sign-in');
    Route::get('static-sign-up', function () {
        return view('static-sign-up');
    })->name('sign-up');
    Route::get('/logout', [SessionsController::class, 'destroy']);
    Route::get('/user-profile', [InfoUserController::class, 'create']);
    Route::post('/user-profile', [InfoUserController::class, 'store']);

    Route::group(['prefix' => 'items'], function () {
        Route::get('/', [ItemsController::class, 'index'])->name('adminpanel.items');
        Route::get('/create', [ItemsController::class, 'create'])->name('adminpanel.items.create');
        Route::post('/store', [ItemsController::class, 'store'])->name('adminpanel.items.store');
        Route::delete('/{id}', [ItemsController::class, 'destroy'])->name('adminpanel.items.destroy');
    });
    Route::group(['prefix' => 'Estimates'], function () {
        Route::get('/', [EstimatesController::class, 'index'])->name('adminpanel.Estimates');
        Route::get('/create', [EstimatesController::class, 'create'])->name('adminpanel.Estimates.create');
        Route::post('/store', [EstimatesController::class, 'store'])->name('adminpanel.Estimates.store');
        Route::delete('/{id}', [EstimatesController::class, 'destroy'])->name('adminpanel.Estimates.destroy');
    });
    Route::group(['prefix' => 'Invoices'], function () {
        Route::get('/', [InvoicesController::class, 'index'])->name('adminpanel.Invoices');
        Route::get('/create', [InvoicesController::class, 'create'])->name('adminpanel.Invoices.create');
        Route::post('/store', [InvoicesController::class, 'store'])->name('adminpanel.Invoices.store');
        Route::delete('/{id}', [InvoicesController::class, 'destroy'])->name('adminpanel.Invoices.destroy');
        Route::get('/preview-form', [InvoicesController::class, 'showPreview'])->name('adminpanel.Invoices.preview-form');
        Route::get('/form', [InvoicesController::class, 'form'])->name('adminpanel.Invoices.form');
        Route::get('/download/{id}', [InvoicesController::class, 'download'])->name('adminpanel.Invoices.download');
        Route::get('/updateStatus/{invoiceId}', [InvoicesController::class, 'updateStatus'])->name('adminpanel.Invoices.updateStatus');
        // Route::get('/update/{status}', [InvoicesController::class, 'update'])->name('adminpanel.Invoices.update');
        Route::post('/update/{status}', [InvoicesController::class, 'update'])->name('adminpanel.Invoices.update');
        Route::put('/update', [InvoicesController::class, 'update'])->name('adminpanel.Invoices.update');


    });

    Route::group(['prefix' => 'technicians'], function () {
        Route::get('/', [AdminTechController::class, 'index'])->name('adminpanel.technicians');
        Route::get('/create', [AdminTechController::class, 'create'])->name('adminpanel.technicians.create');
        Route::post('/create', [AdminTechController::class, 'store'])->name('adminpanel.technicians.store');
        Route::get('/{id}', [AdminTechController::class, 'edit'])->name('adminpanel.technicians.edit');
        Route::put('/{id}', [AdminTechController::class, 'update'])->name('adminpanel.technicians.edit');
        Route::delete('/{id}', [AdminTechController::class, 'destroy'])->name('adminpanel.technicians.destroy');
    });


    Route::group(['prefix' => 'Customers'], function () {
        Route::get('/', [AdminTechController::class, 'customer'])->name('adminpanel.Customers');
        Route::get('/customer_create', [AdminTechController::class, 'customer_create'])->name('adminpanel.customer_create');
        Route::post('/customer_store', [AdminTechController::class, 'customer_store'])->name('adminpanel.customer_store');
    });



    Route::get('mail/contact', [mailController::class, "mailform"])->name('mail.create');
    Route::post('mail/sendemail', [mailController::class, "sendmail"])->name('sendmail');
});


// Resident Portal
Route::group(['middleware' => 'resident'], function () {
    Route::group(['prefix' => 'pages'], function () {
        Route::get('/home', [PagesController::class, 'home'])->name('home');
        Route::get('/cart', [PagesController::class, 'cart'])->name('cart');
        Route::get('/wishlist', [PagesController::class, 'wishlist'])->name('wishlist');
        Route::get('/account', [PagesController::class, 'account'])->name('account');
        Route::get('/checkout', [PagesController::class, 'checkout'])->name('checkout');
        Route::get('/success', [PagesController::class, 'success'])->name('success');
        Route::get('/products/{id}', [PagesController::class, 'product'])->name('product');

        Route::post('/stripe-checkout', [CheckoutController::class, 'stripeCheckout'])->name('stripeCheckout');

        Route::get('/profile', [ResidentProfileController::class, 'create'])->name('pages.profile');
        Route::post('/profile', [ResidentProfileController::class, 'store'])->name('pages.profile');


        //Cart
        Route::post('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('addToCart');
        Route::post('/remove-from-cart/{id}', [CartController::class, 'removeFromCart'])->name('removeFromCart');
        Route::post('/add-to-wishlist/{id}', [WishlistController::class, 'post'])->name('addToWishlist');
        Route::post('/remove-from-wishlist/{id}', [WishlistController::class, 'remove'])->name('removeFromWishlist');
    });
});
