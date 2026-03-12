<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductImage extends Model
{
    protected $fillable = [

        'product_variant_id',
        'url'
    ];

    public function productVariant(): BelongsTo
    {
        return $this->belongsTo(ProductVariant::class );
    }
}
