<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


//định tuyến đến trang admin
Route::group(['prefix' => 'admin'], function () {
 Route::group(['namespace'=>'admin'], function () {
    Route::resources([
        'category'=>'CategoryController',
        'product'=>'ProductController',
        'user'=>'UsersController',
        'bill'=>'AdminBillController',
        'banner'=>'BannerController',
        'prodetail'=>'ProductdetailController'
    ]);
    Route::get('/','AdminController@index')->name('admin.index');
    Route::post('find','AdminController@find')->name('admin.find');
    
  });
});

Auth::routes();

//định tuyến cho cartcontroller
Route::get('Add-Cart/{id}', 'CartController@AddCart');
// xóa tại cart ajax
Route::get('Delete-Item-Cart/{id}', 'CartController@DeleteItemCart');
// điều hướng đến trang list cart
Route::get('List-Carts', 'CartController@ViewListCart')->name('list.cart');
// xóa product tại list cart
Route::get('Delete-List-Item-Cart/{id}', 'CartController@DeleteListItemCart');
// lưu thay đôi số lượng tại quanty của list cart
Route::post('All-Save','CartController@SaveAllItem');

Route::get('checkout', 'CheckoutController@getCheckOut');
Route::post('Check-Out', 'CheckoutController@postCheckOut');
// điều hướng đến trang thông tin tài khoản
Route::resources([
  'info'=>'UserController',
]);


//định tuyến đến trang home người dùng
Route::get('/','HomeController@index')->name('home');
Route::post('find','HomeController@find')->name('home.find');
// định tuyến đến trang giới thiệu
Route::get('gioithieu',function(){
  return view('introduce');
})->name('gioithieu');





Route::get('laythongtin', function () {
  if(Auth::check())
  {
   echo"<pre>";
   //print_r(Auth::user());
   $user = Auth::user();
   print_r($user->email);
   echo"</pre>"; 
  }
  else
  echo "Bạn chưa đăng nhập hệ thống !";
});
Route::get('login', function () {
  return view("auth.login");
    
})->name('login');
Route::get('orderdetail', function () {
  return view('orderdetail');
    
})->name('orderdetail')->middleware('UserRole');

