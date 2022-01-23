<?php

namespace App\Exports;

use App\Models\Lead;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PropertyLead implements FromCollection,WithHeadings
{
    private $user_id;
    private $pro_id;

    public function __construct(int $user_id,int $pro_id) 
    {
        $this->user_id = $user_id;
        $this->pro_id = $pro_id;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
		$data = [];
        $user_id = $this->user_id;
        $pro_id = $this->pro_id;

        $aData = Lead::with('property_det');
        if ($user_id) {
            $aData = $aData->whereHas('property_det',function ($query) use($user_id){
                $query->where('seller_id',$user_id);
            });   
        }
        if ($pro_id) {
            $aData = $aData->whereHas('property_det',function ($query) use($pro_id){
                $query->where('property_id',$pro_id);
            });   
        }

        $aData = $aData->get();
    	foreach ($aData as $value) {
            if ($value->property_det->address_type==1) {
                $addre = $value->property_det->address;
            }else{
                $addre = $value->property_det->manual_address;
            }

    		$data[] = [
    			$value->seller_agent = $value->property_det->seller->name ?? 'NA',
    			$value->tranc_coordinator_name = $value->property_det->tranc_coordinator_name ?? 'NA',
    			$value->name = $value->name ?? 'NA',
                $value->email = $value->email,
    			$value->phone = $value->phone,
    			$value->address = $addre,
    			$value->created_at = date('h:i:s A',strtotime($value->created_at)),
    		];
    	}
        return collect($data);
    }


    public function headings(): array
    {
        return [
            'Seller Agent',
            'Transaction Coordinators Name',
            'Name',
            'Email',
            'Phone',
            'Address',
            'Created Date',
        ];
    }
}
