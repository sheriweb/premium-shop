<?php

namespace App\Models;

use App\Helper\HelperFunction;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\File;
use App\Models\Category;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @package App\Models
 * Class Product
 * @property integer category_id
 * @property integer store_id
 * @property string product_name
 * @property string product_slug
 * @property string product_section
 * @property string description
 * @property string specification
 * @property string read_before_order
 * @property integer status
 */
class Product extends Model
{
    use HasFactory;

    const PRODUCT_SECTION = [
        'newProductSection' => 'New product section',
        'featureProductSection' => 'Feature product section',
        'dealOfTheDaySection' => 'Deal of the day section',
        'featureHeaderSection' => 'Feature Header section',
    ];

    protected $fillable=[
                'category_id',
                'store_id',
                'product_name',
                'product_slug',
                'product_section',
                'description',
                'specification',
                'read_before_order',
                'status',
                'created_at',
                'updated_at',
    ];
    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return BelongsTo
     */
    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    /**
     * @return HasMany
     */
    public function attributes(): HasMany
    {
        return $this->hasMany(ProductAttribute::class);
    }
//    protected function price(): Attribute
//    {
//        return Attribute::make(
//            get: fn () => number_format($this->price, 2) ,
//        );
//    }

    public function scopeFiltered($query, $filters)
    {

        if (!empty($filters['price'])) {
            $query->whereHas('attributes', function ($query) use ($filters) {
                $query->where(function ($query) use ($filters) {
                    foreach ($filters['price'] as $range) {
                        $priceRange = HelperFunction::getPriceRange($range);
                        if ($priceRange['range_type'] == 'between') {
                            $query->orWhereBetween('price', [$priceRange['min_price'], $priceRange['max_price']]);
                        } else {
                            $query->orWhere('price', '>=', $priceRange['max_price']);
                        }
                    }
                });
            });
        }

        if (!empty($filters['color'])) {
            $query->whereHas('attributes', function ($query) use ($filters) {
                $query->whereIn('color_id', $filters['color']);
            });
        }

        if (!empty($filters['size'])) {
            $query->whereHas('attributes', function ($query) use ($filters) {
                $query->whereIn('size_id', $filters['size']);
            });
        }

        return $query;
    }
}
