<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CreatorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\ProductsTypeController;
use App\Http\Controllers\Backend\MovieController;

use App\Http\Middleware\RedirectIfAuthenticated;

use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\ChatController;

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

    Route::get('/user/schedule/request', [UserController::class, 'UserScheduleRequest'])->name('user.schedule.request');

    Route::get('/live/chat', [UserController::class, 'LiveChat'])->name('live.chat');

    
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
Route::middleware(['auth','roles:admin'])->group(function(){

    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');

}); // End Group Admin Middleware

 /// Creator Group Middleware
Route::middleware(['auth','roles:creator'])->group(function(){

    Route::get('/creator/dashboard', [CreatorController::class, 'CreatorDashboard'])->name('creator.dashboard');
    Route::get('/creator/logout', [CreatorController::class, 'CreatorLogout'])->name('creator.logout');
    Route::get('/creator/profile', [CreatorController::class, 'CreatorProfile'])->name('creator.profile');
    Route::post('/creator/profile/store', [CreatorController::class, 'CreatorProfileStore'])->name('creator.profile.store');
    Route::get('/creator/change/password', [CreatorController::class, 'CreatorChangePassword'])->name('creator.change.password');
    Route::post('/creator/update/store', [CreatorController::class, 'CreatorUpdatePassword'])->name('creator.update.password');

}); // End Group Creator Middleware

Route::post('/client/register', [UserController::class, 'ClientRegister'])->name('client.register');

Route::get('/creator/login', [CreatorController::class, 'CreatorLogin'])->name('creator.login')->middleware(RedirectIfAuthenticated::class);
Route::post('/creator/register', [CreatorController::class, 'CreatorRegister'])->name('creator.register');

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login')->middleware(RedirectIfAuthenticated::class);

 /// Admin Group Middleware
