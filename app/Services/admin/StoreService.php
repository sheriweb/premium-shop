<?php

namespace App\Services\admin;

use App\Helper\HelperFunction;
use App\Models\Product;
use App\Models\Store;
use App\Traits\CommonFunctionTrait;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class StoreService
 * @package App\Services\admin
 */
class StoreService
{
    use CommonFunctionTrait;

    const STORE_MAIN_IMAGE = '/admin-images/store/main-images/';
    const STORE_THUMBNAIL_IMAGE = '/admin-images/store/thumbnail-images/';

    /**
     * @return Collection
     */
    public function getStores(): Collection
    {
        return Store::all();
    }

    /**
     * @param $request
     * @return Store
     */
    public function storeSave($request): Store
    {
        $store = new Store;
        $store->name = $request->name;

        if ($request->file('store_image')) {
            $imageName = $this->StoreImage($request->file("store_image"), public_path(self::STORE_MAIN_IMAGE));
            $store->store_image = $imageName ?? null;
        }

        if ($request->file('store_thumbnail')) {
            $imageName = $this->StoreImage($request->file("store_thumbnail"), public_path(self::STORE_THUMBNAIL_IMAGE));
            $store->store_thumbnail = $imageName ?? null;
        }

        $store->save();

        return $store;
    }

    /**
     * @param $request
     * @return mixed
     */
    public function storeUpdate($request): mixed
    {
        $store = Store::find($request->store_id);
        $store->name = $request->name;

        if ($request->file('store_image')) {
            $imageName = $this->StoreImage($request->file("store_image"), public_path(self::STORE_MAIN_IMAGE));
            $image_path = public_path() . self::STORE_MAIN_IMAGE . $store->store_image;
            unlink($image_path);
            $store->store_image = $imageName;
        }

        if ($request->file('store_thumbnail')) {
            $imageName = $this->StoreImage($request->file("store_thumbnail"), public_path(self::STORE_THUMBNAIL_IMAGE));
            $image_path = public_path() . self::STORE_THUMBNAIL_IMAGE . $store->store_thumbnail;
            unlink($image_path);
            $store->store_image = $imageName;
        }

        $store->update();

        return $store;
    }

    public function storeProduct($request,$store_id)
    {
        $products =  (new Product)->scopeFiltered(Product::query(),$request->all())->get();
        return $products->where('store_id',$store_id)->map(function ($products) {
            return $this->formatProduct($products);
        });
    }

    /**
     * @param $request
     * @param $categoryId
     * @return mixed
     */
    public function categoryProduct($request,$categoryId)
    {
        $products =  (new Product)->scopeFiltered(Product::query(),$request->all())->get();
        return $products->where('category_id',$categoryId)->map(function ($products) {
            return $this->formatProduct($products);
        });
    }

    public function formatProduct($product)
    {
        return [
            'productId'   => $product->id,
            'productName' => $product->product_name,
            'productSlug' => $product->product_slug,
            'description' => $product->description,
            'image'       => $product->attributes->first()->image ?? '',
            'price'       => $product->attributes->first()->price ?? '',
            'sku'         => $product->attributes->first()->sku ?? '',
            'quantity'    => $product->attributes->first()->quantity ?? '',
        ];
    }
}
