<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'sku',
        'category_id',
        'supplier_id',
        'unit_id',
        'description',
        'price',
        'cost_price',
        'quantity',
        'low_stock_alert',
        'image_path',
        'barcode',
        'is_active',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function supplier(){
        return $this->belongsto(Supplier::class);
    }
    public function unit(){
        return $this->belongsTo(Unit::class);
    }
    public function getImageUrlAttribute()
    {
        return $this->image_path ? asset('storage/' . $this->image_path) : null;
    }
}
