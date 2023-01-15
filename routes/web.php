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

Route::get('/', 'HomeController@index')->name('home');
Route::post('/asd', 'HomeController@storage')->name('home.storage');
Route::get('/goodUrls', 'HomeController@goodUrls')->name('goodUrls');
Route::group(['prefix' => 'sveden'], function () {

	Route::get('/common', 'SvedenController@common')->name('sveden.common');
	Route::get('/struct', 'SvedenController@struct')->name('sveden.struct');
	Route::get('/document', 'SvedenController@document')->name('sveden.document');
	Route::get('/education', 'SvedenController@education')->name('sveden.education');
	Route::get('/eduStandarts', 'SvedenController@eduStandarts')->name('sveden.eduStandarts');
	Route::get('/employees', 'SvedenController@employees')->name('sveden.employees');
	Route::get('/objects', 'SvedenController@objects')->name('sveden.objects');
	Route::get('/grants', 'SvedenController@grants')->name('sveden.grants');
	Route::get('/paid_edu', 'SvedenController@paidEdu')->name('sveden.paidEdu');
	Route::get('/budget', 'SvedenController@budget')->name('sveden.budget');
	Route::get('/vacant', 'SvedenController@vacant')->name('sveden.vacant');
	Route::get('/', 'SvedenController@sveden')->name('sveden');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function () {
	Route::group(['prefix' => 'sveden'], function () {

    	// Route::resource('/common', 'Sveden\CommonController');
		Route::get('/common', 'Sveden\CommonController@index')->name('admin.sveden.common');
		Route::get('/common/edit/{common}', 'Sveden\CommonController@edit')->name('admin.sveden.common.edit');
		Route::put('/common/update/{common}', 'Sveden\CommonController@update')->name('admin.sveden.common.update');
    	// Route::resource('/struct', 'Sveden\StructController');
		Route::get('/struct', 'Sveden\StructController@index')->name('admin.sveden.struct');
		Route::get('/struct/edit/{struct}', 'Sveden\StructController@edit')->name('admin.sveden.struct.edit');
		Route::put('/struct/update/{struct}', 'Sveden\StructController@update')->name('admin.sveden.struct.update');

		Route::get('/document', 'Sveden\DocumentController@index')->name('admin.sveden.document');
		Route::get('/document/edit/{document}', 'Sveden\DocumentController@edit')->name('admin.sveden.document.edit');
		Route::put('/document/update/{document}', 'Sveden\DocumentController@update')->name('admin.sveden.document.update');

		Route::get('/document/edit/{document}/paidEdu', 'Sveden\DocumentController@editPaidEdu')->name('admin.sveden.document.edit.for.paidEdu');
		Route::put('/document/update/{document}/paidEdu', 'Sveden\DocumentController@updatePaidEdu')->name('admin.sveden.document.update.for.paidEdu');

		Route::get('/education', 'Sveden\EducationController@index')->name('admin.sveden.education');
		Route::get('/education/edit/{education}', 'Sveden\EducationController@edit')->name('admin.sveden.education.edit');
		Route::put('/education/update/{education}', 'Sveden\EducationController@update')->name('admin.sveden.education.update');

    	// Route::resource('/eduStandarts', 'Sveden\EduStandartController');
		Route::get('/eduStandarts', 'Sveden\EduStandartController@index')->name('admin.sveden.eduStandarts');
		Route::get('/eduStandarts/edit/{eduStandarts}', 'Sveden\EduStandartController@edit')->name('admin.sveden.eduStandarts.edit');
		Route::put('/eduStandarts/update/{eduStandarts}', 'Sveden\EduStandartController@update')->name('admin.sveden.eduStandarts.update');
    	// Route::resource('/objectsSchool', 'Sveden\ObjectsSchoolController');
		Route::get('/objects', 'Sveden\ObjectsSchoolController@index')->name('admin.sveden.objects');
		Route::get('/objects/edit/{objects}', 'Sveden\ObjectsSchoolController@edit')->name('admin.sveden.objects.edit');
		Route::put('/objects/update/{objects}', 'Sveden\ObjectsSchoolController@update')->name('admin.sveden.objects.update');
    	// Route::resource('/grants', 'Sveden\GrantController');
		Route::get('/grants', 'Sveden\GrantController@index')->name('admin.sveden.grants');
		Route::get('/grants/edit/{grants}', 'Sveden\GrantController@edit')->name('admin.sveden.grants.edit');
		Route::put('/grants/update/{grants}', 'Sveden\GrantController@update')->name('admin.sveden.grants.update');
    	// Route::resource('/paid_edu', 'Sveden\PaidEduController');
		Route::get('/paid_edu', 'Sveden\PaidEduController@index')->name('admin.sveden.paidEdu');
		Route::get('/paid_edu/edit/{paidEdu}', 'Sveden\PaidEduController@edit')->name('admin.sveden.paidEdu.edit');
		Route::put('/paid_edu/update/{paidEdu}', 'Sveden\PaidEduController@update')->name('admin.sveden.paidEdu.update');
    	// Route::resource('/budget', 'Sveden\BudgetController');
		Route::get('/budget', 'Sveden\BudgetController@index')->name('admin.sveden.budget');
		Route::get('/budget/edit/{budget}', 'Sveden\BudgetController@edit')->name('admin.sveden.budget.edit');
		Route::put('/budget/update/{budget}', 'Sveden\BudgetController@update')->name('admin.sveden.budget.update');
    	// Route::resource('/vacant', 'Sveden\VacantController');
		Route::get('/vacant', 'Sveden\VacantController@index')->name('admin.sveden.vacant');
		Route::get('/vacant/edit/{vacant}', 'Sveden\VacantController@edit')->name('admin.sveden.vacant.edit');
		Route::put('/vacant/update/{vacant}', 'Sveden\VacantController@update')->name('admin.sveden.vacant.update');

    	// Route::resource('/employees', 'Sveden\EmployeeController');
		Route::get('/employees', 'Sveden\EmployeeController@index')->name('admin.sveden.employees');
		Route::get('/employees/create', 'Sveden\EmployeeController@create')->name('admin.sveden.employees.create');
		Route::post('/employees/storage', 'Sveden\EmployeeController@storage')->name('admin.sveden.employees.storage');
		Route::get('/employees/manager/edit/{manager}', 'Sveden\EmployeeController@managerEdit')->name('admin.sveden.manager.edit');
		Route::put('/employees/manager/update/{manager}', 'Sveden\EmployeeController@managerUdate')->name('admin.sveden.manager.update');
		Route::delete('/employees/manager/destroy/{manager}', 'Sveden\EmployeeController@managerDestroy')->name('admin.sveden.manager.destroy');
		
		Route::get('/employees/teacher/edit/{teacher}', 'Sveden\EmployeeController@teacherEdit')->name('admin.sveden.teacher.edit');
		Route::put('/employees/teacher/update/{teacher}', 'Sveden\EmployeeController@teacherUpdate')->name('admin.sveden.teacher.update');
		Route::delete('/employees/teacher/destroy/{teacher}', 'Sveden\EmployeeController@teacherDestroy')->name('admin.sveden.teacher.destroy');
	});
    Route::get('/', 'MainController@index')->name('admin.index');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/tags', 'TagController');
    Route::resource('/posts', 'PostController');
});

Route::group(['middleware' => 'guest'], function () {
    // Route::get('/register', 'UserController@create')->name('register.create');
    // Route::post('/register', 'UserController@store')->name('register.store');
    Route::get('/login', 'UserController@loginForm')->name('login.create');
    Route::post('/login', 'UserController@login')->name('login');
});

Route::get('/logout', 'UserController@logout')->name('logout')->middleware('auth');
