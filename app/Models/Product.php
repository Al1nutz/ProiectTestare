<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'img_url',
        'stock',
    ];

    public function category()
    {
        return $this->belongsTo(ProductType::class, 'category_id');
    }
}
