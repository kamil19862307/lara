<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/shop-product', [HomeController::class, 'shop-product']);

// Route::get('/shop', function () {
//     return view('shop');
// });

Route::get('/', [ShopController::class, 'home']);

Route::get('shop', [ShopController::class, 'shop']);

Route::get('review', [ShopController::class, 'review']);// Отзывы (Отправка)

Route::get('update/{id}', [ShopController::class, 'review_update']);// Отзывы (Update Показ формы)

Route::get('delete/{id}', [ShopController::class, 'delete']);// Отзывы (Удаление)

Route::put('update-data/{id}', [ShopController::class, 'update']);// Отзывы (Update Обработка формы)

Route::post('review/check', [ShopController::class, 'review_check']);// Отзывы (обработка)

Route::get('about', [ShopController::class, 'about']);

Route::get('shopcart', [ShopController::class, 'shopcart']);

Route::get('shop-product', [ShopController::class, 'shopproduct']);




Route::get('head2', [HomeController::class, 'index']);
Route::get('head', function () {
    return view('head');
});

Route::get('user/{id}/{name}', function ($id, $name) {
    return 'ID: ' . $id . '; Name: ' . $name;
});
