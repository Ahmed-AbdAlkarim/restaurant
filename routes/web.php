<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ShowController;

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

Route::get('/', function () {
    return redirect('/user');
});



    
Route::get('/switch-language/{lang}', function ($lang) {
    if (in_array($lang, config('app.locales', ['en', 'ar']))) {
        session()->put('Lang', $lang);
    }
    return redirect()->back();
})->name('switchLang');



Route::group(['prefix' => 'admin','middleware'=>['auth','admin']], function () {
    Route::get('/', [App\Http\Controllers\AdminController::class,'adminIndex'])->name('admin.index');

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [App\Http\Controllers\UsersController::class,'index'])->name('admin.users');
        Route::get('/create', [App\Http\Controllers\UsersController::class,'create'])->name('admin.users.create');
        Route::post('/create', [App\Http\Controllers\UsersController::class,'submit'])->name('admin.users.submit');
        Route::get('/{id}/edit', [App\Http\Controllers\UsersController::class,'edit'])->name('admin.users.edit');
        Route::post('/{id}/edit', [App\Http\Controllers\UsersController::class,'update'])->name('admin.users.update');
        Route::get('/{id}/delete', [App\Http\Controllers\UsersController::class,'delete'])->name('admin.users.delete');
    });

    Route::group(['prefix' => 'tables'], function () {
        Route::get('/', [App\Http\Controllers\TablesController::class,'index'])->name('admin.tables');
        Route::get('/create', [App\Http\Controllers\TablesController::class,'create'])->name('admin.tables.create');
        Route::post('/create', [App\Http\Controllers\TablesController::class,'submit'])->name('admin.tables.submit');
        Route::get('/{id}/edit', [App\Http\Controllers\TablesController::class,'edit'])->name('admin.tables.edit');
        Route::post('/{id}/edit', [App\Http\Controllers\TablesController::class,'update'])->name('admin.tables.update');
        Route::get('/{id}/delete', [App\Http\Controllers\TablesController::class,'delete'])->name('admin.tables.delete');
    });

    Route::group(['prefix' => 'orders'], function () {
        Route::get('/', [App\Http\Controllers\OrdersController::class,'index'])->name('admin.orders');
        Route::get('/create', [App\Http\Controllers\OrdersController::class,'create'])->name('admin.orders.create');
        Route::post('/create', [App\Http\Controllers\OrdersController::class,'submit'])->name('admin.orders.submit');
        Route::post('/order/submit', [ShowController::class, 'submitOrder'])->name('client.order.submit');
        Route::get('/{id}/edit', [App\Http\Controllers\OrdersController::class,'edit'])->name('admin.orders.edit');
        Route::post('/{id}/edit', [App\Http\Controllers\OrdersController::class,'update'])->name('admin.orders.update');
        Route::get('/{id}/delete', [App\Http\Controllers\OrdersController::class,'delete'])->name('admin.orders.delete');
    });

    Route::group(['prefix' => 'menus'], function () {
        Route::get('/', [App\Http\Controllers\MenusController::class,'index'])->name('admin.menu');
        Route::get('/create', [App\Http\Controllers\MenusController::class,'create'])->name('admin.menu.create');
        Route::post('/create', [App\Http\Controllers\MenusController::class,'submit'])->name('admin.menu.submit');
        Route::get('/{id}/edit', [App\Http\Controllers\MenusController::class,'edit'])->name('admin.menu.edit');
        Route::post('/{id}/edit', [App\Http\Controllers\MenusController::class,'update'])->name('admin.menu.update');
        Route::get('/{id}/delete', [App\Http\Controllers\MenusController::class,'delete'])->name('admin.menu.delete');
    });

    Route::group(['prefix' => 'chefs'], function () {
        Route::get('/', [App\Http\Controllers\ChefController::class, 'index'])->name('admin.chefs');
        Route::get('/create', [App\Http\Controllers\ChefController::class, 'create'])->name('admin.chefs.create');
        Route::post('/create', [App\Http\Controllers\ChefController::class, 'store'])->name('admin.chefs.store');
        Route::get('/{chef}/edit', [App\Http\Controllers\ChefController::class, 'edit'])->name('admin.chefs.edit');
        Route::post('/{chef}/update', [App\Http\Controllers\ChefController::class, 'update'])->name('admin.chefs.update');
        Route::delete('/{chef}/delete', [App\Http\Controllers\ChefController::class, 'delete'])->name('admin.chefs.delete');
    });

    Route::group(['prefix' => 'abouts'], function () {
        Route::get('/', [App\Http\Controllers\AboutController::class, 'index'])->name('admin.abouts');
        Route::get('/create', [App\Http\Controllers\AboutController::class, 'create'])->name('admin.abouts.create');
        Route::post('/create', [App\Http\Controllers\AboutController::class, 'store'])->name('admin.abouts.store');
        Route::get('/{about}/edit', [App\Http\Controllers\AboutController::class, 'edit'])->name('admin.abouts.edit');
        Route::post('/{about}/update', [App\Http\Controllers\AboutController::class, 'update'])->name('admin.abouts.update');
        Route::delete('/{about}/delete', [App\Http\Controllers\AboutController::class, 'delete'])->name('admin.abouts.delete');
    });
    
    Route::group(['prefix' => 'reservations'], function () {
        Route::get('/', [App\Http\Controllers\ReservationController::class, 'index'])->name('admin.reservations'); // عرض الحجوزات في لوحة التحكم
        Route::get('/create', [App\Http\Controllers\ReservationController::class, 'create'])->name('reservations.create'); // عرض نموذج الحجز
        Route::post('/store', [App\Http\Controllers\ReservationController::class, 'store'])->name('reservations.store'); // تخزين الحجز
        Route::delete('/{id}', [App\Http\Controllers\ReservationController::class, 'destroy'])->name('reservations.destroy'); // حذف الحجز
    });
    
});

Route::get('/user', [ShowController::class, 'user'])->name('user.page');
Route::get('/menu', [ShowController::class, 'menu'])->name('menu.page');
Route::get('/about', [ShowController::class, 'about'])->name('about.page');
Route::get('/booking', [ShowController::class, 'booking'])->name('booking.page');
Route::get('/order', [ShowController::class, 'order'])->name('client.order');

Auth::routes();



