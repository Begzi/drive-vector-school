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
		Route::get('/common', 'SvedenController@common')->name('admin.sveden.common');
		Route::get('/common/edit/{common}', 'SvedenController@commonEdit')->name('admin.sveden.common.edit');
		Route::put('/common/update/{common}', 'SvedenController@commonUpdate')->name('admin.sveden.common.update');
		Route::get('/struct', 'SvedenController@struct')->name('admin.sveden.struct');
		Route::get('/struct/edit/{struct}', 'SvedenController@structEdit')->name('admin.sveden.struct.edit');
		Route::put('/struct/update/{struct}', 'SvedenController@structUpdate')->name('admin.sveden.struct.update');

		Route::get('/document', 'Sveden\DocumentController@document')->name('admin.sveden.document');
		Route::get('/document/edit/{document}', 'Sveden\DocumentController@documentEdit')->name('admin.sveden.document.edit');
		Route::put('/document/update/{document}', 'Sveden\DocumentController@documentUpdate')->name('admin.sveden.document.update');

		Route::get('/document/edit/{document}/paidEdu', 'Sveden\DocumentController@documentEditPaidEdu')->name('admin.sveden.document.edit.for.paidEdu');
		Route::put('/document/update/{document}/paidEdu', 'Sveden\DocumentController@documentUpdatePaidEdu')->name('admin.sveden.document.update.for.paidEdu');

		Route::get('/education', 'Sveden\EducationController@education')->name('admin.sveden.education');
		Route::get('/education/edit/{education}', 'Sveden\EducationController@educationEdit')->name('admin.sveden.education.edit');
		Route::put('/education/update/{education}', 'Sveden\EducationController@educationUpdate')->name('admin.sveden.education.update');
		Route::get('/eduStandarts', 'SvedenController@eduStandarts')->name('admin.sveden.eduStandarts');
		Route::get('/eduStandarts/edit/{eduStandarts}', 'SvedenController@eduStandartsEdit')->name('admin.sveden.eduStandarts.edit');
		Route::put('/eduStandarts/update/{eduStandarts}', 'SvedenController@eduStandartsUpdate')->name('admin.sveden.eduStandarts.update');
		Route::get('/objects', 'SvedenController@objects')->name('admin.sveden.objects');
		Route::get('/objects/edit/{objects}', 'SvedenController@objectsEdit')->name('admin.sveden.objects.edit');
		Route::put('/objects/update/{objects}', 'SvedenController@objectsUpdate')->name('admin.sveden.objects.update');
		Route::get('/grants', 'SvedenController@grants')->name('admin.sveden.grants');
		Route::get('/grants/edit/{grants}', 'SvedenController@grantsEdit')->name('admin.sveden.grants.edit');
		Route::put('/grants/update/{grants}', 'SvedenController@grantsUpdate')->name('admin.sveden.grants.update');
		Route::get('/paid_edu', 'SvedenController@paidEdu')->name('admin.sveden.paidEdu');
		Route::get('/paid_edu/edit/{paidEdu}', 'SvedenController@paidEduEdit')->name('admin.sveden.paidEdu.edit');
		Route::put('/paid_edu/update/{paidEdu}', 'SvedenController@paidEduUpdate')->name('admin.sveden.paidEdu.update');
		Route::get('/budget', 'SvedenController@budget')->name('admin.sveden.budget');
		Route::get('/budget/edit/{budget}', 'SvedenController@budgetEdit')->name('admin.sveden.budget.edit');
		Route::put('/budget/update/{budget}', 'SvedenController@budgetUpdate')->name('admin.sveden.budget.update');
		Route::get('/vacant', 'SvedenController@vacant')->name('admin.sveden.vacant');
		Route::get('/vacant/edit/{vacant}', 'SvedenController@vacantEdit')->name('admin.sveden.vacant.edit');
		Route::put('/vacant/update/{vacant}', 'SvedenController@vacantUpdate')->name('admin.sveden.vacant.update');

		Route::get('/employees', 'SvedenController@employees')->name('admin.sveden.employees');
		Route::get('/employees/create', 'SvedenController@employeesCreate')->name('admin.sveden.employees.create');
		Route::post('/employees/storage', 'SvedenController@employeesStorage')->name('admin.sveden.employees.storage');
		Route::get('/employees/manager/edit/{manager}', 'SvedenController@managerEdit')->name('admin.sveden.manager.edit');
		Route::put('/employees/manager/update/{manager}', 'SvedenController@managerUdate')->name('admin.sveden.manager.update');
		Route::delete('/employees/manager/destroy/{manager}', 'SvedenController@managerDestroy')->name('admin.sveden.manager.destroy');
		
		Route::get('/employees/teacher/edit/{teacher}', 'SvedenController@teacherEdit')->name('admin.sveden.teacher.edit');
		Route::put('/employees/teacher/update/{teacher}', 'SvedenController@teacherUpdate')->name('admin.sveden.teacher.update');
		Route::delete('/employees/teacher/destroy/{teacher}', 'SvedenController@teacherDestroy')->name('admin.sveden.teacher.destroy');
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
