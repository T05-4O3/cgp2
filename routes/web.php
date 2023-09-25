<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CreatorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\ProductsTypeController;
use App\Http\Controllers\Backend\MovieController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\Creator\CreatorMovieController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\CompareController;

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
    
    // User Wishlist All Route
    Route::controller(WishlistController::class)->group(function(){
        Route::get('/user/wishlist', 'UserWishlist')->name('user.wishlist');
        Route::get('/get-wishlist-movie', 'GetWishlistMovie');
        Route::get('/wishlist-remove/{id}', 'WishlistRemove');
    });
    
    // User Compare All Route
    Route::controller(CompareController::class)->group(function(){
        Route::get('/user/compare', 'UserCompare')->name('user.compare');
        Route::get('/get-compare-movie', 'GetCompareMovie');
        Route::get('/compare-remove/{id}', 'CompareRemove');
    });

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
    Route::get('/creator/logout', [CreatorController::class, 'CreatorLogout'])->name('creator.logout');
    Route::get('/creator/profile', [CreatorController::class, 'CreatorProfile'])->name('creator.profile');
    Route::post('/creator/profile/store', [CreatorController::class, 'CreatorProfileStore'])->name('creator.profile.store');
    Route::get('/creator/change/password', [CreatorController::class, 'CreatorChangePassword'])->name('creator.change.password');
    Route::post('/creator/update/store', [CreatorController::class, 'CreatorUpdatePassword'])->name('creator.update.password');

}); // End Group Creator Middleware

Route::get('/creator/login', [CreatorController::class, 'CreatorLogin'])->name('creator.login')->middleware(RedirectIfAuthenticated::class);

Route::post('/creator/register', [CreatorController::class, 'CreatorRegister'])->name('creator.register');

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login')->middleware(RedirectIfAuthenticated::class);

 /// Admin Group Middleware
 Route::middleware(['auth','role:admin'])->group(function(){
    
    // Movie All Route
    Route::controller(MovieController::class)->group(function(){

        Route::get('/all/movie', 'AllMovie')->name('all.movie');
        Route::get('/add/movie', 'AddMovie')->name('add.movie');
        Route::post('/store/movie', 'StoreMovie')->name('store.movie');
        Route::get('/edit/movie/{id}', 'EditMovie')->name('edit.movie');
        Route::post('/update/movie', 'UpdateMovie')->name('update.movie');
        Route::post('/update/movie/tags', 'UpdateMovieTags')->name('update.movie.tags');
        Route::get('/delete/movie/{id}', 'DeleteMovie')->name('delete.movie');
        Route::get('/details/movie/{id}', 'DetailsMovie')->name('details.movie');
        Route::post('/inactive/movie', 'InactiveMovie')->name('inactive.movie');
        Route::post('/active/movie', 'ActiveMovie')->name('active.movie');

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

    // Creator All Route from Admin
    Route::controller(AdminController::class)->group(function(){

        Route::get('/all/creator', 'AllCreator')->name('all.creator');
        Route::get('/add/creator', 'AddCreator')->name('add.creator');
        Route::post('/store/creator', 'StoreCreator')->name('store.creator');
        Route::get('/edit/creator/{id}', 'EditCreator')->name('edit.creator');
        Route::post('/update/creator', 'UpdateCreator')->name('update.creator');
        Route::get('/delete/creator/{id}', 'DeleteCreator')->name('delete.creator');
        Route::get('/changeStatus', 'changeStatus');
    });

}); // End Group Admin Middleware

/// Creator Group Middleware
Route::middleware(['auth','role:creator'])->group(function(){
    // Creator All Movie
    Route::controller(CreatorMovieController::class)->group(function(){

        Route::get('/creator/all/movie', 'CreatorAllMovie')->name('creator.all.movie');
        Route::get('/creator/add/movie', 'CreatorAddMovie')->name('creator.add.movie');
        Route::post('/creator/store/movie', 'CreatorStoreMovie')->name('creator.store.movie');
        Route::get('/creator/edit/movie/{id}', 'CreatorEditMovie')->name('creator.edit.movie');
        Route::post('/creator/update/movie', 'CreatorUpdateMovie')->name('creator.update.movie');
        Route::post('/creator/update/movie/tags', 'CreatorUpdateMovieTags')->name('creator.update.movie.tags');
        Route::get('/creator/details/movie/{id}', 'CreatorDetailsMovie')->name('creator.details.movie');
        Route::post('/creator/store/movie', 'CreatorStoreMovie')->name('creator.store.movie');
        Route::get('/creator/movie/message', 'CreatorMovieMessage')->name('creator.movie.message');
        Route::get('/creator/message/details/{id}', 'CreatorMessageDetails')->name('creator.message.details');
    });

    // Creator All Route from Admin
    Route::controller(CreatorMovieController::class)->group(function(){

        Route::get('/buy/package', 'BuyPackage')->name('buy.package');
    });

}); // End Group Creator Middleware

// Frontend Movie Details All Route
Route::get('movie/details/{id}', [IndexController::class, 'MovieDetails']);

// Wishlist Add Route
Route::post('/add-to-wishList/{movie_id}', [WishlistController::class, 'AddToWishList']);

// Compare Add Route
Route::post('/add-to-compare/{movie_id}', [CompareController::class, 'AddToCompare']);

// Send Message From Property Details Route
Route::post('movie/message', [IndexController::class, 'MovieMessage'])->name('movie.message');
