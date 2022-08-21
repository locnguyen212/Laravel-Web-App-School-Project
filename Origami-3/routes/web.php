<?php

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\category\CategoryController;
use App\Http\Controllers\admin\contentImage\ContentImageController;
use App\Http\Controllers\admin\feedback\FeedbackController;
use App\Http\Controllers\admin\IndexController;
use App\Http\Controllers\admin\Origami\OrigamiController;
use App\Http\Controllers\admin\user\UserController;


// use inset client
use App\Http\Controllers\client\HomePageController;
use App\Http\Controllers\client\category_page;
use App\Http\Controllers\client\contact;
use App\Http\Controllers\client\BlogSingleController;
use App\Http\Controllers\client\ContactController;
use App\Http\Controllers\client\SearchController;
use App\Http\Controllers\client\SendMailController;

// use insert library root
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

Route::get('/',[HomePageController::class, 'index'])->name('index');
Route::get('/category/{slug}',[category_page::class, 'index'])->name('category');
Route::get('/blog-single/{slug}',[BlogSingleController::class, 'index'])->name('blog-single');

Route::get('/search',[SearchController::class, 'search'])->name('search');
Route::get('/indexsearch',[SearchController::class, 'index'])->name('index');
Route::post('/feedback-blog-single/{slug}',[BlogSingleController::class, 'FeedbackBlogSingle'])->name('FeedbackBlogSingle');

Route::get('/about',[HomePageController::class, 'about'])->name('about');

Route::get('/contact',[ContactController::class, 'index'])->name('index');
Route::get('/sendmail',[ContactController::class, 'sendmail'])->name('sendmail');
Route::get('/submail',[ContactController::class, 'sub_mail'])->name('sub_mail');

Route::get('/send-mail','HomeController@send_mail');

Route::get('login',[])->name('login_page');
Route::get('/admin', function () {
    return view('admin/login');
});



Route::get('login',[AuthController::class, 'loginPage'])->name('login_page');
Route::post('login',[AuthController::class, 'login'])->name('login');
Route::get('logout',[AuthController::class, 'logout'])->name('logout');

Route::prefix('admin')->middleware('loginAdmin')->name('admin.')->group(function (){
    Route::get('index',[IndexController::class, 'index'])->middleware('SARole')->name('index'); //admin.index

    Route::prefix('category')->middleware('Category')->name('category.')->group(function (){
        Route::get('index', [CategoryController::class, 'index'])->name('index'); //admin.category.index

        Route::get('create', [CategoryController::class, 'create'])->name('create'); //admin.category.create
        Route::post('store', [CategoryController::class, 'store'])->name('store'); //admin.category.store

        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('edit'); //admin.category.edit
        Route::post('update/{id}', [CategoryController::class, 'update'])->name('update'); //admin.category.update
        Route::get('destroy/{id}', [CategoryController::class, 'destroy'])->name('destroy'); //admin.category.destroy
    });

    Route::prefix('user')->name('user.')->group(function (){
        Route::get('index', [UserController::class, 'index'])->middleware('SARole')->name('index'); //admin.user.index

        Route::get('create', [UserController::class, 'create'])->middleware('SARole')->name('create'); //admin.user.create
        Route::post('store', [UserController::class, 'store'])->middleware('SARole')->name('store'); //admin.user.store

        Route::get('edit/{id}', [UserController::class, 'edit'])->name('edit'); //admin.user.edit
        Route::post('update/{id}', [UserController::class, 'update'])->name('update'); //admin.user.update
        Route::get('destroy/{id}', [UserController::class, 'destroy'])->middleware('SARole')->name('destroy'); //admin.user.destroy
    });

    Route::prefix('origami')->name('origami.')->group(function (){
        Route::get('index', [OrigamiController::class, 'index'])->name('index'); //admin.origami.index

        Route::get('create', [OrigamiController::class, 'create'])->name('create'); //admin.origami.create
        Route::post('store', [OrigamiController::class, 'store'])->name('store'); //admin.origami.store

        Route::get('edit/{id}', [OrigamiController::class, 'edit'])->middleware('Origami')->name('edit'); //admin.origami.edit
        Route::post('update/{id}', [OrigamiController::class, 'update'])->name('update'); //admin.origami.update
        Route::get('destroy/{id}', [OrigamiController::class, 'destroy'])->middleware('Origami')->name('destroy'); //admin.origami.destroy

        Route::get('editSelected/{length}/{array}', [OrigamiController::class, 'editSelected'])->name('editSelected'); //admin.origami.editSelected
        Route::post('updateSelected/{length}/{array}', [OrigamiController::class, 'updateSelected'])->name('updateSelected'); //admin.origami.updateSelected
    });

    Route::prefix('image')->name('image.')->group(function (){
        Route::get('index', [ContentImageController::class, 'index'])->name('index'); //admin.image.index

        Route::get('create', [ContentImageController::class, 'create'])->name('create'); //admin.image.create
        Route::post('store', [ContentImageController::class, 'store'])->name('store'); //admin.image.store

        Route::get('edit/{id}', [ContentImageController::class, 'edit'])->middleware('Image')->name('edit'); //admin.image.edit
        Route::post('update/{id}', [ContentImageController::class, 'update'])->name('update'); //admin.image.update
        Route::get('destroy/{id}', [ContentImageController::class, 'destroy'])->middleware('Image')->name('destroy'); //admin.image.destroy
    });

    Route::prefix('feedback')->name('feedback.')->group(function (){
        
        
        Route::get('index', [FeedbackController::class, 'index'])->name('index'); //admin.image.index
        Route::get('destroy/{id}', [FeedbackController::class, 'destroy'])->middleware('Feedback')->name('destroy'); //admin.image.destroy
        Route::get('replay{id}', [FeedbackController::class, 'replay'])->name('replay');
        Route::post('storereplay/{id}', [FeedbackController::class, 'storereplay'])->name('storereplay');
        Route::get('destroy/{id}', [FeedbackController::class, 'destroy'])->middleware('Feedback')->name('destroy'); //admin.image.destroy
    });
});

Route::post('update/{id}', [ContentImageController::class, 'update'])->name('update');
