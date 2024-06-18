<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'merchant_id', 'category_id', 'name', 'description', 'price', 'weight', 'condition', 'image1', 'image2', 'image3', 'image4', 'image5', 'purchase_link_shopee', 'purchase_link_tokopedia', 'purchase_link_lazada', 'purchase_link_tiktokshop',
    ];

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
