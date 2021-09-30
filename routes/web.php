<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotesController;
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
//get, post, put, delete, patch, options
// Route::get('/', function () {
//     return view('welcome');
// });


// Route::match(['get', 'post'], '/user/profile', function () {
//     //
// });

// Route::any('users/{id}', function ($id) {
    
// });

// Route::redirect('/etudiant', '/', 301);

// Route::get('users/{id}/{name}', function ($id) {
//     return 'Hello user ' . $id;
// })->where(['id' => '[0-9]+','name' => '[a-z]+'])->name('user');


// Route::get('users/{id?}', function ($id = null) {
//     return 'Hello user ' . $id;
// })->name('user');

// $url = Route('user');

// Route::prefix('admin')->group(function(){
//     Route::get('users/{id}', function ($id) {
//         return 'Hello user ' . $id;
//     });
// });

// Route::name('admin.')->group(function(){
//     Route::get('users/{id}', function ($id) {
//         return 'Hello user ' . $id;
//     })->name('users');
// });




////////////////////////////////////

// Route::get('users/{name}', function ($name) {
//     return view('users',['objJSON' => ['name'=>'anas','age'=>'21']]);
// });

// Route::get('test/', function () {
//     return ['name'=>'anas','age'=>'21'];//JSON
// });
Route::view('/', 'auth.login')->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ---------------------------------------------------------------------------------------------------

Route::group(['prefix' => 'student', 'as'=>'student.', 'middleware' => ['auth','isStudent','backNotAllowed']],function () {
    Route::get('profile', 'StudentController@show')->name('profile');
    Route::put('update', 'StudentController@update')->name('update');
    Route::get('pdf', 'StudentController@pdf')->name('pdf');
    Route::get('notes', [NotesController::class, 'index'])->name('notes');
});

Route::resource('admin', AdminController::class)->except([
    'create','edit','update'
])->middleware(['auth','isAdmin','backNotAllowed']);

Route::put('admin', 'AdminController@update')->name('admin.update');


Route::get('/admin/delete/{id}', function ($id){
    return view('admin.delete',['id' => $id]);
})->name('admin.deleteView');

Route::delete('/admin/delete2/{id}', 'AdminController@delete2')->name('admin.delete2');

Route::fallback(function(){
    return view('page404');
});
