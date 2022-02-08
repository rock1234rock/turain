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

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\OrderControll;

Auth::routes();
Route::get('/logout' ,function(){
    Auth::logout();
    return redirect("/login");
});

Route::get('/', 'mainController@index')->name('home');

Route::get('/about', 'mainController@about')->name('about');

Route::resource('user', 'userController');
Route::resource('grade', 'GradeController');
Route::resource('ProductType', 'ProductTypeController');
Route::resource('Product', 'ProductController');
Route::resource('supplier','SupplierController');
Route::resource('upload','UploadController');

Route::resource('Order','OrderController');

Route::resource('Orderforadmin','OrderforadminController');
Route::resource('buy','buyController');

Route::resource('Orderdetail','OrderdetailController');

Route::resource('supplier_order','supplier_orderController');
Route::resource('profit','profitController');
Route::resource('report1','report1Controller');
Route::resource('slip','slipController');
Route::resource('detail','DetailController');
Route::resource('report_sup','reportsupController');


Route::get('image-upload', 'ImageUploadController@imageUpload')->name('image.upload');
Route::post('image-upload', 'ImageUploadController@imageUploadPost')->name('image.upload.post');
Route::get("my-search","HomeController@mySearch");
