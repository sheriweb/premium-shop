<?php

namespace App\Models;

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

}
