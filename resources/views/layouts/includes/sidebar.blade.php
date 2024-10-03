<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}"> <img alt="image" src="{{ asset('static/assets/img/logo.png') }}"
                    class="header-logo" />
                <span class="logo-name">Areia</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown {{ Request::routeIs('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="nav-link"><i
                        data-feather="monitor"></i><span>Dashboard</span></a>
            </li>


            <li class="menu-header">User Management</li>
            @can('users')
                <li
                    class="dropdown {{ Request::routeIs('users.index') ? 'active' : '' }} || {{ Request::routeIs('users.create') ? 'active' : '' }} || {{ Request::routeIs('users.edit') ? 'active' : '' }}">
                    <a href="#"
                        class="menu-toggle nav-link has-dropdown {{ Request::routeIs('users.index') ? 'toggled' : '' }} || {{ Request::routeIs('users.create') ? 'toggled' : '' }} || {{ Request::routeIs('users.edit') ? 'toggled' : '' }}"><i
                            data-feather="copy"></i><span>Users</span>
                    </a>
                    <ul class="dropdown-menu">
                        @can('create user')
                            <li class="{{ Request::routeIs('users.create') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('users.create') }}">Add User</a>
                            </li>
                        @endcan
                        @can('users')
                            <li
                                class="{{ Request::routeIs('users.index') ? 'active' : '' }} || {{ Request::routeIs('users.edit') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('users.index') }}">Users</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('roles')
                <li
                    class="dropdown {{ Request::routeIs('roles.index') ? 'active' : '' }} || {{ Request::routeIs('roles.create') ? 'active' : '' }} || {{ Request::routeIs('roles.edit') ? 'active' : '' }}">
                    <a href="#"
                        class="menu-toggle nav-link has-dropdown {{ Request::routeIs('roles.index') ? 'toggled' : '' }} ||
                        {{ Request::routeIs('roles.create') ? 'toggled' : '' }} || {{ Request::routeIs('roles.edit') ? 'toggled' : '' }}"><i
                            data-feather="shopping-bag"></i><span>Role</span>
                    </a>
                    <ul class="dropdown-menu">
                        @can('create role')
                            <li class="{{ Request::routeIs('roles.create') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('roles.create') }}">Add Role</a>
                            </li>
                        @endcan

                        @can('view role')
                            <li
                                class="{{ Request::routeIs('roles.index') ? 'active' : '' }} || {{ Request::routeIs('roles.edit') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('roles.index') }}">Roles</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('view permission')
                <li class="{{ Request::routeIs('permissions.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('permissions.index') }}"><i
                            data-feather="file"></i><span>Permissions</span>
                    </a>
                </li>
            @endcan
            <li class="menu-header">Business</li>
            @can('classes')
                <li
                    class="dropdown {{ Request::routeIs('class.index') ? 'active' : '' }} || {{ Request::routeIs('class.create') ? 'active' : '' }} || {{ Request::routeIs('class.edit') ? 'active' : '' }}">
                    <a href="#"
                        class="menu-toggle nav-link has-dropdown {{ Request::routeIs('class.index') ? 'toggled' : '' }} || {{ Request::routeIs('class.create') ? 'toggled' : '' }} || {{ Request::routeIs('class.edit') ? 'toggled' : '' }}"><i
                            data-feather="copy"></i><span>Sessions</span>
                    </a>
                    <ul class="dropdown-menu">
                        @can('create class')
                            <li class="{{ Request::routeIs('class.create') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('class.create') }}">Add Session</a>
                            </li>
                        @endcan
                        @can('classes')
                            <li
                                class="{{ Request::routeIs('class.index') ? 'active' : '' }} || {{ Request::routeIs('class.edit') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('class.index') }}">Session</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan

            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="chevrons-down"></i><span>Multilevel</span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Menu 1</a></li>
                    <li class="dropdown">
                        <a href="#" class="has-dropdown">Menu 2</a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Child Menu 1</a></li>
                            <li class="dropdown">
                                <a href="#" class="has-dropdown">Child Menu 2</a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Child Menu 1</a></li>
                                    <li><a href="#">Child Menu 2</a></li>
                                </ul>
                            </li>
                            <li><a href="#"> Child Menu 3</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
