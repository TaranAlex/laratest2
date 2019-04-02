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

//Route::get('/', function () {
//    return view('welcome');
//});

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

//Route::resource('news', 'NewsController');


/*Route::get('/news', 'NewsController@index');

Route::get('/news/create', 'NewsController@create');

Route::get('/news/{id}/edit', 'NewsController@edit');

Route::get('/news/{id}', 'NewsController@show');

Route::post('/news', 'NewsController@store');

Route::put('/news/{id}', 'NewsController@update');

Route::delete('/news/{id}', 'NewsController@destroy');*/

//
//Route::middleware(['test'])->prefix('/news')->name('news.')->group(function () {
//    Route::get('/', 'NewsController@index');
//
//    Route::get('/create', 'NewsController@create');
//
//    Route::get('/{id}/edit', 'NewsController@edit');
//
//    Route::get('/{id}', 'NewsController@show');
//
//    Route::post('/', 'NewsController@store')->name('store.');
//
//    Route::put('/{id}', 'NewsController@update')->name('update.');
//
//    Route::delete('/{id}', 'NewsController@destroy');
//});

//
//Route::match(['get', 'post'], '/match', function () {
//    return 'match';
//});

//Route::redirect('/aaa', '/news');

Route::view('/', 'welcome');

Route::get('/', 'Auth\LoginController@showLoginForm');

//
//Route::get('/test/{first}/{second?}', function ($first, $second = null) {
//    //dump($first);
//    dump(request()->first);
//    dump($second);
//});

//Route::put('/news/{id}', 'NewsController@update')->name('news.update');


//Route::get('/profile', function () {
//    return view('profile', ['fio' => 'fio', 'age' => 18, 'show' => true, 'skills' => ['js', 'css', 'jquery', 'wp'], 'news' =>
//        [
//            ['title' => 'новость 1', 'body' => 'текст 1'],
//            ['title' => 'новость 2', 'body' => 'текст 2']
//        ]
//
//    ]);
//});
//
//
//Route::resource('books', 'BookController');
//Route::get('books/show/{id}', 'BookController@show');
////Route::get('books/{id}/edit', 'BookController@edit');
//Route::get('books/delete/{id}', 'BookController@destroy');
//
//Route::resource('news1', 'News1Controller');
//
//Route::resource('cars', 'CarController');
//
//Route::resource('alboms', 'AlbomsController');
//Route::get('alboms/show/{id}', 'AlbomsController@show');
//Route::get('alboms/{id}/edit', 'AlbomsController@edit');
//Route::get('alboms/delete/{id}', 'AlbomsController@destroy');


//Route::resource('files', 'FileController');

//Route::get('/form', function () {
//    return view('form-file');
//});
//
//Route::post('/file/save', 'FileController@save')
//    ->name('save-file');
//
//Route::get('/store', 'FileController@store');
//
//
//Route::get('/form', function () {
//    return view('form-text');
//});
//
//Route::get('/text/save', 'TextController@save')
//    ->name('save-text');
//
//Route::get('/store', 'TextController@store');
//
//Route::get('/views/index', 'TextController@index');
//
//Route::get('/showFiles', 'TextController@showFiles');
//
//Route::get('/destroy/{file}', 'TextController@destroy');
//
//Route::get('/form', function () {
//    return view('countries/form-countries');
//});
//
//Route::get('countries/form-countries', 'CountiesController@index')->name('countries');

/*Route::get('/{locale}', function ($locale) {
App::setLocale($request->get('lang', 'en'));
return view('welcome');
});*/


//ЗАДАНИЕ ПО LARAVEL
//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/home_tested', 'Home_testedController@index')->name('home_tested');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home_tested', 'Home_testedController@index')->name('home_tested');
});


Route::group(['middleware' => ['auth', 'teacher']], function () {
        Route::resource('questions', 'QuestionController');
        Route::get('/questions/index', 'QuestionController@index');
        Route::get('/questions/create', 'QuestionController@create');
        Route::get('questions/show/{id}', 'QuestionController@show');
        Route::get('questions/{id}/edit', 'QuestionController@edit');
        Route::get('questions/delete/{id}', 'QuestionController@destroy');
        Route::get('questions/show_test/{id}', 'QuestionController@show_test');
        Route::get('index_tests', 'QuestionController@index_tests')->name('index_tests');
        Route::post('store_test', 'QuestionController@store_test')->name('store_test');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('testing', 'QuestionController@testing')->name('testing');
    Route::get('results', 'QuestionController@results')->name('results');
    Route::get('questions/show_test_for_tested/{id}', 'QuestionController@show_test_for_tested');
    Route::post('store_test_result', 'QuestionController@store_test_result')->name('store_test_result');
});

//Route::get('error_access', function () {
//    return view('errors.error_access');
//});


