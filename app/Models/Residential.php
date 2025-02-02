<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Residential extends Model
{
    use HasFactory;
    protected $fillable = [
        'property_uid',
        'property_name',
        'property_type',
        'sale_price',
        'carpet',
        'parking',
        'floor',
        'location',
        'furnished',
        'building_age',
        'landmark',
        'property_assets',
        'property_details',
        'created_at',
        'updated_at',
        'status'
    ];
}
