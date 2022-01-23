<?php

namespace App\Exports;

use App\Models\Offer;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PropertyOffer implements FromCollection,WithHeadings
{

    private $user_id;
    private $pro_id;
    private $type;
    private $contarct;

    public function __construct(int $user_id,int $pro_id,int $type,int $contarct) 
    {
        $this->user_id = $user_id;
        $this->pro_id = $pro_id;
        $this->type = $type;
        $this->contarct = $contarct;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $data = [];
        $user_id = $this->user_id;
        $pro_id = $this->pro_id;
        $type = $this->type;
        $contarct = $this->contarct;

        $aData = Offer::with('property_det');
        if ($user_id) {
            $aData = $aData->whereHas('property_det',function ($query) use($user_id){
                $query->where('seller_id',$user_id);
            });
        }else if ($pro_id) {
            $aData = $aData->whereHas('property_det',function ($query) use($pro_id){
                $query->where('property_id',$pro_id);
            });   
        }
        if ($type) {
            $aData = $aData->where('user_type',$type);
        }
        if ($contarct) {
            if ($contarct==2) {
                $aData = $aData->where('contract_received',0);
            }else{
                $aData = $aData->where('contract_received',$contarct);
            }
        }
        $aData = $aData->get();
        foreach ($aData as $value) {
            if ($value->property_det->address_type==1) {
                $addre = $value->property_det->address;
            }else{
                $addre = $value->property_det->manual_address;
            }

            $user_type = $value->user_type==1?'Buyer':'Buyer Agent';
            $contract_received = $value->contract_received==1?'Yes':'No';
            $data[] = [
                $value->seller_agent = $value->property_det->seller->name ?? 'NA',
                $value->tranc_coordinator_name = $value->property_det->tranc_coordinator_name ?? 'NA',
                $value->name = $value->name,
                $value->user_type = $user_type,
                $value->email = $value->email,
                $value->phone = $value->phone,
                $value->address = $addre,
                $value->buyer_offer = $value->buyer_offer ?? 'NA',
                $value->contract_received = $contract_received,
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
            'Type',
            'Email',
            'phone',
            'Address',
            'Offer Sale price',
            'Contract Received',
            'Created Date',
        ];
    }
}
