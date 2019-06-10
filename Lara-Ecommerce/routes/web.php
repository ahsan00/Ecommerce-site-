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

Route::get('/','pagescontroller@index')->name('index');
Route::get('/contact','pagescontroller@contact')->name('contact');
Route::get('/products','pagescontroller@products')->name('products');
Route::get('/product/{slug}','pagescontroller@show')->name('product.show');
Route::get('/search','pagescontroller@search')->name('search');
Route::get('category/{id}','Categoriescontroller@showcategory')->name('showcategory');
//Route::get('/product','Categoriescontroller@index')->name('index');
//user verification

Route::group(['prefix'=>'user'],function()
{
Route::get('/token/{token}','verifycontroller@verify')->name('user.verification');
Route::get('/dashboard','userscontroller@dashboard')->name('user.dashboard');
Route::get('/profile','userscontroller@profile')->name('user.profile');
Route::post('/profile/update','userscontroller@updateprofile')->name('user.updateprofile');

});
//cart Yaf_Controller_Abstract
Route::group(['prefix'=>'cart'],function()
{
Route::get('/','cartcontroller@index')->name('carts');
Route::post('/store','cartcontroller@show')->name('cart.store');
Route::post('/update/{id}','cartcontroller@update')->name('cart.update');
Route::post('/delete/{id}','cartcontroller@delete')->name('cart.delete');

});
//checkout routerrs
Route::group(['prefix'=>'checkout'],function()
{
Route::get('/','ordercontroller@index')->name('checkout');
Route::post('/store','ordercontroller@store')->name('checkout.store');

});


Route::group(['prefix'=>'admin'],function()
{
  Route::get('/','adminpagesscontroller@index')->name('admin.index');
  Route::get('/product/create','adminpagesscontroller@create')->name('admin.product.create');
  Route::get('/products','adminpagesscontroller@manageproduct')->name('admin.products');
    Route::get('/product/edit/{id}','adminpagesscontroller@productedit')->name('admin.product.edit');
  Route::post('/product/create','adminpagesscontroller@store')->name('admin.product.store');
   Route::post('/product/update/{id}','adminpagesscontroller@update')->name('admin.product.update');
   Route::post('/product/delete/{id}','adminpagesscontroller@delete')->name('admin.product.delete');

});
//category mnagement
Route::group(['prefix'=>'category'],function()
{
  Route::get('/','Categorycontroller@index')->name('admin.index');
  Route::get('/product/create','CategoryController@create')->name('admin.category.create');
  Route::get('/products','CategoryController@manageproduct')->name('admin.category');
    Route::get('/product/edit/{id}','CategoryController@productedit')->name('admin.category.edit');
  Route::post('/product/create','CategoryController@store')->name('admin.category.store');
   Route::post('/product/update/{id}','CategoryController@update')->name('admin.category.update');
   Route::post('/product/delete/{id}','CategoryController@delete')->name('admin.category.delete');

});
//division
Route::group(['prefix'=>'division'],function()
{
  Route::get('/','divisioncontroller@index')->name('admin.index');
  Route::get('/product/create','divisionController@create')->name('admin.division.create');
  Route::get('/products','divisionController@manageproduct')->name('admin.division');
    Route::get('/product/edit/{id}','divisionController@productedit')->name('admin.division.edit');
  Route::post('/product/create','divisionController@store')->name('admin.division.store');
   Route::post('/product/update/{id}','divisionController@update')->name('admin.division.update');
   Route::post('/product/delete/{id}','divisionController@delete')->name('admin.division.delete');

});
//district
Route::group(['prefix'=>'district'],function()
{
  Route::get('/','districtcontroller@index')->name('admin.index');
  Route::get('/product/create','districtController@create')->name('admin.district.create');
  Route::get('/products','districtController@manageproduct')->name('admin.district');
    Route::get('/product/edit/{id}','districtController@productedit')->name('admin.district.edit');
  Route::post('/product/create','districtController@store')->name('admin.district.store');
   Route::post('/product/update/{id}','districtController@update')->name('admin.district.update');
   Route::post('/product/delete/{id}','districtController@delete')->name('admin.district.delete');

});













//brand management
Route::group(['prefix'=>'brand'],function()
{
  Route::get('/','Brandcontroller@index')->name('admin.index');
  Route::get('/product/create','BrandController@create')->name('admin.brand.create');
  Route::get('/products','BrandController@manageproduct')->name('admin.brand');
    Route::get('/product/edit/{id}','BrandController@productedit')->name('admin.brand.edit');
  Route::post('/product/create','BrandController@store')->name('admin.brand.store');
   Route::post('/product/update/{id}','BrandController@update')->name('admin.brand.update');
   Route::post('/product/delete/{id}','BrandController@delete')->name('admin.brand.delete');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('get-district/{id}',function($id){

return json_encode(App\district::where('division_id',$id)->get());


});
