<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PropertyLead;
use App\Models\Lead;
use Auth;
class LeadController extends Controller
{
    /**
	 * Used for Admin lead
	 * @return redirect to Admin->lead
	 */
    public function index(Request $request)
    {
    	if (request()->ajax()) {
            return \View::make('admin.lead.index')->renderSections();
        }
    	return view('admin.lead.index');
    }


    /**
	 * Used for Admin get getlead
 	 * @return redirect to Admin->get getlead listing
	 */
    public function getLead(Request $request)
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

        $aTable = Lead::with('property_det');
        
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
                $aTable = $aTable->where('contarct_received',0);   
            }else{
                $aTable = $aTable->where('contarct_received',$contarct_received);       
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
    * @return \Illuminate\Support\Collection
    */
    public function fileExport(Request $request) 
    {
        $data = $request->all();

        $pro_id = isset($data['property']) ? $data['property'] :false;
        $user_id = isset($data['user']) ? $data['user'] :false;
        
        return Excel::download(new PropertyLead($user_id,$pro_id), 'lead-collection.xlsx');
    }

}
