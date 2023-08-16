<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth; 
class SocialSettingController extends Controller
{
    
public function store(Request $request){

    $user_id = $request->get('user_id');

    $data_setting = DB::table('social_settings')
            ->where('user_id', $user_id)
            ->first();


    $button=$request->services;
    $fb_btn='';
    $twt_btn='';
    $gl_btn='';
    $ln_btn='';

     if(isset($button['facebook']) ){
        $fb_btn=$button['facebook'];
     }
     if(isset($button['twitter'])){
        $twt_btn=$button['twitter'];
     }
     if(isset($button['google'])){
        $gl_btn=$button['google'];
     }
     if(isset($button['linkedin'])){
        $ln_btn=$button['linkedin'];
     }

$social_size=$request->social_size;
      if($social_size=='1'){
         $btn_size="small";
      }
      else if($social_size=='2'){
         $btn_size="normal";
      }
      else{
         $btn_size="big";
      }

 
$html='<script src="https://kit.fontawesome.com/8f573b0832.js" crossorigin="anonymous"></script><div class="mtapps-sociallogin-wrapper">';

if($request->position_social=='bottom'){
$html.='<div class="social_heading">'.$request->social_heading.'</div>';
}

$html.='<div id="mt-sticky-social" class="layout-mt-social-'.$request->social_type.' layout-mt-socials mt-size-'.$btn_size.($request->social_type > 4 ? '-2':'').'">';

if($fb_btn=='on'){
 $html.='<a  href="#" class="mt-icon cl-facebook mt-social-connect " title="Facebook"> <i class="fab fa-facebook-f"></i>'
 .($request->social_type > 4 ? '<span class="mt-label">'.$request->label["facebook"].'</span>': '').'</a>';
}

if($gl_btn=='on'){
$html.=' <a  href="#" class="mt-icon  cl-google mt-social-connect " title="Google"> <i class="fab fa-google"></i>'.($request->social_type > 4 ? '<span class="mt-label">'.$request->label["google"].'</span>': '').'</a>';
}
if($ln_btn=='on'){
$html.=' <a  href="#" class="mt-icon  cl-linkedin mt-social-connect " title="Linkedin"> <i class="fab fa-linkedin-in"></i>'.($request->social_type > 4 ? '<span class="mt-label">'.$request->label["linkedin"].'</span>': '').'</a>';
}
if($twt_btn=='on'){
   $html.='<a  href="#" class="mt-icon  cl-twitter mt-social-connect " title="Github"><i class="fa-brands fa-github"></i></i>
  '.($request->social_type > 4 ? '<span class="mt-label">'.$request->label["twitter"].'</span>': '').'</a>';
  }
$html.='</div>';
if($request->position_social=='top'){
$html.='<div class="social_heading">'.$request->social_heading.'</div>';
}
$html.='</div>';

 


/*$html='<div class="mtapps-sociallogin-wrapper">
       <div id="mt-sticky-social" class="layout-mt-social-8 layout-mt-socials mt-size-normal-2 ">
       <a  href="#" class="mt-icon icon-facebook cl-facebook mt-social-connect " title="Facebook"><span class="mt-label">Facebook</span></a> 
       <a  href="#" class="mt-icon icon-twitter cl-twitter mt-social-connect " title="Twitter"><span class="mt-label">Twitter</span></a></div>  
        <div class="social_heading">Or login with</div></div>';*/
    return response()->json(['status' => 1, 'html' => $html]);


}

public function save_social_setting(Request $request){ 
   $button=$request->services;
   $fb_btn='off';
   $twt_btn='off';
   $gl_btn='off';
   $ln_btn='off';

    if(isset($button['facebook']) ){
        $fb_btn=$button['facebook'];
     }

     if(isset($button['twitter'])){
        $twt_btn=$button['twitter'];
     }

     if(isset($button['google'])){
        $gl_btn=$button['google'];
     }
 
     if(isset($button['linkedin'])){
        $ln_btn=$button['linkedin'];
     }



   $button_label=$request->label;
   $fb_btn_label='Facebook';
   $twt_btn_label='Twitter';
   $gl_btn_label='Google';
   $ln_btn_label='Linkedin';

    if(isset($button_label['facebook']) ){
        $fb_btn_label=$button_label['facebook'];
     }

     if(isset($button_label['twitter'])){
        $twt_btn_label=$button_label['twitter'];
     }

     if(isset($button_label['google'])){
        $gl_btn_label=$button_label['google'];
     }
 
     if(isset($button_label['linkedin'])){
        $ln_btn_label=$button_label['linkedin'];
     }


     $enable_app_status='off';

     if(isset($request->status)){
        $enable_app_status='on';
     }

   $user_id = $request->get('user_id');
    if(isset($user_id) && !empty($user_id)){
            $data = DB::table('social_settings')
            ->where('user_id', $user_id)
            ->update(['facebook'=>$fb_btn,'twitter'=>$twt_btn,'google'=>$gl_btn,'linkedin'=>$ln_btn,'facebook_label'=>$fb_btn_label,'twitter_label'=>$twt_btn_label,'google_label'=>$gl_btn_label,'linkedin_label'=>$ln_btn_label,'button_style'=>$request->social_type,'social_heading'=>$request->social_heading,'button_size'=>$request->social_size,'button_position'=>$request->position_social]);

             $user_data = DB::table('users')
            ->where('id', $user_id)
            ->update(['enable_social_app'=>$enable_app_status]);

            return response()->json(['status' => true, 'message' => 'Record saved successfully']);
        }
        else{
            return response()->json(['status' => false, 'message' => 'Something went wrong']); 
        }

}








}
