<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/login', function () {
    return view('login');
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


// Route for admin pages
Route::get('pages/admin/dashboard', function () {
    return view('pages.admin.dashboard');
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
Route::get('pages/user/dashboard', function () {
    return view('pages.user.dashboard');
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
