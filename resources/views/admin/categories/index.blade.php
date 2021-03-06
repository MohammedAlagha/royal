@extends('layouts.admin.app')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-flex ">
            <h1 class="h3 mb-4 text-gray-800">Categories</h1>
            <div class="ml-auto">
                <a href="{{route('admin.categories.create')}}"  class="btn btn-md btn-primary ">Add Category </a>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>status</th>
                            <th>created_at</th>
                            <th>updated_at</th>
                            <th>action</th>
                        </tr>
                        </thead>
{{--                        <tfoot>--}}
{{--                        <tr>--}}
{{--                            <th>id</th>--}}
{{--                            <th>Name</th>--}}
{{--                            <th>status</th>--}}
{{--                            <th>created_at</th>--}}
{{--                            <th>updated_at</th>--}}
{{--                            <th>action</th>--}}
{{--                        </tr>--}}
{{--                        </tfoot>--}}

                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection

@push('style')
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet')}}">
@endpush

@push('script')

    <script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <script>
        $(document).ready(function() {
          var table =  $('#dataTable').DataTable({
              serverSide: true,
              processing: true,
              ajax: {
                  "url": "{{route('admin.categories.data')}}"
              },
              columns: [
                  {data: 'id'},
                  {data: 'name'},
                  {data: 'status'},
                  {data: 'updated_at'},
                  {data: 'created_at'},
                  {data: 'action', orderable: false, searchable: false},
                  ]
          });
        });

        $(document).on('click','.delete',function(e){
            e.preventDefault();
            let url = $(this).data('url');
            let n =  new Noty({
                type:'alert',
                layout:'topRight',
                text:"Confirm deleting record",
                killer:true,
                buttons:[
                    Noty.button('Yes','btn btn-success mr-2 mt-2', function(){
                        axios({
                            method: 'delete',
                            url: url,
                            dataType: 'json',
                        }).then(function(response){
                            n.close();
                            new Noty({
                                type:'success',
                                layout:'topRight',
                                text:response.data.message,
                            }).show();
                            jQuery('#dataTable').DataTable().ajax.reload(null, false);
                        });
                    }),
                    Noty.button('No','btn btn-danger mt-2', function(){
                        n.close();
                    })
                ]
            })
            n.show();
        })
    </script>

@endpush
