<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendEmail;
use App\Helpers\FrontHelper;
use App\Models\EmailSmsMaster;
use App\Models\User;
use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\Offer;
use App\Models\Lead;
use Storage;
use Config;
use File;
use Auth;
use Hash;
use URL;
class SellerAgentController extends Controller
{
    /**
	 * Used for Admin sellerAgent
	 * @return redirect to Admin->sellerAgent
	 */
    public function index(Request $request)
    {
    	if (request()->ajax()) {
            return \View::make('admin.sellerAgent.index')->renderSections();
        }
    	return view('admin.sellerAgent.index');
    }


    /**
	 * Used for Admin addSellerAgent
	 * @return redirect to Admin->addSellerAgent
	 */
    public function addSellerAgent(Request $request)
    {
        if (request()->ajax()) {
            return \View::make('admin.sellerAgent.addSellerAgent')->renderSections();
        }
    	return view('admin.sellerAgent.addSellerAgent');
    }



    /**
	 * Used for Admin add addSellerAgentPost
 	 * @return redirect to Admin->add addSellerAgentPost
	 */
    public function addSellerAgentPost(Request $request)
    {
    	$response = [];
    	$input = $request->all();
        $aData = [];
        $cdData = [];
        try
        {
            if(!empty($input['pkCat']) && $input['pkCat'] != null){
            	$checkPrev = User::where('email',$input['email'])->where('user_id','!=',$input['pkCat'])->count();
            	if ($checkPrev > 0) {
            		$response['status'] = false;
                  	$response['message'] ="Email already exists";
            		return response()->json($response);
            	}else{
            		if($request->hasFile('user_img')){
            			$checkImage = User::where('user_id',$input['pkCat'])->first();
			            $gen_rand = rand(100,99999).time();
			            $image_path = $request->file('user_img');
			            $extension = $image_path->getClientOriginalExtension();
			            Storage::disk('public')->put(Config::get('constant.images_dirs.USERS').'/'.$gen_rand.'.'.$extension,  File::get($image_path));
			            if(!empty($checkImage->user_photo)){
			                Storage::disk('public')->delete(Config::get('constant.images_dirs.USERS').'/'.$checkImage->user_photo);
			            }
			            $aData['user_photo'] = $gen_rand.'.'.$extension;
			        }

    	        	$userData = User::where('user_id',$input['pkCat']);
    	            $aData['name'] = $input['name'];
    	            $aData['mobile_number'] = $input['mobile_number'];
    	            $aData['email'] = $input['email'];
                    $aData['tel_code'] = $input['tel_code'] ?? '';
    	            if ($userData->update($aData)) {
    	            	$response['status'] = true;
    	              	$response['message'] ="Seller Agent Successfully Updated";	
    	            }else{
    	            	$response['status'] = false;
    	              	$response['message'] ="Something Went Wrong please try again";	
    	            }
            	}

        	}else{
            
                $checkPrev = User::where('email',$input['email'])->first();
                if(!empty($checkPrev)){
                  $response['status'] = false;
                  $response['message'] ="Email already exists";
                }else{
                    $adminModule = [];
                    
                	//Store Sub Admin User
    	            $aTableData = new User;
    	            if($request->hasFile('user_img')){
            			$gen_rand = rand(100,99999).time();
			            $image_path = $request->file('user_img');
			            $extension = $image_path->getClientOriginalExtension();
			            Storage::disk('public')->put(Config::get('constant.images_dirs.USERS').'/'.$gen_rand.'.'.$extension,  File::get($image_path));
			            $aTableData->user_photo = $gen_rand.'.'.$extension;
			        }
    	            $aTableData->name = $input['name'];
    	            $aTableData->email = $input['email'];
    	            $aTableData->mobile_number = $input['mobile_number'];
                    $aTableData->tel_code = $input['tel_code'] ?? '';
    	            $aTableData->user_type = 1;
    	            $aTableData->user_status = true;
    	            $aTableData->save();
    	            if ($aTableData) {
                        
    				    $data = EmailSmsMaster::where('email_sms_key', 'seller_agent_set_password')->first();
    			        if (isset($data) && !empty($data)) {
    			            $data = $data->toArray();

    			           	$uType = 'seller';
    			           	$pass = FrontHelper::generatePassword(10);
    			           	$current_time = date("Y-m-d H:i:s");
    			           	$reset_pass_token = base64_encode($input['email'].'&&'.$uType."&&".$current_time);
    			            $message = $data['content'];

    			            $subject = $data['subject'];
    			            
    			            $message1 = str_replace("{{USERNAME}}", $input['name'], $message);
    			            
    			            $link = URL::to('seller/setPassword',$reset_pass_token);
    			            
    			            $fullUrl = "<a style='padding:5px;color:white;background:#2682df;border:1px solid #2682df;border-radius: 4px;text-decoration: none;' href='".$link."'>Set Password</a>";

    			            $msg = str_replace("{{PASSWORD}}", $fullUrl, $message1);

    			            $mail = Mail::to($aTableData->email)->send(new sendEmail($msg,$subject));
    		        	}

    	            	$response['status'] = true;
    	              	$response['message'] ="Seller Agent Successfully Added";
    	            }else{
    	            	$response['status'] = false;
    	              	$response['message'] ="Something went wrong please try again";
    	            }
                }
            }
        }catch (\Exception $e) {
            $response['status'] = false;
            $response['message'] = "Error:" . $e->getMessage();
        }
        return response()->json($response);
    }


