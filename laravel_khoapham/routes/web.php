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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('about',function(){
//     echo "<h1>Lưu Quang Bình</h1>";
// });

// localhost:8000/list-product/page-1



// Route ví dụ minh họa về tham số truyền vào ví dụ tenthamso? thì nên đặt cho biến nhận giá trị ở function giá trị mặc định
// Route ví dụ minh họa về điều kiện cho tham số, với tham số truyền vào là 1
// Route::get('list-product/page/{trang?}', function($p=1){
//     echo $p;
//     //print_r($_GET);
//     //print_r($_GET["page"]);
// })->where('trang', '[0-9]+');




//Route ví dụ minh họa về điều kiện tham số, với nhiều tham số truyền vào thì đưa vào where 1 mảng
// Route::get('user/{name}/{age}', function($ten, $tuoi){
//     echo $ten."<br>";
//     echo $tuoi;
// })->where([
//     'name' => '[a-zA-Z]+', // Ví dụ nếu muốn thêm ký tự đặc biệt - thì thêm ký tự - vào sau [a-zA-Z-]
//     'age' => '[0-9]+'
// ]);


// Route ví dụ minh họa về cấu hình điều kiện chung ở app\Providers\RouteServiceProvider.php
// Route::get('user/{id}', function($id){
//     echo $id;
// });
// Route::get('product/{id}/{alias}', function($id){

// });
// Route::get('customer/{id}', function($id){

// });




// Route ví dụ minh họa điều hướng không có tham số truyền vào
// Route::get('/login', function($id){
//     echo 'Login Page';
// })->name('login_page');
// Route::get('register', function($id){
//     // ... register account
//     // then
//     return redirect()->route('login_page');
// });


// Route ví dụ minh họa điều hướng có tham số truyền vào
// Route::get('customer/{id}', function($id){
//     echo $id;
// })->name('get_customer');
// Route::get('test-redirect', function(){
//     //return redirect()->route('get_customer', ['id'=>12]);
//     return redirect()->route('get_customer', 15); // 15 là giá trị cho id của route get_customer
// });


// Route::get('/','HomeController@index');

// Route::get('/user/{id}','HomeController@getUserId');

// Route::get('/user/{id}/{name}','HomeController@getUserInfo');

// Route::get('home', 'HomeController@home');

// Route::get('about', 'HomeController@about');


// Route::get('/', 'AdminController@getHome');



Route::get('query-builder', 'QueryBuilderController@index');


Route::get('eloquent-model', 'ModelController@index');


Route::get('relationship', 'ModelController@relationship');

Route::get('login', 'AuthController@getRegister');
Route::post('login', 'AuthController@postRegister')->name('register');

Route::get('sign-in', 'AuthController@getLogin');
Route::post('sign-in', 'AuthController@postLogin')->name('login');




