<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

Route::view('/login', 'login')->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        return redirect('/dasboard');
    }

    return redirect()->route('login')->with('error', 'Email atau kata sandi salah!');
})->name('do.login');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

// Router For pages
Route::get('/', function () {
    return view('home');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/cart', function () {
    return view('cart');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/products', function () {
    return view('products');
});
Route::get('/checkout', function () {
    return view('checkout');
});
Route::get('/order-succes', function () {
    return view('order-success');
});
// Route for admin pages
Route::get('pages/admin/dasboard', function () {
    return view('pages.admin.dasboard');
});
Route::get('pages/admin/products', function () {
    return view('pages.admin.products');
});
Route::get('pages/admin/orders', function () {
    return view('pages.admin.orders');
});
Route::get('pages/admin/users', function () {
    return view('pages.admin.users');
});
Route::get('pages/admin/reports', function () {
    return view('pages.admin.reports');
});


// Route for user pages
Route::get('pages/user/dasboard', function () {
    return view('pages.user.dasboard');
});
Route::get('pages/user/products', function () {
    return view('pages.user.products');
});
Route::get('pages/user/orders', function () {
    return view('pages.user.orders');
});
Route::get('pages/user/profile', function () {
    return view('pages.user.profile');
});
Route::get('pages/user/address', function () {
    return view('pages.user.address');
});
Route::get('pages/user/wishlist', function () {
    return view('pages.user.wishlist');
});
