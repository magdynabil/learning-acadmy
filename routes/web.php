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
Route::namespace('Front')->group(function (){
    Route::get('/','HomepageController@index')->name('front.homepage');
    Route::get('/cat/{id}','CourseController@cat')->name('front.cat');
    Route::get('/cat/{id}/course/{c_id}','CourseController@show')->name('front.show');
    Route::get('/contact','ContactController@index')->name('front.contact');
    Route::post('/message/newsletter','MessageController@newsletter')->name('front.message.newsletter');
    Route::post('/message/contact','MessageController@contact')->name('front.message.contact');
    Route::post('/message/enroll','MessageController@enroll')->name('front.message.enroll');
});

Route::namespace('Admin')->prefix('dashboard')->group(function (){
    Route::middleware('AdminAuth:admin')->group(function (){
        Route::get('/','HomeController@index')->name('admin.homepage');
        Route::get('/logout','AuthController@logout')->name('admin.logout');
        //Catcontroller
        Route::get('/cats','Catcontroller@index')->name('admin.cat.index');
        Route::get('/cats/create','Catcontroller@create')->name('admin.cat.create');
        Route::post('/cats/store','Catcontroller@store')->name('admin.cat.store');
        Route::get('/cats/edit/{id}','Catcontroller@edit')->name('admin.cat.edit');
        Route::post('/cats/update','Catcontroller@update')->name('admin.cat.update');
        Route::get('/cats/delete/{id}','Catcontroller@delete')->name('admin.cat.delete');
        //Trainercontroller
        Route::get('/trainers','Trainercontroller@index')->name('admin.trainers.index');
        Route::get('/trainers/create','Trainercontroller@create')->name('admin.trainers.create');
        Route::post('/trainers/store','Trainercontroller@store')->name('admin.trainers.store');
        Route::get('/trainers/edit/{id}','Trainercontroller@edit')->name('admin.trainers.edit');
        Route::post('/trainers/update','Trainercontroller@update')->name('admin.trainers.update');
        Route::get('/trainers/delete/{id}','Trainercontroller@delete')->name('admin.trainers.delete');
        //Coursecontroller
        Route::get('/courses','Coursecontroller@index')->name('admin.courses.index');
        Route::get('/courses/create','Coursecontroller@create')->name('admin.courses.create');
        Route::post('/courses/store','Coursecontroller@store')->name('admin.courses.store');
        Route::get('/courses/edit/{id}','Coursecontroller@edit')->name('admin.courses.edit');
        Route::post('/courses/update','Coursecontroller@update')->name('admin.courses.update');
        Route::get('/courses/delete/{id}','Coursecontroller@delete')->name('admin.courses.delete');
        //Studentcontroller
        Route::get('/students','Studentcontroller@index')->name('admin.students.index');
        Route::get('/students/create','Studentcontroller@create')->name('admin.students.create');
        Route::post('/students/store','Studentcontroller@store')->name('admin.students.store');
        Route::get('/students/edit/{id}','Studentcontroller@edit')->name('admin.students.edit');
        Route::post('/students/update','Studentcontroller@update')->name('admin.students.update');
        Route::get('/students/delete/{id}','Studentcontroller@delete')->name('admin.students.delete');
        Route::get('/students/showCourses/{id}','Studentcontroller@showCourses')->name('admin.students.showCourses');
        Route::get('/students/{id}/courses/{c_id}/approve','Studentcontroller@approveCourse')->name('admin.students.approveCourse');
        Route::get('/students/{id}/courses/{c_id}/reject','Studentcontroller@rejectCourse')->name('admin.students.rejectCourse');
        Route::get('/students/{id}/add_to_course','Studentcontroller@add_to_course')->name('admin.students.add_to_course');
        Route::post('/students/addCourse','Studentcontroller@addCourse')->name('admin.students.addCourse');
    });
    Route::get('/login','AuthController@login')->name('admin.login');
    Route::post('/do_login','AuthController@do_login')->name('admin.do_login');

});
