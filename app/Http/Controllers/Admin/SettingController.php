<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Cms;
use Storage;
use File;
use Config;

class SettingController extends Controller
{
    /**
	 * Used for Admin Setting
	 * @return redirect to Admin->Setting
	 */

	public function index(Request $request)
    {
        $setting = [];
        
        //WEBSITE HOME DATA 
        $homeData = Setting::where('text_key','home_setting_tagline_1')
                ->orWhere('text_key','home_setting_tagline_2')
                ->orWhere('text_key','home_setting_button')
                ->orWhere('text_key','home_setting_banner_image')->get();
        
        foreach ($homeData as $ab_value) {
            if($ab_value->text_key=='home_setting_tagline_1'){
                $setting['home']['tagline_1'] = $ab_value->text_value ? $ab_value->text_value : '';
            }
            if($ab_value->text_key=='home_setting_tagline_2'){
                $setting['home']['tagline_2'] = $ab_value->text_value ? $ab_value->text_value : '';
            }
            if($ab_value->text_key=='home_setting_button'){
                $setting['home']['button_text'] =  $ab_value->text_value ? $ab_value->text_value : '';
            }
            if($ab_value->text_key=='home_setting_banner_image'){
                $setting['home']['banner_image'] =  $ab_value->text_value ? $ab_value->text_value : '';
            }
        }

        //WEBSITE INTRO 1 DATA 
        $intro1_data = Setting::where('text_key','text_intro_1_line_1')
                ->orWhere('text_key','text_intro_1_line_2')->get();

        foreach ($intro1_data as $value) {
            /*if($value->text_key=='text_intro_1_line_1'){
                $setting['intro_1']['line_1'] = $value->text_value ? $value->text_value : '';
            }*/
            if($value->text_key=='text_intro_1_line_2'){
                $setting['intro_1']['line_2'] = $value->text_value ? $value->text_value : '';
            }
        }

        //WEBSITE INTRO 2 DATA 
        $intro1_data = Setting::where('text_key','text_intro_2_line_1')
                ->orWhere('text_key','text_intro_2_line_2')->get();

        foreach ($intro1_data as $value) {
            if($value->text_key=='text_intro_2_line_1'){
                $setting['intro_2']['line_1'] = $value->text_value ? $value->text_value : '';
            }
            if($value->text_key=='text_intro_2_line_2'){
                $setting['intro_2']['line_2'] = $value->text_value ? $value->text_value : '';
            }
        }


        //DOWNLOAD LINKS DATA
        $io_data = Setting::where('text_key','intro_offer_range_line_1')
                ->orWhere('text_key','intro_offer_range_line_2')
                ->orWhere('text_key','intro_offer_range_option_1')
                ->orWhere('text_key','intro_offer_range_option_2')->get();

        foreach ($io_data as $io_value) {
            if($io_value->text_key=='intro_offer_range_line_1'){
                $setting['intro_offer_range']['line_1'] = $io_value->text_value ? $io_value->text_value : '';
            }
            if($io_value->text_key=='intro_offer_range_line_2'){
                $setting['intro_offer_range']['line_2'] = $io_value->text_value ? $io_value->text_value : '';
            }
            if($io_value->text_key=='intro_offer_range_option_1'){
                $setting['intro_offer_range']['option_1'] =  $io_value->text_value ? $io_value->text_value : '';
            }
            if($io_value->text_key=='intro_offer_range_option_2'){
                $setting['intro_offer_range']['option_2'] =  $io_value->text_value ? $io_value->text_value : '';
            }
        }

        //WEBSITE Please Assist ME DATA 
        $pam_data = Setting::where('text_key','please_assist_me_text')
                ->orWhere('text_key','please_assist_me_button_text')->get();

        foreach ($pam_data as $pam_value) {
            if($pam_value->text_key=='please_assist_me_text'){
                $setting['assist_me']['text'] = $pam_value->text_value ? $pam_value->text_value : '';
            }
            if($pam_value->text_key=='please_assist_me_button_text'){
                $setting['assist_me']['button_text'] = $pam_value->text_value ? $pam_value->text_value : '';
            }
        }

        //OFFER APPROVED DATA
        $io_data = Setting::where('text_key','offer_approved_line_1')
                ->orWhere('text_key','offer_approved_line_2')
                ->orWhere('text_key','offer_approved_button_text')->get();

        foreach ($io_data as $io_value) {
            if($io_value->text_key=='offer_approved_line_1'){
                $setting['offer_approved']['line_1'] = $io_value->text_value ? $io_value->text_value : '';
            }
            if($io_value->text_key=='offer_approved_line_2'){
                $setting['offer_approved']['line_2'] = $io_value->text_value ? $io_value->text_value : '';
            }
            if($io_value->text_key=='offer_approved_button_text'){
                $setting['offer_approved']['button_text'] =  $io_value->text_value ? $io_value->text_value : '';
            }
        }

        //Text Agent DATA
        $agent_data = Setting::where('text_key','text_agent_line_1')
                ->orWhere('text_key','text_agent_line_2')
                /*->orWhere('text_key','text_agent_line_3')
                ->orWhere('text_key','text_agent_sub_title_1')
                ->orWhere('text_key','text_agent_sub_title_2')
                ->orWhere('text_key','text_agent_sub_title_3')*/
                ->orWhere('text_key','text_agent_button_text')->get();

        foreach ($agent_data as $ta_value) {
            if($ta_value->text_key=='text_agent_line_1'){
                $setting['text_agent']['line_1'] = $ta_value->text_value ? $ta_value->text_value : '';
            }
            if($ta_value->text_key=='text_agent_line_2'){
                $setting['text_agent']['line_2'] = $ta_value->text_value ? $ta_value->text_value : '';
            }
            /*if($ta_value->text_key=='text_agent_line_3'){
                $setting['text_agent']['line_3'] =  $ta_value->text_value ? $ta_value->text_value : '';
            }
            if($ta_value->text_key=='text_agent_sub_title_1'){
                $setting['text_agent']['title_1'] =  $ta_value->text_value ? $ta_value->text_value : '';
            }

            if($ta_value->text_key=='text_agent_sub_title_2'){
                $setting['text_agent']['title_2'] =  $ta_value->text_value ? $ta_value->text_value : '';
            }

            if($ta_value->text_key=='text_agent_sub_title_3'){
                $setting['text_agent']['title_3'] =  $ta_value->text_value ? $ta_value->text_value : '';
            }*/
            if($ta_value->text_key=='text_agent_button_text'){
                $setting['text_agent']['button_text'] =  $ta_value->text_value ? $ta_value->text_value : '';
            }
        }

        //SEO DATA
        $seo_data =Setting::where('text_key','seo_setting_title')
                ->orWhere('text_key','seo_setting_desc')
                ->orWhere('text_key','seo_setting_image')->get();
        
        foreach($seo_data as $seo_value) {
            if($seo_value->text_key=='seo_setting_title'){
                $setting['seo_data']['title'] = $seo_value->text_value ? $seo_value->text_value : '';
            }
            if($seo_value->text_key=='seo_setting_desc'){
                $setting['seo_data']['desc'] = $seo_value->text_value ? $seo_value->text_value : '';
            }
            if($seo_value->text_key=='seo_setting_image'){
                $setting['seo_data']['banner_image'] = $seo_value->text_value ? $seo_value->text_value : '';
            }
        }

        //GENERAL
        $general_setting =Setting::where('text_key','general_setting_admin_logo')
                ->orWhere('text_key','general_setting_email_logo')
                ->orWhere('text_key','general_setting_home_logo')
                ->orWhere('text_key','general_setting_login_logo')->get();
        
        foreach($general_setting as $seo_value) {
            if($seo_value->text_key=='general_setting_admin_logo'){
                $setting['general_setting']['admin_logo'] = $seo_value->text_value ? $seo_value->text_value : '';
            }
            if($seo_value->text_key=='general_setting_email_logo'){
                $setting['general_setting']['email_logo'] = $seo_value->text_value ? $seo_value->text_value : '';
            }
            if($seo_value->text_key=='general_setting_login_logo'){
                $setting['general_setting']['login_logo'] = $seo_value->text_value ? $seo_value->text_value : '';
            }
            if($seo_value->text_key=='general_setting_home_logo'){
                $setting['general_setting']['home_logo'] = $seo_value->text_value ? $seo_value->text_value : '';
            }
        }

        //GENERAL
        $agnet_offer_n_a =Setting::where('text_key','front_agent_offer_not_approved')
                ->orWhere('text_key','front_agent_offer_not_approved_btn')->get();
        
        foreach($agnet_offer_n_a as $naValue) {
            if($naValue->text_key=='front_agent_offer_not_approved'){
                $setting['offer_not_approved']['line'] = $naValue->text_value ? $naValue->text_value : '';
            }
            if($naValue->text_key=='front_agent_offer_not_approved_btn'){
                $setting['offer_not_approved']['button_text'] = $naValue->text_value ? $naValue->text_value : '';
            }
        }

        //SMTP DETAILS
        $smtp_det =Setting::where('text_key','smtp_mailer')
                ->orWhere('text_key','smtp_host')
                ->orWhere('text_key','smtp_port')
                ->orWhere('text_key','smtp_email')
                ->orWhere('text_key','smtp_password')
                ->orWhere('text_key','smtp_enc')->get();
        
        foreach($smtp_det as $smtp) {
            if($smtp->text_key=='smtp_mailer'){
                $setting['smtp']['mailer'] = $smtp->text_value ? $smtp->text_value : '';
            }
            if($smtp->text_key=='smtp_host'){
                $setting['smtp']['host'] = $smtp->text_value ? $smtp->text_value : '';
            }
            if($smtp->text_key=='smtp_port'){
                $setting['smtp']['port'] = $smtp->text_value ? $smtp->text_value : '';
            }
            if($smtp->text_key=='smtp_email'){
                $setting['smtp']['email'] = $smtp->text_value ? $smtp->text_value : '';
            }
            if($smtp->text_key=='smtp_password'){
                $setting['smtp']['password'] = $smtp->text_value ? $smtp->text_value : '';
            }
            if($smtp->text_key=='smtp_enc'){
                $setting['smtp']['enc'] = $smtp->text_value ? $smtp->text_value : '';
            }
        }


    	if (request()->ajax()) {
            return \View::make('admin.setting.index')->with(['setting'=>$setting])->renderSections();
        }
    	return view('admin.setting.index')->with(['setting'=>$setting]);
    }


