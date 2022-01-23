<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Twilio\Rest\Client;
use App\Mail\sendEmail;
use App\Models\EmailLog;
use App\Models\EmailSmsMaster;
use App\Models\PropertyDuration;
use App\Models\PropertyImage;
use App\Models\Property;
use App\Models\Setting;
use App\Models\Offer;
use App\Models\Lead;
use App\Models\Cms;

class BuyerController extends Controller
{
    /**
     * Show the application index.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request,$property)
    {
    	$proData = [];
    	$setting = [];
        $data = $request->all();
        $disclose['buyer'] = Cms::where('slug','Buyer-Disclosure-Content')->first();
        $disclose['agent'] = Cms::where('slug','Buyer-Agent-Disclosure-Content')->first();
        $p_duration = PropertyDuration::get();
        $getId = explode("-", $property) ?? false;
        $property_id = isset($getId) && !empty($getId) ? end($getId) :false;
        
    	if ($property_id) {
    		$proData = Property::where('property_id',$property_id)->first();
            $proImage = PropertyImage::where('property_id',$property_id)->get();
    	}
        //WEBSITE INTRO 1 DATA 
        $intro1_data = Setting::where('text_key','text_intro_1_line_1')
                ->orWhere('text_key','text_intro_1_line_2')->get();

        foreach ($intro1_data as $value) {
            if($value->text_key=='text_intro_1_line_1'){
                $setting['intro_1']['line_1'] = $value->text_value ? $value->text_value : '';
            }
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
                ->orWhere('text_key','text_agent_line_3')
                ->orWhere('text_key','text_agent_sub_title_1')
                ->orWhere('text_key','text_agent_sub_title_2')
                ->orWhere('text_key','text_agent_sub_title_3')
                ->orWhere('text_key','text_agent_button_text')->get();

        foreach ($agent_data as $ta_value) {
            if($ta_value->text_key=='text_agent_line_1'){
                $setting['agent']['line_1'] = $ta_value->text_value ? $ta_value->text_value : '';
            }
            if($ta_value->text_key=='text_agent_line_2'){
                $setting['agent']['line_2'] = $ta_value->text_value ? $ta_value->text_value : '';
            }
            if($ta_value->text_key=='text_agent_line_3'){
                $setting['agent']['line_3'] =  $ta_value->text_value ? $ta_value->text_value : '';
            }
            if($ta_value->text_key=='text_agent_sub_title_1'){
                $setting['agent']['title_1'] =  $ta_value->text_value ? $ta_value->text_value : '';
            }

            if($ta_value->text_key=='text_agent_sub_title_2'){
                $setting['agent']['title_2'] =  $ta_value->text_value ? $ta_value->text_value : '';
            }

            if($ta_value->text_key=='text_agent_sub_title_3'){
                $setting['agent']['title_3'] =  $ta_value->text_value ? $ta_value->text_value : '';
            }
            if($ta_value->text_key=='text_agent_button_text'){
                $setting['agent']['button_text'] =  $ta_value->text_value ? $ta_value->text_value : '';
            }
        }

        //WEBSITE Offer Rejected  DATA 
        $intro1_data = Setting::where('text_key','front_agent_offer_not_approved')
                ->orWhere('text_key','front_agent_offer_not_approved_btn')->get();

        foreach ($intro1_data as $value) {
            if($value->text_key=='front_agent_offer_not_approved'){
                $setting['offer_NA']['line'] = $value->text_value ? $value->text_value : '';
            }
            if($value->text_key=='front_agent_offer_not_approved_btn'){
                $setting['offer_NA']['btn_txt'] = $value->text_value ? $value->text_value : '';
            }
        }

        return view('front.buyer.index',compact('proData','proImage','setting','p_duration','disclose'));
    }

    /**
     * Show the application Search Property.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function searchProperty(Request $request)
    {
    	$findPro = [];
    	$data = $request->all();
    	if (isset($data['data'])) {
            $data = $data['data'];
            //$listing_status = [1,2];
    		$findPro = Property::where('listing_status','!=',0)->where('address', 'LIKE', '%' . $data . '%' )->orWhere(function($query) use($data){
                    $query->where('listing_status','!=',0)->where('manual_address','like','%'.$data.'%');
            })->get();
    	}
        foreach ($findPro as $key => $value) {
            if ($value->address_type==2) {
                $findPro[$key]->manual_address = $value->manual_address.' '.$value->address;
            }
            $findPro[$key] = $value;
        }
    	if (!empty($findPro)) {
    		$response['status'] = true;
            $response['message'] = "Data Found successfully";
    		$response['data'] = $findPro;
    	}else{
    		$response['status'] = false;
            $response['message'] = "Data Not Found";
    	}

    	return json_encode($response);
    }

    /**
     * Get Property Data and redirect to buyer-intro page
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function buyerIntro(Request $request)
    {
        $input = $request->all();
        $proDataIs = false;

        $isPropertyId = isset($input['property_id']) && !empty($input['property_id']) ? $input['property_id'] : false;
        if ($isPropertyId) {
            $proDataIs = true;
            $getPro = Property::select('address','address_type','manual_address','property_id')->where('property_id',$isPropertyId)->first()->toArray();
        }
        if ($proDataIs && !empty($getPro)) {
            //SET ADDRESSS
            if ($getPro['address_type']==1) {
                $getPro['addresee'] = $getPro['address'];
            }else{
                $getPro['addresee'] = $getPro['manual_address'].' '.$getPro['address'];
            }
            if (!empty($getPro['addresee'])) {
                $getPro['addresee'] = strtolower(str_replace(" - "," ",$getPro['addresee']));
                $getPro['addresee'] = strtolower(str_replace(" ","-",$getPro['addresee']));
                $getPro['addresee'] = strtolower(str_replace(",","",$getPro['addresee']));
                $getPro['addresee'] = strtolower(str_replace("/","",$getPro['addresee']));
            }
            $response['status'] = true;
            $response['message'] = "Data Found successfully";
            $response['data'] = $getPro;
        }else{
            $response['status'] = false;
            $response['message'] = "Data Not Found";
        }
        return json_encode($response);

    }

    /**
     * Show the application addBuyerPost.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addBuyerPost(Request $request)
    {
        $response = [];
    	$addNew = [];
        $acceptance = [];
        $resubmitOffer = false;
    	$data = $request->all();
        
        $p_duration = PropertyDuration::get();
        if (isset($data['user_type']) && $data['user_type']==2 || isset($data['offer_range']) && $data['offer_range']==1) {
            if ($data['user_type']==2) {
                $settlement_date = isset($data['settlement_date']) ?$data['settlement_date'] : false;
                $finance = isset($data['finance']) ?$data['finance'] : false;
                $appraisal = isset($data['appraisal']) ?$data['appraisal'] : false;
                $inspection = isset($data['inspection']) ?$data['inspection'] : false;
                $home_sale = isset($data['home_sale']) ?$data['home_sale'] : false;

                $addNew = new Offer;
                $addNew->name = $data['name'] ?? '';
                $addNew->email = $data['email'] ?? '';
                $addNew->phone_code = $data['phone_code'] ?? '';
                $addNew->phone = $data['phone'] ?? '';
                $addNew->buyer_name = $data['buyer_name'] ?? '';
                $addNew->buyer_email = $data['buyer_email'] ?? '';
                $addNew->buyer_ph_code = $data['buyer_ph_code'] ?? '';
                $addNew->buyer_phone = $data['buyer_phone'] ?? '';
                $addNew->property_id = $data['property_id'] ?? '';
                $addNew->user_type = $data['user_type'] ?? '';
                $addNew->sale_price = $data['sale_price'] ?? '';
                $addNew->buyer_offer = $data['sale_price'] ?? '';
                $addNew->intend_to_pay = $data['agent_intend_to_pay'] ?? 1;
                $addNew->seller_concessions = $data['seller_concessions'] ?? '';
                $addNew->settlement_date = $settlement_date ?? '';
                $addNew->emd = $data['emd'] ?? '';
                $addNew->due_diligence = $data['due_diligence'] ?? 0;
                $addNew->finance = $finance ?? '';
                $addNew->appraisal = $appraisal ?? '';
                $addNew->inspection = $inspection ?? '';
                $addNew->home_sale = $home_sale ?? '';
                $addNew->additional_note = $data['additional_note'] ?? '';
                $addNew->contract_received  = false;
                $addNew->offer_status  = false;
                $addNew->pre_approved   = isset($data['buyer_pre_approved']) && $data['buyer_pre_approved']=='YES' ? true : false;
                $addNew->save();
                //CHECK IS APPROVED OR NOT
                if (isset($data['property_id']) && !empty($data['property_id'])) {
                    $getProData = Property::where('property_id',$data['property_id'])->first();
                    $aSettleDate = !empty($getProData->settlement_date) ? json_decode($getProData->settlement_date):[];
                    $aFinance = !empty($getProData->finance) ? json_decode($getProData->finance):[];
                    $aAppraisal = !empty($getProData->appraisal) ? json_decode($getProData->appraisal) : [];
                    $aInspection = !empty($getProData->inspection) ? json_decode($getProData->inspection) : [];
                    $aHomeSale = !empty($getProData->home_sale) ? json_decode($getProData->home_sale) :[];

                    //GET SALE PRICE
                    $acceptance['sale_priceIs'] = false;
                    if ($data['sale_price'] >= $getProData->min_sales_price) {
                        $acceptance['sale_price'] = 'Accepted';
                        $acceptance['sale_priceIs'] = true;
                    }elseif ($data['sale_price'] < $getProData->min_sales_price) {
                        $acceptance['sale_price'] = $getProData->min_sales_price;
                    }else{
                        $acceptance['sale_price'] = 'Accepted';
                        $acceptance['sale_priceIs'] = true;
                    }
                    //GET SELLER CONSESSION
                    $acceptance['seller_concessionsIs'] = false;
                    if ($data['seller_concessions'] <= $getProData->seller_concessions) {
                        $acceptance['seller_concessions'] = 'Accepted';
                        $acceptance['seller_concessionsIs'] = true;
                    }else{
                        $acceptance['seller_concessions'] = $getProData->seller_concessions;
                    }
                    //GET SETTLEMENT DATES 
                    if ($settlement_date) {
                        $acceptance['settlementIs'] = false;
                        if(in_array($settlement_date, $aSettleDate)) {
                            $acceptance['settlementIs'] = true;
                            $acceptance['settlement_date'] = 'Accepted';
                        }
                    }
                    //GET EMD 
                    $acceptance['emdIs'] = false;
                    if ($data['emd'] >= $getProData->emd) {
                        $acceptance['emd'] = 'Accepted';
                        $acceptance['emdIs'] = true;
                    }else{
                        $acceptance['emd'] = $getProData->emd;
                    }
                    //GET due_diligence
                    $acceptance['due_diligenceIs'] = false;
                    if (isset($data['due_diligence']) && $data['due_diligence'] >= $getProData->due_diligence) {
                        $acceptance['due_diligence'] = 'Accepted';
                        $acceptance['due_diligenceIs'] = true;
                    }else{
                        if (!isset($data['due_diligence'])) {
                            $acceptance['due_diligence'] = 'None';
                            $data['due_diligence'] = 'None';
                        }else{
                            $acceptance['due_diligence'] = $getProData->due_diligence ?? 'None';
                        }
                        $acceptance['due_diligenceIs'] = false;
                    }
                    //GET FINANCE
                    if ($finance) {
                        $acceptance['financeIs'] = false;
                        if(in_array($finance, $aFinance)) {
                            $acceptance['finance'] = 'Accepted';
                            $acceptance['financeIs'] = true;
                        }
                    }
                    if ($acceptance['financeIs']==false && $data['agent_intend_to_pay']==1) {
                        $acceptance['finance'] = 'Accepted';
                        $acceptance['financeIs'] = true;
                    }
                    //GET Appraisal
                    if ($appraisal) {
                        $acceptance['appraisalIs'] = false;
                        if(in_array($appraisal, $aAppraisal)) {
                            $acceptance['appraisalIs'] = true;
                            $acceptance['appraisal'] = 'Accepted';
                        }
                    }else{
                        $acceptance['appraisalIs'] = false;
                    }
                    //GET Inspection
                    if ($inspection) {
                        $acceptance['inspectionIs'] = false;
                        if(in_array($inspection, $aInspection)) {
                            $acceptance['inspectionIs'] = true;
                            $acceptance['inspection'] = 'Accepted';
                        }
                    }else{
                        $acceptance['inspectionIs'] = false;
                    }
                    //GET home_sale
                    if ($home_sale) {
                        $acceptance['home_saleIs'] = false;
                        if(in_array($home_sale, $aHomeSale)) {
                            $acceptance['home_saleIs'] = true;
                            $acceptance['home_sale'] = 'Accepted';
                        }
                    }else{
                        $acceptance['home_saleIs'] = false;
                    }

                    //GET DATES 
                    foreach ($p_duration as $val) {
                        foreach ($aSettleDate as $value) {
                            if ($val->p_duration_id==$value && $acceptance['settlementIs'] == false) {
                                $acceptance['settlement_date'][] = $val->duration; 
                            }
                        }
                        foreach ($aFinance as $value) {
                            if ($val->p_duration_id==$value && $acceptance['financeIs'] == false) {
                                $acceptance['finance'][] = $val->duration; 
                            }
                        }
                        foreach ($aAppraisal as $value) {
                            if ($val->p_duration_id==$value && $acceptance['appraisalIs'] == false) {
                                $acceptance['appraisal'][] = $val->duration; 
                            }
                        }
                        foreach ($aInspection as $value) {
                            if ($val->p_duration_id==$value && $acceptance['inspectionIs'] == false) {
                                $acceptance['inspection'][] = $val->duration; 
                            }
                        }
                        foreach ($aHomeSale as $value) {
                            if ($val->p_duration_id==$value && $acceptance['home_saleIs'] == false) {
                                $acceptance['home_sale'][] = $val->duration; 
                            }
                        }
                        //DATA VALUE
                        if ($settlement_date) {
                            if ($val->p_duration_id==$settlement_date) {
                                $data['settlement_dates'] = $val->duration; 
                            }
                        }else{
                            $data['settlement_dates'] = 'None';
                        }
                        if ($finance) {
                            if ($val->p_duration_id==$finance) {
                                $data['finances'] = $val->duration; 
                            }
                        }else{
                            $data['finances'] = 'None';
                        }
                        if ($appraisal) {
                            if ($val->p_duration_id==$appraisal) {
                                $data['appraisals'] = $val->duration; 
                            }
                        }else{
                            $data['appraisals'] = 'None';
                        }
                        if ($inspection) {
                            if ($val->p_duration_id==$inspection) {
                                $data['inspections'] = $val->duration; 
                            }    
                        }else{
                            $data['inspections'] = 'None';
                        }
                        if ($home_sale) {
                            if ($val->p_duration_id==$home_sale) {
                                $data['home_sales'] = $val->duration; 
                            }    
                        }else{
                            $data['home_sales'] = 'None';
                        }
                    }
                    //CHECK OFFER IS CORRECT OR NOT
                    if (isset($acceptance['home_saleIs']) && $acceptance['home_saleIs']==false || isset($acceptance['inspectionIs']) && $acceptance['inspectionIs'] == false || isset($acceptance['appraisalIs']) && $acceptance['appraisalIs'] = false || isset($acceptance['financeIs']) && $acceptance['financeIs'] == false || $acceptance['sale_priceIs'] == false || $acceptance['seller_concessionsIs'] == false || $acceptance['emdIs'] == false) 
                    {
                        $resubmitOffer =true;
                        $getOfferRejectedTable =  $this->createRejectedOfferTable($data,$acceptance);
                        $this->sendEmailBuyerAgentNotSuccess($addNew,$getOfferRejectedTable);
                    }
                    else{
                        Offer::where('offer_id',$addNew->offer_id)->update(['pre_approved'=>true]);
                        Property::where('property_id',$data['property_id'])->update(['listing_status'=>1,'offer_status'=>0]);
                        $resubmitOffer =false;
                        $this->sendEmailBuyerAgentSuccess($addNew);
                    }
                }
            }else{
        		$addNew = new Offer;
        		$addNew->name = $data['name'] ?? '';
        		$addNew->email = $data['email'] ?? '';
                $addNew->phone_code = $data['phone_code'] ?? '';
        		$addNew->phone = $data['phone'] ?? '';
        		$addNew->property_id = $data['property_id'] ?? '';
        		$addNew->user_type = $data['user_type'] ?? '';
                $addNew->sale_price = $data['buyer_offer'] ?? '';
        		$addNew->buyer_offer = $data['buyer_offer'] ?? '';
        		$addNew->down_payment = $data['down_payment'] ?? '';
        		$addNew->interest_rate = $data['interest_rate'] ?? '';
        		$addNew->intend_to_pay = $data['intend_to_pay'] ?? '';
        		$addNew->loan_term = $data['loan_term'] ?? '';
        		$addNew->est_cash_to_close = isset($data['est_cash_to_close']) ? str_replace('$','', $data['est_cash_to_close']) : '';
        		$addNew->closing_cost = isset($data['closing_cost']) ? str_replace('$','', $data['closing_cost']) : '';
        		$addNew->insurance = isset($data['insurance']) ? str_replace('$','', $data['insurance']) : '';
        		$addNew->property_taxes = isset($data['property_taxes']) ? str_replace('$','', $data['property_taxes']) : '';
                $addNew->other_fees = isset($data['other_fees']) ? str_replace('$','', $data['other_fees']) : '';
                $addNew->mortgage_insurance = isset($data['mortgage_insurance']) ? str_replace('$','', $data['mortgage_insurance']) : '';
        		$addNew->hoa = isset($data['hoa']) ? str_replace('$','', $data['hoa']) : '';
        		$addNew->mortgage = isset($data['mortgage']) ? str_replace('$','', $data['mortgage']) : '';
        		$addNew->estimated_payment = $data['estimated_payment'] ?? '';
        		$addNew->contract_received  = false;
        		$addNew->pre_approved   = true;
                $addNew->offer_status  = false;
        		$addNew->save();
                $this->sendEmailBuyerSuccess($addNew);
    	    }
            if (!empty($addNew)) {
                $response['status'] = true;
                $response['message'] = "Data added successfully";
                $response['input_data'] = $data;
                $response['acceptance_data'] = $acceptance;
                $response['resubmit_offer'] = $resubmitOffer;
            }else{
                $response['status'] = false;
                $response['message'] = "Data Not Found";
            }
        }else{
    		$addNew = new Lead;
    		$addNew->name = $data['name'];
    		$addNew->email = $data['email'];
            $addNew->phone_code = $data['phone_code'];
    		$addNew->phone = $data['phone'];
    		$addNew->property_id = $data['property_id'];
    		$addNew->status = true;
    		$addNew->save();

            if (!empty($addNew)) {
                $this->sendEmailAssetMe($addNew);
                $response['status'] = true;
                $response['message'] = "Data added successfully";
                $response['is_lead'] = true; 
            }else{
                $response['status'] = false;
                $response['message'] = "Data Not Found";
            }
    	}

    	return response()->json($response);
    }

    /**
     * Send Email to Buyer and seller agent for assest me.
     *
     * @return true
     */
    public function sendEmailAssetMe($addNew)
    {
        try{
        $data = EmailSmsMaster::where('email_sms_key', 'email_buyer_no_please_assist_me')->first();
        $sData = EmailSmsMaster::where('email_sms_key', 'email_seller_no_please_assist_me')->first();
        $proDet = Property::with('seller')->where('property_id',$addNew->property_id)->first();
        $seller_phone = $proDet->seller->tel_code.$proDet->seller->mobile_number;
        $buyer_pn =  $addNew->phone_code.$addNew->phone;

        // MAIL TO BUYER WHO GENERATE LEAD
        if (isset($data) && !empty($data)) {
            $data = $data->toArray();      
            $message = $data['content'];
            $subject = $data['subject'];
            $message1 = str_replace("{{USERNAME}}", $addNew->name, $message);
            $message2 = str_replace("{{NAME}}", $proDet->seller->name, $message1);
            $message3 = str_replace("{{EMAIL}}", $proDet->seller->email, $message2);
            $message4 = str_replace("{{PHONE_NUMBER}}", $seller_phone, $message3);
            $this->createEmailLog($addNew->email,$subject,$message4,2);
            //Mail::to($addNew->email)->send(new sendEmail($message4,$subject));
        }
        
        //MAIL TO SELLER AGENT
        if (isset($sData) && !empty($sData)) {
            $sData = $sData->toArray();      
            $message = $sData['content'];
            $subject = $sData['subject'];
            $mesg1 = str_replace("{{USERNAME}}", $proDet->seller->name, $message);
            $mesg2 = str_replace("{{NAME}}", $addNew->name, $mesg1);
            $mesg3 = str_replace("{{EMAIL}}", $addNew->email, $mesg2);
            $mesg4 = str_replace("{{PHONE_NUMBER}}", $buyer_pn, $mesg3);
            $this->createEmailLog($proDet->seller->email,$subject,$mesg4,2);
            //Mail::to($proDet->seller->email)->send(new sendEmail($mesg4,$subject));
        }

        // SEND SMS
        $sms = EmailSmsMaster::where('email_sms_key', 'sms_to_buyer_no_please_assist_me')->first();
        $sms1 = EmailSmsMaster::where('email_sms_key', 'sms_to_seller_agent_no_please_assist_me')->first();
        if (isset($sms) && !empty($sms)) {
            $sms = $sms->toArray();      
            $message = strip_tags($sms['content']);
            $message1 = str_replace("{{USERNAME}}", $addNew->name, $message);
            $message2 = str_replace("{{NAME}}", $proDet->seller->name, $message1);
            $message3 = str_replace("{{EMAIL}}", $proDet->seller->email, $message2);
            $message4 = str_replace("{{PHONE_NUMBER}}", $seller_phone, $message3);
            $this->createSmsLog($buyer_pn,$message4,1);
            //$this->sendMessage($message4, $buyer_pn);
        }
        if (isset($sms1) && !empty($sms1)) {
            $sms1 = $sms1->toArray();      
            $message = strip_tags($sms1['content']);
            $mesg1 = str_replace("{{USERNAME}}", $proDet->seller->name, $message);
            $mesg2 = str_replace("{{NAME}}", $addNew->name, $mesg1);
            $mesg3 = str_replace("{{EMAIL}}", $addNew->email, $mesg2);
            $mesg4 = str_replace("{{PHONE_NUMBER}}", $buyer_pn, $mesg3);
            $this->createSmsLog($seller_phone,$mesg4,1);
            //$this->sendMessage($mesg4, $seller_phone);
        }

        }catch (\Exception $e) {
            return true;    
        }
        return true;
    }


