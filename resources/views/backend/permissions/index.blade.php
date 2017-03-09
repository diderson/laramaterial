@extends('backend.layouts.app')


@section('after-required-scripts')
    <script src="/libs/adminbsb-materialdesign/plugins/editable-table/mindmup-editabletable.js"></script>

    <script>
        $(function () {

            let table = $('#table');
            let id;
            table.editableTableWidget();

            table.find('td').on('validate', function (evt, newValue) {
                id = $(this).data('id');
                if (newValue.length < 3) {
                    $(this).closest('tr').addClass('danger');
                } else {
                    $(this).closest('tr').removeClass('danger');
                }
            });

            table.on('change', function (evt, newValue) {
                if (newValue.length > 3 && id) {
                    $.post('/admin/users/permissions/' + id + '/edit', {
                        name: newValue,
                        id: id,
                        _token: Laravel.csrfToken
                    }, function (response) {
                        console.log(response);
                    })
                }
            });

        });
    </script>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="block-header text-uppercase">
            <h2>Permissions</h2>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover" id="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse($permissions as $perm)
                                <tr>
                                    <td data-id="{{ $perm->id }}">{{ $perm->name }}</td>
                                    <td>{{ $perm->created_at }}</td>
                                    <td>{{ $perm->updated_at }}</td>
                                    <td>
                                        <a href="#" class="btn  btn-danger btn-mini"><i
                                                    class="material-icons">delete</i></a></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">Nothing to show</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection