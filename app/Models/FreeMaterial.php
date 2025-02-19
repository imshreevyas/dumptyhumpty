<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreeMaterial extends Model
{
    use HasFactory;
    protected $fillable = [
        'file_uid',
        'file_og_name',
        'age_group',
        'file_url',
        'status',
        'created_at',
        'updated_at',
    ];
}
