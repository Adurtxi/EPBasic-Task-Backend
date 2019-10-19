<?php
use Illuminate\Http\Request;

use App\Http\Middleware\ApiAuthMiddleware;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'cors', 'prefix' => 'api'], function(){});

//Rutas controlador Usuario
Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');
Route::put('user/update', 'UserController@update');

Route::get('user/pinCode/{user_id}/{pinCode}', 'UserController@unblockUser');
Route::get('user/pinCode', 'UserController@getPinCode');
Route::get('user/change-pinCode', 'UserController@changePinCode');

Route::get('timetable', 'TimetableController@index');
Route::post('timetable', 'TimetableController@store');
Route::delete('timetable', 'TimetableController@destroy');

Route::get('subjects/all', 'SubjectController@indexWithAll');
Route::get('subject/set-current-unity/{id}', 'SubjectController@setCurrentUnity');
Route::get('subjects', 'SubjectController@index');
Route::get('subject/{id}', 'SubjectController@detail');
Route::post('subject', 'SubjectController@store');
Route::put('subject/{id}', 'SubjectController@update');
Route::delete('subject/{id}', 'SubjectController@destroy');

Route::get('books/{subject_id}', 'BookController@index');
Route::get('book/getPDF/{filename}', 'BookController@getBookPDF');
Route::get('book/{id}', 'BookController@detail');
Route::post('book', 'BookController@store');
Route::put('book/{id}', 'BookController@update');
Route::delete('book/{id}', 'BookController@destroy');
Route::post('pdf/upload/{book_id}', 'BookController@pdfUpload');

Route::get('pdf/last-seen-page/{book_id}/{page_number}', 'BookController@lastSeenPage');
Route::get('pdf/saved-pages/{unity_id}', 'BookController@savedPages');
Route::post('pdf/savedPage', 'BookController@storePage');
Route::put('pdf/savedPage/{id}', 'BookController@updatePage');
Route::delete('pdf/savedPage/{id}', 'BookController@destroyPage');

Route::get('units/{subject_id}', 'UnityController@index');
Route::get('unity/{id}', 'UnityController@detail');
Route::post('unity', 'UnityController@store');
Route::put('unity/{id}', 'UnityController@update');
Route::delete('unity/{id}', 'UnityController@destroy');

Route::get('tasks/todo/{subject_id}', 'TaskController@indexToDo');
Route::get('tasks/{unity_id}', 'TaskController@index');
Route::get('task/{id}', 'TaskController@detail');
Route::post('task', 'TaskController@store');
Route::put('task/{id}', 'TaskController@update');
Route::delete('task/{id}', 'TaskController@destroy');

Route::get('exams/todo/{subject_id}', 'ExamController@indexToDo');
Route::get('exams/{unity_id}', 'ExamController@index');
Route::get('exam/{id}', 'ExamController@detail');
Route::post('exam', 'ExamController@store');
Route::put('exam/{id}', 'ExamController@update');
Route::delete('exam/{id}', 'ExamController@destroy');

Route::get('exercise/done/{exercise_id}', 'ExerciseController@markAsDone');
Route::get('exercises/done/{task_id}', 'ExerciseController@markAsDoneAll');

Route::get('events', 'EventController@index');
Route::post('event', 'EventController@store');
Route::put('event/{id}', 'EventController@update');
Route::delete('event/{id}', 'EventController@destroy');
