@extends('backend.layouts.app')

@section('after-required-styles')
    <link href="/libs/adminbsb-materialdesign/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css"
          rel="stylesheet">
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

            $('#defaultModal').on('show.bs.modal', function (event) {
                let tr = $(event.relatedTarget).closest('tr');
                $(this).find('#userId').val(tr.data('id'));

                let name = tr.find('td.name').text();

                $(this).find('#name').val(name).focus();

                $(this).find('.img-circle').attr('src', tr.find('img.img-rounded').attr('src'));
            })

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
                        <div class="number count-to" data-from="0" data-to="{{ $users->count() }}" data-speed="15"
                             data-fresh-interval="20"></div>
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
                        <div class="number count-to" data-from="0" data-to="257" data-speed="1000"
                             data-fresh-interval="20"></div>
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
                        <div class="number count-to" data-from="0" data-to="243" data-speed="1000"
                             data-fresh-interval="20"></div>
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
                        <div class="number count-to" data-from="0" data-to="1225" data-speed="1000"
                             data-fresh-interval="20"></div>
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
                                <th></th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Confirmed</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse($users as $user)
                                <tr data-id="{{ $user->id }}">
                                    <td><img class="img-rounded" src="{{ Gravatar::src(user()->email, 90) }}"
                                             alt="{{ user()->email }}" width="38" height="38"/></td>
                                    <td class="name">{{ $user->name }}</td>
                                    <td class="email">{{ $user->email }}</td>
                                    <td>
                                        <span class="label {{ $user->active ? 'label-success': 'label-danger' }}">{{ $user->active ? 'Yes': 'No' }}</span>
                                    </td>
                                    <td>
                                        <span class="label {{ $user->confirm ? 'label-success': 'label-danger' }}">{{ $user->confirm ? 'Yes': 'No' }}</span>
                                    </td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>{{ $user->updated_at }}</td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-mini" title="Edit User"><i
                                                    class="material-icons">edit</i></a>
                                        <a href="#" class="btn btn-warning btn-mini waves-effect" data-toggle="modal"
                                           data-target="#defaultModal" title="Change Password"><i
                                                    class="material-icons">refresh</i></a>
                                        <a href="#" class="btn bg-light-blue btn-mini" title="Make Active"><i
                                                    class="material-icons">pause</i></a>
                                        <a href="#" class="btn  btn-danger btn-mini"><i
                                                    class="material-icons">delete</i></a></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8">Nothing to show</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Large Size -->
    <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
        <form method="post" action="{{ route('admin.users.edit-password') }}">
            {!! csrf_field() !!}
            <input type="hidden" name="user_id" value="" id="userId">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-center" id="defaultModalLabel">
                            <img class="img-circle" src="#"
                                 alt=""/>
                        </h4>
                    </div>
                    <div class="modal-body">

                        <div class="form-group form-float">
                            <div class="form-line">

                                <input type="text" id="name" name="name" class="form-control" value="">
                                <label class="form-label" for="name">Name</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="password" id="password" name="password" class="form-control">
                                <label class="form-label" for="password">New Password</label>
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                       class="form-control">
                                <label class="form-label" for="password_confirmation">Password Confirmation</label>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        <button type="submit" class="btn btn-link waves-effect" data-dismiss="modal">SAVE</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection