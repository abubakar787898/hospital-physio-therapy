<?php

use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AppointmentTypeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GeneralController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientBookingController;
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

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Auth::routes();



Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('about', [FrontendController::class, 'about'])->name('about');
Route::get('service', [FrontendController::class, 'service'])->name('service');
Route::get('service/{slug}', [FrontendController::class, 'service_slug'])->name('service.slug');
Route::get('team/{slug}', [FrontendController::class, 'team_slug'])->name('team.slug');
Route::get('booking', [FrontendController::class, 'booking'])->name('booking');
Route::get('booking-form/{id}', [FrontendController::class, 'book'])->name('booking-form');
Route::post('patient-booked', [FrontendController::class, 'patient_booked'])->name('patient-booked');
Route::post('get-slot', [FrontendController::class, 'booking'])->name('get.slot');
Route::get('getSlot', [FrontendController::class, 'getSlot'])->name('getSlot');
Route::get('contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('contact-form', [FrontendController::class, 'contact_form'])->name('contact-form');


Route::post('/initiate-payment', [PatientBookingController::class, 'initiatePayment']);
Route::post('/handle-payment-response', [PatientBookingController::class, 'handlePaymentResponse']);

Route::group(['as'=>'admin.','prefix'=>'admin','middleware'=>['auth']], function (){
    Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard');
    Route::get('appointment-reminder/{id}',[DashboardController::class, 'appointmentReminderMail'])->name('appointment-reminder');

    Route::put('update-about', [GeneralController::class, 'updateAbout'])->name('about.update');
    Route::get('about', [GeneralController::class, 'about'])->name('about');

    Route::get('home', [GeneralController::class, 'home'])->name('home');
    Route::put('update-home', [GeneralController::class, 'updateHome'])->name('home.update');
    
    Route::resource('appointment-types', AppointmentTypeController::class);
    Route::resource('users', UserController::class);
    Route::resource('patients', PatientController::class);
    Route::resource('contacts', AdminContactController::class);
    Route::resource('teams', TeamController::class);
    Route::get('slider', [TeamController::class, 'slider_index'])->name('slider');
    Route::resource('services', ServiceController::class);
    Route::resource('slots', SlotController::class);
    Route::get('booking-slot/{id}', [SlotController::class, 'booking_slot'])->name('booking-slot');
    Route::post('book-slot', [SlotController::class, 'book_slot'])->name('book-slot');
    Route::get('appointment-slot', [SlotController::class, 'getAppointmentSlot'])->name('getAppointmentSlot');


    // Route::get('slots', [SlotController::class, 'index']);
    // Route::post('slots', [SlotController::class, 'create']);
    // Route::patch('slots/{id}/book', [SlotController::class, 'book']);

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