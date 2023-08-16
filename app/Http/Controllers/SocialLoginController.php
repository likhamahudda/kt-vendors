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
        if(isset($_GET['type']) && $_GET['type'] == 'checkSocialLogin'){
             
          $shop = User::where('name',$request->input('shop'))->first();  
       // $products = $shop->api()->rest('GET','/admin/api/2022-07/customers/6744012882218.json');       
   
        $name = $_GET['name'];
        $email = $_GET['email'];
       // $password = '1234567';
        $getEmail = explode('@', $email);
        $EmailPassword = $getEmail[0].'sl@321';

        $customer_data = array(
            'first_name' => $name, 
            'email' => $email, 
            'password' => $EmailPassword,
            'password_confirmation' => $EmailPassword  
        );
        //print_r($customer_data);die;

        $params_data = array('customer' => $customer_data); 
        $create_customer = $shop->api()->rest(
          'POST',
          '/admin/api/2022-07/customers.json', 
          $params_data
         );
 
         if(isset($create_customer['status']) && $create_customer['status'] == 201){ // Created

            $data_response = [
                "code" => 200, 
                "message" => "Created Account", 
                "email" => $email, 
                "password" => $EmailPassword
             ]; 

         }else if($create_customer['status'] == 422){ // Allready

            $data_response = [
                "code" => 401, 
                "message" => "Email Allready", 
                "email" => $email, 
                "password" => $EmailPassword
             ]; 

         }else{ 
            $data_response = [
                "code" => 402, 
                "message" => "Email Allready", 
                "email" => $email, 
                "password" => $EmailPassword
             ]; 
         }

         return response()->json($data_response,200); 

       

        }else{

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
    
            $html = '<script src="https://kit.fontawesome.com/8f573b0832.js" crossorigin="anonymous"></script> <div class="mtapps-sociallogin-wrapper">';

            if($user_data->button_position=='bottom'){
            $html.='<div class="social_heading">'.$user_data->social_heading.'</div>';
            }

            $html.='<div id="mt-sticky-social" class="layout-mt-social-'.$user_data->button_style.' layout-mt-socials mt-size-'.$btn_size.($user_data->button_style > 4 ? '-2':'').'">';
    
            if($user_data->facebook=='on'){
            $html.='<a  href="#" class="mt-icon cl-facebook mt-social-connect " title="Facebook" onclick="mtSocialLogin(`'.$_GET['shop'].'`,`facebook`)" > <i class="fab fa-facebook-f"></i>'
            .($user_data->button_style > 4 ? '<span class="mt-label">'.$user_data->facebook_label.'</span>': '').'</a>';
            }
    
           
    
            if($user_data->google=='on'){
            $html.=' <a  href="#" class="mt-icon cl-google mt-social-connect " title="Google" onclick="mtSocialLogin(`'.$_GET['shop'].'`,`gmail`)" > <i class="fab fa-google"></i>'.($user_data->button_style > 4 ? '<span class="mt-label">'.$user_data->google_label.'</span>': '').'</a>';
            } 
    
            if($user_data->linkedin=='on'){
            $html.=' <a  href="#" class="mt-icon  cl-linkedin mt-social-connect " title="Linkedin" onclick="mtSocialLogin(`'.$_GET['shop'].'`,`linkedin`)" > <i class="fab fa-linkedin-in"></i>'.($user_data->button_style > 4 ? '<span class="mt-label">'.$user_data->linkedin_label.'</span>': '').'</a>';
            }
            if($user_data->twitter=='on'){
                $html.='<a  href="#" class="mt-icon cl-twitter mt-social-connect " title="Github" onclick="mtSocialLogin(`'.$_GET['shop'].'`,`github`)"> <i class="fa-brands fa-github"></i>
                '.($user_data->button_style > 4 ? '<span class="mt-label">'.$user_data->twitter_label.'</span>': '').'</a>';
                }
           $html.='</div>';
            if($user_data->button_position=='top'){
            $html.='<div class="social_heading">'.$user_data->social_heading.'</div>';
            }
            $html.='</div>';

            if(isset($user->enable_social_app) && $user->enable_social_app =='off'){
                $html ='';
             }
           
     
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
                                "styleButtonPosition" => $user_data->button_position, 
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

}