    /**
     * Send Email to Buyer and seller agent for Offer Succcess.
     *
     * @return true
     */
    public function sendEmailBuyerSuccess($addNew)
    {
        try{
        $data = EmailSmsMaster::where('email_sms_key', 'email_to_seller_agent_buyer_success')->first();
        $bData = EmailSmsMaster::where('email_sms_key', 'email_to_buyer')->first();
        $proDet = Property::with('seller')->where('property_id',$addNew->property_id)->first();
        $seller_phone = $proDet->seller->tel_code.$proDet->seller->mobile_number;
        $buyer_pn =  $addNew->phone_code.$addNew->phone;
        if (isset($data) && !empty($data)) {
            //SEND TO SELLER AGENT
            $data = $data->toArray();      
            $message = $data['content'];
            $subject = $data['subject'];
            $message1 = str_replace("{{USERNAME}}", $proDet->seller->name, $message);
            $message2 = str_replace("{{NAME}}", $addNew->name, $message1);
            $message3 = str_replace("{{EMAIL}}", $addNew->email, $message2);
            $message4 = str_replace("{{PHONE_NUMBER}}", $buyer_pn, $message3);
            $this->createEmailLog($proDet->seller->email,$subject,$message4,2);
            //Mail::to($proDet->seller->email)->send(new sendEmail($message4,$subject));
        }
        if (isset($bData) && !empty($bData)) {
            //SEND TO BUYER
            $bData = $bData->toArray();      
            $message = $bData['content'];
            $subject = $bData['subject'];
            $message1 = str_replace("{{USERNAME}}", $addNew->name, $message);
            $message2 = str_replace("{{NAME}}", $proDet->seller->name, $message1);
            $message3 = str_replace("{{EMAIL}}", $proDet->seller->email, $message2);
            $message4 = str_replace("{{PHONE_NUMBER}}", $seller_phone, $message3);
            $this->createEmailLog($addNew->email,$subject,$message4,2);
            //Mail::to($addNew->email)->send(new sendEmail($message4,$subject));
        }

        // SEND SMS
        $sms = EmailSmsMaster::where('email_sms_key', 'sms_to_buyer')->first();
        $sms1 = EmailSmsMaster::where('email_sms_key', 'sms_to_seller_agent_buyer_success')->first();
        if (isset($sms) && !empty($sms)) {
            //SEND TO BUYER
            $sms = $sms->toArray();      
            $message = strip_tags($sms['content']);
            $message1 = str_replace("{{USERNAME}}", $addNew->name, $message);
            $message2 = str_replace("{{NAME}}", $proDet->seller->name, $message1);
            $message3 = str_replace("{{EMAIL}}", $proDet->seller->email, $message2);
            $message4 = str_replace("{{PHONE_NUMBER}}", $seller_phone, $message3);
            $this->createSmsLog($buyer_pn,$message4,1);
            //$this->sendMessage($message4, $buyer_pn);
        }
        if (isset($sms1) && !empty($sms1)) {
            //SEND TO SELLER AGENT
            $sms1 = $sms1->toArray();      
            $message = strip_tags($sms1['content']);
            $message1 = str_replace("{{USERNAME}}", $proDet->seller->name, $message);
            $message2 = str_replace("{{NAME}}", $addNew->name, $message1);
            $message3 = str_replace("{{EMAIL}}", $addNew->email, $message2);
            $message4 = str_replace("{{PHONE_NUMBER}}", $buyer_pn, $message3);
            $this->createSmsLog($seller_phone,$message4,1);
            //$this->sendMessage($message4, $seller_phone);
        }

        }catch (\Exception $e) {
            return true;    
        }
        return true;

    }


