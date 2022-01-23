<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $primaryKey = "lead_id";

    public function property_det()
    {
        return $this->belongsTo(Property::class, 'property_id')->with('seller');
    }
}
