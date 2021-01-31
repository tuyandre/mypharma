@extends('backend.shared.master')

@section('title','Pharmacy')
@section('css')
    <link href="{{asset('/backend/dashboard/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
  <link href="{{asset('/backend/dashboard/css/datatables.min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/buttons.dataTables.min.css')}}" rel="stylesheet">
  <link r type="text/css"
          href="{{asset('/backend/dashboard/assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css')}}" rel="stylesheet">

@endsection
@section('items','Category ')
@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="card material-card">
                <h5 class="card-title text-uppercase p-3 bg-info text-white mb-0">
                    Pharmacies
                    <button class="btn btn-success btn-flat btn-sm add_pharmacy" style="float: right">
                        <i class="fa fa-plus"></i>Add Pharmacy</button>
                </h5>

                <div class="p-3">

                    <div class="table-responsive">
                        <table id="manageTable" class="table table-striped table-bordered "
                               style="width:100%;">
                            <thead>
                            <tr>
                                <th>Pharmacy Name</th>
                                <th>Location</th>
                                <th>Description</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Phamacist</th>
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
    {{--add modal--}}
    <div class="modal " id="addModal" tabindex="-1" role="dialog" aria-labelledby="Survey">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="exampleModalLabel1">Add New Pharmacy</h4>
                    <button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form data-parsley-validate class="form-horizontal" method="POST" action="{{route('admin.pharmacy.save')}}" id="frmSave">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div id="add-messages"></div>

                        <div class="form-group row">
                            <label for="recipient-name" class="control-label col-sm-3">Pharmacy Name</label>
                            <label class="col-sm-1 control-label">:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" name="name" required autofocus>
                                <span class="text-danger" id="tname" style="color: red"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="location" class="control-label col-sm-3">Pharmacy Location</label>
                            <label class="col-sm-1 control-label">:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="location" name="location" required >
                                <span class="text-danger" id="tloc" style="color: red"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="control-label col-sm-3">Pharmacy Description</label>
                            <label class="col-sm-1 control-label">:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="description" name="description" required >
                                <span class="text-danger" id="tdesc" style="color: red"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="latitude" class="control-label col-sm-3">Pharmacy Latitude</label>
                            <label class="col-sm-1 control-label">:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="latitude" step="any" name="latitude" required autofocus>
                                <span class="text-danger" id="tlati" style="color: red"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="longitude" class="control-label col-sm-3">Pharmacy Longitude</label>
                            <label class="col-sm-1 control-label">:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="longitude" step="any" name="longitude" required autofocus>
                                <span class="text-danger" id="tlong" style="color: red"></span>
                            </div>
                        </div>




                    </div>
                    <div id="add-messages"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" id="btnSave" data-loading-text="Loading..." value="Save Pharmacy"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal " id="addPharmacist" tabindex="-1" role="dialog" aria-labelledby="Survey">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="exampleModalLabel1">Add Pharmacist</h4>
                    <button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form data-parsley-validate class="form-horizontal" method="POST" action="{{route('admin.pharmacist.registerPharmacist')}}" id="pharmacistSave">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div id="add-messages2"></div>

                        <div class="form-group row">
                            <label for="recipient-name" class="control-label col-sm-3">Pharmacist Name</label>
                            <label class="col-sm-1 control-label">:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" name="name" required autofocus>
                                <span class="text-danger" id="tname" style="color: red"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="control-label col-sm-3">Pharmacist Email</label>
                            <label class="col-sm-1 control-label">:</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="email" name="email" required >
                                <span class="text-danger" id="temail" style="color: red"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone_no" class="control-label col-sm-3">Pharmacist Telephone</label>
                            <label class="col-sm-1 control-label">:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="phone_no" name="phone_no" required >
                                <span class="text-danger" id="tphone" style="color: red"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="control-label col-sm-3">Pharmacist Password</label>
                            <label class="col-sm-1 control-label">:</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="password"  name="password" required>
                                <span class="text-danger" id="tlati" style="color: red"></span>
                                <input type="hidden" class="form-control" id="pharmacy"  name="pharmacy">
                            </div>
                        </div>




                    </div>
                    <div id="add-messages"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" id="btnSave2" data-loading-text="Loading..." value="Save Pharmacist"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        var defaultUrl = "{{ route('admin.pharmacy.getPharmacy') }}";
        var table;
        var manageTable = $("#manageTable");
        function myFunc() {
            table = manageTable.DataTable({
                ajax: {
                    url: defaultUrl,
                    dataSrc: 'pharmacy'
                },
                columns: [

                    {data: 'name'},
                    {data: 'location'},
                    {data: 'description'},
                    {data: 'latitude'},
                    {data: 'longitude'},
                    {data: 'user_id',
                        render: function (data, type, row) {
                        if (row.user_id==null){
                            return "No Pharmacist";
                        }else{
                            return row.user.name;
                        }
                        }
                    },
                    {
                        data: 'id',
                        render: function (data, type, row) {
                            if (row.user_id==null) {
                                return "<button  data-url='/home/pharmacy/show/" + row.id + "' class='btn btn-info btn-sm btn-flat js-edit' data-id='" + data +
                                    "' > <i class='fa fa-edit'></i>Edit</button>" +
                                    "<button class='btn btn-danger btn-sm btn-flat js-delete ' data-id='" + data +
                                    "' data-url='/home/pharmacy/delete/" + row.id + "'> <i class='fa fa-trash'></i>Delete</button>" +
                                    "<button class='btn btn-success btn-sm btn-flat js-pharmacist ' data-id='" + row.id +
                                    "' data-url='/home/pharmacy/addPharmacist/" + row.id + "'> <i class='fa fa-user-plus'></i>Pharmacist</button>";

                            }else{
                                return "<button  data-url='/home/pharmacy/show/" + row.id + "' class='btn btn-info btn-sm btn-flat js-edit' data-id='" + data +
                                    "' > <i class='fa fa-edit'></i>Edit</button>" +
                                    "<button class='btn btn-danger btn-sm btn-flat js-delete ' data-id='" + data +
                                    "' data-url='/home/pharmacy/delete/" + row.id + "'> <i class='fa fa-trash'></i>Delete</button>";

                            }
                        }
                    }
                ]
            });
        }


        $(document).ready(function () {
            $(".add_pharmacy").click(function () {
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
                    data: form.serialize()
                }).done(function (data) {
                    console.log(data);

                    if (data.pharmacy == "ok") {
                        btn.button('reset');
                        form[0].reset();
                        // reload the table
                        table.destroy();
                        myFunc();
                        $('#add-messages').html('<div class="alert alert-success flat">' +
                            '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Pharmacy  successfully saved. </div>');

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

            //Edit and update
            manageTable.on('click', '.js-pharmacist', function () {
                $("#addPharmacist").modal({
                    backdrop: 'static',
                    keyboard: false
                });
                var id = $(this).attr('data-id');
                $("#pharmacy").val(id);
                $('#pharmacistSave').submit(function (e) {
                    e.preventDefault();
                    var form = $(this);
                    var btn = $('#btnSave2');
                    btn.button('loading');
                    $.ajax({
                        url: form.attr('action'),
                        method: form.attr('method'),
                        data: form.serialize()
                    }).done(function (data) {
                        console.log(data);

                        if (data.pharmacist == "ok") {
                            btn.button('reset');
                            form[0].reset();
                            // reload the table
                            table.destroy();
                            myFunc();
                            $('#add-messages2').html('<div class="alert alert-success flat">' +
                                '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Pharmacist  successfully saved. </div>');

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
                        $('#add-messages2').html('<div class="alert alert-danger flat">' +
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

        });
    </script>


    <script src="{{asset('/backend/dashboard/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/backend/dashboard/assets/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('/backend/dashboard/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
    <script src="{{asset('/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('/backend/dashboard/js/dataTables.min.js')}}"></script>
@endsection
