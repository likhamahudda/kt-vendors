<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialLoginController;
use App\Http\Controllers\SocialSettingController;
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
    $shop = Auth::user();
    print_r($shop);
    $data = DB::table('social_settings')
            ->insert(['user_id'=>'1','theme'=>'0','widget_heading'=>'shvghsbvhb']);

    return view('welcome');
})->middleware(['verify.shopify'])->name('home');

Route::get('/greeting', function () {
    return 'Hello World';
}); 

Route::get('/sociallogin/{social}/{shop}/{client_id}', [SocialLoginController::class, 'sociallogin']);

Route::get('/apilogin/{shop}', [SocialLoginController::class, 'apilogin']);
Route::get('/configCount/{shop}', [SocialLoginController::class, 'configCount']);

Route::get('/proxy', [SocialLoginController::class, 'LoginSocial'])->middleware('auth.proxy');

Route::get('/fblogin', [SocialLoginController::class, 'fblogin']);

Route::get('/fbredirect', [SocialLoginController::class, 'fbredirect']);


Route::post('/socialstore', [SocialSettingController::class, 'store']);

// Social Setting 
        Route::get('/social_setting', function () {   
          return view('social_setting');  
       })->name('social_setting');     

 


