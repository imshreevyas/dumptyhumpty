<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_uid',
        'category_uid',
        'product_name',
        'long_desc',
        'product_assets',
        'product_specification_assets',
        'view_count',
        'status',
        'created_at',
        'updated_at'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_uid','category_uid');
    }
}
