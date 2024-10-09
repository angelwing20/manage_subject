<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use App\Http\Middleware\checkadmin;
use Illuminate\Support\Facades\Route;


Route::controller(ViewController::class)->group(function () {
    Route::get('/', 'loginpage')->name('loginpage');
    Route::get('/main', 'main')->name('main')->middleware(checkadmin::class);

    Route::get('/viewsubject/{id}', 'viewsubject')->name('viewsubject')->middleware(checkadmin::class);
    Route::get('/deletesubject/{id}', 'deletesubject')->name('deletesubject')->middleware(checkadmin::class);

    Route::get('/addteacherpage', 'addteacherpage')->name('addteacherpage')->middleware(checkadmin::class);
    Route::get('/viewteacher/{id}', 'viewteacher')->name('viewteacher')->middleware(checkadmin::class);
    Route::get('/editteacherpage/{id}', 'editteacherpage')->name('editteacherpage')->middleware(checkadmin::class);
    Route::get('/deleteteacher/{id}', 'deleteteacher')->name('deleteteacher')->middleware(checkadmin::class);

    Route::get('/addstudentpage', 'addstudentpage')->name('addstudentpage')->middleware(checkadmin::class);
    Route::get('/editstudentpage/{id}', 'editstudentpage')->name('editstudentpage')->middleware(checkadmin::class);
    Route::get('/deletestudent/{id}', 'deletestudent')->name('deletestudent')->middleware(checkadmin::class);

    Route::get('/searchsubject', 'searchsubject')->name('searchsubject')->middleware(checkadmin::class);

    Route::get('/logout', 'logout')->name('logout')->middleware(checkadmin::class);
});

Route::controller(UserController::class)->group(function () {
    Route::post('/login', 'login')->name('login');

    Route::post('/addsubject','addsubject')->name('addsubject')->middleware(checkadmin::class);
    Route::put('/editsubject/{id}', 'editsubject')->name('editsubject')->middleware(checkadmin::class);

    Route::post('/addteacher', 'addteacher')->name('addteacher')->middleware(checkadmin::class);
    Route::post('/editteacher/{id}', 'editteacher')->name('editteacher')->middleware(checkadmin::class);

    Route::post('/addstudent', 'addstudent')->name('addstudent')->middleware(checkadmin::class);
    Route::post('/editstudent/{id}', 'editstudent')->name('editstudent')->middleware(checkadmin::class);
});