    /**
     * Used for Admin edit Seo
     * @return redirect to Admin->edit Seo
     */
    public function editSeo(Request $request)
    {
        $input = $request->all();

        if ($input['seo_title']) {
            $seo_title = $input['seo_title'];
            $aTableData = Setting::where('text_key','seo_setting_title')->update(['text_value'=>$seo_title]);   
        }
        if ($input['seo_description']) {
            $seo_description = $input['seo_description'];
            $aTableData = Setting::where('text_key','seo_setting_desc')->update(['text_value'=>$seo_description]);
        }
        if($request->hasFile('seo_banner_image')){
            $get_pre_img = Setting::where('text_key','seo_setting_image')->first();
            $gen_rand = rand(100,99999).time();
            $image_path = $request->file('seo_banner_image');
            $extension = $image_path->getClientOriginalExtension();
            Storage::disk('public')->put(Config::get('constant.images_dirs.SETTING').'/'.$gen_rand.'.'.$extension,  File::get($image_path));
            if(!empty($get_pre_img->text_value)){
                Storage::disk('public')->delete(Config::get('constant.images_dirs.SETTING').'/'.$get_pre_img->text_value);
            }
            $image = $gen_rand.'.'.$extension;
            Setting::where('text_key','seo_setting_image')->update(['text_value'=>$image]);
        }

        $response['status'] = true;
        $response['message'] = "Seo Settings Successfully Updated";

        return response()->json($response);
    }
    

    /**
     * Used for Admin edit editHome
     * @return redirect to Admin->edit editHome
     */
    public function editHome(Request $request)
    {
        $input = $request->all();
        $aTableData = '';
        
        if($request->hasFile('home_banner_image')){
            $get_pre_img = Setting::where('text_key','home_setting_banner_image')->first();
            $gen_rand = rand(100,99999).time();
            $image_path = $request->file('home_banner_image');
            $extension = $image_path->getClientOriginalExtension();
            Storage::disk('public')->put(Config::get('constant.images_dirs.SETTING').'/'.$gen_rand.'.'.$extension,  File::get($image_path));
            if(!empty($get_pre_img->text_value)){
                Storage::disk('public')->delete(Config::get('constant.images_dirs.SETTING').'/'.$get_pre_img->text_value);
            }
            $image = $gen_rand.'.'.$extension;
            Setting::where('text_key','home_setting_banner_image')->update(['text_value'=>$image]);
        }

        if ($input['home_tagline_1']) {
            $home_tagline_1 = $input['home_tagline_1'];
            Setting::where('text_key','home_setting_tagline_1')->update(['text_value'=>$home_tagline_1]);   
        }

        if ($input['home_tagline_2']) {
            $home_tagline_2 = $input['home_tagline_2'];
            Setting::where('text_key','home_setting_tagline_2')->update(['text_value'=>$home_tagline_2]);   
        }

        if ($input['home_button']) {
            $home_button = $input['home_button'];
            Setting::where('text_key','home_setting_button')->update(['text_value'=>$home_button]);   
        }

          
        $response['status'] = true;
        $response['message'] = "Home Successfully Updated";
          
        return response()->json($response);
    }



    /**
     * Used for Admin editIntroOne
     * @return redirect to Admin->editIntroOne
     */
    public function editIntroOne(Request $request)
    {
        $input = $request->all();
        $aTableData = '';
    
        /*if ($input['intro_one_line_1']) {
            $intro_one_line_1 = $input['intro_one_line_1'];
            Setting::where('text_key','text_intro_1_line_1')->update(['text_value'=>$intro_one_line_1]);   
        }*/

        if ($input['intro_one_line_2']) {
            $intro_one_line_2 = $input['intro_one_line_2'];
            Setting::where('text_key','text_intro_1_line_2')->update(['text_value'=>$intro_one_line_2]);  
        }

        $response['status'] = true;
        $response['message'] = "Intro 1 Successfully Updated";

        return response()->json($response);
    }


    /**
     * Used for Admin editIntroTwo
     * @return redirect to Admin->editIntroTwo
     */
    public function editIntroTwo(Request $request)
    {
        $input = $request->all();
        $aTableData = '';
    
        if ($input['intro_two_line_1']) {
            $intro_two_line_1 = $input['intro_two_line_1'];
            Setting::where('text_key','text_intro_2_line_1')->update(['text_value'=>$intro_two_line_1]);   
        }

        if ($input['intro_two_line_2']) {
            $intro_two_line_2 = $input['intro_two_line_2'];
            Setting::where('text_key','text_intro_2_line_2')->update(['text_value'=>$intro_two_line_2]);  
        }

        $response['status'] = true;
        $response['message'] = "Intro 2 Successfully Updated";

        return response()->json($response);
    }



    /**
     * Used for Admin editIntroOffer
     * @return redirect to Admin->editIntroOffer
     */
    public function editIntroOffer(Request $request)
    {
        $input = $request->all();
        $aTableData = '';
    
        if ($input['intro_offer_line_1']) {
            $intro_offer_line_1 = $input['intro_offer_line_1'];
            Setting::where('text_key','intro_offer_range_line_1')->update(['text_value'=>$intro_offer_line_1]);   
        }

        if ($input['intro_offer_line_2']) {
            $intro_offer_line_2 = $input['intro_offer_line_2'];
            Setting::where('text_key','intro_offer_range_line_2')->update(['text_value'=>$intro_offer_line_2]);  
        }

        if ($input['intro_offer_option_1']) {
            $intro_offer_option_1 = $input['intro_offer_option_1'];
            Setting::where('text_key','intro_offer_range_option_1')->update(['text_value'=>$intro_offer_option_1]);  
        }

        if ($input['intro_offer_option_2']) {
            $intro_offer_option_2 = $input['intro_offer_option_2'];
            Setting::where('text_key','intro_offer_range_option_2')->update(['text_value'=>$intro_offer_option_2]);  
        }

        $response['status'] = true;
        $response['message'] = "Intro - Offer Range Successfully Updated";

        return response()->json($response);
    }


    /**
     * Used for Admin editAssistMe
     * @return redirect to Admin->editAssistMe
     */
    public function editAssistMe(Request $request)
    {
        $input = $request->all();
        $aTableData = '';
    
        if ($input['assist_text']) {
            $assist_text = $input['assist_text'];
            Setting::where('text_key','please_assist_me_text')->update(['text_value'=>$assist_text]);   
        }

        if ($input['assist_button_text']) {
            $assist_button_text = $input['assist_button_text'];
            Setting::where('text_key','please_assist_me_button_text')->update(['text_value'=>$assist_button_text]);  
        }

        $response['status'] = true;
        $response['message'] = "Assist Me Text Successfully Updated";

        return response()->json($response);
    }



    /**
     * Used for Admin editOfferNotApproved
     * @return redirect to Admin->editOfferNotApproved
     */
    public function editOfferNotApproved(Request $request)
    {
        $input = $request->all();
        $aTableData = '';
    
        if ($input['agent_not_approved_text']) {
            $agent_not_approved_text = $input['agent_not_approved_text'];
            Setting::where('text_key','front_agent_offer_not_approved')->update(['text_value'=>$agent_not_approved_text]);   
        }

        if ($input['agent_not_approved_btn']) {
            $agent_not_approved_btn = $input['agent_not_approved_btn'];
            Setting::where('text_key','front_agent_offer_not_approved_btn')->update(['text_value'=>$agent_not_approved_btn]);  
        }

        $response['status'] = true;
        $response['message'] = "Text Successfully Updated";

        return response()->json($response);
    }

    

    /**
     * Used for Admin editOfferApproved
     * @return redirect to Admin->editOfferApproved
     */
    public function editOfferApproved(Request $request)
    {
        $input = $request->all();
        $aTableData = '';
    
        if ($input['offer_app_line_1']) {
            $offer_app_line_1 = $input['offer_app_line_1'];
            Setting::where('text_key','offer_approved_line_1')->update(['text_value'=>$offer_app_line_1]);   
        }

        if ($input['offer_app_line_2']) {
            $offer_app_line_2 = $input['offer_app_line_2'];
            Setting::where('text_key','offer_approved_line_2')->update(['text_value'=>$offer_app_line_2]);  
        }

        if ($input['offer_app_btn_txt']) {
            $offer_app_btn_txt = $input['offer_app_btn_txt'];
            Setting::where('text_key','offer_approved_button_text')->update(['text_value'=>$offer_app_btn_txt]);  
        }

        $response['status'] = true;
        $response['message'] = "Offer Approved Successfully Updated";

        return response()->json($response);
    }  

    /**
     * Used for Admin editAgentText
     * @return redirect to Admin->editAgentText
     */
    public function editAgentText(Request $request)
    {
        $input = $request->all();
        $aTableData = '';
    
        if ($input['agent_line_1']) {
            $agent_line_1 = $input['agent_line_1'];
            Setting::where('text_key','text_agent_line_1')->update(['text_value'=>$agent_line_1]);   
        }

        if ($input['agent_line_2']) {
            $agent_line_2 = $input['agent_line_2'];
            Setting::where('text_key','text_agent_line_2')->update(['text_value'=>$agent_line_2]);   
        }

        /*if ($input['agent_line_3']) {
            $agent_line_3 = $input['agent_line_3'];
            Setting::where('text_key','text_agent_line_3')->update(['text_value'=>$agent_line_3]);   
        }

        if ($input['agent_title_1']) {
            $agent_title_1 = $input['agent_title_1'];
            Setting::where('text_key','text_agent_sub_title_1')->update(['text_value'=>$agent_title_1]);   
        }

        if ($input['agent_title_2']) {
            $agent_title_2 = $input['agent_title_2'];
            Setting::where('text_key','text_agent_sub_title_2')->update(['text_value'=>$agent_title_2]);   
        }

        if ($input['agent_title_3']) {
            $agent_title_3 = $input['agent_title_3'];
            Setting::where('text_key','text_agent_sub_title_3')->update(['text_value'=>$agent_title_3]);   
        }*/

        if ($input['agent_btn_txt']) {
            $agent_btn_txt = $input['agent_btn_txt'];
            Setting::where('text_key','text_agent_button_text')->update(['text_value'=>$agent_btn_txt]);   
        }

        $response['status'] = true;
        $response['message'] = "Agent Text Successfully Updated";

        return response()->json($response);
    }

    

    /**
     * Used for Admin editSmtp
     * @return redirect to Admin->editSmtp
     */
    public function editSmtp(Request $request)
    {
        $input = $request->all();
        $aTableData = '';
    
        if ($input['mailer']) {
            $mailer = $input['mailer'];
            Setting::where('text_key','smtp_mailer')->update(['text_value'=>$mailer]);   
        }

        if ($input['host']) {
            $host = $input['host'];
            Setting::where('text_key','smtp_host')->update(['text_value'=>$host]);  
        }

        if ($input['port']) {
            $port = $input['port'];
            Setting::where('text_key','smtp_port')->update(['text_value'=>$port]);  
        }

        if ($input['email']) {
            $email = $input['email'];
            Setting::where('text_key','smtp_email')->update(['text_value'=>$email]);  
        }

        if ($input['password']) {
            $password = $input['password'];
            Setting::where('text_key','smtp_password')->update(['text_value'=>$password]);  
        }

        if ($input['encript']) {
            $encript = $input['encript'];
            Setting::where('text_key','smtp_enc')->update(['text_value'=>$encript]);  
        }

        $response['status'] = true;
        $response['message'] = "SMTP Details Successfully Updated";

        return response()->json($response);
    }  


    /**
     * Used for Admin editGeneralLogo
     * @return redirect to Admin->editGeneralLogo
     */
    public function editGeneralLogo(Request $request)
    {
        $input = $request->all();
        $aTableData = '';
    
        if($request->hasFile('home_logo')){
            $get_pre_img = Setting::where('text_key','general_setting_home_logo')->first();
            $gen_rand = rand(100,99999).time();
            $image_path = $request->file('home_logo');
            $extension = $image_path->getClientOriginalExtension();
            Storage::disk('public')->put(Config::get('constant.images_dirs.SETTING').'/'.$gen_rand.'.'.$extension,  File::get($image_path));
            if(!empty($get_pre_img->text_value)){
                Storage::disk('public')->delete(Config::get('constant.images_dirs.SETTING').'/'.$get_pre_img->text_value);
            }
            $image = $gen_rand.'.'.$extension;
            Setting::where('text_key','general_setting_home_logo')->update(['text_value'=>$image]);
        }

        if($request->hasFile('admin_logo')){
            $get_pre_img = Setting::where('text_key','general_setting_admin_logo')->first();
            $gen_rand = rand(100,99999).time();
            $image_path = $request->file('admin_logo');
            $extension = $image_path->getClientOriginalExtension();
            Storage::disk('public')->put(Config::get('constant.images_dirs.SETTING').'/'.$gen_rand.'.'.$extension,  File::get($image_path));
            if(!empty($get_pre_img->text_value)){
                Storage::disk('public')->delete(Config::get('constant.images_dirs.SETTING').'/'.$get_pre_img->text_value);
            }
            $image = $gen_rand.'.'.$extension;
            Setting::where('text_key','general_setting_admin_logo')->update(['text_value'=>$image]);
        }

        if($request->hasFile('email_logo')){
            $get_pre_img = Setting::where('text_key','general_setting_email_logo')->first();
            $gen_rand = rand(100,99999).time();
            $image_path = $request->file('email_logo');
            $extension = $image_path->getClientOriginalExtension();
            Storage::disk('public')->put(Config::get('constant.images_dirs.SETTING').'/'.$gen_rand.'.'.$extension,  File::get($image_path));
            if(!empty($get_pre_img->text_value)){
                Storage::disk('public')->delete(Config::get('constant.images_dirs.SETTING').'/'.$get_pre_img->text_value);
            }
            $image = $gen_rand.'.'.$extension;
            Setting::where('text_key','general_setting_email_logo')->update(['text_value'=>$image]);
        }

        if($request->hasFile('login_logo')){
            $get_pre_img = Setting::where('text_key','general_setting_login_logo')->first();
            $gen_rand = rand(100,99999).time();
            $image_path = $request->file('login_logo');
            $extension = $image_path->getClientOriginalExtension();
            Storage::disk('public')->put(Config::get('constant.images_dirs.SETTING').'/'.$gen_rand.'.'.$extension,  File::get($image_path));
            if(!empty($get_pre_img->text_value)){
                Storage::disk('public')->delete(Config::get('constant.images_dirs.SETTING').'/'.$get_pre_img->text_value);
            }
            $image = $gen_rand.'.'.$extension;
            Setting::where('text_key','general_setting_login_logo')->update(['text_value'=>$image]);
        }

        $response['status'] = true;
        $response['message'] = "General Setting Successfully Updated";

        return response()->json($response);
    }  

	
	/**
	 * Used for Admin get CMS
 	 * @return redirect to Admin->get CMS listing
	*/
    public function getCms(Request $request)
    {
    	$data =$request->all();
	    
	    $perpage = !empty( $data[ 'length' ] ) ? (int)$data[ 'length' ] : 10;
	      
	    $filter = isset( $data['search'] ) && is_string( $data['search'] ) ? $data['search'] : '';

	    $sort_type = isset( $data['order'][0]['dir'] ) && is_string( $data['order'][0]['dir'] ) ? $data['order'][0]['dir'] : '';	

	    $sort_col =  isset($data['order'][0]['column']) ? $data['order'][0]['column'] :'';

	    $sort_field = isset($data['columns'][$sort_col]['data']) ? $data['columns'][$sort_col]['data'] :'';
	    
    	$aTable = new Cms;

    	if($filter){
    		$aTable = $aTable->where('cms_title', 'LIKE', '%' . $filter . '%' );
    	}

    	$aTableQuery = $aTable;

    	if($sort_col != 0){
    		$aTableQuery = $aTableQuery->orderBy($sort_field, $sort_type);
    	}else{
            $aTableQuery = $aTableQuery->orderBy('created_at', 'DESC');
        }

    	$total_table_data= $aTableQuery->count();

		$offset = isset($data['start']) ? $data['start'] :'';
	     
	    $counter = $offset;
	    $aTabledata = [];
	    $aTables = $aTableQuery->offset($offset)->limit($perpage)->get()->toArray();
        
        foreach ($aTables as $key => $value) {
            $value['index'] = $counter+1;
            $value['cms_description'] = substr($value['cms_description'], 0,100);
            $aTabledata[$counter] = $value;
            $counter++;
      	}
      	
	    $price = array_column($aTabledata, 'index');

	    if($sort_col == 0){
	     	if($sort_type == 'desc'){
	     		array_multisort($price, SORT_DESC, $aTabledata);
	     	}else{
	     		array_multisort($price, SORT_ASC, $aTabledata);
	     	}
		}
	      $result = array(
	      	"draw" => $data['draw'],
			"recordsTotal" =>$total_table_data,
			"recordsFiltered" => $total_table_data,
	        'data' => $aTabledata,
	      );

	       return response()->json($result);
    
    }




    /**
	 * Used for Admin add CMS
 	 * @return redirect to Admin->add CMS
	 */
    public function addCms(Request $request)
    {
    	$response = [];
    	$input = $request->all();
        $aData = [];
        $cdData = [];
        try
        {
            if(!empty($input['pkCat']) && $input['pkCat'] != null){
            	$id = Cms::where('cms_id', $input['pkCat']);
        		
                //$aData['slug'] = $this->str_slug($input['title']);
                $aData['cms_title'] = $input['title'];
                $aData['cms_description'] = $input['body'];
	            $aData['seo_meta_title'] = $input['seo_meta_title'];
	            $aData['seo_meta_description'] = $input['seo_meta_description'];
	            $update = $id->update($aData);
	            if ($update) {
                    $response['status'] = true;
                    $response['message'] = "CMS Setting Successfully Updated";
	            }else{
	            	$response['status'] = false;
                    $response['message'] = "Something went worng!";
	            }
            }
            
        }catch (\Exception $e) {
            $response['status'] = false;
            $response['message'] = "Error:" . $e->getMessage();
        }
        return response()->json($response);
    }

    /**
    * Used for Edit Admin CMS
    */
    public function editCms(Request $request,$id)
    {
    	$data = Cms::where('cms_id','=',$id)->first();
    	return view('admin.cms.editCms',compact('data'));

    }
	


    /*
	* Create Slug
    */
    function str_slug($string){
	   $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
	   return $slug;
	}    
}
