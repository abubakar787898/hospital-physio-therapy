<?php

use App\Http\Controllers\Admin\AppointmentTypeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GeneralController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SlotController;
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



Route::get('about', [FrontendController::class, 'about'])->name('about');
Route::get('service', [FrontendController::class, 'service'])->name('service');
Route::get('booking', [FrontendController::class, 'booking'])->name('booking');
Route::get('contact', [FrontendController::class, 'contact'])->name('contact');

Route::group(['as'=>'admin.','prefix'=>'admin','middleware'=>['auth']], function (){
    Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard');
    Route::put('update-about', [GeneralController::class, 'updateAbout'])->name('about.update');
    Route::get('about', [GeneralController::class, 'about'])->name('about');
   
    Route::resource('appointment-types', AppointmentTypeController::class);
    Route::resource('users', UserController::class);
    Route::resource('services', ServiceController::class);
    Route::get('slots', [SlotController::class, 'index']);
    Route::post('slots', [SlotController::class, 'create']);
    Route::patch('slots/{id}/book', [SlotController::class, 'book']);

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