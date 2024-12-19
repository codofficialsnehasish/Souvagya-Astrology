<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use InteractsWithMedia;
    
    public function product_subcategories()
    {
        return $this->hasMany(ProductCategory::class, 'product_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories', 'product_id', 'category_id');
    }

    public function addons()
    {
        return $this->hasMany(AddonsProducts::class, 'product_id', 'id');
    }

    public function addon_products()
    {
        return $this->belongsToMany(Product::class,AddonsProducts::class,'product_id', 'addons_id');
    }

    public function complamentary()
    {
        return $this->hasMany(ComplementaryProducts::class, 'product_id', 'id');
    }

    public function complamentary_products()
    {
        return $this->belongsToMany(Product::class,ComplementaryProducts::class,'product_id', 'complamentary_id');
    }
}
