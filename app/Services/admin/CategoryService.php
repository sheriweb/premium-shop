<?php

namespace App\Services\admin;

use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryService
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getCategories($status)
    {

        return $this->category->with('files','products')
            ->where('parent_id', null)
            ->where('status', $status)
            ->orderBy('id', 'desc')->get()
            ->map(function ($category) {
                return $this->categoryFormat($category);
            });

    }

    public function categoryFormat($category)
    {
        return [
            'id' => $category->id,
            'category_name' => $category->category_name,
            'slug' => $category->slug,
            'category_image' => $category->category_image,
            'parent_id' => $category->parent_id,
            'category_home_image' => $this->getImage($category, 'categoryHomeImage'),
            'status' => $category->status
        ];
    }

    public function getImage($product, $imageType)
    {
        $productFile = $product->files->where('file_type', $imageType)->first();
        return ($productFile) ? url('storage/' . $productFile->path) : '';


    }

    public function storeCategory($request, $category_image = '')
    {

        try {

            $category = Category::find($request->id);
            if ($category) {
                if ($request->hasFile('category_image')) {
                    if ($category->files->count() > 0) {
                        if (File::exists(public_path('storage/'.$category->files[0]->path))) {
                            File::delete(public_path('storage/'.$category->files[0]->path));
                        }
                    }
                  
                    $category->category_image = $category_image;
                }
                if ($request->hasFile('category_home_image')) {

                    if ($category->files->count() > 0) {
                        if (File::exists(public_path('storage/'.$category->files[0]->path))) {
                            File::delete(public_path('storage/'.$category->files[0]->path));
                        }
                    }
                    if ($request->hasFile('category_home_image')) {
                        $file = $request->file("category_home_image");
                        $path = 'public/category';

                        $filenameWithExt = $file->getClientOriginalName();
                        $randomName = Str::random(20) . $filenameWithExt;
                        $getImagePath = 'category/' . $randomName;
                        $path = $file->storeAs($path, $randomName, 'local');
                        if(count($category->files->toarray()) > 0){
                            dd($category->files[0]->update(
                                [
                                    'name' => $filenameWithExt,
                                    'random' => $randomName,
                                    'path' => $getImagePath,
                                    'file_type' => 'categoryHomeImage'

                                ]
                            ));
                        }else{
                            $category->files()->create([
                                'name' => $filenameWithExt,
                                'random' => $randomName,
                                'path' => $getImagePath,
                                'file_type' => 'categoryHomeImage'

                            ]);
                        }

                    }
                }

                $category->category_name = $request->category_name;
                $category->slug = Str::slug($request->category_name);
                $category->status = $request->status;
                $category->update();
                $status = 200;
                $message = 'Category update successfully.';

            } else {

                $category = Category::create(
                    [
                        'category_name' => $request->category_name,
                        'slug' => Str::slug($request->category_name),
                        'category_image' => $category_image,
                        'status' => $request->status

                    ]);

                if ($request->hasFile('category_home_image')) {
                    $file = $request->file("category_home_image");
                    $path = 'public/category';

                    $filenameWithExt = $file->getClientOriginalName();
                    $randomName = Str::random(20) . $filenameWithExt;
                    $getImagePath = 'category/' . $randomName;
                    $path = $file->storeAs($path, $randomName, 'local');
                    $category->files()->create([
                        'name' => $filenameWithExt,
                        'random' => $randomName,
                        'path' => $getImagePath,
                        'file_type' => 'categoryHomeImage'

                    ]);
                }
                $status = 200;
                $message = 'Category added successfully.';
            }

        } catch (\Exception $e) {

            $status = 400;
            $message = $e->getMessage();
        }
        return response()->json([
            'status' => $status,
            'message' => $message
        ]);


    }

    public function getTree()
    {
        $categories = $this->category->where('parent_id', null)->get();
        $categoryTree = $this->category->get()->toTree();
        return ['categories' => $categories, 'categoryTree' => $categoryTree];
    }

    public function addCategoryNode($request)
    {
        try {

            if ($request->node_id != '') {
                $category = Category::find($request->node_id);
                $category->update(['category_name' => $request->node_name]);
                $message = 'Sub category update successfully';

            } else {

                $parent = Category::find($request->parent_id);
                foreach ($request->children_nodes as $node) {
                    $parent->children()->create([
                        'category_name' => $node,
                        'slug' => Str::slug($node)
                    ]);
                }

                $message = 'Sub category add successfully';
            }
            $status = 200;

        } catch (\Exception $e) {

            $status = 400;
            $message = $e->getMessage();
        }
        return response()->json([
            'status' => $status,
            'message' => $message
        ]);
    }
}
