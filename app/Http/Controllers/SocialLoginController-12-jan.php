<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; 
  
use Illuminate\Support\Facades\Response;
use Osiset\ShopifyApp\Services\ShopSession;
use Illuminate\Support\Facades\Auth; 
use App\Models\User;
use DB;

 

class SocialLoginController extends Controller
{
    //

    public function sociallogin($social='',$shop=''){

        return view('setting',['social'=>$social,'shop'=>$shop]);
        
    }

    public function fblogin($social='',$shop='',$client_id=''){ 
       return view('setting');
   }


   public function fbredirect(Request $request){

    print_r($_GET['code']); 
 
   }

    public function apilogin($shop=''){  
 
        $jayParsedAry = [
        "message" => "Successfully get frame button position", 
        "data" => [
                "type" => "success", 
                "data" => [
                    "id" => "6200d3a3-4264-40b1-a887-3276c11c2d89", 
                    "key" => null, 
                    "secret" => null, 
                    "enabled" => true, 
                    "companyId" => 563, 
                    "styleButtonType" => "black", 
                    "styleButtonRoundness" => "full-rounded", 
                    "styleButtonPosition" => "bottom", 
                    "styleButtonShadow" => true, 
                    "providerId" => 1,
                  
                    "createdAt" => "2022-12-13T02:33:27.529Z", 
                    "updatedAt" => "2022-12-26T08:06:25.837Z" 
                ] 
            ] 
            ]; 
     
        
     return response()->json($jayParsedAry,200); 
      
   }

   public function configCount($shop=''){ 
    $jayParsedAry = [
        "message" => "Successfully get count config with companyId = 563", 
        "data" => 2 
     ];  
    return response()->json($jayParsedAry,200); 
  
}


    public function LoginSocial(Request $request)
    { 

/*        
        $gmail_login = '<button class="btn google-black full-rounded shadow" onclick="mtSocialLogin(`'.$_GET['shop'].'`,`gmail`)">        
        <span>Continue with Google</span>
        </button>';

        $facebook = '<button class="btn margin-top facebook-black full-rounded shadow" onclick="mtSocialLogin(`'.$_GET['shop'].'`,`facebook`)">        
        <span>Continue with Facebook</span>
        </button>';

        $button_html = '<div class="mt_social_login">'.$gmail_login.$facebook.'</div>';*/


    $user = DB::table('users')->where('name',$_GET['shop'])->first();

    $user_data =DB::table('social_settings')
            ->select('social_settings.*','users.enable_social_app')
            ->join('users', 'users.id', '=', 'social_settings.user_id')
            ->where('user_id',$user->id)->first();



    $social_size=$user_data->button_size;
      if($social_size=='1'){
         $btn_size="small";
      }
      else if($social_size=='2'){
         $btn_size="normal";
      }
      else{
         $btn_size="big";
      }




$html = '<div class="mtapps-sociallogin-wrapper">';
$html.='<div id="mt-sticky-social" class="layout-mt-social-'.$user_data->button_style.' layout-mt-socials mt-size-'.$btn_size.($user_data->button_style > 4 ? '-2':'').'">';

if($user_data->facebook=='on'){
 $html.='<a  href="#" class="mt-icon icon-facebook cl-facebook mt-social-connect " title="Facebook" onclick="mtSocialLogin(`'.$_GET['shop'].'`,`facebook`)" >'
 .($user_data->button_style > 4 ? '<span class="mt-label">'.$user_data->facebook_label.'</span>': '').'</a>';
}

if($user_data->twitter=='on'){
 $html.='<a  href="#" class="mt-icon icon-twitter cl-twitter mt-social-connect " title="Twitter">
'.($user_data->button_style > 4 ? '<span class="mt-label">'.$user_data->twitter_label.'</span>': '').'</a>';
}


if($user_data->google=='on'){
$html.=' <a  href="#" class="mt-icon icon-google cl-google mt-social-connect " title="Google" onclick="mtSocialLogin(`'.$_GET['shop'].'`,`gmail`)" >'.($user_data->button_style > 4 ? '<span class="mt-label">'.$user_data->google_label.'</span>': '').'</a>';
}


if($user_data->linkedin=='on'){
$html.=' <a  href="#" class="mt-icon icon-linkedin cl-linkedin mt-social-connect " title="Linkedin" onclick="mtSocialLogin(`'.$_GET['shop'].'`,`gmail`)" >'.($user_data->button_style > 4 ? '<span class="mt-label">'.$user_data->linkedin_label.'</span>': '').'</a>';
}
$html.='</div> <div class="social_heading">'.$user_data->social_heading.'</div> </div>';






        if(isset($_GET['type']) && $_GET['type'] == 'count'){
            $jayParsedAry = [
                "message" => "Successfully get count config with companyId = 563", 
                "data" => 2 
             ]; 

        }else{

            $jayParsedAry = [
                "message" => "Successfully get frame button position", 
                "data" => [
                        "type" => "success", 
                        "data" => [
                            "id" => "6200d3a3-4264-40b1-a887-3276c11c2d89", 
                            "key" => null, 
                            "secret" => null, 
                            "enabled" => true, 
                            "companyId" => 563, 
                            "styleButtonType" => "black", 
                            "styleButtonRoundness" => "full-rounded", 
                            "styleButtonPosition" => "top", 
                            "styleButtonShadow" => true, 
                            "providerId" => 1, 
                            "button_html" => $html,
                            "createdAt" => "2022-12-13T02:33:27.529Z", 
                            "updatedAt" => "2022-12-26T08:06:25.837Z" 
                        ] 
                    ] 
                    ]; 

        } 
            
        return response()->json($jayParsedAry,200); 
    }

}
