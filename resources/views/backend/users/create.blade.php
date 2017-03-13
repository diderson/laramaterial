@extends('backend.layouts.app')

@section('after-required-styles')

@endsection

@section('after-required-scripts')


    <script>
        $(function () {
            //Exportable table

        });
    </script>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="block-header text-uppercase">
            <h2>Users</h2>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Create new user
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                   role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another
                                            action</a></li>
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else
                                            here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="col-md-8">
                                <form>
                                    <div class="form-group">
                                        <label for="email_address">Name</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="name" class="form-control"
                                                       placeholder="Full name of user" name="name">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email_address">Email Address</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="email" class="form-control"
                                                       placeholder="Enter your email address" name="email">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" id="password" class="form-control"
                                                       placeholder="Enter your password" name="password">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password Confirmation</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" id="password_confirmation" class="form-control"
                                                       placeholder="Confirm your password" name="password_confirmation">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="checkbox" id="active">
                                        <label for="active">Active</label>
                                        &nbsp; &nbsp;
                                        <input type="checkbox" id="confirm" name="confirm">
                                        <label for="confirm">Confirmed</label>
                                        &nbsp; &nbsp;
                                        <input type="checkbox" id="send_email">
                                        <label for="send_email">Send Confirmation E-mail (If confirmed is off)</label>
                                    </div>

                                    <button type="button" class="btn btn-primary m-t-15 waves-effect">Save</button>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <label for="permissions">Permissions</label>
                                <div class="form-group">
                                    @foreach(range(1, 4) as $i)
                                        <input type="checkbox" id="active">
                                        <label for="active">Active</label> <br>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection