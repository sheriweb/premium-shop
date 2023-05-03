<?php
namespace App\Traits;

use App\Models\Store;
use Illuminate\Http\Request;

trait CommonFunctionTrait {

    /**
     * @param $image
     * @param $path
     * @return string
     */
    function StoreImage($image = null, $path = null): string
    {
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $rand = rand(00000000, 99999999);
        $extension = $image->getClientOriginalExtension();
        $filename = $rand . '.' . $extension;
        $image->move($path, $filename);

        return $filename;
    }

    public function storeProduct($slug)
    {
        $storeProduct =  Store::where('slug','=',$slug)->with('products')->get();
    }
}
