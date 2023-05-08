<aside class="left-sidebar sidebar-dark" id="left-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
        <!-- Aplication Brand -->
        <div class="app-brand">
            <a href="{{ url('/') }}">
                <img src="{{ asset('backend/images/logo.png') }}" alt="Logette Intelligente">
                <span class="brand-name">Logette Intelligente</span>
            </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="sidebar-left" data-simplebar style="height: 100%;">
            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">
                <li class="{{ request()->is('home') ? 'active' : '' }}">
                    <a class="sidenav-item-link" href="{{ route('home') }}">
                        <i class="mdi mdi-briefcase-account-outline"></i>
                        <span class="nav-text">Tableau de bord</span>
                    </a>
                </li>
                @permission('Role', 'read')
                    <li class="has-sub {{ request()->is('roles') ? 'active expand' : '' }}">
                        <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#role"
                            aria-expanded="false" aria-controls="role">
                            <i class="mdi mdi-settings"></i>
                            <span class="nav-text">Roles</span> <b class="caret"></b>
                        </a>
                        <ul class="collapse {{ request()->is('roles') ? 'show' : '' }}" id="role"
                            data-parent="#sidebar-menu">
                            <div class="sub-menu">
                                <li class="{{ request()->is('roles') ? 'active' : '' }}">
                                    <a class="sidenav-item-link" href="{{ route('roles.index') }}">
                                        <span class="nav-text">Roles</span>

                                    </a>
                                </li>
                            </div>
                        </ul>
                    </li>
                @endpermission
                @permission('User', 'read')
                    <li class="has-sub {{ request()->is('users') ? 'active expand' : '' }}">
                        <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#user"
                            aria-expanded="false" aria-controls="user">
                            <i class="mdi mdi-account-group"></i>
                            <span class="nav-text">Utilisateurs</span> <b class="caret"></b>
                        </a>
                        <ul class="collapse {{ request()->is('users') ? 'show' : '' }}" id="user"
                            data-parent="#sidebar-menu">
                            <div class="sub-menu">
                                <li class="{{ request()->is('users') ? 'active' : '' }}">
                                    <a class="sidenav-item-link" href="{{ route('users.index') }}">
                                        <span class="nav-text">Utilisateurs</span>

                                    </a>
                                </li>
                            </div>
                        </ul>
                    </li>
                @endpermission
            </ul>

        </div>

        <div class="sidebar-footer">
            <div class="sidebar-footer-content">
                <ul class="d-flex">
                    <li>
                        <a href="user-account-settings.html" data-toggle="tooltip" title="Profile settings"><i
                                class="mdi mdi-settings"></i></a>
                    </li>
                    <li>
                        <a href="#" data-toggle="tooltip" title="No chat messages"><i
                                class="mdi mdi-chat-processing"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</aside>
