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


// Disable registration for users
Auth::routes(['register'=>false]);

Route::group(['namespace' => 'BackEnd'], function(){
    
    // Students routes
    Route::resource( 'students', 'Students')->except(['show']);
    Route::get( 'students/new', 'Students@new_students')->name('students.new');
    Route::get( 'students/graduated', 'Students@graduated_students')->name('students.graduated');
    
    // Classrooms routes
    Route::resource('classrooms', 'Classrooms')->except([ 'show']);

    // Dashboard routes
    Route::get('dashboard', 'HomeController@index')->name('home');
});



