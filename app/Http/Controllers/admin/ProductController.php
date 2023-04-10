<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\File;
use App\Models\Product;
use App\Models\Store;
use App\Services\admin\ProductService;
use http\Env\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin.product.product-list');
    }
    public function generalProducts(Request $request)
    {
        $generalProducts = $this->productService->showGeneralProducts($request);
        if($request->ajax())
        {
            return view('admin.product.loadGeneralProducts', compact('generalProducts'))->render();
        }
        return view('admin.product.general-product-list',compact('generalProducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $categories=Category::where('parent_id',null)->get();
        $stores = Store::all();
        $product['category_level_l1'] = [];
        $product['category_level_l2']  = [];
        $product['category_level_l3']  = [];

        return view('admin.product.add-product',compact('categories','product','stores'));
    }

    public function generalProduct()
    {
        $categories=Category::where('parent_id',null)->get();
        $product['category_level_l1'] = [];
        $product['category_level_l2']  = [];
        $product['category_level_l3']  = [];
        return view('admin.product.add-general-product',compact('categories','product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {

       return $this->productService->storeProduct($request);
    }


    public function show(Request $request)
    {
      return  $this->productService->productList($request);
    }

    public function showGeneralProducts(Request $request)
    {
        return  $this->productService->showGeneralProducts($request);
    }
    public function getCategoryNodes(Request $request)
    {
       return $this->productService->getCategoryNodes($request->parent_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=Category::where('parent_id',null)->get();
        $product = Product::with('category','files')->where('id',$id)
            ->get()
            ->map(function ($product){
                return $this->productService->productFormat($product);
            });
        $product =$product[0];
        return view('admin.product.add-product',
            compact('categories','product'));
    }
    public function editGeneralProduct($id)
    {
        $categories=Category::where('parent_id',null)->get();
        $product = Product::with('category','files')->where('id',$id)
            ->get()
            ->map(function ($product){
                return $this->productService->productFormat($product);
            });
        $product =$product[0];
        return view('admin.product.add-general-product',
            compact('categories','product'));
    }
    public function deleteProductImage($id)
    {
        try {
            File::find($id)->delete();
            return response()->json([
                'status' => 200,
                'message' =>'Image has been deleted.'
            ]);

        }catch (\Exception $e){

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

}
