<?php

use App\Http\Controllers\CheckoutController;

Route::post('/checkout', [CheckoutController::class, 'checkout']);

<?php
// Route ini akan menerima permintaan POST untuk melakukan checkout
// dan mengembalikan token Snap untuk digunakan di frontend.
// Pastikan untuk mengatur konfigurasi Midtrans di file .env atau config/midtrans.php
// dengan server_key, client_key, dan is_production sesuai dengan akun Midtrans Anda.
// Anda juga perlu menginstal paket Midtrans PHP SDK melalui Composer:
// composer require midtrans/midtrans-php