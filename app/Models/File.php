<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $appends = ['feature_image_url','image_url'];

    protected $fillable=['name','random','path','fileable_type','file_type','fileable_id','created_at','updated_at'];

    public function fileable(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }
    protected function featureImageUrl(): Attribute
    {
        $imageUrl =self::where('file_type','featureImage')->pluck('path')->first();
        return Attribute::make(
            get: fn () =>  ($imageUrl) ?url('storage/'.$imageUrl) : '',
        );
    }
    protected function ImageUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => ($this->path) ? url('storage/' . $this->path) : asset('assets/images/no-preview.png') ,
        );
    }

}
