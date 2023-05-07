<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use HasFactory;
    use NodeTrait;

    protected $guarded = [];
    protected $appends = ['category_image_url'];
    protected $fillable = ['category_name','slug','category_image'];

    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }

    protected function categoryImageUrl(): Attribute
    {
        return Attribute::make(
            get: fn() => ($this->category_image) ? url('/storage/category/' . $this->category_image) : asset('assets/images/no-preview.png'),
        );
    }
    public function products(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Product::class,'category_id');
    }

    /**
     * @return Collection
     */
    public static function categories(): Collection
    {
        return Category::all();
    }

    /**
     * @return mixed
     */
    public static function categoryTree(): mixed
    {
       return Category::get()->toTree();
    }
}
