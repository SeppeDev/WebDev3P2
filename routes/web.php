<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*
 *  Set up locale and locale_prefix if other language is selected
 */
if (in_array(Request::segment(1), Config::get('app.alt_langs'))) {

    App::setLocale(Request::segment(1));
    Config::set('app.locale_prefix', Request::segment(1));
}

/*
 * Set up route patterns - patterns will have to be the same as in translated route for current language
 */
//foreach(Lang::get('routes') as $k => $v) {
//    Route::pattern($k, $v);
//}

Route::group(['prefix' => Config::get('app.locale_prefix')], function()
{

    Route::get("/", "HomeController@index");

    Route::get("/category/{id}", "CategoryController@index");

    Route::get("/product/{id}", "ProductController@index");


    Route::get("search", "SearchController@index");
    Route::post("/search/search", "SearchController@search");

    Route::get("/faq", "FaqController@index");
    Route::post("/faq/search", "FaqController@search");

    Route::get("/about", "AboutController@index");
    Route::post("/message", "AboutController@message");
    
});

Route::get('/', function () {
        return view('welcome');
    });

Route::post("/subscribe", "HomeController@store");


Auth::routes();

Route::get("/admin", "AdminController@index");
Route::get("/admin/dashboard", "DashboardController@index")->middleware("auth");
Route::post("/admin/dashboard/hotitems", "DashboardController@changeHotItems")->middleware("auth");
Route::delete("/admin/dashboard/deleteproduct/{product}", "DashboardController@delete")->middleware("auth");

Route::get("/admin/dashboard/editproduct/{product}", "EditProductController@index")->middleware("auth");
Route::post("/admin/dashboard/editproduct/{product}", "EditProductController@edit")->middleware("auth");

Route::post("/admin/dashboard/newsize/{product}", "EditProductController@storeNewSize")->middleware("auth");
Route::delete("/admin/dashboard/deletesize/{size}", "EditProductController@deleteSize")->middleware("auth");

Route::post("/admin/dashboard/newcolor/{product}", "EditProductController@storeNewColor")->middleware("auth");
Route::delete("/admin/dashboard/deletecolor/{color}", "EditProductController@deleteColor")->middleware("auth");

Route::post("/admin/dashboard/newimage/{product}", "EditProductController@storeNewImage")->middleware("auth");
Route::delete("/admin/dashboard/deleteimage/{picture}", "EditProductController@deleteImage")->middleware("auth");

Route::post("/admin/dashboard/editCollections/{product}", "EditProductController@editCollections")->middleware("auth");


Route::get("/admin/dashboard/newproduct", "NewProductController@index")->middleware("auth");
Route::post("/admin/dashboard/newproduct", "NewProductController@store")->middleware("auth");

Route::get("/admin/dashboard/newcollection", "NewCollectionController@index")->middleware("auth");
Route::post("/admin/dashboard/newcollection", "NewCollectionController@store")->middleware("auth");
Route::delete("/admin/dashboard/deletecollection/{collection}", "NewCollectionController@delete")->middleware("auth");

Route::get("/admin/dashboard/editcollection/{collection}", "EditCollectionController@index")->middleware("auth");
Route::post("/admin/dashboard/editcollection/{collection}", "EditCollectionController@edit")->middleware("auth");

Route::get("/admin/dashboard/newfaq", "NewFaqController@index")->middleware("auth");
Route::post("/admin/dashboard/newfaq", "NewFaqController@store")->middleware("auth");
Route::delete("/admin/dashboard/deletefaq/{faq}", "NewFaqController@delete")->middleware("auth");

Route::get("/admin/dashboard/editfaq/{faq}", "EditFaqController@index")->middleware("auth");
Route::post("/admin/dashboard/editfaq/{faq}", "EditFaqController@edit")->middleware("auth");