<?php

namespace App\Http\Controllers\theme;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\Store;
use App\Services\admin\CategoryService;
use App\Services\admin\ColorService;
use App\Services\admin\StoreService;
use App\Services\OrderService;
use App\Services\theme\HomeService;
use http\Env\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;
use App\Services\CartService;

class HomeController extends Controller
{
    protected $categoryService, $homeService, $cartService;
    private StoreService $storeService;

    public function __construct(
        CategoryService $categoryService,
        HomeService     $homeService,
        CartService     $cartService,
        StoreService    $storeService
    )
    {
        $this->categoryService = $categoryService;
        $this->homeService = $homeService;
        $this->cartService = $cartService;
        $this->storeService = $storeService;

    }

    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $data = [];
        $data['stores'] = Store::all();
        $data['storesDesc'] = Store::all()->sortByDesc("id");
        $data['categories'] = $this->categoryService->getCategories(1);
        $data['categoryTree'] = Category::get()->toTree();
        $data['featureProduct'] = $this->homeService->getHomeProducts('featureProductSection', 1);
        $data['newProduct'] = $this->homeService->getHomeProducts('newProductSection', 1);
        $data['dealOfTheDay'] = $this->homeService->getHomeProducts('dealOfTheDaySection', 1);
        $data['featureProductHeader1'] = $this->homeService->getLimitedHomeProducts('featureHeaderSection', 1, 2);
        $data['featureProductHeader2'] = $this->homeService->getLimitedHomeProducts('featureHeaderSection', 1, 3);
        $data['homeCategories'] = $this->homeService->getHomecategories();

        return view('new-user-site.index', compact('data'));
    }


    public function addToCart(Request $request)
    {
        return $this->homeService->addToCart($request);
    }

    public function updateToCart(Request $request)
    {
        return $this->homeService->updateToCart($request);
    }

    public function deleteToCart(Request $request)
    {
        return $this->homeService->deleteToCart($request);
    }

    public function loadCart()
    {
        return $this->homeService->loadCart();
    }

    public function checkOut()
    {
        $data['categories'] = $this->categoryService->getCategories(1);
        $data['categoryTree'] = Category::get()->toTree();
        $cart = json_decode($this->homeService->loadCart());

        return view('theme.check-out', compact('data', 'cart'));
    }

    public function calculateShipping()
    {
        $cart = json_decode($this->homeService->loadCart());
        dd($cart);

    }

    public function getCookie(Request $request)
    {
//        $value = $request->session()->get('key');
//        Cookie::queue(Cookie::forget('shopping_cart'));
        $value = Cookie::get('shopping_cart');
        dd($value);
//        Cookie::forget('shopping_cart');
    }

    public function paymentCheckOut(Request $request)
    {
        //    if($request->payment_type == 'stripe')
        //    {
        //     redirect('/srtipe');
        //    }
    }

    public function placeOrder(Request $request)
    {
        return $this->homeService->placeOrder($request);

    }

    public function viewCart()
    {
        return view('theme.view-cart');
    }

    public function getCart()
    {
        $cart = json_decode($this->homeService->loadCart());
        return view('theme.cart', compact('cart'));
    }

    public function userInfo($email)
    {
        return $this->homeService->userInfo($email);
    }

    public function checkProductQty(Request $request)
    {
        return $this->homeService->checkProductQty($request->product_id, $request->qty);
    }

    public function getCurrentCategory($id)
    {
        return $this->homeService->getCurrentCategory($id);
    }

    public function loadCategory($id = null)
    {
        return $this->homeService->loadCategoryProducts($id);
    }

    public function getProduct($slug)
    {
        $data['categories'] = $this->categoryService->getCategories(1);
        $data['categoryTree'] = Category::get()->toTree();
        $product = $this->homeService->getProductBySlug($slug);
        if ($product) {
            return view('theme.product-page', compact('data', 'product'));
        }
        return back();
    }

    public function getCategoryProducts(Request $request, $slug)
    {
        $data['categories'] = $this->categoryService->getCategories(1);
        $data['categoryTree'] = Category::get()->toTree();
        $data['products'] = $this->homeService->getCategoryProducts($request, $slug);
        return view('theme.home.currentCategory.category-page', compact('data',));
    }

    public function searchProduct($searchProduct)
    {

        return Product::where('product_name', 'LIKE', "%{$searchProduct}%")
            ->offset(0)->limit(20)
            ->get()
            ->map(function ($product) {
                return [
                    'product_name' => $product->product_name,
                    'thumbnail_image' => $this->homeService->getImage($product, 'imageThumbnail'),
                    'new_price' => $product->price,
                    'refurbished_price' => $product->refurbished_price,
                ];
            });
    }

    public function brands()
    {
        $stores = Store::all();

        return view('new-user-site.brands', compact('stores'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function brandProducts(Request $request, $id)
    {
        $storeProduct = $this->storeService->storeProduct($request, $id);
        $filters = $request->all();
        $colors = Color::all();
        $sizes = Size::all();

        return view('new-user-site.products',
            compact('storeProduct', 'filters', 'colors', 'sizes'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function categoryProducts(Request $request, $id)
    {
        $storeProduct = $this->storeService->storeProduct($request, $id);
        $filters = $request->all();
        $colors = Color::all();
        $sizes = Size::all();

        return view('new-user-site.products',
            compact('storeProduct', 'filters', 'colors', 'sizes'));
    }

    public function getProductBySlug($slug)
    {
//        $product= $this->homeService->getProductBySlug($slug);
        return view('new-user-site.product-page');

    }
}
