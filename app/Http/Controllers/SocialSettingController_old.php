<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
class SocialSettingController extends Controller
{
    
public function store(Request $request){
      
          // print_r($request->all());die;
        $id = $request->get('id');
        if(isset($id) && !empty($id)){
            $data = DB::table('social_settings')
            ->where('user_id', $id)
            ->update(['theme'=>'0','widget_heading'=>$request->get('heading')]); 
            return response()->json(['status' => true, 'message' => 'Record updated successfully']);
        }

}


}
