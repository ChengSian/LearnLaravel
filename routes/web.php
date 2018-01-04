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

/*Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {

    return view('hello');
});

Route::get('/app', function () {

    return view('app');
});

Route::get('/red', 'RedController@index');


Route::get('articles','ArticlesController@index');
Route::get('articles/create','ArticlesController@create');
Route::get('articles/store','ArticlesController@store');


Route::pattern('student_no','s[0-9]{10}');
Route::group(['prefix'=>'student'],function(){
	Route::get('{student_no}',[
		'as'=>'student',
		'uses'=>function($student_no){
			return "學號：".$student_no;
		}
	]);
});*/


/*Route::any('{all}', function () {
	return view('articles.article');
})->where(['all' => '.*']);*/

Route::get('{all}', 'ArticlesController@index')->where(['all' => '.*']);
Route::post('/store','ArticlesController@store');
Route::post('/show/{id}','ArticlesController@update');
Route::post('/edit/{id}','ArticlesController@edit');
//Route::get('/{vue?}', 'ArticlesController@index')->where('vue', '[\/\w\.-]*');