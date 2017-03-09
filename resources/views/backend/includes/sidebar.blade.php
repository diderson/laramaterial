<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="{{ Gravatar::src(user()->email) }}" width="48" height="48" alt="{{ user()->email }}"/>
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true"
                     aria-expanded="false">{{ user()->name }}</div>
                <div class="email">{{ user()->email }}</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="{{ route('admin.profile') }}"><i class="material-icons">person</i>Profile</a></li>
                        <li role="seperator" class="divider"></li>
                        <!--
                        <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                        <li role="seperator" class="divider"></li>
                        -->
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="material-icons">input</i>Sign Out</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active">
                    <a href="{{ route('admin.dashboard')}}">
                        <i class="material-icons">home</i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- admin area -->
                <li class="header text-uppercase">Administration</li>
                <li class="">
                    <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                        <i class="material-icons">person</i>
                        <span>Users</span>
                    </a>

                    <ul class="ml-menu" style="display: none;">
                        <li>
                            <a href="{{ route('admin.users.index') }}" class="waves-effect waves-block">All users</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.users.roles.index') }}" class="waves-effect waves-block">Roles</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.users.permissions.index') }}" class="waves-effect waves-block">Permissions</a>
                        </li>
                    </ul>

                </li>

                <li class="">
                    <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                        <i class="material-icons">list</i>
                        <span>Logs</span>
                    </a>

                    <ul class="ml-menu" style="display: none;">
                        <li>
                            <a href="{{ route('log-viewer::dashboard') }}"
                               class="waves-effect waves-block">Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ route('log-viewer::logs.list') }}" class="waves-effect waves-block">Logs</a>
                        </li>
                    </ul>
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; {{ date('Y') }} <a href="javascript:void(0);">{{ app_name() }}</a>
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li role="presentation"><a href="#settings" data-toggle="tab"></a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active in active" id="settings">
                <div class="demo-settings">
                    <ul class="setting-list">
                        <li>
                                <span>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    Sign Out</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                </span>

                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </aside>
    <!-- #END# Right Sidebar -->
</section>