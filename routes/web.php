<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Events\sendMessage;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Redirect;
use App\NhanVien;
use GuzzleHttp\Middleware;

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
//form

//real-time
//$i=1;
Route::get('/', function () {
    return view('admin.login');
});
Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Route::group(['prefix' => 'page'], function () {
    Route::get('login', 'loginController@login');
});

Route::group(['prefix' => 'admin'   ], function () {
    Route::get('manage-account', function () {
        return view('admin.account');
    });
    Route::get('manage-product-category', function () {
        return view('admin.product-category');
    });
    Route::get('manage-product-product', function () {
        return view('admin.product-product');
    });
<<<<<<< HEAD
    Route::get('manage-floor-table', function () {
        return view('admin.floor-table');
    });
    Route::get('manage-customer', function () {
        return view('admin.customer');
    });


=======
>>>>>>> 9f95f13acb0054fe12a38f08bdd84e84f02ed5b1
    Route::get('list-account-type', 'admin_board\viewController@list_account_type');
    Route::get('list-permission', 'admin_board\viewController@list_permission');

    Route::resource('account-account', 'admin_board\account_accountController');
    Route::post('account-account-permission', 'admin_board\account_accountController@account_permission');
    Route::post('account-account-detail', 'admin_board\account_accountController@account_detail');
    Route::post('account-account-disable', 'admin_board\account_accountController@account_disable');
    Route::post('account-account-change-password', 'admin_board\account_accountController@account_change_password');

    Route::resource('product-category', 'admin_board\product_categoryController');
<<<<<<< HEAD
    Route::post('product-category-update', 'admin_board\product_categoryController@product_category_update');
    // dua vao ham put update thi nos co bug
    Route::resource('product-product', 'admin_board\product_productController');
    Route::post('product-product-update', 'admin_board\product_productController@product_update');
    Route::get('product-product-unit', 'admin_board\product_productController@get_unit');
    Route::post('product-product-extra', 'admin_board\product_productController@insert_product_extra');
    Route::post('product-product-seach', 'admin_board\product_productController@product_seach');
    Route::post('product-product-seach-auto', 'admin_board\product_productController@product_seach_auto');
    Route::post('product-product-delete-extra', 'admin_board\product_productController@detele_extra');
    Route::post('product-product-disable', 'admin_board\product_productController@product_disable');

    Route::resource('floor', 'admin_board\floorController');

    Route::resource('table', 'admin_board\tableController');
    Route::post('get-table', 'admin_board\tableController@get_table');//lay table theo điều kiện
=======
    Route::resource('product-product', 'admin_board\product_productController');

    Route::get('product-product-unit', 'admin_board\product_productController@get_unit');
    Route::post('product-product-extra', 'admin_board\product_productController@insert_product_extra');
    Route::post('product-product-seach', 'admin_board\product_productController@product_seach');
    Route::post('product-product-seach-auto', 'admin_board\product_productController@product_seach_auto');
    Route::post('product-product-delete-extra', 'admin_board\product_productController@detele_extra');
>>>>>>> 9f95f13acb0054fe12a38f08bdd84e84f02ed5b1

    Route::resource('customer-customer', 'admin_board\customer_customerController');
    Route::post('get-customer-customer', 'admin_board\customer_customerController@get_customer');
});
