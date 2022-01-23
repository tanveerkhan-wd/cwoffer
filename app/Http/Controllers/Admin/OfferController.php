<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersOfferExport;
use App\Exports\PropertyOffer;
use App\Models\Property;
use App\Models\Offer;
use App\Models\PropertyImage;
use App\Models\PropertyDuration;
use Auth;

class OfferController extends Controller
{
    /**
	 * Used for Admin offer
	 * @return redirect to Admin->offer
	 */
    public function index(Request $request)
    {
    	if (request()->ajax()) {
            return \View::make('admin.offer.index')->renderSections();
        }
    	return view('admin.offer.index');
    }


    /**
	 * Used for Admin get getOffer
 	 * @return redirect to Admin->get getOffer listing
	 */
    public function getOffer(Request $request)
    {
    	$data =$request->all();

	    $perpage = !empty( $data[ 'length' ] ) ? (int)$data[ 'length' ] : 10;
	    
        $filter = isset( $data['search'] ) && is_string( $data['search'] ) ? $data['search'] : '';

        $contarct_received = isset($data['contarct_received']) ? $data['contarct_received'] : '';
        
        $user_type = isset($data['user_type']) ? $data['user_type'] : '';

	    $sort_type = isset( $data['order'][0]['dir'] ) && is_string( $data['order'][0]['dir'] ) ? $data['order'][0]['dir'] : '';	

	    $sort_col =  isset($data['order'][0]['column']) ? $data['order'][0]['column'] :'';

	    $sort_field = isset($data['columns'][$sort_col]['data']) ? $data['columns'][$sort_col]['data'] :'';
	    
        $pkProId = isset($data['pkProId']) ? $data['pkProId'] :false;

        $pkCat = isset($data['pkCat']) ? $data['pkCat'] :false;
        
        $aTable = Offer::with('property_det');
        if (Auth::check() && Auth::User()->user_type==1) {
            $user_id = Auth::User()->user_id;
            $aTable = $aTable->whereHas('property_det',function ($query) use($user_id){
                $query->where('seller_id',$user_id);
            });   
        }

        if ($pkCat) {
            $aTable = $aTable->whereHas('property_det',function ($query) use($pkCat){
                $query->where('seller_id',$pkCat);
            });          
        }

        if ($pkProId) {
            $aTable = $aTable->where('property_id',$pkProId);
        }
        
        if ($contarct_received) {
            if ($contarct_received==2) {
                $aTable = $aTable->where('contract_received',0);   
            }else{
                $aTable = $aTable->where('contract_received',$contarct_received);       
            }
            
        }
        if ($user_type) {
            $aTable = $aTable->where('user_type',$user_type);
        }

        if (Auth::check() && Auth::User()->user_type==1) {
            if($filter){
                $aTable = $aTable->whereHas('property_det',function($query) use($filter){
                    $query->where('address', 'LIKE', '%'. $filter . '%')->orWhere('manual_address', 'LIKE', '%'. $filter . '%');
                });
            }
        }else{
            if($filter){
                $aTable = $aTable->whereHas('property_det',function($query) use($filter){
                    $query->where('address', 'LIKE', '%'. $filter . '%')->orWhere('manual_address', 'LIKE', '%'. $filter . '%');
                });
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
            $value['isSeller'] = Auth::check() && Auth::User()->user_type==1 ? true :false;
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
     * Used for Admin offer view
     * @return redirect to Admin->offer->view
     */
    public function viewOffer(Request $request,$id)
    {
        $aData = Offer::with('property_det')->where('offer_id',$id)->first();
        $images = PropertyImage::where('property_id',$aData->property_id)->get();
        $p_duration = PropertyDuration::get();
        return view('admin.offer.view',compact('aData','images','p_duration'));
    }

    /**
    * Used for Delete Admin proStatus
    */
    public function offerContractStatus(Request $request)
    {
        $input = $request->all();
        $cid = $input['cid'];
        $response = [];

        if(empty($cid)){
            $response['status'] = false;
        }else{
            $data = Offer::where('offer_id', $cid)->first();
            $data->contract_received = $data->contract_received==0?1:0;
            
            if ($data->update()) {
                if ($data->contract_received==1) {
                    Property::where('property_id',$data->property_id)->update(['listing_status'=>2]);
                }
                $response['status'] = true;
                $response['message'] = "Status Successfully changed";
            }else{
                $response['status'] = false;
            }
        }
        return response()->json($response);
    }


    /**
    * Used for reject Admin proDelete
    */
    public function offerReject(Request $request)
    {
        $input = $request->all();
        $cid = $input['cid'];
        $offer_id = $input['offer_id'];
        $response = [];

        if(empty($cid) && empty($offer_id)){
            $response['status'] = false;
        }else{
            Offer::where('offer_id',$offer_id)->update(['offer_status'=>2]);
            $delete = Property::where('property_id',$cid)->update(['offer_status'=>0]);
            if ($delete) {
                $response['status'] = true;
                $response['message'] = "Status Changed Successfully";
            }else{
                $response['status'] = false;
            }
        }
        return response()->json($response);
    }
    /**
    * Used for Accept Admin proDelete
    */
    public function offerAccept(Request $request)
    {
        $input = $request->all();
        $cid = $input['cid'];
        $offer_id = $input['accept'];
        $response = [];

        if(empty($cid) && empty($offer_id)){
            $response['status'] = false;
        }else{
            Offer::where('offer_id',$offer_id)->update(['offer_status'=>1]);
            $delete = Property::where('property_id',$cid)->update(['offer_status'=>1]);
            if ($delete) {
                $response['status'] = true;
                $response['message'] = "Status Changed Successfully";
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

        $pro_id = isset($data['property']) ? $data['property'] :false;
        $user_id = isset($data['user']) ? $data['user'] :false;
        $type = isset($data['type']) ? $data['type'] :false;
        $contarct = isset($data['contarct']) ? $data['contarct'] :false;

        return Excel::download(new PropertyOffer($user_id,$pro_id,$type,$contarct), 'offer-collection.xlsx');
    }

}
