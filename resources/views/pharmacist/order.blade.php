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
                    Orders
                </h5>

                <div class="p-3">

                    <div class="table-responsive">
                        <table id="manageTable" class="table table-striped table-bordered "
                               style="width:100%;">
                            <thead>
                            <tr>
                                <th>Patient Name</th>
                                <th>Date</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
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
                            return "<a  href='/home/pharmacy/order/detail/" + row.id + "' class='btn btn-info btn-sm btn-flat' data-id='" + data +
                                "' > <i class='fa fa-eye'></i>View</a>" +
                                "<button class='btn btn-success btn-sm btn-flat js-complete ' data-id='" + data +
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
            $(".add_insurance").click(function () {
                $("#addModal").modal({
                    backdrop: 'static',
                    keyboard: false
                });
            });
//initialize data table
            myFunc();


            manageTable.on('click', '.js-complete', function () {
                var button = $(this);
                bootbox.confirm("Are you sure you want to Complete this Order?", function (result) {
                    if (result) {
                        $.ajax({
                            url: button.attr('data-url'),
                            method: 'put',
                            data: {_token: $('#token').val()},
                            success: function (data) {
                                console.log(data);
                                var tr = button.parents("tr");
                                bootbox.alert({
                                    title: "success",
                                    message: "<i class='fa fa-warning'></i>" +
                                        " Order Completed successful"
                                });
                                table.rows(tr).remove().draw(false);
                                table.destroy();
                                myFunc();
                            }, error: function () {
                                bootbox.alert({
                                    title: "Error",
                                    message: "<i class='fa fa-warning'></i>" +
                                        " Order not Completed please try again"
                                });
                            }
                        });

                    }
                })
            });
        });
    </script>

    <script src="{{asset('/backend/dashboard/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/backend/dashboard/assets/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('/backend/dashboard/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
    <script src="{{asset('/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('/backend/dashboard/js/dataTables.min.js')}}"></script>
@endsection
