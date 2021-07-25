<?php

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->group(function () {

    Route::group(['middleware' => 'auth'], function(){



    // transmkasi
    // Route::resource('transaksiwb', [App\Http\Controllers\DataPlant\TransaksiWBController::class]);
    // Route::resource('transaksiwb', App\Http\Controllers\DataPlant\TransaksiWBController::class);
    //  Route::resource('/transaksiwb', [App\Http\Controllers\DataPlant\TransaksiWBController::class, 'index'])->name('transaksi.index');
    // Route::resource('/transaksiwb', App\Http\Controllers\DataPlant\TransaksiWBController::class);
   //event
   Route::resource('/event', App\Http\Controllers\Admin\EventController::class, ['except' => 'show' ,'as' => 'admin']);

        //dashboard
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard.index');
        Route::post('/dashboard/post_filter', [App\Http\Controllers\Admin\DashboardController::class, 'post_filter']);

        
        //permissions
        Route::resource('/permission', App\Http\Controllers\Admin\PermissionController::class, ['except' => ['show', 'create', 'edit', 'update', 'delete'] ,'as' => 'admin']);

       //roles
         Route::resource('/role', App\Http\Controllers\Admin\RoleController::class, ['except' => ['show'] ,'as' => 'admin']);   
         
         
         //users
        Route::resource('/user', App\Http\Controllers\Admin\UserController::class, ['except' => ['show'] ,'as' => 'admin']);
    });

});