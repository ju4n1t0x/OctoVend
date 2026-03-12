<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProductVariant extends Model
{
    protected $fillable = [
        'product_id',
        'sku',
        'color',
        'price',
        'stock',
        'stock_reserved',
        'weight',
        'height',
        'width',
        'length',
        'is_active',

    ];


    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function image(): HasOne
    {
        return $this->hasOne(ProductImage::class);

    }
}
