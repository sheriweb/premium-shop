<?php

namespace App\Services\admin;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\Size;
use App\Traits\CommonFunctionTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use DataTables;

class ProductService
{
    use CommonFunctionTrait;

    const STORE_ATTRIBUTE_IMAGES = '/admin-images/attribute-images/';

    protected $product, $category;

    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category = $category;
    }

    /**
     * @return array
     */
    public function createProduct(): array
    {
        $result['productAttrArr'][0]['measurement_unit'] = '';
        $result['productAttrArr'][0]['attr_image'] = '';
        $result['productAttrArr'][0]['mrp'] = '';
        $result['productAttrArr'][0]['s_price'] = '';
        $result['productAttrArr'][0]['qty'] = '';
        $result['productAttrArr'][0]['size_id'] = '';
        $result['productAttrArr'][0]['color_id'] = '';
        $result['product_subCategory'] = [];
        $result['category_subCategory'] = [];
        $result['color'] = Color::all();
        $result['size'] = Size::all();

        return $result;
    }

    public function storeProduct($request)
    {
        try {
            $productData = $request->all();
            foreach ($productData['category_id'] as $val) {
                if ($val != null) {
                    $category_id = $val;
                }
            }

            $productData['category_id']  = $category_id;
            $productData['product_slug'] = Str::slug($productData['product_name']);
            $product                     = $this->product->find($productData['product_id']);

            if ($product) {
                $product->update($productData);
                $product_id      = $product->id;
                $product_section = $product->product_section;
                $message         = 'Product update successfully.';
            } else {

                $product    = $this->product->create($productData);
                $productId = $product->id;
                /* start product Attr save */
                $skuArr        = $request->sku;
                $priceArr      = $request->price;
                $qtyArr        = $request->quantity;
                $color_nameArr = $request->color_name;
                $size_nameArr  = $request->size_name;
                $image_attrArr = $request->image_attr;
                $addAttr       = [];

                foreach ($skuArr as $key => $value) {
                    if ($image_attrArr) {
                        if ($request->hasFile('image_attr')) {
                            $imageName = $this->StoreImage($request->file("image_attr.$key"), public_path(self::STORE_ATTRIBUTE_IMAGES));
                        }
                    }

                    $productAttrArr = array(
                        'product_id' => $productId,
                        'color_id'   => $color_nameArr[$key],
                        'size_id'    => $size_nameArr[$key],
                        'sku'        => $skuArr[$key],
                        'quantity'   => $qtyArr[$key],
                        'price'      => $priceArr[$key],
                        'image'      => (isset($imageName)) ? $imageName : null,
                        'status'     => 1,
                    );

                    array_push($addAttr, $productAttrArr);
                }

                ProductAttribute::insert($addAttr);

                $product_section = $product->product_section;
                $message = 'Product add successfully.';
            }

            /*if ($request->hasFile('product_upload')) {
                foreach ($request->file('product_upload') as $key => $file) {
                    $file = $request->file("product_upload.$key");
                    $filenameWithExt = $file->getClientOriginalName();
                    $randomName = Str::random(20) . $filenameWithExt;
                    $getImagePath = 'productImages/' . $randomName;
                    $path = $file->storeAs($storagePath, $randomName, 'local');
                    $product->files()->create([
                        'name' => $filenameWithExt,
                        'random' => $randomName,
                        'path' => $getImagePath,
                        'file_type' => 'productUpload'
                    ]);
                }
            }*/

            /*if ($request->hasFile('feature_image')) {
                $file = $request->file("feature_image");
                $file_type = 'featureImage';
                if ($product->files->where('file_type', 'featureImage')->first()) {
                    $product->files->where('file_type', 'featureImage')->first()->delete();
                }
                $this->uploadImage($file, $storagePath, $product, $file_type);
            }
            if ($request->hasFile('image_thumbnail')) {
                if ($product->files->where('file_type', 'imageThumbnail')->first()) {
                    $product->files->where('file_type', 'imageThumbnail')->first()->delete();
                }
                $file = $request->file("image_thumbnail");
                $file_type = 'imageThumbnail';
                $this->uploadImage($file, $storagePath, $product, $file_type);
            }*/
            $status = 200;
        } catch (\Exception $e) {
            $message = $e->getMessage();
            $status = 400;
            $product_section = '';
        }
        return response()->json([
            'status' => $status,
            'message' => $message,
            'product_section' => $product_section
        ]);
    }

    public function getCategoryNodes($id)
    {
        $nodes = $this->category->where('parent_id', $id)->get();
        return $nodes;
    }

    public function productList($request)
    {
        if ($request->ajax()) {
            $data = $this->product->with('files', 'category')->where('product_section', '!=', 'generalProduct')->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('category', function ($row) {

                    return $row->category->category_name;
                })
                ->addColumn('product', function ($row) {
                    $path = $this->getProductImage($row, 'featureImage');
                    $image = '<img src="' . $path . '" style="height: 50px; width: 50px;">';
                    return $image;
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '
                            <a href="/edit-product/' . $row->id . '"><span class="edit-category" product-id="' . $row->id . '" ><i class="icofont-ui-edit text-primary"></i></span></a>
                            <span><i class="icofont-ui-delete text-success "></i></span>
                    ';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'category', 'product'])
                ->make(true);
        }
    }

    public function showGeneralProducts($request)
    {
        $search = $request->search;
        return $this->product->with('files', 'category')
            ->where('product_section', 'generalProduct')
            ->when($search, function ($query) use ($search) {
                return $query->where('product_name', 'like', '%' . $search . '%')
                    ->orWhere('brand', 'like', '%' . $search . '%');
            })
            ->paginate(10)
            ->through(function ($product) {
                return $this->productFormat($product);
            });;

//        if ($request->ajax()) {
//            $data = $this->product->with('files', 'category')->where('product_section','generalProduct')->get();
//
//            return Datatables::of($data)
//                ->addIndexColumn()
//                ->addColumn('category', function ($row) {
//
//                    return $row->category->category_name;
//                })
//                ->addColumn('product', function ($row) {
//                    $path = $this->getProductImage($row,'imageThumbnail');
//                    $image = '<img src="' . $path . '" style="height: 50px; width: 50px;">';
//                    return $image;
//                })
//                ->addColumn('action', function ($row) {
//                    $actionBtn = '
//                            <a href="/edit-general-product/' . $row->id . '"><span class="edit-category" product-id="' . $row->id . '" ><i class="icofont-ui-edit text-primary"></i></span></a>
//                            <span><i class="icofont-ui-delete text-success "></i></span>
//                    ';
//                    return $actionBtn;
//                })
//                ->rawColumns(['action', 'category', 'product'])
//                ->make(true);
//        }
    }

    public function productFormat($product)
    {
        $categories = [];
        $categories_id = [];
        $ancestorsAndSelf = $this->category->ancestorsAndSelf($product->category_id);
        foreach ($ancestorsAndSelf as $key => $cat) {
            $categories_id['sub_category_l' . $key . '_id'] = $cat->id;
            $categories['category_level_l' . $key + 1] = $this->category->where('parent_id', $cat->id)->get();
        }

        return [
            'id' => $product->id,
            'category_id' => $product->category_id,
            'category_name' => $product->category->category_name,
            'category_image' => $product->category->category_image_url,
            'parent_category_id' => (isset($categories_id['sub_category_l0_id'])) ? $categories_id['sub_category_l0_id'] : null,
            'sub_category_l1_id' => (isset($categories_id['sub_category_l1_id'])) ? $categories_id['sub_category_l1_id'] : null,
            'sub_category_l2_id' => (isset($categories_id['sub_category_l2_id'])) ? $categories_id['sub_category_l2_id'] : null,
            'sub_category_l3_id' => (isset($categories_id['sub_category_l3_id'])) ? $categories_id['sub_category_l3_id'] : null,
            'sku' => $product->sku,
            'product_name' => $product->product_name,
            'product_slug' => $product->product_slug,
            'short_description' => $product->short_description,
            'long_description' => $product->long_description,
            'is_featured' => $product->is_featured,
            'price' => $product->price,
            'refurbished_quantity' => $product->refurbished_quantity,
            'retail_price' => $product->retail_price,
            'refurbished_price' => $product->refurbished_price,
            'sale_refurbished_price' => $product->sale_refurbished_price,
            'quantity' => $product->quantity,
            'brand' => $product->brand,
            'weight' => $product->weight,
            'dimensions' => $product->dimensions,
            'capacity' => $product->capacity,
            'capacity_watts' => $product->capacity_watts,
            'technology' => $product->technology,
            'processing_speed' => $product->processing_speed,
            'no_of_ports' => $product->no_of_ports,
            'memory' => $product->memory,
            'storage' => $product->storage,
            'screen_size' => $product->screen_size,
            'form_factor' => $product->form_factor,
            'generation' => $product->generation,
            'product_type' => $product->product_type,
            'cache_type' => $product->cache_type,
            'screen_resolution' => $product->screen_resolution,
            'description' => $product->description,
            'specification' => $product->specification,
            'read_before_order' => $product->read_before_order,
            'product_section' => $product->product_section,
            'status' => $product->status,
            'feature_image_url' => $this->getProductImage($product, 'featureImage'),
            'thumbnail_image_url' => $this->getProductImage($product, 'imageThumbnail'),
            'images' => $this->getProductImages($product->files),
            'category_level_l1' => (isset($categories['category_level_l1'])) ? $categories['category_level_l1'] : null,
            'category_level_l2' => (isset($categories['category_level_l2'])) ? $categories['category_level_l2'] : null,
            'category_level_l3' => (isset($categories['category_level_l3'])) ? $categories['category_level_l3'] : null,
        ];
    }

    public function getProductImages($files)
    {

        $images = [];
        if (json_decode(json_encode($files), TRUE)) {
            foreach ($files as $file) {
                if ($file->file_type == 'productUpload') {
                    $images[] = ['id' => $file->id, 'name' => $file->name, 'url' => url('storage/' . $file->path)];
                }
            }
        }
        return $images;

    }

    public function getProductImage($product, $image)
    {
        $imageData = $product->files->where('file_type', $image)->first();
        return ($imageData) ? url('/storage/' . $imageData->path) : asset('assets/images/no-preview.png');
    }


    public function uploadImage($file, $storagePath, $product, $file_type)
    {

        $filenameWithExt = $file->getClientOriginalName();
        $randomName = Str::random(20) . $filenameWithExt;
        $getImagePath = 'productImages/' . $randomName;
        $path = $file->storeAs($storagePath, $randomName, 'local');
        $product->files()->create([
            'name' => $filenameWithExt,
            'random' => $randomName,
            'path' => $getImagePath,
            'file_type' => $file_type
        ]);
    }

}
