@extends('admin.layouts.main')

@section('style')
    <!-- jsgrid css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/jsgrid.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/custom/tree.css">
@endsection

@section('content')



    <!-- Modal -->
    <div class="modal fade" id="sub-category-modal" tabindex="-1" aria-labelledby="subCategoryModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Products Sub Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="category_form" class="needs-validation" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="category_id">
                        <div class="form">
                            <div class="form-group">
                                <label class="col-form-label"><span>*</span> Categories</label>
                                <select class="custom-select form-control" required="">
                                    <option value="">--Select--</option>
                                    @foreach($categoryTree['categories'] as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group ">
                                <label for="validationCustom02" class="mb-1"><span>*</span> Sub category </label>
                                <input name="childrens[]" class="form-control childrens"  type="text" placeholder="Enter sub category name">
                                <span id="error_childrens" class="text-danger"></span>
                            </div>
                            <div class="form-group ">
                                <label for="validationCustom02" class="mb-1">Category Image :</label>
                                <input name="category_image" class="form-control" id="category_image" type="file">
                                <span id="error_category_image" class="text-danger"></span>
                            </div>

                            <div class="form-group mt-5">
                                <label class="radio-inline mr-2 " for="category-status" style="margin-right: 30px">
                                    <input class="radio_animated" id="category-status-active" type="radio" name="status"
                                           value="1" checked="">Active
                                </label>

                                <label class="radio-inline" for="category-status">
                                    <input class="radio_animated" id="category-status-inactive" type="radio" value="0"
                                           name="status">in Active
                                </label>


                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="store_category" type="button" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Sub Category
                            <small>Bigdeal Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Digital</li>
                        <li class="breadcrumb-item active">Sub Category</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->


    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">


                        <div class="treeview js-treeview">
                            <ul>
                                @foreach($categoryTree['categoryTree'] as $category)
                                <li>
                                    <div class="treeview__level" data-level="A" parent-id="{{ $category->id }}" lavel-id="{{$category->id}}">
                                        <span class="level-title">{{ $category->category_name }}</span>
                                        <div class="treeview__level-btns">
                                            <div class="btn btn-default btn-sm level-add"><span class="fa fa-plus"></span></div>
{{--                                            <div class="btn btn-default btn-sm level-remove"><span class="fa fa-trash text-danger"></span></div>--}}
{{--                                            <div class="btn btn-default btn-sm level-same"><span>Add Same Level</span></div>--}}
                                            <div class="btn btn-default btn-sm level-sub" lavel-id="{{$category->id}}"><span>Add Sub Level</span></div>
                                        </div>
                                    </div>
                                    <ul>
                                        @foreach($category->children as $categoryLevel1)
                                        <li>
                                            <div class="treeview__level" data-level="B" parent-id="{{ $category->id }}" lavel-id="{{$categoryLevel1->id}}">
                                                <span class="level-title">{{ $categoryLevel1->category_name }}</span>
                                                <div class="treeview__level-btns">
                                                    <div class="btn btn-default btn-sm level-add"><span class="fa fa-plus"></span></div>
                                                    <div class="btn btn-default btn-sm level-remove" sub-cat-id="{{ $categoryLevel1->id }}" sub-cat-name="{{ $categoryLevel1->category_name }}"><span class="fa fa-edit text-primary"></span></div>
{{--                                                    <div class="btn btn-default btn-sm level-remove"><span class="fa fa-trash text-danger"></span></div>--}}
                                                    <div class="btn btn-default btn-sm level-same"><span>Add Same Level</span></div>
                                                    <div class="btn btn-default btn-sm level-sub"><span>Add Sub Level</span></div>
                                                </div>
                                            </div>
                                            <ul>
                                                @foreach($categoryLevel1->children as $categoryLevel2)
                                                <li>
                                                    <div class="treeview__level" data-level="C" parent-id="{{ $categoryLevel1->id }}" lavel-id="{{$categoryLevel2->id}}">
                                                        <span class="level-title">{{ $categoryLevel2->category_name }}</span>
                                                        <div class="treeview__level-btns">
                                                            <div class="btn btn-default btn-sm level-add"><span class="fa fa-plus"></span></div>
                                                            <div class="btn btn-default btn-sm level-remove" sub-cat-id="{{ $categoryLevel2->id }}" sub-cat-name="{{ $categoryLevel2->category_name }}"><span class="fa fa-edit text-primary"></span></div>
{{--                                                            <div class="btn btn-default btn-sm level-remove"><span class="fa fa-trash text-danger"></span></div>--}}
                                                            <div class="btn btn-default btn-sm level-same"><span>Add Same Level</span></div>
                                                            <div class="btn btn-default btn-sm level-sub"><span>Add Sub Level</span></div>
                                                        </div>
                                                    </div>
                                                    <ul>
                                                        @foreach($categoryLevel2->children as $categoryLevel3)
                                                        <li>
                                                            <div class="treeview__level" data-level="D" parent-id="{{ $categoryLevel2->id }}" lavel-id="{{$categoryLevel3->id}}">
                                                                <span class="level-title">{{ $categoryLevel3->category_name }}</span>
                                                                <div class="treeview__level-btns">
                                                                    <div class="btn btn-default btn-sm level-add"><span class="fa fa-plus"></span></div>
                                                                    <div class="btn btn-default btn-sm level-remove" sub-cat-id="{{ $categoryLevel3->id }}" sub-cat-name="{{ $categoryLevel3->category_name }}"><span class="fa fa-edit text-primary"></span></div>
{{--                                                                    <div class="btn btn-default btn-sm level-remove" ><span class="fa fa-trash text-danger"></span></div>--}}
                                                                    <div class="btn btn-default btn-sm level-same"><span>Add Same Level</span></div>
{{--                                                                    <div class="btn btn-default btn-sm level-sub"><span>Add Sub Level</span></div>--}}
                                                                </div>
                                                            </div>
                                                            <ul>
                                                            </ul>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                @endforeach

                                            </ul>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>

                    </div>


                <template id="levelMarkup">
                    <div class="nodes-main">
                        <form id="category-node-form">
                            @csrf
                            <input type="hidden" id="parent_id" name="parent_id">
                            <input type="hidden" id="node_id" name="node_id">
                            <div class="to-do-list">

                                <div id="myDIV" class="header">
                                    <input type="text" name="node_name" id="myInput" placeholder="Title...">
                                    <span  class="addBtn">Add</span>
                                </div>
                                <ul id="myUL">


                                </ul>
                                <div class="close-node-btn">
                                    <button type="button" class="btn-secondary btn-style close-node-text">close</button>
                                    <button type="button"  class="btn-primary btn-style add-node-btn">save</button>
                                </div>
                            </div>



                        </form>
                    </div>

                </template>


                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Container-fluid Ends-->

@endsection
@section('script')

    <!-- Jsgrid js-->
    {{--    <script src="../assets/js/jsgrid/jsgrid.min.js"></script>--}}
    {{--    <script src="../assets/js/jsgrid/griddata-manage-product.js"></script>--}}
    {{--    <script src="../assets/js/jsgrid/jsgrid-manage-product.js"></script>--}}
    <script src="../assets/js/category/sub-category.js"></script>

@endsection