    /**
	 * Used for Admin get App Users
 	 * @return redirect to Admin->get App Users listing
	*/
    public function getSubAdmins(Request $request)
    {
    	
      /**
       * Used for Admin get App Users Listing
       */
    	$data =$request->all();
	    
	    $perpage = !empty( $data[ 'length' ] ) ? (int)$data[ 'length' ] : 10;
	      
	    $filter = isset( $data['search'] ) && is_string( $data['search'] ) ? $data['search'] : '';
	    
	    $status_type = isset( $data['status_type'] ) ? $data['status_type'] :'';

	    $sort_type = isset( $data['order'][0]['dir'] ) && is_string( $data['order'][0]['dir'] ) ? $data['order'][0]['dir'] : '';	

	    $sort_col =  isset($data['order'][0]['column']) ? $data['order'][0]['column'] :'';

	    $sort_field = isset($data['columns'][$sort_col]['data']) ? $data['columns'][$sort_col]['data'] :'';
	    
    	$aTable = User::where('user_type',1)->where('deleted',0);

    	if($filter){
    		$aTable = $aTable->where('name', 'LIKE', '%' . $filter . '%' );
    	}

    	if ($status_type) {
            $status_type = $status_type=='Active'?1:0;
    		$aTable = $aTable->where('user_status',$status_type);
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
            $value['created_at'] = date('d-M-Y',strtotime($value['created_at']));
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
	 * Used for Admin editSellerAgent
	 * @return redirect to Admin->editSellerAgent
	 */
    public function editSellerAgent(Request $request,$id)
    {
    	$data = User::where('user_id',$id)->first();
    	if (request()->ajax()) {
            return \View::make('admin.sellerAgent.editSellerAgent')->with(['data'=>$data])->renderSections();
        }
    	return view('admin.sellerAgent.editSellerAgent')->with(['data'=>$data]);
    }
  

    /**
	 * Used for Admin viewSellerAgent
	 * @return redirect to Admin->viewSellerAgent
	 */
    public function viewSellerAgent(Request $request,$id)
    {
    	$data = User::where('user_id',$id)->first();
    	if (request()->ajax()) {
            return \View::make('admin.sellerAgent.viewSellerAgent')->with(['data'=>$data])->renderSections();
        }
    	return view('admin.sellerAgent.viewSellerAgent')->with(['data'=>$data]);
    }


    /**
     * Used for Admin deleteSellerAgent
     * @return redirect to Admin->delete deleteSellerAgent
     */
    public function deleteSellerAgent(Request $request)
    {
        $input = $request->all();
        $cid = $input['cid'];
        $response = [];

        if(empty($cid)){
            $response['status'] = false;
        }else{
            /*$getPro = Property::where('seller_id',$cid)->get();
            foreach ($getPro as $value) {
                Offer::where('property_id',$value->property_id)->delete();
                Lead::where('property_id',$value->property_id)->delete();
                $getImage = Property::where('property_id',$value->property_id)->get();
                foreach ($getImage as $value1) {
                    Storage::disk('public')->delete(Config::get('constant.images_dirs.PROPERTY').'/'.$value1->image);
                }
                PropertyImage::where('property_id',$value->property_id)->delete();
            }
            Property::where('seller_id',$cid)->delete();*/

            $userData = User::where('user_id', $cid)->first();
            $userData->deleted = true;
            $userData->deleted_at = date('Y-m-d H:i:s',strtotime(now()));
            if($userData->update()){
                $response['status'] = true;
                $response['message'] = "Sub-Admin Successfully deleted";
            }else{
                $response['status'] = false;
                $response['message'] = "Something Went Wrong";
            }
        }
        return response()->json($response);
    }


    /**
    * Used for Delete Admin statusSellerAgent
    */
    public function statusSellerAgent(Request $request)
    {
        $input = $request->all();
        $cid = $input['cid'];
        $response = [];

        if(empty($cid)){
            $response['status'] = false;
        }else{
            $status = User::where('user_id',$cid)->first();
            $status->user_status = $status->user_status == 1 ? 0 : 1;
            if ($status->update()) {
                $response['status'] = true;
                $response['message'] = "Status Successfully changed";
            }else{
                $response['status'] = false;
            }
        }
        return response()->json($response);
    } 

    /**
     * Used for Admin get propertyList
     * @return redirect to Admin->get propertyList listing
     */
    public function propertyList(Request $request)
    {
        $data =$request->all();

        $perpage = !empty( $data[ 'length' ] ) ? (int)$data[ 'length' ] : 10;
        
        $filter = isset( $data['search'] ) && is_string( $data['search'] ) ? $data['search'] : '';

        $listing_status = isset($data['listing_status']) ? $data['listing_status'] : '';
        
        $offer_status = isset($data['offer_status']) ? $data['offer_status'] : '';

        $sort_type = isset( $data['order'][0]['dir'] ) && is_string( $data['order'][0]['dir'] ) ? $data['order'][0]['dir'] : '';    

        $sort_col =  isset($data['order'][0]['column']) ? $data['order'][0]['column'] :'';

        $sort_field = isset($data['columns'][$sort_col]['data']) ? $data['columns'][$sort_col]['data'] :'';
        
        $aTable = Property::where('seller_id',$data['pkCat']);

        if($filter){
            $aTable = $aTable->where('address', 'LIKE', '%' . $filter . '%' )->orWhere(function($query) use($filter){
                    $query->where('manual_address','like','%'.$filter.'%');
            });
        }

        if ($listing_status) {
            if ($listing_status==5) {
                $aTable = $aTable->where('listing_status',0);   
            }else{
                $aTable = $aTable->where('listing_status',$listing_status);       
            }
            
        }
        if ($offer_status) {
            if ($offer_status==4) {
                $aTable = $aTable->where('offer_status',0);       
            }else{
                $aTable = $aTable->where('offer_status',$offer_status);       
            }
            
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
            $value['created_at'] = date('d-M-Y',strtotime($value['created_at']));
            $value['user_type'] = Auth::User()->user_type;
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

}