    /**
     * Send Email to Buyer,Buyer Agent and seller agent for Offer Succcess.
     *
     * @return true
     */
    public function sendEmailBuyerAgentSuccess($addNew)
    {
        try{
        $data = EmailSmsMaster::where('email_sms_key', 'email_to_buyer_agent')->first();
        $bData = EmailSmsMaster::where('email_sms_key', 'email_to_buyer')->first();
        $saData = EmailSmsMaster::where('email_sms_key', 'email_to_seller_agent')->first();
        $proDet = Property::with('seller')->where('property_id',$addNew->property_id)->first();
        
        $seller_phone = $proDet->seller->tel_code.$proDet->seller->mobile_number;
        $buyer_pn =  $addNew->phone_code.$addNew->phone;
        $buyer_age_ph = $addNew->buyer_ph_code.$addNew->buyer_phone;

        if (isset($data) && !empty($data)) {
            $data = $data->toArray();      
            $message = $data['content'];
            $subject = $data['subject'];
            $message1 = str_replace("{{USERNAME}}", $addNew->name, $message);
            $message2 = str_replace("{{NAME}}", $proDet->seller->name, $message1);
            $message3 = str_replace("{{EMAIL}}", $proDet->seller->email, $message2);
            $message4 = str_replace("{{PHONE_NUMBER}}", $seller_phone, $message3);
            $this->createEmailLog($addNew->email,$subject,$message4,2);
            //Mail::to($addNew->email)->send(new sendEmail($message4,$subject));
        }
        if (isset($bData) && !empty($bData)) {
            $bData = $bData->toArray();      
            $message = $bData['content'];
            $subject = $bData['subject'];
            $message1 = str_replace("{{USERNAME}}", $addNew->buyer_name, $message);
            $message2 = str_replace("{{NAME}}", $proDet->seller->name, $message1);
            $message3 = str_replace("{{EMAIL}}", $proDet->seller->email, $message2);
            $message4 = str_replace("{{PHONE_NUMBER}}", $seller_phone, $message3);
            $this->createEmailLog($addNew->buyer_email,$subject,$message4,2);
            //Mail::to($addNew->buyer_email)->send(new sendEmail($message4,$subject));
        }
        if (isset($saData) && !empty($saData)) {
            $saData = $saData->toArray();      
            $message = $saData['content'];
            $subject = $saData['subject'];
            $message1 = str_replace("{{USERNAME}}", $proDet->seller->name, $message);
            $message2 = str_replace("{{NAME}}", $addNew->buyer_name, $message1);
            $message3 = str_replace("{{EMAIL}}", $addNew->buyer_email, $message2);
            $message4 = str_replace("{{PHONE_NUMBER}}", $buyer_age_ph, $message3);
            
            $message5 = str_replace("{{BUYER_AGENT_NAME}}", $addNew->name, $message4);
            $message6 = str_replace("{{BUYER_AGENT_EMAIL}}", $addNew->email, $message5);
            $message7 = str_replace("{{BUYER_AGENT_PHONE_NUMBER}}", $buyer_pn, $message6);
            $this->createEmailLog($proDet->seller->email,$subject,$message7,2);
            //Mail::to($proDet->seller->email)->send(new sendEmail($message7,$subject));
        }

        // SEND SMS
        $sms = EmailSmsMaster::where('email_sms_key', 'sms_to_buyer')->first();
        $sms1 = EmailSmsMaster::where('email_sms_key', 'sms_to_seller_agent')->first();
        $sms2 = EmailSmsMaster::where('email_sms_key', 'sms_to_buyer_agent')->first();
        if (isset($sms) && !empty($sms)) {
            $sms = $sms->toArray();      
            $message = strip_tags($sms['content']);
            $message1 = str_replace("{{USERNAME}}", $addNew->buyer_name, $message);
            $message2 = str_replace("{{NAME}}", $proDet->seller->name, $message1);
            $message3 = str_replace("{{EMAIL}}", $proDet->seller->email, $message2);
            $message4 = str_replace("{{PHONE_NUMBER}}", $seller_phone, $message3);
            $this->createSmsLog($buyer_pn,$message4,1);
            //$this->sendMessage($message4, $buyer_pn);
        }
        if (isset($sms1) && !empty($sms1)) {
            $sms1 = $sms1->toArray();      
            $message = strip_tags($sms1['content']);
            $message1 = str_replace("{{USERNAME}}", $proDet->seller->name, $message);
            $message2 = str_replace("{{NAME}}", $addNew->buyer_name, $message1);
            $message3 = str_replace("{{EMAIL}}", $addNew->buyer_email, $message2);
            $message4 = str_replace("{{PHONE_NUMBER}}", $buyer_age_ph, $message3);
            
            $message5 = str_replace("{{BUYER_AGENT_NAME}}", $addNew->name, $message4);
            $message6 = str_replace("{{BUYER_AGENT_EMAIL}}", $addNew->email, $message5);
            $message7 = str_replace("{{BUYER_AGENT_PHONE_NUMBER}}", $buyer_pn, $message6);
            $this->createSmsLog($seller_phone,$message7,1);
            //$this->sendMessage($message7, $seller_phone);
        }
        if (isset($sms2) && !empty($sms2)) {
            $sms2 = $sms2->toArray();      
            $message = strip_tags($sms2['content']);
            $message1 = str_replace("{{USERNAME}}", $addNew->name, $message);
            $message2 = str_replace("{{NAME}}", $proDet->seller->name, $message1);
            $message3 = str_replace("{{EMAIL}}", $proDet->seller->email, $message2);
            $message4 = str_replace("{{PHONE_NUMBER}}", $seller_phone, $message3);
            $this->createSmsLog($buyer_age_ph,$message4,1);
            //$this->sendMessage($message4, $buyer_age_ph);
        }

        }catch (\Exception $e) {
            return true;    
        }
        return true;

    }


