<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $primaryKey = "offer_id";

    public function property_det()
    {
        return $this->belongsTo(Property::class, 'property_id')->with('seller');
    }
}
