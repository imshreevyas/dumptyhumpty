<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commercial extends Model
{
    use HasFactory;
    protected $fillable = [
        'property_uid',
        'property_name',
        'property_type',
        'sale_price',
        'carpet',
        'heights',
        'frontage',
        'self_contained',
        'building_name',
        'location',
        'availability_date',
        'parking',
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
