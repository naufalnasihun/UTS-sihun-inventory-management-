<?php
 
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Support\Facades\Route;
 
Route::redirect('/', '/dashboard');
 
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
});
 
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')->name('logout');
 
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard', [
            'categoryCount' => Category::count(),
            'itemCount' => Item::count(),
            'stockCount' => (int) Item::sum('stock'),
            'latestItems' => Item::with('category')->latest()->take(5)->get(),
        ]);
    })->name('dashboard');
 
    Route::resource('categories', CategoryController::class)->except(['show']);
    Route::resource('items', ItemController::class)->except(['show']);
});
