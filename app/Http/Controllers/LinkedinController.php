<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Exception;
use Socialite;
use App\Models\User;
class LinkedinController extends Controller
{
    public function linkedinRedirect()
    {
        $shop  = $_GET['shop']; 
        session(['shop' => $shop]);
       // return Socialite::driver('linkedin')->redirect();
        return Socialite::driver('linkedin')
        ->with(['shop' => 'test.com'])
        ->redirect();
    }
       
    public function linkedinCallback(Request $request)
    {
        try { 
     
            //$shop = request()->input('shop');
            $shop = session('shop'); 

            $user = Socialite::driver('linkedin')->user();

            return view('setting',['social'=>'social_login','shop'=>$shop,'email'=>$user->email,'name'=>$user->name]); 
     
      
            // $linkedinUser = User::where('oauth_id', $user->id)->first();
      
            // if($linkedinUser){
      
            //     Auth::login($linkedinUser);
     
            //     return redirect('/dashboard');
      
            // }else{
            //     $user = User::create([
            //         'name' => $user->name,
            //         'email' => $user->email,
            //         'oauth_id' => $user->id,
            //         'oauth_type' => 'linkedin',
            //         'password' => encrypt('admin12345')
            //     ]);
     
            //     Auth::login($user);
      
            //     return redirect('/dashboard');
            // }
     
        } catch (Exception $e) {
         print_r($e->getMessage());
        }
    }

    public function googleRedirect()
    {
        $shop  = $_GET['shop']; 
        session(['shop' => $shop]);
        return Socialite::driver('google')->redirect();
    }
       
    public function googleCallback()
    {
        try { 
                 
            //$shop = request()->input('shop');
            $shop = session('shop');  
            $user = Socialite::driver('google')->user();
           // echo '<pre>';
            //print_r($shop);die;       
           // $finduser = User::where('google_id', $user->id)->first();

           return view('setting',['social'=>'social_login','shop'=>$shop,'email'=>$user->email,'name'=>$user->name]); 
      
       
        } catch (Exception $e) {
         print_r($e->getMessage());
        }
    }

    public function facebookRedirect()
    {
        $shop  = $_GET['shop']; 
        session(['shop' => $shop]); 
        return Socialite::driver('facebook')->redirect();
    }
       
    public function loginWithFacebook()
    {
        try { 
                 
            //$shop = request()->input('shop');
            $shop = session('shop');  
            $user = Socialite::driver('facebook')->user();  

           return view('setting',['social'=>'social_login','shop'=>$shop,'email'=>$user->email,'name'=>$user->name]); 
      
       
        } catch (Exception $e) {
         print_r($e->getMessage());
        }
    }


    public function githubRedirect()
    {
        $shop  = $_GET['shop']; 
        session(['shop' => $shop]);  
        return Socialite::driver('github')->redirect();
    }
       
    public function loginWithGithub()
    {
        try { 
                 
            //$shop = request()->input('shop');
            $shop = session('shop');  
            $user = Socialite::driver('github')->user();  

           return view('setting',['social'=>'social_login','shop'=>$shop,'email'=>$user->email,'name'=>$user->name]); 
      
       
        } catch (Exception $e) {
         print_r($e->getMessage());
        }
    }


    public function checkSocialLogin(Request $request)
    {
        try { 
            
            print_r($_GET);
                 
            //$shop = request()->input('shop');
           // $shop = session('shop');  
          //  $user = Socialite::driver('facebook')->user();  

           //return view('setting',['social'=>'social_login','shop'=>$shop,'email'=>$user->email,'name'=>$user->name]); 
      
       
        } catch (Exception $e) {
         print_r($e->getMessage());
        }
    }
}