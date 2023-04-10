@extends('admin.layouts.main')

@section('content')

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Blog List
                            <small>Bigdeal Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="/admin"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Blog List</li>

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
                    <div class="card-header set-button">
                        <h5>Blog List </h5>
                        {{--                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal"--}}
                        {{--                                data-bs-target="#categoryModal">Add Product--}}
                        {{--                        </button>--}}
                    </div>
                    <div class="card-body">

                        <div class="">
                            <table class="blog_table" style="width: 100% !important;">
                                <thead>
                                <tr class="jsgrid-header-row">
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Published By</th>
                                    <th>Status</th>
                                    <th width="100px">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

@endsection
@section('script')
  <script>
      $(function () {
          var table = $('.blog_table').DataTable(
              {
                  processing: true,
                  serverSide: true,
                  order:[],
                  ajax: "{{ route('blog.list') }}",
                  columns: [
                      {data: 'id', name: 'id'},
                      {data: 'image', name: 'image'},
                      {data: 'title', name: 'title'},
                      {data: 'blog_content', name: 'blog_content'},
                      {data: 'posted_by', name: 'posted_by'},
                      {data: 'publish_status', name: 'publish_status'},
                      {
                          data: 'action',
                          name: 'action',
                          orderable: true,
                          searchable: true
                      },
                  ]
              }
          );

      });

      $(document).on('click','.delete_blog',function (){
          let blogId = $(this).attr('blog-id');
          Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
          }).then((result)  => {
              if (result.isConfirmed) {
                  $.ajax({
                      url: '{{ route('delete.blog') }}',
                      type: 'get',
                      data: {id:blogId},
                      success: function (data) {
                          if(data.status == 200){
                              $('.blog_table').DataTable().ajax.reload();
                              Swal.fire(
                                  'Deleted!',
                                  'Your file has been deleted.',
                                  'success'
                              )
                          }else{
                              Swal.fire(
                                  'Deleted!',
                                  'Something went wrong , please try again.',
                                  'error'
                              )
                          }

                      }
                  });

              }
          })
      })
  </script>

@endsection
