<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\admin\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories=$this->categoryService->getCategories(1);

        return view('admin.category.category-list', compact('categories'));
    }

    public function subCategoryIndex()
    {
        $categoryTree=$this->categoryService->getTree();

        return view('admin.category.sub-category-list', compact('categoryTree'));
    }

    public function addCategoryNode(Request $request)
    {

       return $this->categoryService->addCategoryNode($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $randomName='';
        if ($request->hasFile('category_image')) {

            $file = $request->file("category_image");
            $path = 'public/category';

            $filenameWithExt = $file->getClientOriginalName();
            $randomName = Str::random(20) . $filenameWithExt;
            $path = $file->storeAs($path, $randomName, 'local');
        }

        return $this->categoryService->storeCategory($request, $randomName);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {






}

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
