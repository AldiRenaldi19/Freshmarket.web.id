<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\CheckoutController;

// Route for checkout 
Route::post('/api/checkout', [CheckoutController::class, 'checkout']);
// route midtrans token
Route::get('/api/snap/token', [CheckoutController::class, 'getSnapToken'])->name('snap.token');

// Middleware to ensure user is authenticated
Route::middleware(['auth'])->group(function () {
    // Protected routes for authenticated users
    Route::get('/dasboard', function () {
        return view('pages.user.dasboard');
    })->name('user.dasboard');
    Route::get('/products', function () {
        return view('pages.user.products');
    })->name('user.products');
    Route::get('/orders', function () {
        return view('pages.user.orders');
    })->name('user.orders');
    Route::get('/profile', function () {
        return view('pages.user.profile');
    })->name('user.profile');
    Route::get('/address', function () {
        return view('pages.user.address');
    })->name('user.address');
    Route::get('/wishlist', function () {
        return view('pages.user.wishlist');
    })->name('user.wishlist');
});
// Middleware to ensure user is an admin
Route::middleware(['auth', 'admin'])->group(function () {
    // Protected routes for admin users
    Route::get('/admin/dasboard', function () {
        return view('pages.admin.dasboard');
    })->name('admin.dasboard');
    Route::get('/admin/products', function () {
        return view('pages.admin.products');
    })->name('admin.products');
    Route::get('/admin/orders', function () {
        return view('pages.admin.orders');
    })->name('admin.orders');
    Route::get('/admin/users', function () {
        return view('pages.admin.users');
    })->name('admin.users');
    Route::get('/admin/reports', function () {
        return view('pages.admin.reports');
    })->name('admin.reports');
});

// Middleware to check if user is authenticated
Route::middleware(['auth'])->group(function () {
    // Protected routes for authenticated users
    Route::get('/dasboard', function () {
        return view('pages.user.dasboard');
    })->name('user.dasboard');
});
// Middleware to check if user is an admin
Route::middleware(['auth', 'admin'])->group(function () {
    // Protected routes for admin users
    Route::get('/admin/dasboard', function () {
        return view('pages.admin.dasboard');
    })->name('admin.dasboard');
    Route::get('/admin/products', function () {
        return view('pages.admin.products');
    })->name('admin.products');
    Route::get('/admin/orders', function () {
        return view('pages.admin.orders');
    })->name('admin.orders');
    Route::get('/admin/users', function () {
        return view('pages.admin.users');
    })->name('admin.users');
    Route::get('/admin/reports', function () {
        return view('pages.admin.reports');
    })->name('admin.reports');
});

// 
// Route for authentication
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

// Route for registration
Route::view('/register', 'register')->name('register');
Route::post('/register', function (Request $request) {
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $data['password'] = bcrypt($data['password']);
    \App\Models\User::create($data);

    return redirect('/login')->with('success', 'Registrasi berhasil! Silakan masuk.');
})->name('do.register');

// Route for checkout
Route::post('/checkout', function (Request $request) {
    $formData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'address' => 'required|string|max:255',
        'phone' => 'required|string|max:15',
        'payment_method' => 'required|string|max:50',
    ]);
    // Simulate order processing
    // In a real application, you would save the order to the database and process payment here
    // For this example, we'll just return a success message
    return response()->json(['message' => 'Order placed successfully!'], 200);
})->name('do.checkout');
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
Route::get('/order-redirect', function () {
    return view('order-redirect');
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
