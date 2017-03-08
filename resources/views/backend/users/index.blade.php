@extends('backend.layouts.app')

@section('after-required-styles')
    <link href="/libs/adminbsb-materialdesign/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
@endsection

@section('after-required-scripts')
    <script src="/libs/adminbsb-materialdesign/plugins/jquery-countto/jquery.countTo.js"></script>
    <script src="/libs/adminbsb-materialdesign/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="/libs/adminbsb-materialdesign/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="/libs/adminbsb-materialdesign/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="/libs/adminbsb-materialdesign/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="/libs/adminbsb-materialdesign/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="/libs/adminbsb-materialdesign/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="/libs/adminbsb-materialdesign/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="/libs/adminbsb-materialdesign/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="/libs/adminbsb-materialdesign/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <script>
        $(function () {
        //Exportable table
            $('.js-exportable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });

             $('.count-to').countTo();
        });
    </script>
@endsection

@section('content')
<div class="container-fluid">
            <div class="block-header text-uppercase">
                <h2>Users</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text text-uppercase">Total Users</div>
                            <div class="number count-to" data-from="0" data-to="{{ $users->count() }}" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">help</i>
                        </div>
                        <div class="content">
                            <div class="text">NEW TICKETS</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">forum</i>
                        </div>
                        <div class="content">
                            <div class="text">NEW COMMENTS</div>
                            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">NEW VISITORS</div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header text-uppercase">
                            <h2>
                                List of Users
                            </h2>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>{{ $user->updated_at }}</td>
                                        <td>
                                        <a href="#" class="btn btn-primary btn-mini"><i class="material-icons">edit</i></a> 
                                        <a href="#" class="btn  btn-danger btn-mini"><i class="material-icons">delete</i></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection