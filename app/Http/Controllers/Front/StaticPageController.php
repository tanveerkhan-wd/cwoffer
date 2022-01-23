<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Cms;

class StaticPageController extends Controller
{
	public function index()
    {
    	$setting = [];
    	$home_logo = '';
    	//WEBSITE HOME DATA 
        $homeData = Setting::where('text_key','home_setting_tagline_1')
                ->orWhere('text_key','home_setting_tagline_2')
                ->orWhere('text_key','home_setting_button')
                ->orWhere('text_key','general_setting_home_logo')
                ->orWhere('text_key','home_setting_banner_image')->get();
        
        foreach ($homeData as $ab_value) {
            if($ab_value->text_key=='home_setting_tagline_1'){
                $setting['tagline_1'] = $ab_value->text_value ? $ab_value->text_value : '';
            }
            if($ab_value->text_key=='home_setting_tagline_2'){
                $setting['tagline_2'] = $ab_value->text_value ? $ab_value->text_value : '';
            }
            if($ab_value->text_key=='home_setting_button'){
                $setting['button_text'] =  $ab_value->text_value ? $ab_value->text_value : '';
            }
            if($ab_value->text_key=='home_setting_banner_image'){
                $setting['banner_image'] =  $ab_value->text_value ? $ab_value->text_value : '';
            }
            if($ab_value->text_key=='general_setting_home_logo'){
                $setting['logo_image'] =  $ab_value->text_value ? $ab_value->text_value : '';
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
        return view('welcome',compact('setting'));
    }

    public function privacy()
    {
        $homeData = Setting::where('text_key','general_setting_home_logo')->first();
        $data = Cms::where('slug','Privacy-Policy')->first();
    	return view('front.staticPage.privacy',compact('data','homeData'));
    }

    public function terms()
    {
        $homeData = Setting::where('text_key','general_setting_home_logo')->first();
        $data = Cms::where('slug','Terms-Conditions')->first();
    	return view('front.staticPage.terms',compact('data','homeData'));
    }
}
