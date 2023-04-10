<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Imports\CategoriesImport;
use App\Jobs\ImportProduct;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class ImportProductsController extends Controller
{

    public function index()
    {
        return view('admin.product.import-products');
    }

    public function importProducts(Request $request)
    {

        $productData   =   file(request()->category_file);

//        $data = Excel::toArray( [], $request->file('category_file'));
        // Chunking file
        $chunks = array_chunk($productData, 1000);
        $header = [];
        $batch  = Bus::batch([])->dispatch();
        foreach ($chunks as $key => $chunk) {
            $data = array_map('str_getcsv', $chunk);
            if ($key === 0) {
                $header = $data[0];
                unset($data[0]);
            }

//            ImportProduct::dispatch($data, $header);
            $batch->add(new ImportProduct($data, $header));
        }

        return $batch;

//        $data = Excel::import( new ImportProduct(), $request->file('category_file'));
//        unset($data[0][0]);
//        \App\Jobs\ImportProduct::dispatch($data);

        dd('done');
    }

}
