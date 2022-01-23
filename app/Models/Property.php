<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $primaryKey = "property_id";

    protected $fillable = [
        'seller_id','tranc_coordinator_name','realtors_name','address_type','address','manual_address','latitude','longitude','city','state','country','zip_code','listing_price','min_sales_price','seller_concessions','settlement_date','emd','due_diligence','finance','appraisal','inspection','home_sale','insurance','property_tax','other_fee','listing_status','offer_status','created_at','updated_at',
    ];

    public function images()
    {
        return $this->hasMany(PropertyImage::class, 'property_id');
    }
    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id','user_id');
    }
}
