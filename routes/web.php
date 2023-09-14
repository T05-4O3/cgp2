<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CreatorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\ProductsTypeController;
use App\Http\Controllers\Backend\MovieController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// User Frontend All Route
Route::get('/', [UserController::class, 'Index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/user/profile', [UserController::class, 'UserProfile'])->name('user.profile');

    Route::post('/user/profile/store', [UserController::class, 'UserProfileStore'])->name('user.profile.store');

    Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');

    Route::get('/user/change/password', [UserController::class, 'UserChangePassword'])->name('user.change.password');

    Route::post('/user/password/update', [UserController::class, 'UserPasswordUpdate'])->name('user.password.update');
});

require __DIR__.'/auth.php';

 /// Admin Group Middleware
Route::middleware(['auth','role:admin'])->group(function(){

    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');

    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');

    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');

    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');

}); // End Group Admin Middleware

 /// Creator Group Middleware
Route::middleware(['auth','role:creator'])->group(function(){

    Route::get('/creator/dashboard', [CreatorController::class, 'CreatorDashboard'])->name('creator.dashboard');

}); // End Group Creator Middleware

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

 /// Admin Group Middleware
 Route::middleware(['auth','role:admin'])->group(function(){
    
    // Movie All Route
    Route::controller(MovieController::class)->group(function(){

        Route::get('/all/movie', 'AllMovie')->name('all.movie');
        Route::get('/add/movie', 'AddMovie')->name('add.movie');

    });

    // Products Type All Route
    Route::controller(ProductsTypeController::class)->group(function(){

        Route::get('/all/type', 'AllType')->name('all.type');
        Route::get('/add/type', 'AddType')->name('add.type');
        Route::post('/store/type', 'StoreType')->name('store.type');
        Route::get('/edit/type/{id}', 'EditType')->name('edit.type');
        Route::post('/update/type', 'UpdateType')->name('update.type');
        Route::get('/delete/type/{id}', 'DeleteType')->name('delete.type');

    });

    // Goal Type All Route
    Route::controller(ProductsTypeController::class)->group(function(){

        Route::get('/all/goal', 'AllGoal')->name('all.goal');
        Route::get('/add/goal', 'AddGoal')->name('add.goal');
        Route::post('/store/goal', 'StoreGoal')->name('store.goal');
        Route::get('/edit/goal/{id}', 'EditGoal')->name('edit.goal');
        Route::post('/update/goal', 'UpdateGoal')->name('update.goal');
        Route::get('/delete/goal/{id}', 'DeleteGoal')->name('delete.goal');

    });

    // Storytellings All Route
    Route::controller(ProductsTypeController::class)->group(function(){

        Route::get('/all/storytelling', 'AllStorytelling')->name('all.storytelling');
        Route::get('/add/storytelling', 'AddStorytelling')->name('add.storytelling');
        Route::post('/store/storytelling', 'StoreStorytelling')->name('store.storytelling');
        Route::get('/edit/storytelling/{id}', 'EditStorytelling')->name('edit.storytelling');
        Route::post('/update/storytelling', 'UpdateStorytelling')->name('update.storytelling');
        Route::get('/delete/storytelling/{id}', 'DeleteStorytelling')->name('delete.storytelling');

    });


}); // End Group Admin Middleware