Route::middleware(['auth','roles:admin'])->group(function(){
    
    // Movie All Route
    Route::controller(MovieController::class)->group(function(){

        Route::get('/all/movie', 'AllMovie')->name('all.movie')->middleware('permission:all.movie');
        Route::get('/add/movie', 'AddMovie')->name('add.movie')->middleware('permission:add.movie');
        Route::post('/store/movie', 'StoreMovie')->name('store.movie');
        Route::get('/edit/movie/{id}', 'EditMovie')->name('edit.movie');
        Route::post('/update/movie', 'UpdateMovie')->name('update.movie');
        Route::post('/update/movie/tags', 'UpdateMovieTags')->name('update.movie.tags');
        Route::get('/delete/movie/{id}', 'DeleteMovie')->name('delete.movie');
        Route::get('/details/movie/{id}', 'DetailsMovie')->name('details.movie');
        Route::post('/inactive/movie', 'InactiveMovie')->name('inactive.movie');
        Route::post('/active/movie', 'ActiveMovie')->name('active.movie');

        Route::get('/admin/movie/message', 'AdminMovieMessage')->name('admin.movie.message');

    });

    // Products Type All Route
    Route::controller(ProductsTypeController::class)->group(function(){

        Route::get('/all/type', 'AllType')->name('all.type')->middleware('permission:all.type');
        Route::get('/add/type', 'AddType')->name('add.type')->middleware('permission:add.type');
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

    // Blog Category All Route
    Route::controller(BlogController::class)->group(function(){

        Route::get('/all/blog/category', 'AllBlogCategory')->name('all.blog.category');
        Route::post('/store/blog/category', 'StoreBlogCategory')->name('store.blog.category');
        Route::get('/blog/category/{id}', 'EditBlogCategory');
        Route::post('/update/blog/category', 'UpdateBlogCategory')->name('update.blog.category');
        Route::get('/delete/blog/category/{id}', 'DeleteBlogCategory')->name('delete.blog.category');

    });

    // Blog All Route from Admin
    Route::controller(BlogController::class)->group(function(){

        Route::get('/all/post', 'AllPost')->name('all.post');
        Route::get('/add/post', 'AddPost')->name('add.post');
        Route::post('/store/post', 'StorePost')->name('store.post');
        Route::get('/edit/post/{id}', 'EditPost')->name('edit.post');
        Route::post('/update/post', 'UpdatePost')->name('update.post');
        Route::get('/delete/post/{id}', 'DeletePost')->name('delete.post');
    });

    // SMTP Setting All Route from Admin
    Route::controller(SettingController::class)->group(function(){

        Route::get('/smtp/setting', 'SmtpSetting')->name('smtp.setting');
        Route::post('/update/smtp/setting', 'UpdateSmtpSetting')->name('update.smtp.setting');
    });

    // Site Setting All Route from Admin
    Route::controller(SettingController::class)->group(function(){

        Route::get('/site/setting', 'SiteSetting')->name('site.setting');
        Route::post('/update/site/setting', 'UpdateSiteSetting')->name('update.site.setting');
    });

    // Permission All Route
    Route::controller(RoleController::class)->group(function(){

        Route::get('/all/permission', 'AllPermission')->name('all.permission');
        Route::get('/add/permission', 'AddPermission')->name('add.permission');
        Route::post('/store/permission', 'StorePermission')->name('store.permission');
        Route::get('/edit/permission/{id}', 'EditPermission')->name('edit.permission');
        Route::post('/update/permission', 'UpdatePermission')->name('update.permission');
        Route::get('/delete/permission/{id}', 'DeletePermission')->name('delete.permission');

        Route::get('/import/permission', 'ImportPermission')->name('import.permission');
        Route::get('/export', 'Export')->name('export');
        Route::post('/import', 'Import')->name('import');
    });

    // Roles All Route
    Route::controller(RoleController::class)->group(function(){

        Route::get('/all/roles', 'AllRoles')->name('all.roles');
        Route::get('/add/roles', 'AddRoles')->name('add.roles');
        Route::post('/store/roles', 'StoreRoles')->name('store.roles');
        Route::get('/edit/roles/{id}', 'EditRoles')->name('edit.roles');
        Route::post('/update/roles', 'UpdateRoles')->name('update.roles');
        Route::get('/delete/roles/{id}', 'DeleteRoles')->name('delete.roles');

        Route::get('/add/roles/permission', 'AddRolesPermission')->name('add.roles.permission');
        Route::post('/role/permission/store', 'RolePermissionStore')->name('role.permission.store');
        Route::get('/all/roles/permission', 'AllRolesPermission')->name('all.roles.permission');
        Route::get('/admin/edit/roles/{id}', 'AdminEditRoles')->name('admin.edit.roles');
        Route::post('/admin/roles/update/{id}', 'AdminRolesUpdate')->name('admin.roles.update');
        Route::get('/admin/delete/roles/{id}', 'AdminDeleteRoles')->name('admin.delete.roles');
    });

    // Admin User All Route from Admin
    Route::controller(AdminController::class)->group(function(){

        Route::get('/all/admin', 'AllAdmin')->name('all.admin');
        Route::get('/add/admin', 'AddAdmin')->name('add.admin');
        Route::post('/store/admin', 'StoreAdmin')->name('store.admin');
        Route::get('/edit/admin/{id}', 'EditAdmin')->name('edit.admin');
        Route::post('/update/admin/{id}', 'UpdateAdmin')->name('update.admin');
        Route::get('/delete/admin/{id}', 'DeleteAdmin')->name('delete.admin');
    });

}); // End Group Admin Middleware

/// Creator Group Middleware
Route::middleware(['auth','roles:creator'])->group(function(){
    // Creator All Movie
    Route::controller(CreatorMovieController::class)->group(function(){

        Route::get('/creator/all/movie', 'CreatorAllMovie')->name('creator.all.movie');
        Route::get('/creator/add/movie', 'CreatorAddMovie')->name('creator.add.movie');
        Route::post('/creator/store/movie', 'CreatorStoreMovie')->name('creator.store.movie');
        Route::get('/creator/edit/movie/{id}', 'CreatorEditMovie')->name('creator.edit.movie');
        Route::get('/creator/delete/movie/{id}', 'CreatorDeleteMovie')->name('creator.delete.movie');
        Route::post('/creator/update/movie', 'CreatorUpdateMovie')->name('creator.update.movie');
        Route::post('/creator/update/movie/tags', 'CreatorUpdateMovieTags')->name('creator.update.movie.tags');
        Route::get('/creator/details/movie/{id}', 'CreatorDetailsMovie')->name('creator.details.movie');
        Route::post('/creator/store/movie', 'CreatorStoreMovie')->name('creator.store.movie');
        Route::get('/creator/movie/message', 'CreatorMovieMessage')->name('creator.movie.message');
        Route::get('/creator/message/details/{id}', 'CreatorMessageDetails')->name('creator.message.details');
        
        // Schedule Request Route
        Route::get('/creator/schedule/request', 'CreatorScheduleRequest')->name('creator.schedule.request');
        Route::get('/creator/details/schedule/{id}', 'CreatorDetailsSchedule')->name('creator.details.schedule');
        Route::post('/creator/update/schedule', 'CreatorUpdateSchedule')->name('creator.update.schedule');
    });

    // Creator All Route from Admin
    Route::controller(CreatorMovieController::class)->group(function(){

        Route::get('/buy/package', 'BuyPackage')->name('buy.package');
    });

}); // End Group Creator Middleware

// Frontend Movie Details All Route
Route::get('/movie/details/{id}', [IndexController::class, 'MovieDetails']);

// Wishlist Add Route
Route::post('/add-to-wishList/{movie_id}', [WishlistController::class, 'AddToWishList']);

// Compare Add Route
Route::post('/add-to-compare/{movie_id}', [CompareController::class, 'AddToCompare']);

// Send Message From Property Details Route
Route::post('/movie/message', [IndexController::class, 'MovieMessage'])->name('movie.message');

// Creator Details Page in Frontend
Route::get('/creator/details/{id}', [IndexController::class, 'CreatorDetails'])->name('creator.details');

// Send Message From Creator Details Route
Route::post('/creator/details/message', [IndexController::class, 'CreatorDetailsMessage'])->name('creator.details.message');

// Get All Advertising Content
Route::get('/advertising/content', [IndexController::class, 'AdvertisingContent'])->name('advertising.content');

// Get All Other Content
Route::get('/other/content', [IndexController::class, 'OtherContent'])->name('other.content');

// Get Pagenate5 Movie Type Data
Route::get('/movie/type/{id}', [IndexController::class, 'MovieType'])->name('movie.type');

// ALL Movie Type Data
Route::get('/movie/type_16/{id}', [IndexController::class, 'Type16'])->name('movie.type_16');

// Home Page Advertising Search Options Route
Route::post('/advertising/gallery/search', [IndexController::class, 'AdvertisingGallerySearch'])->name('advertising.gallery.search');

// Home Page Other Search Options Route
Route::post('/other/gallery/search', [IndexController::class, 'OtherGallerySearch'])->name('other.gallery.search');

// Other Contents Search Options Route
Route::post('/all/gallery/search', [IndexController::class, 'AllGallerySearch'])->name('all.gallery.search');

// Blog Details Route
Route::get('/blog/details/{slug}', [BlogController::class, 'BlogDetails']);
Route::get('/blog/cat/list/{id}', [BlogController::class, 'BlogCatList']);
Route::get('/blog', [BlogController::class, 'BlogList'])->name('blog.list');
Route::post('/store/comment', [BlogController::class, 'StoreComment'])->name('store.comment');
Route::get('/admin/blog/comment', [BlogController::class, 'AdminBlogComment'])->name('admin.blog.comment');
Route::get('/admin/comment/reply/{id}', [BlogController::class, 'AdminCommentReply'])->name('admin.comment.reply');
Route::post('/reply/message', [BlogController::class, 'ReplyMessage'])->name('reply.message');

// Meeting Message Request Route
Route::post('/store/schedule', [IndexController::class, 'StoreSchedule'])->name('store.schedule');

// Chat Post Request Route
Route::post('/send-message', [ChatController::class, 'SendMsg'])->name('send.msg');

Route::get('/user-all', [ChatController::class, 'GetAllUsers']);

Route::get('/user-message/{id}', [ChatController::class, 'UserMsgById']);

// Creator Live Chat Route
Route::get('/creator/live/chat', [ChatController::class, 'CreatorLiveChat'])->name('creator.live.chat');
