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
    $user_id=Auth::user()->id;
    $user_data =DB::table('social_settings')
            ->select('social_settings.*','users.enable_social_app')
            ->join('users', 'users.id', '=', 'social_settings.user_id')
            ->where('user_id',$user_id)->first();

    $total_data =DB::table('social_settings')
            ->where('user_id',$user_id)->count();

    if($total_data < 1){
    $data = DB::table('social_settings')
            ->insert(['user_id'=>$user_id]);
 }
    return view('welcome',['user_data'=>$user_data]);
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


Route::post('/save_social_setting', [SocialSettingController::class, 'save_social_setting']);

// Social Setting 
        Route::get('/social_setting', function () {   
          return view('social_setting');  
       })->name('social_setting');     

 


