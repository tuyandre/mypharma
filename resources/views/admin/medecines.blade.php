@extends('backend.shared.master')

@section('title','Medecines')
@section('css')
    <link href="{{asset('/backend/dashboard/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link href="{{asset('/backend/dashboard/css/datatables.min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/buttons.dataTables.min.css')}}" rel="stylesheet">
    <link r type="text/css"
          href="{{asset('/backend/dashboard/assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css')}}" rel="stylesheet">

@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="card material-card">
                <h5 class="card-title text-uppercase p-3 bg-info text-white mb-0">
                    Medecines
                    {{--                    <button class="btn btn-success btn-flat btn-sm add_pharmacy" style="float: right">--}}
                    {{--                        <i class="fa fa-plus"></i>Add Pharmacy</button>--}}
                </h5>

                <div class="p-3">

                    <div class="table-responsive">
                        <table id="manageTable" class="table table-striped table-bordered "
                               style="width:100%;">
                            <thead>
                            <tr>
                                <th>Pharmacy Name</th>
                                <th>Medecine Name</th>
                                <th>Photo</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Stock</th>
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

@endsection
@section('js')
    <script>
        var defaultUrl = "{{ route('admin.medecines.getMedecines') }}";
        var table;
        var manageTable = $("#manageTable");
        function myFunc() {
            table = manageTable.DataTable({
                ajax: {
                    url: defaultUrl,
                    dataSrc: 'medecine'
                },
                columns: [
                    {data: 'pharmacy.name'},
                    {data: 'name'},
                    {data: 'image',
                        render: function (data, type, row) {
                            return"<img src='/backend/medecines/"+row.image+"' style='width: 45px'>";


                        }
                    },
                    {data: 'description'},
                    {data: 'price'},
                    {data: 'quantity'},
                ]
            });
        }

        $(document).ready(function () {

//initialize data table
            myFunc();
        });
    </script>

    <script src="{{asset('/backend/dashboard/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/backend/dashboard/assets/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('/backend/dashboard/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
    <script src="{{asset('/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('/backend/dashboard/js/dataTables.min.js')}}"></script>
@endsection
