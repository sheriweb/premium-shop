<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @package App\Models
 * Class ProductAttribute
 * @property string sku
 * @property string color
 * @property string size
 * @property double quantity
 * @property double price
 * @property double sale_price
 * @property string image
 * @property integer status
 */
class ProductAttribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku',
        'color',
        'size',
        'quantity',
        'price',
        'image',
        'status',
    ];

    /**
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @return HasOne
     */
    public function color(): HasOne
    {
        return $this->hasOne(Color::class);
    }

    /**
     * @return HasOne
     */
    public function size(): HasOne
    {
        return $this->hasOne(Size::class);
    }
}
