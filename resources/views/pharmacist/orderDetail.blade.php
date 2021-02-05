@extends('backend.shared.master')

@section('title','Insurances')
@section('css')
    <link href="{{asset('/backend/dashboard/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link href="{{asset('/backend/dashboard/css/datatables.min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/buttons.dataTables.min.css')}}" rel="stylesheet">
    <link r type="text/css"
          href="{{asset('/backend/dashboard/assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css')}}" rel="stylesheet">

@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 col-lg-8 col-sm-8 offset-md-2">
            <div class="card material-card">
                <h5 class="card-title text-uppercase p-3 bg-info text-white mb-0">
                    Orders Detail
                </h5>

                <div class="p-3">

                    <div class="table-responsive">
                        <table id="manageTable" class="table table-striped table-bordered "
                               style="width:100%;">
                            <thead>
                            <tr>
                                <th>Patient Name</th>
                                <th>Date</th>
                                <th>Medicine Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                @foreach($order->sold as $sold)
                                <tr>
                                    <td>{{$order->user->name}}</td>
                                    <td>{{$order->date}}</td>
                                    <td>{{$sold->medecine->name}}</td>
                                    <td>{{$sold->medecine_quantity}}</td>
                                    <td>{{$sold->price}}</td>
                                </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <input type="hidden" value="{{ Session::token() }}" id="token">
@endsection
@section('js')
    <script>
        var defaultUrl = "{{ route('pharmacist.order.getOrders') }}";
        var table;
        var manageTable = $("#manageTable");
        function myFunc() {
            table = manageTable.DataTable({
                ajax: {
                    url: defaultUrl,
                    dataSrc: 'order'
                },
                columns: [
                    {data: 'user.name'},
                    {data: 'date'},
                    {data: 'total_medecines'},
                    {data: 'cost'},
                    {data: 'status'},
                    {data: 'id',

                        render: function (data, type, row) {
                            if (row.status=="pending") {
                                return "<button  data-url='/home/pharmacy/order/detail/" + row.id + "' class='btn btn-info btn-sm btn-flat js-edit' data-id='" + data +
                                    "' > <i class='fa fa-eye'></i>View</button>" +
                                    "<button class='btn btn-success btn-sm btn-flat js-delete ' data-id='" + data +
                                    "' data-url='/home/pharmacy/order/complete/" + row.id + "'> <i class='fa fa-check-square'></i>Complete</button>";

                            }else{
                                return "<button  data-url='/home/pharmacy/order/detail/" + row.id + "' class='btn btn-info btn-sm btn-flat js-edit' data-id='" + data +
                                    "' > <i class='fa fa-eye'></i>View</button>" ;

                            }
                        }
                    },
                ]
            });
        }

        $(document).ready(function () {
//initialize data table
            $(document).ready(function() {
                $('#manageTable').DataTable();
            } );
        });
    </script>

    <script src="{{asset('/backend/dashboard/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/backend/dashboard/assets/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('/backend/dashboard/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
    <script src="{{asset('/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('/backend/dashboard/js/dataTables.min.js')}}"></script>
@endsection
