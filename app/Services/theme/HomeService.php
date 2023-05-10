<?php

namespace App\Services\theme;

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use App\Services\admin\ProductService;
use App\Services\ConstantService;
use App\Services\OrderService;
use App\Services\UserService;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;

class HomeService
{

    public static $currencyFormat = 'Rs:';

    public static function calculatePriceDifference($price, $retailPrice)
    {
        if ($price > $retailPrice) {
            $increasePrice = $price - $retailPrice;
            $calculatedDifference = ($increasePrice / $price) * 100;
            return number_format((float)$calculatedDifference, 2, '.', '');
        } else {
            $decreasePrice = $retailPrice - $price;
            $calculatedDifference = ($decreasePrice / $retailPrice) * 100;
            return number_format((float)$calculatedDifference, 2, '.', '');
        }


    }


    private $product, $user, $order, $category, $productService;

    public function __construct(Product $product, Category $category, UserService $user, OrderService $order, ProductService $productService)
    {
        $this->product = $product;
        $this->category = $category;
        $this->user = $user;
        $this->order = $order;
        $this->productService = $productService;
    }

    public function getHomeProducts($section, $status)
    {

        return $this->product->where('product_section', $section)
            ->where('status', $status)
            ->orderBy('id', 'desc')->get()
            ->map(function ($products) {
                return $this->productFormat($products);
            });

    }

    public function getLimitedHomeProducts($section, $status, $limit)
    {
        return $this->product->with('files')
            ->where('product_section', $section)
            ->where('status', $status)
            ->orderBy('created_at', 'desc')
            ->get()->skip(0)->take($limit)
            ->map(function ($feature_product) {
                return $this->productFormat($feature_product);
            });
    }

    public function productFormat($product)
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

    public function getImage($product, $imageType)
    {
        $productFile = $product->files->where('file_type', $imageType)->first();
        return ($productFile) ? url('storage/' . $productFile->path) : asset('assets/images/no-preview.png');


    }

    public function getHomecategories()
    {
        return $this->category->get()->toTree()
            ->map(function ($categoryTree) {
                return [
                    "id" => $categoryTree->id,
                    "category_name" => $categoryTree->category_name,
                    "slug" => $categoryTree->slug,
                    "category_image_url" => $categoryTree->category_image_url,
                    "category_home_image" => $this->getImage($categoryTree, 'categoryHomeImage'),
                    "category_L1" => $categoryTree->children
                ];
            });

    }

