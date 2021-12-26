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

Route::get('/', 'HomeController@HomeIndex')->middleware('loginCheck');


// Visitor page routers
Route::get('/visitor', 'VisitorController@VisitorData' )->middleware('loginCheck');
Route::get('/services', 'ServicesController@ServicesIndex' )->middleware('loginCheck');

Route::get('/getServicesData', 'ServicesController@getServiceData' )->middleware('loginCheck');

Route::post('/editservice', 'ServicesController@getSingleServiceData' )->middleware('loginCheck');
Route::post('/deleteServicesData', 'ServicesController@deleteServicesData' )->middleware('loginCheck');

Route::post('/updateservice', 'ServicesController@updateservice' )->middleware('loginCheck');
Route::post('/addservice', 'ServicesController@addService' )->middleware('loginCheck');

// Courses Page routers

Route::get('/courses', 'CoursesController@CourseIndex')->middleware('loginCheck');
Route::get('/getcourses', 'CoursesController@getAllCourses')->middleware('loginCheck');
Route::post('/addcourse', 'CoursesController@addNewCourse')->middleware('loginCheck');

Route::post('/deletecourse', 'CoursesController@deleteCourse')->middleware('loginCheck');
Route::post('/viewsinglecourse', 'CoursesController@GetSingleCourseData')->middleware('loginCheck');

Route::post('/updatecourse', 'CoursesController@UpdateCourse')->middleware('loginCheck');



//Project Route

Route::get('/projects', 'ProjectController@projectIndex')->middleware('loginCheck');

Route::get('/projectsdata', 'ProjectController@getAllProject')->middleware('loginCheck');
Route::post('/addproject', 'ProjectController@addNewProject')->middleware('loginCheck');

Route::post('/getsingelproject', 'ProjectController@getSingleProject')->middleware('loginCheck');

Route::post('/updateproject', 'ProjectController@updateProject')->middleware('loginCheck');

Route::post('/deleteproject', 'ProjectController@DeleteProject')->middleware('loginCheck');


//Contact us message section

Route::get('/message', 'contactUsController@ContactIndex')->middleware('loginCheck');

Route::get('/contactus', 'contactUsController@contactUsMessages')->middleware('loginCheck');

Route::post('/deletemessage', 'contactUsController@deletecontactUsMessages')->middleware('loginCheck')->middleware('loginCheck');



//Photo galaray section

Route::get('/photo', 'photoGalaryController@photoGallary')->middleware('loginCheck');

Route::post('/uploadphoto', 'photoGalaryController@uploadPhoto')->middleware('loginCheck');













//Login in system

Route::get('/login', 'userController@LoginPage');

Route::get('/onlogin', 'userController@onlogin');


//logout

Route::get('/logout', 'userController@onlogout');




