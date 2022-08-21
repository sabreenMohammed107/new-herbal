<?php

use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
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
Route::auth();

Route::group(
        [
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
        ], function() {
    Route::get('/admin', function () {
        if (Auth::check()) {
            return redirect('/adminHome');
        } else {
            return redirect('/login');
        }
    });

    Route::get('/adminHome', 'App\Http\Controllers\HomeController@adminHome');
    Route::resource('customerReview', 'App\Http\Controllers\CustomerReviewController');
    Route::post('/customerReviewSearch', 'App\Http\Controllers\CustomerReviewController@customerReviewSearch');
    Route::resource('about', 'App\Http\Controllers\AboutController');
    Route::post('aboutSearch', 'App\Http\Controllers\AboutController@aboutSearch');
    Route::resource('aboutAchievement', 'App\Http\Controllers\AboutAchievementController');
    Route::post('aboutAchievementSearch', 'App\Http\Controllers\AboutAchievementController@aboutAchievementSearch');
    Route::resource('galleryType', 'App\Http\Controllers\GalleryTypeController');
    Route::post('/galleryTypeSearch', 'App\Http\Controllers\GalleryTypeController@galleryTypeSearch');
    Route::resource('gallery', 'App\Http\Controllers\GalleryController');
    Route::post('/galleryTypeSearch', 'App\Http\Controllers\GalleryTypeController@galleryTypeSearch');
    Route::resource('certifcate', 'App\Http\Controllers\CertificationController');
    Route::post('certificationSearch', 'App\Http\Controllers\CertificationController@certificationSearch');
    Route::resource('usefulCategory', 'App\Http\Controllers\UsefulCategoryController');
    Route::post('UsefulCategorySearch', 'App\Http\Controllers\UsefulCategoryController@UsefulCategorySearch');
    Route::resource('usefulLink', 'App\Http\Controllers\UsefulLinkController');
    Route::post('UsefulLinkSearch', 'App\Http\Controllers\UsefulLinkController@UsefulLinkSearch');
    Route::resource('contact', 'App\Http\Controllers\ContactController');
    Route::post('contactSearch', 'App\Http\Controllers\ContactController@contactSearch');
    Route::get('assignContactValue/{assignContactValue}', 'App\Http\Controllers\ContactController@assignContactValue');
    Route::post('assignContactValueStore', 'App\Http\Controllers\ContactController@assignContactValueStore');
    Route::post('contactValues', 'App\Http\Controllers\ContactController@contactValues');
    Route::post('assignContactValueUpdate', 'App\Http\Controllers\ContactController@assignContactValueUpdate');
    Route::delete('contactValueDelete', 'App\Http\Controllers\ContactController@contactValueDelete');
    Route::resource('news', 'App\Http\Controllers\NewsController');
    Route::post('newsSearch', 'App\Http\Controllers\NewsController@newsSearch');
//    Route::get('assignNewsPoint/{assignNewsPoint}', 'NewsController@assignNewsPoint');
    Route::post('assignNewsPointStore', 'App\Http\Controllers\NewsController@assignNewsPointStore');
//    Route::post('newsPointValues', 'NewsController@newsPointValues');
    Route::get('assignNewsPoint/{assignNewsPoint}', 'App\Http\Controllers\NewsController@assignNewsPoint');
    Route::post('newsValues', 'App\Http\Controllers\NewsController@newsValues');
    Route::post('assignNewsPointsUpdate', 'App\Http\Controllers\NewsController@assignNewsPointsUpdate');
    Route::delete('newsPointsDelete', 'App\Http\Controllers\NewsController@newsPointsDelete');
    Route::resource('productCategory', 'App\Http\Controllers\ProductCategoryController');
    Route::post('productCategorySearch', 'App\Http\Controllers\ProductCategoryController@productCategorySearch');
    Route::resource('product', 'App\Http\Controllers\ProductController');
    Route::post('productSearch', 'App\Http\Controllers\ProductController@productSearch');
    Route::post('assignProductSheet/{$product->id}', 'App\Http\Controllers\ProductController@assignProductSheet');
    Route::post('newsValues', 'App\Http\Controllers\ProductController@newsValues');
    Route::get('assignProductSheet/{assignProductSheet}', 'App\Http\Controllers\ProductController@assignProductSheet');
    Route::post('productSheets','App\Http\Controllers\ProductController@productSheets');
    Route::post('assignProductSheetStore','App\Http\Controllers\ProductController@assignProductSheetStore');
    Route::post('assignProductSheetUpdate','App\Http\Controllers\ProductController@assignProductSheetUpdate');
    Route::delete('productSheetsDelete','App\Http\Controllers\ProductController@productSheetsDelete');
    Route::get('assignProductImage/{assignProductImage}', 'App\Http\Controllers\ProductController@assignProductImage');
    Route::post('assignProductImageStore','App\Http\Controllers\ProductController@assignProductImageStore');
    Route::delete('productImageDelete','App\Http\Controllers\ProductController@productImageDelete');
    Route::resource('sliderImage', 'App\Http\Controllers\SliderImageController');
    /**************************************/
    /************** web site ***************************/
    Route::get('/','App\Http\Controllers\WebController@index');
    // Route::get('/',[WebController::class ,'index']);
    Route::get('/webUsefulLink','App\Http\Controllers\WebController@webUsefulLink');
    Route::get('/webNews','App\Http\Controllers\WebController@webNews');
    Route::get('/webNewsDetails/{webNewsDetails}','App\Http\Controllers\WebController@webNewsDetails');
    Route::get('webCertifications','App\Http\Controllers\WebController@webCertifications');
    Route::get('webContact','App\Http\Controllers\WebController@webContact');
    Route::get('webAbout','App\Http\Controllers\WebController@webAbout');
    Route::get('webProductDetails/{webProductDetails}','App\Http\Controllers\WebController@webProductDetails');
    Route::get('webGallery','App\Http\Controllers\WebController@webGallery');
    Route::get('webProductCategories','App\Http\Controllers\WebController@webProductCategories');
    Route::post('galleryTypeImages','App\Http\Controllers\WebController@galleryTypeImages');
    Route::post('webProductSearch','App\Http\Controllers\WebController@webProductSearch');
    Route::post('sendMessage','App\Http\Controllers\WebController@sendMessage');
    Route::get('webProductCategory/{webProductCategory}','App\Http\Controllers\WebController@webProductCategory');
});


