<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

// Front End Routes
// Front End Routes
Route::get('/website', 'FrontEndController@home')->name('website');
Route::get('/status-update/{id}', 'SalesInchargeController@status_update');


//admin=======
//Admin Routes
// Route::group(['namespace' => 'Admin'], function () {
//     Route::get('admin/home', 'HomeController@index')->name('admin.home');

//     // Admin Auth Routes
//     Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');
//     Route::post('admin-login', 'Auth\LoginController@login');
// });
// admin section ...........................................................................


// Admin Panel Routes
/*
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/dashboard','DashboardController@index')->name('dashboard');

    Route::resource('category', 'CategoryController');
    Route::resource('post', 'PostController');
    Route::resource('customer', 'CustomerController');
    Route::resource('attachment', 'AttachmentController');
    Route::resource('type', 'TypeController');
    Route::resource('user', 'UserController');
    Route::resource('sale', 'SaleController');
    Route::resource('degree', 'DegreeController');
    Route::resource('division', 'DivisionController');
    Route::resource('zone', 'ZoneController');
    Route::resource('area', 'AreaController');
    Route::resource('sales_incharge', 'SalesInchargeController');
    Route::resource('employee', 'EmployeeController');
    Route::resource('role', 'RoleController');


});
*/

Route::group(['prefix' => 'admin', 'middleware' => ['verified', 'authadmin']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');

    Route::resource('category', 'CategoryController');
    Route::resource('post', 'PostController');
    Route::resource('customer', 'CustomerController');
    Route::resource('attachment', 'AttachmentController');
    Route::resource('type', 'TypeController');
    Route::resource('user', 'UserController');
    Route::resource('sale', 'SaleController');
    Route::resource('degree', 'DegreeController');
    Route::resource('division', 'DivisionController');
    Route::resource('zone', 'ZoneController');
    Route::resource('area', 'AreaController');
    Route::resource('sales_incharge', 'SalesInchargeController');
    Route::resource('employee', 'EmployeeController');
    Route::resource('role', 'RoleController');
});


Route::group(['prefix' => 'employee'], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('employee.dashboard');

    Route::resource('employeecategory', 'Employee\CategoryController');
    Route::resource('employeepost', 'Employee\PostController');
    Route::resource('employeecustomer', 'Employee\CustomerController');
    Route::resource('employeeattachment', 'Employee\AttachmentController');
    Route::resource('employeetype', 'Employee\TypeController');
    Route::resource('employeeuser', 'Employee\UserController');
    Route::resource('employeesale', 'Employee\SaleController');
    Route::resource('employeedegree', 'Employee\DegreeController');
    Route::resource('employeedivision', 'Employee\DivisionController');
    Route::resource('employeezone', 'Employee\ZoneController');
    Route::resource('employeearea', 'Employee\AreaController');
    Route::resource('employeesales_incharge', 'Employee\SalesInchargeController');
    Route::resource('employeeemployee', 'Employee\EmployeeController');
});
/*
Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin','employee']], function () {
    Route::get('/dashboard','DashboardController@index')->name('dashboard');
    Route::resource('post', 'PostController');
    Route::resource('customer', 'CustomerController');
    Route::resource('type', 'TypeController');
    Route::resource('division', 'DivisionController');
    Route::resource('zone', 'ZoneController');
    Route::resource('area', 'AreaController');
    Route::resource('employee', 'EmployeeController');


});
*/
