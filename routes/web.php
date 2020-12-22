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

Route::get('view-manage-agent','adminController@view_manage_agent');

Route::group(['prefix' => 'page'], function () {
    Route::get('login', 'loginController@login');
    Route::get('login/google', 'loginController@login_google');
    Route::get('login/google/callback', 'loginController@google_callback');

});

Route::group(['prefix' => 'admin','middleware'=>['auth.roles:admin,manager']], function () {
    Route::get('manage-agent', function () {
        return view('admin.a gent');
    });

});
