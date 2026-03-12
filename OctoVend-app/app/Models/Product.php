<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'category_id',
        'is_active',

    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function productVariants(): HasMany
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function images(): HasManyThrough
    {
        return $this->hasManyThrough(ProductImage::class, ProductVariant::class);
    }

}
