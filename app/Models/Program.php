<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_uid',
        'name', 
        'banner',
        'title',
        'short_description',
        'long_description',
        'learning_areas',
        'activities',
        'age_group',
        'duration_for_week',
        'duration',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'schema',
        'status',
        'created_at',
        'updated_at',
    ];
}
