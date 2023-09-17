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
        Route::post('/store/movie', 'StoreMovie')->name('store.movie');

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

    // Targets Type All Route
    Route::controller(ProductsTypeController::class)->group(function(){

        Route::get('/all/target', 'AllTarget')->name('all.target');
        Route::get('/add/target', 'AddTarget')->name('add.target');
        Route::post('/store/target', 'StoreTarget')->name('store.target');
        Route::get('/edit/target/{id}', 'EditTarget')->name('edit.target');
        Route::post('/update/target', 'UpdateTarget')->name('update.target');
        Route::get('/delete/target/{id}', 'DeleteTarget')->name('delete.target');

    });
    
    // Appleal Points All Route
    Route::controller(ProductsTypeController::class)->group(function(){

        Route::get('/all/appeal', 'AllAppealPoint')->name('all.appeal');
        Route::get('/add/appeal', 'AddAppealPoint')->name('add.appeal');
        Route::post('/store/appeal', 'StoreAppealPoint')->name('store.appeal');
        Route::get('/edit/appeal/{id}', 'EditAppealPoint')->name('edit.appeal');
        Route::post('/update/appeal', 'UpdateAppealPoint')->name('update.appeal');
        Route::get('/delete/appeal/{id}', 'DeleteAppealPoint')->name('delete.appeal');

    });
    
    // Tags All Route
    Route::controller(ProductsTypeController::class)->group(function(){

        Route::get('/all/tag', 'AllTag')->name('all.tag');
        Route::get('/add/tag', 'AddTag')->name('add.tag');
        Route::post('/store/tag', 'StoreTag')->name('store.tag');
        Route::get('/edit/tag/{id}', 'EditTag')->name('edit.tag');
        Route::post('/update/tag', 'UpdateTag')->name('update.tag');
        Route::get('/delete/tag/{id}', 'DeleteTag')->name('delete.tag');

    });
    
    // Color Terms All Route
    Route::controller(ProductsTypeController::class)->group(function(){

        Route::get('/all/color', 'AllColorTerm')->name('all.color');
        Route::get('/add/color', 'AddColorTerm')->name('add.color');
        Route::post('/store/color', 'StoreColorTerm')->name('store.color');
        Route::get('/edit/color/{id}', 'EditColorTerm')->name('edit.color');
        Route::post('/update/color', 'UpdateColorTerm')->name('update.color');
        Route::get('/delete/color/{id}', 'DeleteColorTerm')->name('delete.color');

    });
    
    // Shape Terms All Route
    Route::controller(ProductsTypeController::class)->group(function(){

        Route::get('/all/shape', 'AllShapeTerm')->name('all.shape');
        Route::get('/add/shape', 'AddShapeTerm')->name('add.shape');
        Route::post('/store/shape', 'StoreShapeTerm')->name('store.shape');
        Route::get('/edit/shape/{id}', 'EditShapeTerm')->name('edit.shape');
        Route::post('/update/shape', 'UpdateShapeTerm')->name('update.shape');
        Route::get('/delete/shape/{id}', 'DeleteShapeTerm')->name('delete.shape');

    });
    
    // Brightness Terms All Route
    Route::controller(ProductsTypeController::class)->group(function(){

        Route::get('/all/brightness', 'AllBrightnessTerm')->name('all.brightness');
        Route::get('/add/brightness', 'AddBrightnessTerm')->name('add.brightness');
        Route::post('/store/brightness', 'StoreBrightnessTerm')->name('store.brightness');
        Route::get('/edit/brightness/{id}', 'EditBrightnessTerm')->name('edit.brightness');
        Route::post('/update/brightness', 'UpdateBrightnessTerm')->name('update.brightness');
        Route::get('/delete/brightness/{id}', 'DeleteBrightnessTerm')->name('delete.brightness');

    });
    
    // Emotional Terms All Route
    Route::controller(ProductsTypeController::class)->group(function(){

        Route::get('/all/emotional', 'AllEmotionalTerm')->name('all.emotional');
        Route::get('/add/emotional', 'AddEmotionalTerm')->name('add.emotional');
        Route::post('/store/emotional', 'StoreEmotionalTerm')->name('store.emotional');
        Route::get('/edit/emotional/{id}', 'EditEmotionalTerm')->name('edit.emotional');
        Route::post('/update/emotional', 'UpdateEmotionalTerm')->name('update.emotional');
        Route::get('/delete/emotional/{id}', 'DeleteEmotionalTerm')->name('delete.emotional');

    });
    
    // Environment Terms All Route
    Route::controller(ProductsTypeController::class)->group(function(){

        Route::get('/all/environment', 'AllEnvironmentTerm')->name('all.environment');
        Route::get('/add/environment', 'AddEnvironmentTerm')->name('add.environment');
        Route::post('/store/environment', 'StoreEnvironmentTerm')->name('store.environment');
        Route::get('/edit/environment/{id}', 'EditEnvironmentTerm')->name('edit.environment');
        Route::post('/update/environment', 'UpdateEnvironmentTerm')->name('update.environment');
        Route::get('/delete/environment/{id}', 'DeleteEnvironmentTerm')->name('delete.environment');

    });
    
    // Object Terms All Route
    Route::controller(ProductsTypeController::class)->group(function(){

        Route::get('/all/object', 'AllObjectTerm')->name('all.object');
        Route::get('/add/object', 'AddObjectTerm')->name('add.object');
        Route::post('/store/object', 'StoreObjectTerm')->name('store.object');
        Route::get('/edit/object/{id}', 'EditObjectTerm')->name('edit.object');
        Route::post('/update/object', 'UpdateObjectTerm')->name('update.object');
        Route::get('/delete/object/{id}', 'DeleteObjectTerm')->name('delete.object');

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