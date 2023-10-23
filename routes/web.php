<?php

use App\Http\Controllers\Admin\AppointmentTypeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
Route::group(['as'=>'admin.','prefix'=>'admin','middleware'=>['auth']], function (){
    Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard');
   
    Route::resource('appointment-types', AppointmentTypeController::class);
    Route::resource('users', UserController::class);
    Route::resource('services', ServiceController::class);


    // Route::resource('dead_lines', DeadLineController::class);
    // Route::resource('educations', EducationLevelController::class);
    // Route::resource('no_words', NoWordsController::class);
    // Route::resource('orders', OrderController::class);
    // Route::resource('posts', PostController::class);
    // Route::resource('paper_types', PaperTypeController::class);
    // Route::resource('reference_styles', ReferenceStyleController::class);
    // Route::resource('subjects', SubjectController::class);
    // Route::resource('contacts', ContactUsController::class);
    // Route::get('download/{id}',[OrderController::class, 'download'])->name('download');
   

    // Route::get('settings','SettingsController@index')->name('settings');
    // Route::put('profile-update','SettingsController@updateProfile')->name('profile.update');
    // Route::put('password-update','SettingsController@updatePassword')->name('password.update');

    // Route::resource('tag','TagController');
    // Route::resource('category','CategoryController');
    // Route::resource('post','PostController');

    // Route::get('/pending/post','PostController@pending')->name('post.pending');
    // Route::put('/post/{id}/approve','PostController@approval')->name('post.approve');


    // Route::get('authors','AuthorController@index')->name('author.index');
    // Route::delete('authors/{id}','AuthorController@destroy')->name('author.destroy');

    // Route::get('comments','CommentController@index')->name('comment.index');
    // Route::delete('comments/{id}','CommentController@destroy')->name('comment.destroy');

    // Route::get('/subscriber','SubscriberController@index')->name('subscriber.index');
    // Route::delete('/subscriber/{subscriber}','SubscriberController@destroy')->name('subscriber.destroy');
});