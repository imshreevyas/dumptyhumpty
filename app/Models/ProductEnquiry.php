<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductEnquiry extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_uid',
        'client_name',
        'client_email',
        'client_message',
        'created_at',
        'updated_at',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_uid','product_uid');
    }
}
