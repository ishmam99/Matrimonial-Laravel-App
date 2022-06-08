<?php

namespace App\Models;

use App\Models\ProductCategory;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;

    protected $guarded = ['id'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('default')->singleFile();
    }

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class , 'product_category_id');
    }
    public function productReviews(): HasMany
    {
        return $this->hasMany(ProductReview::class);
    }
    public function packageProduct()
    {
        return $this->hasMany(PackageProduct::class);
    }
}
