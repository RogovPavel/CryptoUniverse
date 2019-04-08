<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Маршруты для группы админ
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function() {
    // Главная страница Админки
    Route::get('/', function() {
        return view('admin.main');
    });
    
    // Группа маршрутов для работы с Товарами
    Route::resource('goods', 'Admin\GoodsController');
    
    // Просмотр заказов
    Route::get('/orders', 'Admin\OrdersController@index')->name('orders.index');
    // Продажа товара
    Route::post('/orders/sale/{id}', 'Admin\OrdersController@sale')->name('orders.sale');
});

// Вывод ошибки для доступа к админке
Route::get('/noadmin', function() {
    return view('noadmin');
});


// Маршруры для обычных пользователей с товарами
Route::group(['middleware' => ['auth'], 'prefix' => 'goods'], function() {
    Route::get('/', 'GoodsController@index');
    Route::post('/buy/{id}', 'GoodsController@buy')->name('goods.buy');
});