    public function addToCart($request)
    {
        $prod_id = $request->input('product_id');
        $productType = $request->input('productType');
        $selectedProductType = $request->input('selectedProductType');
        $quantity = ($request->qty > 0) ? $request->qty : 1;
        $product = $this->getProduct($prod_id);


        if (Cookie::get('shopping_cart')) {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart = json_decode($cookie_data, true);
            $cart_data = (isset($cart['cart_items'])) ? $cart['cart_items'] : $cart;
        } else {
            $cart_data = array();
        }

        $item_id_list = array_column($cart_data, 'item_id');
        $prod_id_is_there = $prod_id;
        /*check product stock is available*/

        if (in_array($prod_id_is_there, $item_id_list)) {
            foreach ($cart_data as $keys => $values) {
                if ($cart_data[$keys]["item_id"] == $prod_id) {
//                      $cart_data[$keys]["item_quantity"] = 1;
                    $item_data = json_encode($cart_data);
                    $minutes = 240;
                    Cookie::queue('shopping_cart', $item_data, $minutes);
                    return response()->json([
                        'status' => 500,
                        'message' => '"' . $cart_data[$keys]["item_name"] . '" Already Added to Cart', 'status2' => '2'
                    ]);
                }
            }
        } else {

            $prod_name = $product['product_name'];
            $prod_image = $product['thumbnail_image'];

            if ($productType == 'bothType') {
                if ($selectedProductType == 'new') {
                    if ($product['quantity'] > 0) {
                        $price = $product['price'];
                        $retail_price = $product['retail_price'];
                    } else {
                        return response()->json([
                            'message' => 'This product is out of stock.',
                            'status' => 300
                        ]);
                    }
                } else {
                    if ($product['refurbished_quantity'] > 0) {
                        $price = $product['refurbished_price'];
                        $retail_price = $product['sale_refurbished_price'];
                    } else {
                        return response()->json([
                            'message' => 'This product is out of stock.',
                            'status' => 300
                        ]);
                    }
                }
            } elseif ($productType == 'new') {
                if ($product['quantity'] > 0) {
                    $price = $product['price'];
                    $retail_price = $product['retail_price'];
                } else {
                    return response()->json([
                        'message' => 'This product is out of stock.',
                        'status' => 300
                    ]);
                }
            } else {
                if ($product['refurbished_quantity'] > 0) {
                    $price = $product['refurbished_price'];
                    $retail_price = $product['sale_refurbished_price'];
                } else {
                    return response()->json([
                        'message' => 'This product is out of stock.',
                        'status' => 300
                    ]);
                }
            }

        }

        if ($product) {
            $item_array = array(
                'item_id' => $prod_id,
                'item_name' => $prod_name,
                'item_quantity' => $quantity,
                'item_price' => $price,
                'item_retail_price' => $retail_price,
                'item_image' => $prod_image,
                'item_type' => $productType,
                'item_selected' => $selectedProductType,
                'shipping_status' => false
            );
             array_push($cart_data,$item_array);;
            $cart['cart_items'] = $cart_data;
            $item_data = json_encode($cart);
            $minutes = 240;

            Cookie::queue('shopping_cart', $item_data, $minutes);

            return response()->json([
                'status' => 200,
                'message' => '"' . $prod_name . '" Added to Cart'
            ]);
        }


    }

    public function loadCart()
    {
        $sub_total = 0;
        $cart = [];
        if (Cookie::get('shopping_cart')) {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
             $shipping =  isset($cart_data['shipping']) ? $cart_data['shipping'] : 0;
             $cart['user'] = isset($cart_data['user']) ? $cart_data['user'] : [];
            $cart['shipping'] = $shipping;
            $cart_data = isset($cart_data['cart_items']) ?  $cart_data['cart_items'] : $cart_data;
            $cart["shipping_calculated"] = true;
            foreach ($cart_data as $keys => $values) {
                $sub_total += $cart_data[$keys]["item_price"] * $cart_data[$keys]["item_quantity"];
                $cart_data[$keys]["total_price"] = $cart_data[$keys]["item_price"] * $cart_data[$keys]["item_quantity"];
                if(!$cart_data[$keys]["shipping_status"]){
                    $cart["shipping_calculated"] = false;
                }
            }
            $item_data = json_encode($cart_data);


            $cart['cart_items'] = $item_data;
            $cart['sub_total'] = $sub_total + $shipping;

            $cart['total_cart_items'] = count($cart_data);
            return json_encode($cart);
        } else {
            $item_data = json_encode([]);
            $cart['cart_items'] = $item_data;
            $cart['sub_total'] = $sub_total;
            $cart['shipping'] = isset($cart_data['shipping']) ? $cart_data['shipping'] : 0;
            $cart['total_cart_items'] = 0;
            return json_encode($cart);

        }
    }

    public function updateToCart(Request $request)
    {
        $prod_id = $request->input('product_id');
        $quantity = $request->input('quantity');
        $product = $this->getProduct($prod_id);
        if (Cookie::get('shopping_cart')) {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);

            $item_id_list = array_column($cart_data['cart_items'], 'item_id');
            $prod_id_is_there = $prod_id;

            if (in_array($prod_id_is_there, $item_id_list)) {
                foreach ($cart_data['cart_items'] as $keys => $values) {
                    if ($cart_data['cart_items'][$keys]["item_id"] == $prod_id) {
                        if ($cart_data['cart_items'][$keys]["item_type"] == 'bothType') {
                            if ($cart_data['cart_items'][$keys]["item_selected"] == 'new') {
                                if ($product['quantity'] >= $quantity) {
                                    $cart_data['cart_items'][$keys]["item_quantity"] = $quantity;
                                    $cart_data['cart_items'][$keys]["shipping_status"] = false;
                                } else {
                                    return response()->json([
                                        'message' => 'This product is out of stock.',
                                        'status' => 300
                                    ]);
                                }
                            } else {
                                if ($product['refurbished_quantity'] >= $quantity) {
                                    $cart_data['cart_items'][$keys]["item_quantity"] = $quantity;
                                    $cart_data['cart_items'][$keys]["shipping_status"] = false;
                                } else {
                                    return response()->json([
                                        'message' => 'This product is out of stock.',
                                        'status' => 300
                                    ]);
                                }
                            }
                        } elseif ($cart_data['cart_items'][$keys]["item_type"] == 'new') {
                            if ($product['quantity'] >= $quantity) {
                                $cart_data['cart_items'][$keys]["item_quantity"] = $quantity;
                                $cart_data['cart_items'][$keys]["shipping_status"] = false;
                            } else {
                                return response()->json([
                                    'message' => 'This product is out of stock.',
                                    'status' => 300
                                ]);
                            }
                        } else {
                            if ($product['refurbished_quantity'] >= $quantity) {
                                $cart_data['cart_items'][$keys]["item_quantity"] = $quantity;
                                $cart_data['cart_items'][$keys]["shipping_status"] = false;
                            } else {
                                return response()->json([
                                    'message' => 'This product is out of stock.',
                                    'status' => 300
                                ]);
                            }
                        }

                        $item_data = json_encode($cart_data);
                        $minutes = 240;
                        Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                        return response()->json(['status' => '"' . $cart_data['cart_items'][$keys]["item_name"] . '" Quantity Updated']);
                    }
                }
            }
        }
    }

    public function deleteToCart(Request $request)
    {
        $prod_id = $request->input('product_id');
        $cart['cart_items'] = [];
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);
        $cart_items = isset($cart_data['cart_items']) ? $cart_data['cart_items'] : $cart_data ;
        $item_id_list = array_column($cart_items, 'item_id');
        $prod_id_is_there = $prod_id;

        if (in_array($prod_id_is_there, $item_id_list)) {
            foreach ($cart_items as $keys => $values) {
                if ($cart_items[$keys]["item_id"] == $prod_id) {
                    unset($cart_items[$keys]);
                    $cart['cart_items'] = $cart_items;
                    $item_data = json_encode($cart);
                    $minutes = 240;
                    Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                    return response()->json(['status' => 'Item Removed from Cart']);
                }
            }
        }

        if(count($cart['cart_items']) == 0){
            Cookie::queue(Cookie::forget('shopping_cart'));
        }
    }

    public function getUserTempId($request)
    {
//        $prod_id = $request->input('product_id');
//        $quantity = $request->input('quantity');
//        if(Cookie::get('shopping_cart'))
//        {
//            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
//            $cart_data = json_decode($cookie_data, true);
//        }
//        else
//        {
//            $cart_data = array();
//        }
//        $item_id_list = array_column($cart_data, 'item_id');
//        $prod_id_is_there = $prod_id;

//        Session::put('USER_TEMP_ID','123456');
//        dd(Session::get('USER_TEMP_ID'));
//        $request->withCookie(cookie('name', 'virat'));
//        dd($request->cookie('name'));
//        $id = Session()->get('USER_TEMP_ID');
//        if($id){
//            $rand = rand(111111111,999999999);
//            Session()->put('USER_TEMP_ID', $rand);
//            $request->session()->put('USER_TEMP_ID',$rand);
//            session(['USER_TEMP_ID' => $rand]);
//            session::save();
//            return $rand;
//        }
//        return session::get('USER_TEMP_ID');
    }

    public function getProduct($id = null, $slug = null, $type = null, $option = null)
    {

        $products = $this->product->with('files');
        if ($type != null) {
            $products = $products->where($type, $id);
        }
        if ($id != null) {
            $products = $products->where('id', $id);
        }
        if ($slug != null) {
            $products = $products->where('product_slug', $slug);
        }

        $products = $products->get();
        $products = $products->map(function ($products) {
            return $this->productFormat($products);
        });

        if (count($products->toArray()) > 0) {
            return ($type == null) ? $products[0] : $products;
        }

        return false;


    }

    public function placeOrder($request)
    {
        DB::beginTransaction();
        try {

            $cart = json_decode($this->loadCart());
            info('cart');
            info(json_encode($cart));
            $user = $this->user->getOrCreateUser($cart->user);
            info('user');
            info(json_encode($user));
            $address = $this->user->updateOrCreateAddress($cart->user, $user->id)->toArray();
            info('address');
            info(json_encode($address));
            $address['first_name'] = $user->first_name;
            $address['last_name'] = $user->last_name;
            $address['contact_no'] = $user->contact_no;
            $orderDetail = json_encode($address);

            $cartTemp = $cart;
            $cartItems = json_decode($cartTemp->cart_items);
            info('cartItems');
            info( json_encode($cartItems));
            if (count((array)$cartItems)) {
                info('order start');

                $order = $this->order->orderPlace($user->id, $orderDetail, $cart, $request);
                info('order one');
                info(json_encode($order) );
                Cookie::queue(Cookie::forget('shopping_cart'));
                DB::commit();
                return [
                    'status' => 200,
                    'message' => 'Your order place successfully.',
                    'orderId' => OrderService::getOrderId($order->id)

                ];
            }
            DB::rollback();
            info('your cart is empty');
            return [
                'status' => 300,
                'message' => 'your cart is empty.',
                'orderId' => ''
            ];
        } catch (\Exception $e) {
            DB::rollback();
            // return $e->getMessage();
            info(json_encode($e->getMessage()));
            return [
                'status' => 400,
                'message' => 'An error has occurred please try again later.',
                'orderId' => ''
            ];
//            return $e->getMessage();
        }
    }

    public function userInfo($email)
    {
        return $this->user->getUserUsingEmail($email);
    }

    public function checkProductQty($product_id, $qty)
    {

        $product = $this->getProduct($product_id);
        if (Cookie::get('shopping_cart')) {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);

            $item_id_list = array_column($cart_data['cart_items'], 'item_id');
            $prod_id_is_there = $product_id;
            if (in_array($prod_id_is_there, $item_id_list)) {

                foreach ($cart_data['cart_items'] as $keys => $values) {

                    if ($cart_data['cart_items'][$keys]["item_id"] == $product_id) {

                        if ($cart_data['cart_items'][$keys]["item_type"] == 'bothType') {
                            if ($cart_data['cart_items'][$keys]["item_selected"] == 'new') {
                                if ($product['quantity'] >= $qty) {
                                    return response()->json([
                                        'status' => 200,
                                        'message' => 'success',
                                    ]);
                                } else {
                                    return response()->json([
                                        'status' => 400,
                                        'message' => 'Available quantity is ' . $product['quantity'] . ', please enter maximum available quantity.',
                                    ]);
                                }
                            } else {
                                if ($product['refurbished_quantity'] >= $qty) {
                                    return response()->json([
                                        'status' => 200,
                                        'message' => 'success',
                                    ]);
                                } else {
                                    return response()->json([
                                        'status' => 400,
                                        'message' => 'Available quantity is ' . $product['refurbished_quantity'] . ', please enter maximum available quantity.',
                                    ]);
                                }
                            }
                        } elseif ($cart_data[$keys]["item_type"] == 'new') {
                            if ($product['quantity'] >= $qty) {
                                return response()->json([
                                    'status' => 200,
                                    'message' => 'success',
                                ]);
                            } else {
                                return response()->json([
                                    'status' => 400,
                                    'message' => 'Available quantity is ' . $product['quantity'] . ', please enter maximum available quantity.',
                                ]);
                            }
                        } else {
                            if ($product['refurbished_quantity'] >= $qty) {
                                return response()->json([
                                    'status' => 200,
                                    'message' => 'success',
                                ]);
                            } else {
                                return response()->json([
                                    'status' => 400,
                                    'message' => 'Available quantity is ' . $product['refurbished_quantity'] . ', please enter maximum available quantity.',
                                ]);
                            }
                        }

                    }
                }
            }
        } else {

        }


    }

    public function getCurrentCategory($id)
    {
        $products = $this->getProduct($id, 'category_id');
        return view('theme.home.currentCategory.current', compact('products'));
    }

    public function loadCategoryProducts($id)
    {

        $category = Category::with('products');
        if ($id != null) {
            $category = $category->where('id', $id);
            $category = $category->first();
//            $products = $category[0]->products;
            $result = $category->parent_id != null ? [$category->id] : $this->category->descendantsAndSelf($category->id)->pluck('id')->toArray();
            $products = $this->product->whereIn('category_id', $result);
            $products = $products->offset(0)->limit(19)->get()->map(function ($products) {
                return $this->productFormat($products);
            });
        } else {
            $products =  $this->product->offset(0)->limit(19)->get()->map(function ($products) {
                return $this->productFormat($products);
            });

        }

        return view('theme.home.currentCategory.current', compact('products'));
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function getProductBySlug($slug): mixed
    {
        return Product::Where('product_slug',$slug)->with('attributes.color', 'attributes.size')->first();
    }

    public function getCategoryProducts($request, $slug)
    {

        $category = $this->category->where('slug', $slug)->first();
        $result = $category->parent_id != null ? [$category->id] : $this->category->descendantsAndSelf($category->id)->pluck('id')->toArray();
        $products = $this->product->whereIn('category_id', $result);

        if (count($request->all()) > 0) {
            if (isset($request->price_range)) {
                $filter = $this->cleanFilter($request->price_range);
                if ($filter['type'] == 'between') {
                    $products = $products->where(function ($query) use ($filter) {
                        $query->whereBetween('price', [$filter['from'], $filter['to']])
                              ->orWhereBetween('refurbished_price', [$filter['from'], $filter['to']]);
                    });
                }else{
                    $products = $products->where(function ($query) use ($filter) {
                        $query->where('price','>=',$filter['from'])
                              ->orWhere('refurbished_price','>=',$filter['from']);
                    });
                }

            }
            if (isset($request->capacity)) {

                $filter = $this->cleanFilter($request->capacity);
                if ($filter['type'] == 'between') {
                    $products = $products->where(function ($query) use ($filter) {
                        $query->whereBetween('capacity', [$filter['from'], $filter['to']]);
                    });
                }else{
                    $products = $products->where(function ($query) use ($filter) {
                        $query->where('capacity','>=',$filter['from']);
                    });
                }

            }
        }

        $products = $products->paginate(12)->through(function ($product) {
            return $this->productFormat($product);
        });
        $products->category = $category->category_name;
        $products->slug = $category->slug;
        $products->category_id = $category->id;
        $products->filters = $request->all();
        return $products;
    }

    public function cleanFilter($filter): array
    {
        $tempFilter = explode('-', $filter);
        if ($tempFilter[1] == 'Above') {
            return [
                'from' => $tempFilter[0],
                'to' => $tempFilter[1],
                'type' => 'single'
            ];
        }
        return [
            'from' => $tempFilter[0],
            'to' => $tempFilter[1],
            'type' => 'between'
        ];
    }
}
