<?php

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
    return view('welcome');
});

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// // Registration Routes...
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');


// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/our-gallery', 'HomeController@galleryFront')->name('gallery');
Route::post('/Sendemail', 'HomeController@Sendemail')->name('Sendemail');

Route::post('/confirm_sno', 'HomeController@confirm_sno')->name('confirm_sno');

Route::group(['middleware' => 'auth'], function () {
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/index', 'HomeController@AdminIndex')->name('admin.index');
Route::post('/admin/store', 'HomeController@AdminStore')->name('admin.store');
Route::delete('/admin/destroy/', 'HomeController@AdminDestroy')->name('admin.destroy');
Route::patch('/admin/update/', 'HomeController@AdminUpdate')->name('admin.update');
Route::get('/admin/gallery/', 'HomeController@gallery')->name('admin.gallery');
Route::post('/admin/gallery/store', 'HomeController@galleryStore')->name('admin.gallery.store');
Route::get('/admin/gallery/destroy/{id}', 'HomeController@galleryDestroy')->name('admin.gallery.destroy');

Route::resource('serialnumber','SerialNumberController');

Route::get('profile', function(){
    return view('profile');
});

/* View Composer*/
View::composer(['*'], function($view){
    
    $user = Auth::user();
    $view->with('user',$user);
    

    

});
});
Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('config:cache');
    return 'Success';
    // return what you want
});

