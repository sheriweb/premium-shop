<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Services\admin\CategoryService;
use App\Services\CartService;
use App\Services\theme\HomeService;
use Carbon\Carbon;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class BlogsController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;

    }

    public function index()
    {
        $data = [];
        $data['categories'] = $this->categoryService->getCategories(1);
        $data['categoryTree'] = Category::get()->toTree();
        $data['blogs'] = Blog::where('is_published',1)->orderBy('created_at', 'DESC')->get();
        $data['latest_blogs'] = Blog::where('is_published',1)->orderBy('created_at', 'DESC')->limit(5)->get();
        return view('theme.blogs', compact('data'));
    }

    public function create()
    {
        return view('admin.blog.add-blog');
    }

    public function store(Request $request)
    {

        try {
            $data = $request->all();

            if($request->blog_id){
                $blog = Blog::find($request->blog_id);
                $blog->title = $request->title;
                $blog->content = $data['content'];
                $blog->posted_by =  Auth::user()->id;
                $blog->is_published = $request->storeType == 'saveAndPublish';
                $blog->publish_date =  ($request->storeType == 'saveAndPublish') ? date('Y-m-d H:i:s') : null;
                $blog->update();
                $message = 'Blog Update Successfully.';

            }else{
                $blog = new Blog();
                $blog->title = $request->title;
                $blog->content = $data['content'];
                $blog->posted_by =  Auth::user()->id;
                $blog->is_published = $request->storeType == 'saveAndPublish';
                $blog->publish_date =  ($request->storeType == 'saveAndPublish') ? date('Y-m-d H:i:s') : null;
                $blog->save();
                $message = 'Blog Add Successfully.';
            }

            if($request->file('feature_image')){
                if($blog->feature_image){
                    unlink("blogImages/".$blog->feature_image);
                }
                $file= $request->file('feature_image');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('/blogImages'), $filename);
                $blog->update([
                    'feature_image' =>$filename
                ]) ;
            }

            return response()->json([
                'status' => 200,
                'message' => $message
            ]);

        }catch (\Exception $e){
            return response()->json([
                'status' => 300,
                'message' => 'Some thing went wrong. please try again.'
            ]);
        }


    }

    public function show(Request $request)
    {
        return view('admin.blog.blog-list');
    }
    public function blogList(Request $request)
    {
                if ($request->ajax()) {
            $data = Blog::orderBy('created_at', 'DESC')->get();;

            return Datatables::of($data)
                ->addIndexColumn()

                ->addColumn('image', function ($row) {

                    return'<img src="' . asset('/blogImages').'/'.$row->feature_image . '" style="height: 50px; width: 50px;">';

                })
                ->addColumn('blog_content', function ($row) {

                    return $row->content;
                })
                ->addColumn('posted_by', function ($row) {

                    return $row->postedBy->name;
                })
                ->addColumn('publish_status', function ($row) {
                    $btn = '';
                    if($row->is_published){
                       return   '<span class="badge badge-success">Published</span>';
                    }else{
                        return   '<span class="badge badge-danger">Draft</span>';
                    }
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '
                            <a href="/edit-blog/' . $row->id . '"><span class="edit-category" blog-id="' . $row->id . '" ><i class="icofont-ui-edit text-primary"></i></span></a>
                           <a href="javascript:void(0)" class="delete_blog" blog-id="'.$row->id.'"><span ><i class="icofont-ui-delete text-success "></i></span></a>
                    ';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'image','blog_content','posted_by','publish_status'])
                ->make(true);
        }
    }

    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('admin.blog.add-blog', compact('blog'));
    }

    public function destroy(Request $request)
    {
        try {
            $blog = Blog::find($request->id);
            if($blog->feature_image){
                unlink("blogImages/".$blog->feature_image);
            }
            $blog->delete();
            return response()->json([
                'status' => 200,
                'message' => 'blog deleted successfully.'
            ]);
        }catch (\Exception $e){
            return response()->json([
                'status' => 300,
                'message' => 'Some thing went wrong. please try again.'
            ]);
        }

    }
}
