<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::auth();


Route::get('/home', 'HomeController@welcome');
Route::get('/', 'HomeController@welcome');

//基础设置
Route::get('/system', 'SettingsController@system');
Route::get('/data', 'SettingsController@data');
Route::get('/rolemanage', 'SettingsController@rolemanage');
Route::get('/membermanage', 'SettingsController@membermanage');
Route::get('/power','SettingsController@power');
Route::resource('roles','RolesController');
Route::resource('permissions','PermissionsController');

//心理测验
Route::get('/gaugemanage', 'TestsController@gaugemanage');
Route::get('/gaugeallot', 'TestsController@gaugeallot');
Route::get('/gaugeinput', 'TestsController@gaugeinput');
Route::get('/gaugecheck', 'TestsController@gaugecheck');


//危机预警
Route::get('/warnsee', 'WarningsController@warnsee');
Route::get('/warnsetting', 'WarningsController@warnsetting');


//问卷调查
Route::get('/questmanage', 'SurveyController@questmanage');
Route::get('/questallot', 'SurveyController@questallot');
Route::get('/questresult', 'SurveyController@questresult');


//预约咨询
Route::get('/appointsetting', 'ConsultController@appointsetting');
Route::get('/appointmanage', 'ConsultController@appointmanage');
Route::get('/appointcoach', 'ConsultController@appointcoach');
Route::get('/appointmy', 'ConsultController@appointmy');
Route::get('/order','ConsultController@order');

//档案管理
Route::get('/archivestest', 'ManagementController@archivestest');
Route::get('/archivespersonal', 'ManagementController@archivespersonal');
Route::get('/archivesquest', 'ManagementController@archivesquest');
Route::get('/archivesall', 'ManagementController@archivesall');

//回收站
Route::get('/recycle','RecycleController@recycle');
Route::get('/delete','RecycleController@delete');
Route::get('/restore','RecycleController@restore');
Route::get('/cancel','RecycleController@cancel');
//Route::post('/delete/{id}/check',['as'=>'/delete','uses'=>'RecycleController@delete']);







