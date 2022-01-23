<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Property;
use App\Models\Lead;
use App\Models\Offer;
use Storage;
use Config;
use File;
use Auth;
use Hash;
class DashboardController extends Controller
{
   	public function dashboard()
    {
        $count = [];
        $property = new Property; 
        $offer = Offer::with('property_det');
        $leads = Lead::with('property_det');
        if (Auth::check() && Auth::User()->user_type==1) {
            $user_id = Auth::User()->user_id;
            $propert = $property->where('seller_id',$user_id)->count();
            $actPropert = $property->where('seller_id',$user_id)->where('listing_status',1)->count();
            $offers = $offer->whereHas('property_det',function ($query1) use($user_id){
                        $query1->where('seller_id',$user_id);
                    })->count();
            $penOffer = $offer->whereHas('property_det',function ($query) use($user_id){
                        $query->where('seller_id',$user_id);
                    })->where('contract_received',false)->count();
                    
            $leads = $leads->whereHas('property_det',function ($query2) use($user_id){
                        $query2->where('seller_id',$user_id);
                    })->count();
        }else{
            $propert = $property->count();
            $actPropert = $property->where('listing_status',1)->count();
            $offers = $offer->count();
            $penOffer = $offer->where('contract_received',0)->count();
            $leads = $leads->count();
        }

        $count['seller_agent'] = User::where('user_type',1)->whereNull('deleted_at')->where('deleted',false)->count();
        $count['property'] = $propert; 
        $count['active_property'] = $actPropert; 
        $count['offers'] = $offers;
        $count['leads'] = $leads;
        $count['pen_offer'] = $penOffer;


    	return view('admin.dashboard.dashboard',compact('count'));
    }


	/**
	 * Used for Admin Profile
	 * @return redirect to Admin->Profile
	 */
    public function profile(Request $request)
    {
        if (request()->ajax()) {
            return \View::make('admin.dashboard.profile')->renderSections();
        }
        return view('admin.dashboard.profile');
    }


    /**
	 * Used for editProfile
	 * @return redirect to Admin->editProfile
	 */
    public function editProfile(Request $request){

        $response = [];
        $input = $request->all();      

        $emailExist = User::where('email','=', $input['email'])->where('user_id','!=',Auth::user()->user_id)->get();
        $emailExistCount = $emailExist->count();
        
        if($emailExistCount != 0){
            $response['status'] = false;
            $response['message'] =  'Email already exist, Please try with a different email';
            return response()->json($response);
            die();
        }
        
        $user = User::findorfail(Auth::user()->user_id);
        $user->email = $input['email'];
        $user->name = $input['name'];
        $user->mobile_number = $input['mobile_number'];
        $user->tel_code = $input['tel_code'] ?? '';
        
        if($request->hasFile('user_img')){
            $gen_rand = rand(100,99999).time();
            $image_path = $request->file('user_img');
            $extension = $image_path->getClientOriginalExtension();
            Storage::disk('public')->put(Config::get('constant.images_dirs.USERS').'/'.$gen_rand.'.'.$extension,  File::get($image_path));
            if(!empty($user->user_photo)){
                Storage::disk('public')->delete(Config::get('constant.images_dirs.USERS').'/'.$user->user_photo);
            }
            $user->user_photo = $gen_rand.'.'.$extension;
        }

        if($user->save()){
        	$response['status'] = true;
            $response['message'] =  "Profile Successfully updated";

        }else{
            $response['status'] = false;
            $response['message'] =  "Something Wrong Please try again Later";
        }

        return response()->json($response);
 
    }

    /**
     * Used for Profile Change Password when forgot save
     * @return redirect to Admin->Profile
    */
    public function changePasswordPost(Request $request)
    {
        $response = [];
        $input = $request->all();
        if(isset($input['old_password']) && $input['old_password'] != null && !empty($input['old_password']))
        {    

            if (Hash::check($input['old_password'], Auth::user()->password)) {
                // The passwords match...
                $user = User::findorfail(Auth::user()->user_id);
                
                if(isset($input['new_password']) && $input['new_password'] != null && !empty($input['new_password']))
                {
                    $user->password = Hash::make($input['new_password']);
                }   
                if($user->save()){
                    $response['status'] = true;
                    $response['message'] ="Password updated successfully";
                    $response['redirect'] = url('/logout');

                }else{
                    $response['status'] = false;
                    $response['message'] ='Something Wrong Please try again Later';
                }
               
            }else{
                $response['status'] = false;
                $response['message'] ="Entered password is incorrect, Your password doesn't match";
            }
        }
        return response()->json($response);
    }

}