    /**
     * Send Email to Buyer,Buyer Agent and seller agent for Offer Failed.
     *
     * @return true
     */
    public function sendEmailBuyerAgentNotSuccess($addNew,$getOfferRejectedTable)
    {
        try{
        $data = EmailSmsMaster::where('email_sms_key', 'email_offer_reject_to_buyer_agent')->first();
        $bData = EmailSmsMaster::where('email_sms_key', 'email_offer_reject_to_buyer')->first();
        $saData = EmailSmsMaster::where('email_sms_key', 'email_offer_reject_to_seller_agent')->first();
        $proDet = Property::with('seller')->where('property_id',$addNew->property_id)->first();

        $seller_phone = $proDet->seller->tel_code.$proDet->seller->mobile_number;
        $buyer_pn =  $addNew->phone_code.$addNew->phone;
        $buyer_age_ph = $addNew->buyer_ph_code.$addNew->buyer_phone;

        if (isset($data) && !empty($data)) {
            $data = $data->toArray();      
            $message = $data['content'];
            $subject = $data['subject'];
            $message1 = str_replace("{{USERNAME}}", $addNew->name, $message);
            $message2 = str_replace("{{NAME}}", $proDet->seller->name, $message1);
            $message3 = str_replace("{{EMAIL}}", $proDet->seller->email, $message2);
            $message4 = str_replace("{{PHONE_NUMBER}}", $seller_phone, $message3);
            $message5 = str_replace("{{TABLE}}", $getOfferRejectedTable, $message4);
            $this->createEmailLog($addNew->email,$subject,$message5,2);
            //Mail::to($addNew->email)->send(new sendEmail($message5,$subject));
        }
        if (isset($bData) && !empty($bData)) {
            $bData = $bData->toArray();      
            $message = $bData['content'];
            $subject = $bData['subject'];
            $message1 = str_replace("{{USERNAME}}", $addNew->buyer_name, $message);
            $message2 = str_replace("{{NAME}}", $proDet->seller->name, $message1);
            $message3 = str_replace("{{EMAIL}}", $proDet->seller->email, $message2);
            $message4 = str_replace("{{PHONE_NUMBER}}", $seller_phone, $message3);
            $message5 = str_replace("{{TABLE}}", $getOfferRejectedTable, $message4);
            $this->createEmailLog($addNew->buyer_email,$subject,$message5,2);
            //Mail::to($addNew->buyer_email)->send(new sendEmail($message5,$subject));
        }
        if (isset($saData) && !empty($saData)) {
            $saData = $saData->toArray();      
            $message = $saData['content'];
            $subject = $saData['subject'];
            $message1 = str_replace("{{USERNAME}}", $proDet->seller->name, $message);
            $message2 = str_replace("{{NAME}}", $addNew->buyer_name, $message1);
            $message3 = str_replace("{{EMAIL}}", $addNew->buyer_email, $message2);
            $message4 = str_replace("{{PHONE_NUMBER}}", $buyer_age_ph, $message3);

            $message5 = str_replace("{{BUYER_AGENT_NAME}}", $addNew->name, $message4);
            $message6 = str_replace("{{BUYER_AGENT_EMAIL}}", $addNew->email, $message5);
            $message7 = str_replace("{{BUYER_AGENT_PHONE_NUMBER}}", $buyer_pn, $message6);
            $message8 = str_replace("{{TABLE}}", $getOfferRejectedTable, $message7);
            $this->createEmailLog($proDet->seller->email,$subject,$message8,2);
            //Mail::to($proDet->seller->email)->send(new sendEmail($message8,$subject));
        }

        // SEND SMS
        $sms = EmailSmsMaster::where('email_sms_key', 'sms_reject_to_buyer')->first();
        $sms1 = EmailSmsMaster::where('email_sms_key', 'sms_reject_to_seller_agent')->first();
        $sms2 = EmailSmsMaster::where('email_sms_key', 'sms_reject_to_buyer_agent')->first();
        if (isset($sms) && !empty($sms)) {
            $sms = $sms->toArray();      
            $message = strip_tags($sms['content']);
            $message1 = str_replace("{{USERNAME}}", $addNew->buyer_name, $message);
            $message2 = str_replace("{{NAME}}", $proDet->seller->name, $message1);
            $message3 = str_replace("{{EMAIL}}", $proDet->seller->email, $message2);
            $message4 = str_replace("{{PHONE_NUMBER}}", $seller_phone, $message3);
            $this->createSmsLog($buyer_pn,$message4,1);
            //$this->sendMessage($message4, $buyer_pn);
        }
        if (isset($sms1) && !empty($sms1)) {
            $sms1 = $sms1->toArray();      
            $message = strip_tags($sms1['content']);
            $message1 = str_replace("{{USERNAME}}", $proDet->seller->name, $message);
            $message2 = str_replace("{{NAME}}", $addNew->buyer_name, $message1);
            $message3 = str_replace("{{EMAIL}}", $addNew->buyer_email, $message2);
            $message4 = str_replace("{{PHONE_NUMBER}}", $buyer_age_ph, $message3);

            $message5 = str_replace("{{BUYER_AGENT_NAME}}", $addNew->name, $message4);
            $message6 = str_replace("{{BUYER_AGENT_EMAIL}}", $addNew->email, $message5);
            $message7 = str_replace("{{BUYER_AGENT_PHONE_NUMBER}}", $buyer_pn, $message6);
            $this->createSmsLog($seller_phone,$message7,1);
            //$this->sendMessage($message7, $seller_phone);
        }
        if (isset($sms2) && !empty($sms2)) {
            $sms2 = $sms2->toArray();      
            $message = strip_tags($sms2['content']);
            $message1 = str_replace("{{USERNAME}}", $addNew->name, $message);
            $message2 = str_replace("{{NAME}}", $proDet->seller->name, $message1);
            $message3 = str_replace("{{EMAIL}}", $proDet->seller->email, $message2);
            $message4 = str_replace("{{PHONE_NUMBER}}", $seller_phone, $message3);
            $this->createSmsLog($buyer_age_ph,$message4,1);
            //$this->sendMessage($message4, $buyer_age_ph);
        }
        
        }catch (\Exception $e) {
            return true;    
        }
        return true;
    }


