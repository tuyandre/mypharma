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
                    Medicines
                                        <button class="btn btn-success btn-flat btn-sm add_medicament" style="float: right">
                                            <i class="fa fa-plus"></i>Add Medicament</button>
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
    <div class="modal " id="addModal" tabindex="-1" role="dialog" aria-labelledby="Survey">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="exampleModalLabel1">Add New Medicines</h4>
                    <button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form data-parsley-validate class="form-horizontal" method="POST" action="{{route('pharmacist.medecine.save')}}" id="frmSave" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div id="add-messages"></div>

                        <div class="form-group row">
                            <label for="recipient-name" class="control-label col-sm-3">Medicine Name</label>
                            <label class="col-sm-1 control-label">:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" name="name" required autofocus>
                                <span class="text-danger" id="tname" style="color: red"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                                    <label for="photo" class="control-label col-sm-3">Photo</label>
                                    <label class="col-sm-1 control-label">:</label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control" id="photo" name="photo" accept="image/*" >
                                        <span class="text-danger" id="ps" style="color: red"></span>
                                    </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="control-label col-sm-3">Medicine description</label>
                            <label class="col-sm-1 control-label">:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="description" name="description" required >
                                <span class="text-danger" id="tdesc" style="color: red"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="control-label col-sm-3">Medicine Price</label>
                            <label class="col-sm-1 control-label">:</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="price" name="price" required>
                                <span class="text-danger" id="tprice" style="color: red"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="quantity" class="control-label col-sm-3">Medicine Quantity</label>
                            <label class="col-sm-1 control-label">:</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="quantity" name="quantity" required>
                                <span class="text-danger" id="tquantity" style="color: red"></span>
                            </div>
                        </div>
                    </div>
                    <div id="add-messages"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" id="btnSave" data-loading-text="Loading..." value="Save Medicine"/>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script>
        var defaultUrl = "{{ route('pharmacist.medecine.getMedecines') }}";
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
                    {
                        data: 'id',
                        render: function (data, type, row) {
                            return"<button  data-url='/home/category/show/" + row.id + "' class='btn btn-info btn-sm btn-flat js-edit' data-id='" + data +
                                "' > <i class='fa fa-edit'></i>Edit</button>" +
                                "<button class='btn btn-danger btn-sm btn-flat js-delete ' data-id='" + data +
                                "' data-url='/home/category/delete/" + row.id + "'> <i class='fa fa-trash'></i>Delete</button>"+
                                "<button class='btn btn-success btn-sm btn-flat js-stock ' data-id='" + data +
                                "' data-url='/home/category/delete/" + row.id + "'> <i class='fa fa-shopping-bag'></i>Stock</button>";


                        }
                    }
                ]
            });
        }

        $(document).ready(function () {
            $(".add_medicament").click(function () {
                $("#addModal").modal({
                    backdrop: 'static',
                    keyboard: false
                });
            });
//initialize data table
            myFunc();

            $('#frmSave').submit(function (e) {
                e.preventDefault();
                var form = $(this);
                var btn = $('#btnSave');
                btn.button('loading');
                $.ajax({
                    url: form.attr('action'),
                    method: form.attr('method'),
                    data: new FormData(this),
                    dataType: "JSON",
                    contentType: false,
                    cashe: false,
                    processData: false,
                }).done(function (data) {
                    console.log(data);

                    if (data.medicine == "ok") {
                        table.destroy();
                        myFunc();
                        btn.button('reset');
                        form[0].reset();
                        // reload the table

                        $('#add-messages').html('<div class="alert alert-success flat">' +
                            '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Medicine successfully Uploaded. </div>');

                        $(".alert-success").delay(500).show(10, function () {
                            $(this).delay(3000).hide(10, function () {
                                $(this).remove();
                            });
                        });
                    }else {
                        btn.button('reset');
                        $('#add-messages').html('<div class="alert alert-warning flat">' +
                            '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> There is Error. </div>');

                        $(".alert-success").delay(500).show(10, function () {
                            $(this).delay(3000).hide(10, function () {
                                $(this).remove();
                            });
                        });
                    }
                }).fail(function (response) {
                    console.log(response.responseJSON);

                    btn.button('reset');
//                    showing errors validation on pages

                    var option = "";
                    option += response.responseJSON.message;
                    var data = response.responseJSON.errors;
                    $.each(data, function (i, value) {
                        console.log(value);
                        if (i == 'name') {
                            $('#tname').html(value[0])
                        }
                        $.each(value, function (j, values) {
                            option += '<p>' + values + '</p>';
                        });
                    });
                    $('#add-messages').html('<div class="alert alert-danger flat">' +
                        '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                        '<strong><i class="glyphicon glyphicon-remove"></i></strong><b>oops:</b>' + option + '</div>');

                    $(".alert-success").delay(500).show(10, function () {
                        $(this).delay(3000).hide(10, function () {
                            $(this).remove();
                        });
                    });

                    //alert("Internal server error");
                });
                return false;
            });

        });
    </script>

    <script src="{{asset('/backend/dashboard/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/backend/dashboard/assets/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('/backend/dashboard/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
    <script src="{{asset('/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('/backend/dashboard/js/dataTables.min.js')}}"></script>
@endsection
