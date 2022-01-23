<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersPropertyExport;
use App\Exports\PropertyExport;
use App\Models\PropertyDuration;
use App\Models\PropertyImage;
use App\Models\Property;
use App\Models\Offer;
use App\Models\Lead;
use Storage;
use Config;
use File;
use Auth;

class PropertyController extends Controller
{
    	
    /**
	 * Used for Admin Property
	 * @return redirect to Admin->Property
	 */
    public function index(Request $request)
    {
        if (Auth::check() && Auth::User()->user_type==1) {
        	if (request()->ajax()) {
                return \View::make('admin.property.index')->renderSections();
            }
        	return view('admin.property.index');
        }else{
            if (request()->ajax()) {
                return \View::make('admin.property.admin_index')->renderSections();
            }
            return view('admin.property.admin_index');
        }
    }


    /**
	 * Used for Admin get getProperty
 	 * @return redirect to Admin->get getProperty listing
	 */
    public function getProperty(Request $request)
    {
    	$data =$request->all();

	    $perpage = !empty( $data[ 'length' ] ) ? (int)$data[ 'length' ] : 10;
	    
        $filter = isset( $data['search'] ) && is_string( $data['search'] ) ? $data['search'] : '';

        $listing_status = isset($data['listing_status']) ? $data['listing_status'] : '';
        
        $offer_status = isset($data['offer_status']) ? $data['offer_status'] : '';

	    $sort_type = isset( $data['order'][0]['dir'] ) && is_string( $data['order'][0]['dir'] ) ? $data['order'][0]['dir'] : '';	

	    $sort_col =  isset($data['order'][0]['column']) ? $data['order'][0]['column'] :'';

	    $sort_field = isset($data['columns'][$sort_col]['data']) ? $data['columns'][$sort_col]['data'] :'';
	    if (Auth::check() && Auth::User()->user_type==1) {
            $user_id = Auth::User()->user_id;
            $aTable = Property::where('seller_id',$user_id);
        }else{
            $aTable = Property::with('seller');
        }

        if($filter){
    		$aTable = $aTable->where('address', 'LIKE', '%' . $filter . '%' );
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
            if ($value['address_type']==1) {
                $value['addresee_url'] = $value['address'];
            }else{
                $value['addresee_url'] = $value['manual_address'];
            }
            if (!empty($value['addresee_url'])) {
                $value['addresee_url'] = strtolower(str_replace(" ","-",$value['addresee_url']));
                $value['addresee_url'] = str_replace(",","",$value['addresee_url']);
                $value['addresee_url'] = str_replace("/","",$value['addresee_url']);
            }
            $value['addresee_url'] = $value['addresee_url'];

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
	 * Used for Admin addProperty
	 * @return redirect to Admin->addProperty
	 */
    public function addProperty(Request $request)
    {
    	$p_duration = PropertyDuration::get();
    	if (request()->ajax()) {
            return \View::make('admin.property.add')->with(['p_duration'=>$p_duration])->renderSections();
        }
    	return view('admin.property.add')->with(['p_duration'=>$p_duration]);
    }
	

    /**
	 * Used for Admin 
 	 * @return redirect to Admin->
	 */
    public function addPropertyPost(Request $request)
    {
    	$response = [];
        $aData = [];
    	$input = $request->all();
        
        try{
        	if(!empty($input['pkCat']) && $input['pkCat'] != null){
                if (isset($input['media']) && !empty($input['media'])) {
                    $imageArr = array_filter($input['media']);
                    PropertyImage::whereIn('p_image_id',$imageArr)->update(['property_id'=>$input['pkCat']]);
                }
                $pkCat = Property::where('property_id',$input['pkCat']);
                $aData['tranc_coordinator_name'] = $input['tranc_coordinator_name'];
                $aData['realtors_name'] = $input['realtors_name'];
                //MANAGE ADDRESS
                $aData['address_type'] = $input['address_type'];
                if ($input['address_type']==1) {
                    $aData['address'] = $input['address_address'] ??'';
                    $aData['manual_address'] = '';
                }else{
                    $aData['manual_address'] = $input['manual_address'] ?? '';
                }

                $aData['latitude'] = $input['latitude'] ?? '';
                $aData['longitude'] = $input['longitude'] ?? '';
                $aData['city'] = $input['city'] ?? '';
                $aData['state'] = $input['state'] ?? '';
                $aData['country'] = $input['country'] ?? '';
                $aData['zip_code'] = $input['postal_code'] ?? '';
                $aData['listing_price'] = $input['listing_price'];
                $aData['min_sales_price'] = $input['min_sales_price'];
                $aData['seller_concessions'] = $input['seller_concessions'];
                $aData['settlement_date'] = json_encode($input['settlement_date']);
                $aData['emd'] = $input['emd'];
                $aData['due_diligence'] = isset($input['due_diligence']) ? $input['due_diligence'] : NULL;
                $aData['finance'] = isset($input['finance'])? json_encode($input['finance']):'';
                $aData['appraisal'] = isset($input['appraisal'])? json_encode($input['appraisal']):'';
                $aData['inspection'] = isset($input['inspection'])? json_encode($input['inspection']):'';
                $aData['home_sale'] = isset($input['home_sale'])? json_encode($input['home_sale']):'';
                $aData['insurance'] = $input['insurance'];
                $aData['property_tax'] = $input['property_tax'];
                $aData['other_fee'] = $input['other_fee'];
                $aData['hoa'] = $input['hoa'];
                $pkCat->update($aData);
                if ($pkCat) {
                    $response['status'] = true;
                    $response['message'] = "Property Successfully Updated";
                }else{
                    $response['status'] = false;
                    $response['message'] = "Something Went Wrong!";
                }
        	}
        	else{
        		$aData = new Property;
                $aData->seller_id = Auth::user()->user_id;
                $aData->tranc_coordinator_name = $input['tranc_coordinator_name'];
                $aData->realtors_name = $input['realtors_name'];
                $aData->address_type = $input['address_type'];
                $aData->address = $input['address_address']??'';
                $aData->manual_address = $input['manual_address'] ?? '';
                $aData->latitude = $input['latitude'] ?? '';
                $aData->longitude = $input['longitude'] ?? '';
                $aData->city = $input['city'] ?? '';
                $aData->state = $input['state'] ?? '';
                $aData->country = $input['country'] ?? '';
                $aData->zip_code = $input['postal_code'] ?? '';
                $aData->listing_price = $input['listing_price'];
                $aData->min_sales_price = $input['min_sales_price'];
                $aData->seller_concessions = $input['seller_concessions'];
                $aData->settlement_date = isset($input['settlement_date']) ? json_encode($input['settlement_date']):'';
                $aData->emd = $input['emd'];
                $aData->due_diligence = isset($input['due_diligence']) ? $input['due_diligence'] : NULL;
                $aData->finance = isset($input['finance']) ? json_encode($input['finance']):'';
                $aData->appraisal = isset($input['appraisal']) ? json_encode($input['appraisal']):'';
                $aData->inspection = isset($input['inspection']) ? json_encode($input['inspection']):'';
                $aData->home_sale = isset($input['home_sale']) ? json_encode($input['home_sale']):'';
                $aData->insurance = $input['insurance'];
                $aData->property_tax = $input['property_tax'];
                $aData->other_fee = $input['other_fee'];
                $aData->hoa = $input['hoa'];
                $aData->save();
                if ($aData) {
	                if (isset($input['media']) && !empty($input['media'])) {
	                	$imageArr = array_filter($input['media']);
	                	PropertyImage::whereIn('p_image_id',$imageArr)->update(['property_id'=>$aData->property_id]);
	                }
                	$response['status'] = true;
        	        $response['message'] = "Property Successfully Added";

                }else{
                    $response['status'] = false;
                    $response['message'] = "Something Wrong Please try again Later";
                }
                
            }
        }catch (\Exception $e) {
            $response['status'] = false;
            $response['message'] = "Error:" . $e->getMessage();
        }
        return response()->json($response);
    }


    /**
     * Used for Admin add uploadQuestionImage
     * @return redirect to Admin->add uploadQuestionImage
     */
    public function addImages(Request $request)
    {
        $addQuesMedia = [];
        $input = $request->all();
        $images = !empty($request->file('images'))?$request->file('images'):[];
        foreach ($images as $key=> $file) {
            $gen_rand = rand(100,99999).time();
            $image_path = $file;
            $extension = $image_path->getClientOriginalExtension();
            Storage::disk('public')->put(Config::get('constant.images_dirs.PROPERTY').'/'.$gen_rand.'.'.$extension,  File::get($image_path));
            $storeData = new PropertyImage;
            $storeData->image = $gen_rand.'.'.$extension;
            $storeData->save();
            $storeData->directory = Config::get('constant.images_dirs.PROPERTY');
            $addQuesMedia[] = $storeData;
        }
        if (!empty($addQuesMedia)) {
            $response['status'] = true;
            $response['message'] ="Image Added";
            $response['data'] =$addQuesMedia;
            
        }else{
            $response['status'] = false;
            $response['message'] ="Something Went Wrong";
        }
        return response()->json($response);          
    }
    
    public function imageRemove(Request $request,PropertyImage $id) {
        if ($id->image) {
            Storage::disk('public')->delete(Config::get('constant.images_dirs.PROPERTY').'/'.$id->image);
        }
        $id->delete();
        return true;
    }

    
    public function editProperty(Request $request,$id)
    {
        $p_duration = PropertyDuration::get();
        $aData = Property::with('images')->where('property_id',$id)->first();
        return view('admin.property.edit',compact('aData','p_duration'));
    }   

    public function viewProperty(Request $request,$id)
    {
        $p_duration = PropertyDuration::get();
        $aData = Property::with('images')->where('property_id',$id)->first();
        return view('admin.property.view',compact('aData','p_duration'));
    }
    
    /**
    * Used for Delete Admin proStatus
    */
    public function proStatus(Request $request)
    {
        $input = $request->all();
        $cid = $input['cid'];
        $listing_status = $input['listing_status'] ?? false;
        $offer_status = $input['offer_status'] ?? false;
        $response = [];

        if(empty($cid)){
            $response['status'] = false;
        }else{
            $pro = Property::where('property_id', $cid)->first();
            if ($offer_status) {
                if ($offer_status==4) {
                    $pro->offer_status = 0;
                }else{
                    $pro->offer_status = $offer_status;
                }
            }
            if ($listing_status) {
                if ($listing_status==5) {
                    $pro->listing_status = 0;
                }else{
                    $pro->listing_status = $listing_status;
                }
            }
            if ($pro->update()) {
                $response['status'] = true;
                $response['message'] = "Status Successfully changed";
            }else{
                $response['status'] = false;
            }
        }
        return response()->json($response);
    }


    /**
    * Used for Delete Admin proDelete
    */
    public function proDelete(Request $request)
    {
        $input = $request->all();
        $cid = $input['cid'];
        $response = [];

        if(empty($cid)){
            $response['status'] = false;
        }else{
            Offer::where('property_id',$cid)->delete();
            Lead::where('property_id',$cid)->delete();
            //REMOVE IMAGE FROM DIRECTORY
            $getImage = Property::where('property_id',$cid)->get();
            foreach ($getImage as $value) {
                Storage::disk('public')->delete(Config::get('constant.images_dirs.PROPERTY').'/'.$value->image);
            }
            PropertyImage::where('property_id',$cid)->delete();
            
            $delete = Property::where('property_id',$cid)->delete();
            if ($delete) {
                $response['status'] = true;
                $response['message'] = "Deleted Successfully";
            }else{
                $response['status'] = false;
            }
        }
        return response()->json($response);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileExport(Request $request) 
    {
        $data = $request->all();
        $user_id = isset($data['user']) ? $data['user'] :false;
        $offer_status = isset($data['offer_status']) ? $data['offer_status'] :false;
        $listing_status = isset($data['listing_status']) ? $data['listing_status'] :false;

        return Excel::download(new PropertyExport($user_id,$offer_status,$listing_status), 'property-collection.xlsx');
    }
}
