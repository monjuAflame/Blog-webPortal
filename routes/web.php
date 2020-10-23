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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('public/index');
});

Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/{anypath}','HomeController@index')->where('path','.*');

Route::group(['middleware' => ['auth']], function () {
    //Category

    Route::post('/add-category', [App\Http\Controllers\CategoryController::class, 'add_category']);
    Route::get('category', [App\Http\Controllers\CategoryController::class, 'all_category']);
    Route::get('category/{id}', [App\Http\Controllers\CategoryController::class, 'delete_category']);
    Route::get('editcategory/{id}', [App\Http\Controllers\CategoryController::class, 'edit_category']);
    Route::post('update-category/{id}', [App\Http\Controllers\CategoryController::class, 'update_category']);
    Route::get('/deletecategory/{id}', [App\Http\Controllers\CategoryController::class, 'selected_category']);

//Post
    Route::get('/post', [App\Http\Controllers\PostController::class, 'all_Post']);
    Route::post('/savepost', [App\Http\Controllers\PostController::class, 'save_post']);
    Route::get('/delete/{id}', [App\Http\Controllers\PostController::class, 'delete_post']);
    Route::get('/post/{id}', [App\Http\Controllers\PostController::class, 'edit_post']);
    Route::post('/update/{id}', [App\Http\Controllers\PostController::class, 'update_post']);
});



Route::get('/blogpost', [App\Http\Controllers\BlogController::class, 'get_all_blog_post']);
Route::get('/singlepost/{id}', [App\Http\Controllers\BlogController::class, 'getpost_by_id']);
Route::get('/categories', [App\Http\Controllers\BlogController::class, 'get_all_category']);
Route::get('/categorypost/{id}', [App\Http\Controllers\BlogController::class, 'get_all_post_by_cat_id']);
Route::get('/search', [App\Http\Controllers\BlogController::class, 'search_post']);
Route::get('/latestpost', [App\Http\Controllers\BlogController::class, 'latest_post']);