    /**
     * Create Table on  Offer failed.
     *
     * @return true
     */
    public function createRejectedOfferTable($dataIn,$dataAcc)
    {
        $addDgr = 'style="color:red; font-weight:bold;border-bottom: 1px solid #dee2e6;text-align: center;padding: 5px 7px;font-size: 16px;"';
        $addScs = 'style="color:green; font-weight:bold;border-bottom: 1px solid #dee2e6;text-align: center;padding: 5px 7px;font-size: 16px;"';
                                    
        if ($dataAcc['sale_priceIs']) {$sP_Class = $addScs;}else{$sP_Class = $addDgr;}
        if ($dataAcc['seller_concessionsIs']) {$sC_Class = $addScs;}else{$sC_Class = $addDgr;}
        if ($dataAcc['settlementIs']) {$stl_Class = $addScs;}else{$stl_Class = $addDgr;}
        if ($dataAcc['emdIs']) {$emd_Class = $addScs;}else{$emd_Class = $addDgr;}
        if ($dataAcc['due_diligenceIs']) {$dd_Class = $addScs;}else{$dd_Class = $addDgr;}
        if ($dataAcc['financeIs']) {$fin_Class = $addScs;}else{$fin_Class = $addDgr;}
        if ($dataAcc['appraisalIs']) {$app_Class = $addScs;}else{$app_Class = $addDgr;}
        if ($dataAcc['inspectionIs']) {$ins_Class = $addScs;}else{$ins_Class = $addDgr;}
        if ($dataAcc['home_saleIs']) {$hms_Class = $addScs;}else{$hms_Class = $addDgr;}

        $settlDate = is_array($dataAcc['settlement_date']) ? implode(",", $dataAcc['settlement_date']) : $dataAcc['settlement_date'];
        $finanDate = is_array($dataAcc['finance']) ? implode(",", $dataAcc['finance']) : $dataAcc['finance'];
        $apprDate = is_array($dataAcc['appraisal']) ? implode(",", $dataAcc['appraisal']) : $dataAcc['appraisal'];
        $inspecDate = is_array($dataAcc['inspection'])?implode(",", $dataAcc['inspection']) : $dataAcc['inspection'];
        $homeDate = is_array($dataAcc['home_sale']) ? implode(",", $dataAcc['home_sale']) : $dataAcc['home_sale'];
        
        $first_table =
        '<table style="width:100%;border-collapse: collapse;border: 1px solid #dee2e6;margin: 40px 0px;"><thead><tr><th scope="col" width="33%" style="background-color: #f0eeee;padding: 7px;ont-size: 16px;">Contract Terms</th><th scope="col" width="33%" style="background-color: #f0eeee;padding: 7px;ont-size: 16px;">Entered Value</th><th scope="col" width="33%" style="background-color: #f0eeee;padding: 7px;ont-size: 16px;">Acceptance Value</th></tr></thead><tbody class="first_table"><tr><td style="border-bottom: 1px solid #dee2e6;text-align: center;padding: 5px 7px;font-size: 16px;">Sale Price</td><td '.$sP_Class.' style="border-bottom: 1px solid #dee2e6;text-align: center;padding: 5px 7px;font-size: 16px;">'.$dataIn['sale_price'].'</td><td style="border-bottom: 1px solid #dee2e6;text-align: center;padding: 5px 7px;font-size: 16px;">'.$dataAcc['sale_price'].'</td></tr><tr><td style="border-bottom: 1px solid #dee2e6;text-align: center;padding: 5px 7px;font-size: 16px;">Seller Concessions</td><td '.$sC_Class.' style="border-bottom: 1px solid #dee2e6;text-align: center;padding: 5px 7px;font-size: 16px;">'.$dataIn['seller_concessions'].'</td><td style="border-bottom: 1px solid #dee2e6;text-align: center;padding: 5px 7px;font-size: 16px;">'.$dataAcc['seller_concessions'].'</td></tr><tr><td style="border-bottom: 1px solid #dee2e6;text-align: center;padding: 5px 7px;font-size: 16px;">Settlement Date</td><td '.$stl_Class.' style="border-bottom: 1px solid #dee2e6;text-align: center;padding: 5px 7px;font-size: 16px;">'.$dataIn['settlement_dates'].'</td><td style="border-bottom: 1px solid #dee2e6;text-align: center;padding: 5px 7px;font-size: 16px;">'. $settlDate.'</td></tr><tr><td style="border-bottom: 1px solid #dee2e6;text-align: center;padding: 5px 7px;font-size: 16px;">EMD</td><td '.$emd_Class.' style="border-bottom: 1px solid #dee2e6;text-align: center;padding: 5px 7px;font-size: 16px;">'.$dataIn['emd'].'</td><td style="border-bottom: 1px solid #dee2e6;text-align: center;padding: 5px 7px;font-size: 16px;">'.$dataAcc['emd'].'</td></tr><tr><td style="border-bottom: 1px solid #dee2e6;text-align: center;padding: 5px 7px;font-size: 16px;">Due Diligence</td><td '.$dd_Class.' style="border-bottom: 1px solid #dee2e6;text-align: center;padding: 5px 7px;font-size: 16px;">'.$dataIn['due_diligence'].'</td><td style="border-bottom: 1px solid #dee2e6;text-align: center;padding: 5px 7px;font-size: 16px;">'.$dataAcc['due_diligence'].'</td></tr></tbody></table>';

        $second_table =
        '<table style="width:100%;border-collapse: collapse;border: 1px solid #dee2e6;margin: 40px 0px;"><thead><tr><th scope="col" width="33%" style="background-color: #f0eeee;padding: 7px;ont-size: 16px;">Contract Contingencies</th><th scope="col" width="33%" style="background-color: #f0eeee;padding: 7px;ont-size: 16px;">Entered Value</th><th scope="col" width="33%" style="background-color: #f0eeee;padding: 7px;ont-size: 16px;">Acceptance Value</th></tr></thead><tbody class="second_table"><tr><td style="border-bottom: 1px solid #dee2e6;text-align: center;padding: 5px 7px;font-size: 16px;">Financing Contingency</td><td '.$fin_Class.' style="border-bottom: 1px solid #dee2e6;text-align: center;padding: 5px 7px;font-size: 16px;">'.$dataIn['finances'].'</td><td style="border-bottom: 1px solid #dee2e6;text-align: center;padding: 5px 7px;font-size: 16px;">'.$finanDate.'</td></tr><tr><td style="border-bottom: 1px solid #dee2e6;text-align: center;padding: 5px 7px;font-size: 16px;">Appraisal Contingency</td><td '.$app_Class.' style="border-bottom: 1px solid #dee2e6;text-align: center;padding: 5px 7px;font-size: 16px;">'.$dataIn['appraisals'].'</td><td style="border-bottom: 1px solid #dee2e6;text-align: center;padding: 5px 7px;font-size: 16px;">'.$apprDate.'</td></tr><tr><td style="border-bottom: 1px solid #dee2e6;text-align: center;padding: 5px 7px;font-size: 16px;">Inspection Contingency</td><td '.$ins_Class.' style="border-bottom: 1px solid #dee2e6;text-align: center;padding: 5px 7px;font-size: 16px;">'.$dataIn['inspections'].'</td><td style="border-bottom: 1px solid #dee2e6;text-align: center;padding: 5px 7px;font-size: 16px;">'.$inspecDate.'</td></tr><tr><td style="border-bottom: 1px solid #dee2e6;text-align: center;padding: 5px 7px;font-size: 16px;">Home Sale Contingency</td><td '.$hms_Class.' style="border-bottom: 1px solid #dee2e6;text-align: center;padding: 5px 7px;font-size: 16px;">'.$dataIn['home_sales'].'</td><td style="border-bottom: 1px solid #dee2e6;text-align: center;padding: 5px 7px;font-size: 16px;">'.$homeDate.'</td></tr></tbody></table>';
        $tableData = $first_table.$second_table;
        return $tableData;
    }
    
    /**
     * Sends sms to user using Twilio's programmable sms client
     * @param String $message Body of sms
     * @param Number $recipients string or array of phone number of recepient
    */
    private function sendMessage($message, $recipients)
    {
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);
        $client->messages->create($recipients, 
                ['from' => $twilio_number, 'body' => $message] );
    }

    public function createEmailLog($email,$subject,$message,$type)
    {
        $newEmailLog = new EmailLog;
        $newEmailLog->email_id = $email;
        $newEmailLog->subject = $subject;
        $newEmailLog->email_content = $message;
        $newEmailLog->email_status = 2;
        $newEmailLog->type = $type;
        $newEmailLog->save();
        return true;
    }
    public function createSmsLog($phone,$message,$type)
    {
        $newEmailLog = new EmailLog;
        $newEmailLog->phone = $phone;
        $newEmailLog->email_content = $message;
        $newEmailLog->email_status = 2;
        $newEmailLog->type = $type;
        $newEmailLog->save();
        return true;
    }

}
