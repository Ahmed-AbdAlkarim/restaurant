<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TablesController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\MenusController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ReservationController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// راوت افتراضي
Route::get('/', function () {
    return redirect('/api/user');
});

// راوت لتغيير اللغة (API مش هيستخدم سيشن، هيرجع رد JSON)
Route::get('/switch-language/{lang}', function ($lang) {
    if (in_array($lang, config('app.locales', ['en', 'ar']))) {
        return response()->json(['message' => 'Language switched', 'lang' => $lang]);
    }
    return response()->json(['message' => 'Invalid language'], 400);
});

// راوتات المشرف مع ميدل وير التحقق
Route::group(['prefix' => 'admin', 'middleware' => ['auth:sanctum', 'admin']], function () {
    Route::get('/', [AdminController::class, 'adminIndex']);

    // إدارة المستخدمين
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [UsersController::class, 'index']);
        Route::post('/create', [UsersController::class, 'submit']);
        Route::get('/{id}', [UsersController::class, 'edit']);
        Route::put('/{id}', [UsersController::class, 'update']);
        Route::delete('/{id}', [UsersController::class, 'delete']);
    });

    // إدارة الطاولات
    Route::group(['prefix' => 'tables'], function () {
        Route::get('/', [TablesController::class, 'index']);
        Route::post('/create', [TablesController::class, 'submit']);
        Route::get('/{id}', [TablesController::class, 'edit']);
        Route::put('/{id}', [TablesController::class, 'update']);
        Route::delete('/{id}', [TablesController::class, 'delete']);
    });

    // إدارة الطلبات
    Route::group(['prefix' => 'orders'], function () {
        Route::get('/', [OrdersController::class, 'index']);
        Route::post('/create', [OrdersController::class, 'submit']);
        Route::post('/submit', [ShowController::class, 'submitOrder']);
        Route::get('/{id}', [OrdersController::class, 'edit']);
        Route::put('/{id}', [OrdersController::class, 'update']);
        Route::delete('/{id}', [OrdersController::class, 'delete']);
    });

    // إدارة القائمة (المنيو)
    Route::group(['prefix' => 'menus'], function () {
        Route::get('/', [MenusController::class, 'index']);
        Route::post('/create', [MenusController::class, 'submit']);
        Route::get('/{id}', [MenusController::class, 'edit']);
        Route::put('/{id}', [MenusController::class, 'update']);
        Route::delete('/{id}', [MenusController::class, 'delete']);
    });

    // إدارة الطهاة
    Route::group(['prefix' => 'chefs'], function () {
        Route::get('/', [ChefController::class, 'index']);
        Route::post('/create', [ChefController::class, 'store']);
        Route::get('/{chef}', [ChefController::class, 'edit']);
        Route::put('/{chef}', [ChefController::class, 'update']);
        Route::delete('/{chef}', [ChefController::class, 'delete']);
    });

    // إدارة صفحة "من نحن"
    Route::group(['prefix' => 'abouts'], function () {
        Route::get('/', [AboutController::class, 'index']);
        Route::post('/create', [AboutController::class, 'store']);
        Route::get('/{about}', [AboutController::class, 'edit']);
        Route::put('/{about}', [AboutController::class, 'update']);
        Route::delete('/{about}', [AboutController::class, 'delete']);
    });

    // إدارة الحجوزات
    Route::group(['prefix' => 'reservations'], function () {
        Route::get('/', [ReservationController::class, 'index']);
        Route::post('/create', [ReservationController::class, 'store']);
        Route::delete('/{id}', [ReservationController::class, 'destroy']);
    });
});

// راوتات عرض البيانات بدون تسجيل دخول
Route::get('/user', [ShowController::class, 'user']);
Route::get('/menu', [ShowController::class, 'menu']);
Route::get('/about', [ShowController::class, 'about']);
Route::get('/booking', [ShowController::class, 'booking']);
Route::get('/order', [ShowController::class, 'order']);

// المصادقة باستخدام Laravel Sanctum
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});