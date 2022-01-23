<?php

namespace App\Exports;

use App\Models\Property;
use App\Models\PropertyDuration;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PropertyExport implements FromCollection,WithHeadings
{
    private $user_id;
    private $offer_status;
    private $listing_status;

    public function __construct(int $user_id,int $offer_status,int $listing_status) 
    {
        $this->user_id = $user_id;
        $this->offer_status = $offer_status;
        $this->listing_status = $listing_status;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	$data = [];
        $user_id = $this->user_id;
        $offer_status = $this->offer_status;
        $listing_status = $this->listing_status;

        $aData = Property::with('seller');
        if ($user_id) {
            $aData = $aData->where('seller_id',$user_id);   
        }
        if ($offer_status) {
            if ($offer_status==4) {
                $aData = $aData->where('offer_status',0);
            }else{
                $aData = $aData->where('offer_status',$offer_status);
            }
        }
        if ($listing_status) {
            if ($listing_status==5) {
                $aData = $aData->where('listing_status',0);   
            }else{
                $aData = $aData->where('listing_status',$listing_status);   
            }
        }

        $aData = $aData->get();
    	$aDurationData = PropertyDuration::get();
    	foreach ($aData as $value) {
    		//OFFER STTAUS
    		if ($value->offer_status==0) {
    			$offer_status = 'Pending';
    		}elseif ($value->offer_status==1) {
    			$offer_status = 'Accepted';
    		}elseif ($value->offer_status==2) {
    			$offer_status = 'Denied';
    		}elseif ($value->offer_status==3) {
    			$offer_status = 'Waiting';
    		}
    		//Listing Status
    		if ($value->listing_status==0) {
    			$listing_status = 'Inactive';
    		}elseif ($value->listing_status==1) {
    			$listing_status = 'Active';
    		}elseif ($value->listing_status==2) {
    			$listing_status = 'Under Contract';
    		}elseif ($value->listing_status==3) {
    			$listing_status = 'Closed';
    		}elseif ($value->listing_status==4) {
    			$listing_status = 'Contract Signed';
    		}
    		
    		$checked_settel = [];
	        $checked_finan = [];
	        $checked_appr = [];
	        $checked_inspect = [];
	        $checked_home_s = [];
	        $checked_settel_date = $value->settlement_date ? json_decode($value->settlement_date):[];
	        $checked_finance = $value->finance ? json_decode($value->finance):[];
	        $checked_appraisal = $value->appraisal ? json_decode($value->appraisal):[];
	        $checked_inspection = $value->inspection ? json_decode($value->inspection):[];
	        $checked_home_sale = $value->home_sale ? json_decode($value->home_sale):[];
	        foreach($aDurationData as $duval){
	            //SETTELMENT DATE 
	            foreach($checked_settel_date as $val){
	              if($duval->p_duration_id==$val){
	                $checked_settel[] = $duval->duration;
	              }
	            }
	            //FINANCING DATE 
	            foreach($checked_finance as $val){
	              if($duval->p_duration_id==$val){
	                $checked_finan[] = $duval->duration;
	              }
	            }
	            //APPRAISAL DATE 
	            foreach($checked_appraisal as $val){
	              if($duval->p_duration_id==$val){
	                $checked_appr[] = $duval->duration;
	              }
	            }
	            //APPRAISAL DATE 
	            foreach($checked_inspection as $val){
	              if($duval->p_duration_id==$val){
	                $checked_inspect[] = $duval->duration;
	              }
	            }
	            //HOME SALE 
	            foreach($checked_home_sale as $val){
	              if($duval->p_duration_id==$val){
	                $checked_home_s[] = $duval->duration;
	              }
	            }
	        }

	        //FINAL RESULT
	        $checked_settel_date = implode(",", $checked_settel);
	        $checked_finance = implode(",", $checked_finan);
	        $checked_appraisal = implode(",", $checked_appr);
	        $checked_inspection = implode(",", $checked_inspect);
	        $checked_home_sale = implode(",", $checked_home_s);

            if ($value->address_type==1) {
                $addre = $value->address;
            }else{
                $addre = $value->manual_address;
            }
            
    		$data[] = [
    			$value->tranc_coordinator_name = $value->tranc_coordinator_name ?? 'NA',
    			$value->realtors_name = $value->realtors_name ?? 'NA',
    			$value->address = $addre ?? 'NA',
    			$value->listing_price = $value->listing_price ?? 'NA',
    			$value->min_sales_price = $value->min_sales_price ?? 'NA',
    			$value->seller_concessions = $value->seller_concessions ?? 'NA',
    			$value->settlement_date = $checked_settel_date ?? 'NA',
    			$value->emd = $value->emd ?? 'NA',
    			$value->due_diligence = $value->due_diligence ?? 'NA',
    			$value->finance = $checked_finance ?? 'NA',
    			$value->appraisal = $checked_appraisal ?? 'NA',
    			$value->inspection = $checked_inspection ?? 'NA',
    			$value->home_sale = $checked_home_sale ?? 'NA',
    			$value->insurance = $value->insurance ?? 'NA',
    			$value->property_tax = $value->property_tax ?? 'NA',
    			$value->other_fee = $value->other_fee ?? 'NA',
    			$value->listing_status = $listing_status,
    			$value->offer_status = $offer_status,
    			$value->created_at = date('h:i:s A',strtotime($value->created_at)),
    		];
    	}
        return collect($data);
    }
    public function headings(): array
    {
        return [
            'Transaction Coordinators Name',
            'Realtors Name',
            'Address',
            'Listing Price',
            'Min Sales Price',
            'Seller Concessions',
            'Settlement Date',
            'EMD',
            'Due Diligence',
            'Financing Contingency',
            'Appraisal Contingency',
            'Inspection Contingency',
            'Home Sale Contingency',
            'Insurance',
            'Property Taxes',
            'Other fees',
            'Listing Status',
            'Offer Status',
            'Created Date',
        ];
    }
}
